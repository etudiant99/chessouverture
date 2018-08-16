<?php

class Variantes  extends CoupManager
{
    public function getVariante($idVariante)
    {
        $variante = null;
        $sql = 'select v.id,variante,ouverture,type from ouverture_variantes ov inner join variantes v on ov.id_variante=v.id inner join ouvertures o on ov.id_ouverture=o.id inner join types t on o.id_type=t.id where ov.id_variante=?';
        $q = $this->executerRequete($sql, array($idVariante));
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $donnees['listecoups'] = $this->getCoupsV($idVariante);
        $variante = new Variante($donnees);
        
        return $variante;
    }
    
    public function getLesVariantes()
    {
        $variantes = array();
        $sql = 'select v.id,variante,ouverture,type from ouverture_variantes ov inner join variantes v on ov.id_variante=v.id inner join ouvertures o on ov.id_ouverture=o.id inner join types t on o.id_type=t.id';
        $q = $this->executerRequete($sql);
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $idVariante = $donnees['id'];
            $donnees['listecoups'] = $this->getCoupsV($idVariante);
            $variantes[] = new Variante($donnees);
        }
        
        return $variantes;
    }

    public function getVariantes($idOuverture)
    {
        $variantes = array();
        $sql = 'select v.id,variante,ouverture,type from ouverture_variantes ov inner join variantes v on ov.id_variante=v.id inner join ouvertures o on ov.id_ouverture=o.id inner join types t on o.id_type=t.id where ov.id_ouverture=?';
        $q = $this->executerRequete($sql, array($idOuverture));
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $donnees['listecoups'] = $this->getCoupsV($donnees['id']);
            $variantes[] = new Variante($donnees);
        }
        
        return $variantes;
    }
    
    public function getCoupsV($idVariante)
    {
        $liste = array();
        $sql = 'select coup from coups_variante cv inner join lescoups l on cv.id_coup=l.id where cv.id_variante=?';
        $q = $this->executerRequete($sql, array($idVariante));
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $liste[] = $donnees;
        }
        
        return $liste;
    }
    
    public function VarianteTemp($coup)
    {
        $sql = 'insert into varianteproposee (lecoup) values(?)';
        $q = $this->executerRequete($sql, array($coup));
    }
    
    public function lecturetable()
    {
        $liste = array();
        $sql = 'select lecoup from varianteproposee';
        $q = $this->executerRequete($sql);
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            
            $liste['temp'][] = $donnees['lecoup'];
        }
        $resultat = new Varianteproposee($liste);
        
        return $resultat;
    }

    public function enregistrerVariante($idOuverture,$nomvariante)
    {
        $echiquier = new Echiquier;
        $resultat = $this->lecturetable();
        $ign = $resultat->getTemp();
        $coups = explode(" ",$ign);
        $totalcoups = sizeof($coups);
        $echiquier->positionarbitraire($ign,$totalcoups);
        $touslescoups = $echiquier->getTouslescoups();
        for ($i=0;$i<sizeof($touslescoups);$i++)
        {
            if ($i% 2 == 0)
                $blancs[] = $touslescoups[$i];
            if ($i% 2 == 1)
                $noirs[] = $touslescoups[$i];
        }
        for ($i=0;$i<sizeof($blancs);$i++)
        {
            if (isset($noirs[$i]))
                $lescoups[] = $blancs[$i].' '.$noirs[$i];
            else
                $lescoups[] = $blancs[$i];
        }
        $sql = 'insert into variantes (variante) values (?)';
        $q = $this->executerRequete($sql, array($nomvariante));
        $sql = "select max(id) as maximum from variantes order by id";
        $q = $this->executerRequete($sql);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $idVariante = $donnees['maximum'];
        
        foreach ($lescoups as $coup)
        {
            $sql = 'select * from lescoups where coup=?';
            $q = $this->executerRequete($sql, array($coup));
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            if ($q->rowCount() > 0)
            {
                $idCoup = $donnees['id'];
                $sql = 'select * from ouverture_variantes where id_ouverture=? and id_variante=?';
                $q = $this->executerRequete($sql, array($idOuverture,$idVariante));
                $donnees = $q->fetch(PDO::FETCH_ASSOC);
                if ($q->rowCount() == 0)
                {
                    $sql = 'insert into ouverture_variantes (id_ouverture,id_variante) values (?,?)';
                    $q = $this->executerRequete($sql, array($idOuverture,$idVariante));
                }
                
                $sql = 'insert into coups_variante (id_variante,id_coup) values(?,?)';
                $q = $this->executerRequete($sql, array($idVariante,$idCoup));
            }
            else
            {
                $sql = 'insert into lescoups (coup) values(?)';
                $q = $this->executerRequete($sql, array($coup));
                $sql = "select max(id) as maximum from lescoups order by id";
                $q = $this->executerRequete($sql);
                $donnees = $q->fetch(PDO::FETCH_ASSOC);
                $sql = 'insert into coups_variante (id_variante,id_coup) values(?,?)';
                $q = $this->executerRequete($sql, array($idVariante,$donnees['maximum']));
            }
        }
        $sql = 'truncate table varianteproposee';
        $q = $this->executerRequete($sql);
        
        header('Location: ?action=variantes&id='.$idOuverture);
    }
    
    public function effacerVarianteTemp()
    {
        $sql = 'truncate table varianteproposee';
        $q = $this->executerRequete($sql);
    }
    
    public function effacerVariante($idVariante)
    {
        $sql = 'delete ov.*,cv.*,v.* from ouverture_variantes ov inner join coups_variante cv on ov.id_variante=cv.id_variante inner join variantes v on ov.id_variante=v.id where ov.id_variante=?';
        $this->executerRequete($sql, array($idVariante));
    }
}