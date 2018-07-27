<?php
class Types extends Modele
{
    public function getTypes()
    {
        $types = array();
        $sql = 'SELECT * FROM types';
        $q = $this->executerRequete($sql);
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $types[] = new Type($donnees);
        }
        
        return $types;
    }
}