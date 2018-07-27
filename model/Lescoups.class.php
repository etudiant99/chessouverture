<?php
require_once 'Framework/Modele.php';
require_once 'types.php';

class Lescoups  extends Types
{
    protected $_ign;
    
    public function getCoups($idOuverture)
    {
        $ign = '';
        $listeCoups = array();
        $sql = 'select id_liste,id_coup,coup from liste_coups as lc,coups as c where lc.id_liste=? and id_coup=c.id';
        $q = $this->executerRequete($sql, array($idOuverture));
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $ign .= $donnees['coup'].' ';
            $idOuverture = $idOuverture;
            $idOuverture = $donnees['id_coup'];
            $coup = $donnees['coup'];
            if (strlen($coup) > 6 )
            {
                $coups = explode(" ",$coup);
                $coupBlanc = $coups[0];
                $coupNoir = $coups[1];
            }
            else
            {
                $coups = null;
                $coupBlanc = $coup;
                $coupNoir = null;
            }
            $donnees['ign'] = substr($ign,0,-1);
            $donnees['coupblanc'] = $coupBlanc;
            $donnees['coupnoir'] = $coupNoir;
            $listeCoups[] = new Coup($donnees);
        }
        
        return $listeCoups;
    }
    
    public function setIgn($novariante)
    {
        $sql = "select * from variante_coups as vc, coups as c where id_variante=? and id_coup=c.id order by vc.id asc";
        $q = $this->executerRequete($sql, array($novariante));
        $les_coups = " ";
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $coup = $donnees['coup'];
            if (strlen($coup > 6))
                $les_coups .= $coup;
            else
                $les_coups .= $coup." ";
            
            $coup = "";
        }
        $ign = trim($les_coups);
        $this->_ign = $ign;
    }

    public function Ign()
    {
        return $this->_ign;
    }

    public function add($id,$coup)
    {
        $sql = "Select * from coups where coup=?";
        $lecoup = $this->executerRequete($sql, array($coup));
        if ($lecoup->rowCount() > 0)
        {
            $donnees = $lecoup->fetch(PDO::FETCH_ASSOC);
            $idcoup = $donnees['id'];
            $sql = "insert into liste_coups (id_liste, id_coup) VALUES (?,?)";
            $this->executerRequete($sql, array($id,$idcoup));
        }
        else
        {
            $sql = "INSERT INTO coups (coup) VALUES(?)";
            $this->executerRequete($sql, array($coup));
            $sql = "select max(id) as maximum from coups order by id";
            $q = $this->executerRequete($sql);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            $mon_numero_coup = $donnees['maximum'];
            $conversion = intval($mon_numero_coup);
            $sql = "insert into liste_coups (id_liste, id_coup) VALUES (?,?)";
            $this->executerRequete($sql, array($id,$conversion));
        }

        return;
    }
}