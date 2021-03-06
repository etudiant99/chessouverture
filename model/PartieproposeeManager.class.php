<?php
class PartieproposeeManager extends Modele
{
    public static $instance;
    
    public function __construct()
    {
        self::$instance = $this;
    }

    public function add($prospect,$uidActif,$color,$cadence,$reserve,$commentaire)
    {   
        $uid = $prospect;
        
        if ($uid != $uidActif)
            if ($uid != 0)
            {
                $sql = "INSERT INTO partiesproposees (prospect,origine,macouleur,cadence,reserve,commentaire) VALUES(?,?,?,?,?,?)";
                $q = $this->executerRequete($sql, array($uid,$uidActif,$color,$cadence,$reserve,$commentaire));
            }
            else
            {
                $sql = "INSERT INTO partiesproposees (origine,macouleur,cadence,reserve,commentaire) VALUES(?,?,?,?,?)";
                $q = $this->executerRequete($sql, array($uidActif,$color,$cadence,$reserve,$commentaire));
            }

        header('Location:  index.php?action=mes parties proposées&folder=-1');
    }

  public function get($id)
  {
    $sql = 'SELECT * FROM partiesproposees WHERE gidp = ?';
    $q = $this->executerRequete($sql, array($id));
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Partieproposee($donnees);
  }

  public function count($personne)
  {
    $sql = "SELECT COUNT(*) AS compteur FROM partiesproposees WHERE prospect=".$personne;
    $req = $this->executerRequete($sql);
    $nb = $req->fetchColumn();

    return $nb;
  }

    public function getListmespp($uidActif)
    {
        $partiesproposees = array();
        
        $sql = 'SELECT * FROM partiesproposees where origine = ?';
        $q = $this->executerRequete($sql, array($uidActif));

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $partiesproposees[] = new Partieproposee($donnees);
        }
        
        return $partiesproposees;
    }

    public function getListpppersonnelles($uidActif)
    {
        $partiesproposees = array();
        
        $sql = 'SELECT * FROM partiesproposees where prospect = ?';
        $q = $this->executerRequete($sql, array($uidActif));

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $partiesproposees[] = new Partieproposee($donnees);
        }
        
        return $partiesproposees;
    }

    public function getList($uidActif)
    {
        $partiesproposees = array();
        
        $sql = 'SELECT * FROM partiesproposees where origine != ? and prospect is null';
        $q = $this->executerRequete($sql, array($uidActif));

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $partiesproposees[] = new Partieproposee($donnees);
        }
        
        return $partiesproposees;
    }
    
    public function getListPP($uidActif)
    {
        $joueurs = array();
    
        $sql = 'select pp.gidp, l.elo, l.pseudo, l.connecte, pp.macouleur, pp.cadence, pp.reserve, pp.commentaire, pp.prospect, u.sexe 
            from partiesproposees pp left join login as l on pp.prospect=l.uid left join users as u on pp.prospect=u.uid  where pp.origine= '.$uidActif;
        $q = $this->executerRequete($sql);
        
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $partiesproposees[] = new Partieproposee($donnees);
        }
            
        return $partiesproposees;
    }
    
    public function accepter($nopartie)
    {
        
        header('Location: index.php?action=mes parties');
    }
    
    public function refuser($nopartie,$action)
    {
        $sql = "select * from partiesproposees where gidp=?";
        $q = $this->executerRequete($sql, array($nopartie));
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        $mon_gdip = $donnees['gidp'];
        $sql = "delete from partiesproposees where gidp=?";
        $q = $this->executerRequete($sql, array($mon_gdip));
        
        if ($action == 'refuser')
            header('Location: index.php?action=mes parties');
        if ($action == 'effacer')
            header('Location: index.php?action=mes parties proposées&folder=-1');
    }

    public function proposerpartie()
    {
        ?>
        <script type="text/javascript">
            $(document).ready((function() {
            $("#lenom").focus();
            }))			
        </script>
        <section></section>
        <div class="titreveritable">
        Proposer une partie
        </div>
        <br /><br />
        <form method="get">
            <table align="center" cellspacing="0" cellpadding="0">
                <input type="hidden" name="action" value="proposer partie" />
                <tr>
                    <td style="padding-right:10px; text-align: right;">Pseudonyme de votre adversaire<br />(ou laisser le champs vide)</td>
                    <td><input id="lenom" type="text" name="proposeur" size="20" style="text-align: left;" value="" /></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td style="text-align: right; padding-right: 10px;">Vous voulez jouer avec</td>
                    <td style="text-align: right;">
                    <select name="color">
                        <option value="-">couleur au hazard</option>
                        <option value="b">les blancs</option>
                        <option value="n">les noirs</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 10px;">Temps maximum par coup</td>
                    <td style="text-align: right;">
                    <select name="cadence">
                        <option value="0">0 journée/coup</option>
                        <option value="1">1 journée/coup</option>
                        <option value="2">2 journée/coup</option>
                        <option value="3" selected="">3 journée/coup</option>                        
                    </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 10px;">Réserve de temps</td>
                    <td style="text-align: right;">
                        <select name="reserve">
                            <option value="1">1 journée</option>
                            <option value="2">2 jours</option>
                            <option value="3">3 jours</option>
                            <option value="7" selected>1 semaine</option>
                            <option value="14">2 semaines</option>
                        </select>
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td style="text-align: right; padding-right: 10px;">Commentaire</td><td><input type="text" name="commentaire" size="25" style="text-align: left;" value="" /></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td colspan="2"><input type="submit" value="Proposer" /></td></tr>
            </table>
        </form>
        <?php
        
    }

}

?>