<?php
session_start();
$_SESSION['admin'] = false;

function chess()
{
    require('view/frontend/chessView.php');
}

function choix()
{
    $ouvertures = new Ouvertures;
    $types = $ouvertures->getTypes();
    
    require('view/frontend/choiceView.php');

}

function ouvertures()
{
    $ouvertures = new Ouvertures;
    
    if (isset($_GET['type']))
        $idType = $_GET['type'];
    
    if (isset($_GET['but']))
    {
        $item = $_GET['item'];
        $ouvertures->effacerOuverture($item);
    }

    if (isset($_SESSION['uid']))
        if ($_SESSION['uid'] == '1')
            $_SESSION['admin'] =  true;
        else
            $_SESSION['admin'] =  false;

    $type = $ouvertures->getType($idType);
    $lesouvertures = $type->getOuvertures();

    
    require('view/frontend/ouverturesView.php');
}

function nouvelleouverture()
{
    $ouvertures = new Ouvertures;
    
    if (isset($_SESSION['uid']))
        if ($_SESSION['uid'] == '1')
            $_SESSION['admin'] =  true;
        else
            $_SESSION['admin'] =  false;

    $idType = 1;
    if (isset($_GET['type']))
        $idType = $_GET['type'];
        
    $type = $ouvertures->getType($idType);
    $nomtype = $type->getType();
    
    require('view/frontend/nouvelleouvertureView.php');
}

function nouvellevariante()
{
    $ouvertures = new Ouvertures;
    
    if (isset($_GET['ouverture']))
        $idOuverture = $_GET['ouverture'];
        
    $ouverture = $ouvertures->get($idOuverture);
    $nomouverture = $ouverture->getOuverture();
    $typeouverture = $ouverture->getType();
    
    require('view/frontend/nouvellevarianteView.php');
}

function ecrireouverture()
{
    if (isset($_SESSION['uid']))
        if ($_SESSION['uid'] == '1')
            $_SESSION['admin'] =  true;
        else
            $_SESSION['admin'] =  false;

    if (!$_SESSION['admin'])
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $echiquier = new Echiquier;
    $ouvertures = new Ouvertures;
    $nomouverture = '';
    
    if (isset($_GET['type']))
        $idtype = $_GET['type'];
        
    $type = $ouvertures->getType($idtype);
    $nomtype = $type->getType();
    if (isset($_GET['ouverture']))
    {
        $nomouverture = $_GET['ouverture'];
        $presence = $ouvertures->chercheOuverture($nomouverture);
        if ($presence != null)
             header('Location: /chess/?action=erreur&erreur='.$presence);
    }
    
    if (isset($_GET['lecoup']))
    {
        $lecoup = $_GET['lecoup'];
        $ouverture = $ouvertures->OuvertureTemp($lecoup);
    }
    
    if (isset($_GET['effacer']))
        $ouvertures->effacerOuvertureTemp();
    if (isset($_GET['enregistrer']))
        $ouvertures->enregistrerOuverture($idtype,$nomouverture);


    $ouverture = $ouvertures->lecturetable();
    $ignouverture = $ouverture->getTemp();
    
    $flip = false;
    $cliquable = true;
    $couleur = 1;
    $cell1 = -1;
    $cell2 =  -1;
    
    if (isset($_GET['depart']))
        $cell1 = $_GET['depart'];
    
    if (isset($_GET['arrivee']))
        $cell2 = $_GET['arrivee'];
            
    if (!isset($ignouverture))
        $ignouverture = '';
        
    $coups = explode(" ", $ignouverture);
    $totalcoups = sizeof($coups);
    $trait = $ouverture->getTrait();
    
    $echiquier->positionarbitraire($ignouverture,$totalcoups);
    $mangeaille = $echiquier->getMangeaille();
    $position = $echiquier->position();
    $lastmove = $echiquier->Lastmove();
    $positions = null;
    
    if($lastmove != '')
    {
        $derniercoup = -1;
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
        if (($position[$end] == 'p' && $trait == 1) || ($position[$end] == 'P' && $trait == -1))
            $derniercoup = $end;
    }
    else
    {
        $start = -1;
        $end = -1;
        $derniercoup = -1;
    }
    
    if ($cell1 != -1)
    {
        $lapiece = $echiquier->trouve($position[$cell1]);
        $lapiece->deplacer($position,$cell1,$trait,$derniercoup);
        $positions = $lapiece->positionsPossibles();
    }

    require('view/frontend/ecrireouvertureView.php');
}

function ecrirevariante()
{
    if (isset($_SESSION['uid']))
        if ($_SESSION['uid'] == '1')
            $_SESSION['admin'] =  true;
        else
            $_SESSION['admin'] =  false;

    if (!$_SESSION['admin'])
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $echiquier = new Echiquier;
    $variantes = new Variantes;
    $ouvertures = new Ouvertures;
    $nomvariante = '';

    if (isset($_GET['ouverture']))
        $idouverture = $_GET['ouverture'];
    if (isset($_GET['variante']))
        $nomvariante = $_GET['variante'];
        
    $ouverture = $ouvertures->get($idouverture);
    $nomouverture = $ouverture->getOuverture();
        
    if (isset($_GET['lecoup']))
    {
        $lecoup = $_GET['lecoup'];
        $variante = $variantes->VarianteTemp($lecoup);
    }

    if (isset($_GET['effacer']))
        $variantes->effacerVarianteTemp();
    if (isset($_GET['enregistrer']))
        $variantes->enregistrerVariante($idouverture,$nomvariante);

    $variante = $variantes->lecturetable();
    $ignouverture = $variante->getTemp();
    
    $flip = false;
    $cliquable = true;
    $couleur = 1;
    $cell1 = -1;
    $cell2 =  -1;
    
    if (isset($_GET['depart']))
        $cell1 = $_GET['depart'];
    
    if (isset($_GET['arrivee']))
        $cell2 = $_GET['arrivee'];

    $coups = explode(" ", $ignouverture);
    $totalcoups = sizeof($coups);
    $trait = $variante->getTrait();
    
    $echiquier->positionarbitraire($ignouverture,$totalcoups);
    $mangeaille = $echiquier->getMangeaille();
    $position = $echiquier->position();
    $lastmove = $echiquier->Lastmove();
    $positions = null;
    
    if($lastmove != '')
    {
        $derniercoup = -1;
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
        if (($position[$end] == 'p' && $trait == 1) || ($position[$end] == 'P' && $trait == -1))
            $derniercoup = $end;
    }
    else
    {
        $start = -1;
        $end = -1;
        $derniercoup = -1;
    }
    
    if ($cell1 != -1)
    {
        $lapiece = $echiquier->trouve($position[$cell1]);
        $lapiece->deplacer($position,$cell1,$trait,$derniercoup);
        $positions = $lapiece->positionsPossibles();
    }

    require('view/frontend/ecrirevarianteView.php');
}

function variantes()
{
    $ouvertures = new Ouvertures;
    $lesvariantes = new Variantes;

    if (isset($_SESSION['uid']))
        if ($_SESSION['uid'] == '1')
            $_SESSION['admin'] =  true;
        else
            $_SESSION['admin'] =  false;

    if (isset($_GET['id']))
        $idOuverture = $_GET['id'];
    if (isset($_GET['but']))
    {
        $idVariante = $_GET['variante'];
        $lesvariantes->effacerVariante($idVariante);
    }
       
    $ouverture = $ouvertures->get($idOuverture);
    $coupsouverture = $ouverture->getListecoups();
    $variantes = $ouvertures->getVariantes($idOuverture);

    require('view/frontend/variantesView.php');
}

function connection()
{
    $pseudo = '';
    $password = '';
    $type_confirmation = '';
    $type_pseudo = "hidden";
    $type_confirmation = "hidden";
    $parties = new PartieManager;
    $validation = new ConnectionManager;
    if (isset($_POST['envoi']))
    {
        extract($_POST);
        $resultat = $validation->connecter_joueur($pseudo,$password);
        $valeur_pseudo = $resultat['pseudo'];
        $type_pseudo = $resultat['type_pseudo'];
        $valeur_confirmation = $resultat['confirmation'];
        $type_confirmation = $resultat['type_confirmation'];
        $statut_pseudo = $resultat['pseudo_ok'];
        if ($statut_pseudo == true)
        {
            if (isset($_SESSION['uid']))
                if ($_SESSION['uid'] == '1')
                    $_SESSION['admin'] =  true;
                else
                    $_SESSION['admin'] =  false;
            
            $mesparties = $parties->partieencours($pseudo);
            if ($mesparties != null)
                header('Location: ./?action=mes parties');
            else
                header('Location: ./?action=les parties');
        }   
    }
      
    require('view/frontend/conectionView.php');
}

function deconnection()
{
    $uidActif = $_SESSION['uid'];
    unset($_SESSION['uid']);
    unset($_SESSION['pseudo']);
    unset($_SESSION['admin']);
    $managerconnections = new ConnectionManager;
    $managerconnections->quitter($uidActif);
}

function inscription()
{
    $success = '&nbsp;&nbsp;';
    $pseudo = '';
    $email = '';
    $type_pseudo = "hidden";
    $type_confirmation = "hidden";
    $valeur_pseudo = '';
    $validation = new Inscription;
    if (isset($_POST['envoi']))
    {
        extract($_POST);
        $resultat = $validation->enregistrer_joueur($pseudo,$email);
        $valeur_pseudo = $resultat['pseudo'];
        $type_pseudo = $resultat['type_pseudo'];
        $valeur_confirmation = $resultat['confirmation'];
        $type_confirmation = $resultat['type_confirmation'];
        $statut_pseudo = $resultat['pseudo_ok'];
        if ($statut_pseudo == true)
            $success = 'Consultez vos courriels';
    }
    
    require('view/frontend/inscriptionView.php');
}

function oublie()
{
    $type_courriel = "hidden";
    $valid = false;
    $validation = new JoueurManager;
    $success = '&nbsp;&nbsp;';
    $email = '';
    
    if (isset($_POST['envoi']))
    {
        extract($_POST);
        $resultat = $validation->informer_joueur($email);
        $valeur_courriel = $resultat['courriel'];
        $type_courriel = $resultat['type_courriel'];
        $success = $resultat['success'];
    }
    
    require('view/frontend/oublieView.php');
}

function accueil()
{
    require('view/frontend/acceuilView.php');
}

function mesparties()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);
    
    $uidActif = $_SESSION['uid'];    
    $managerPartieproposee = new PartieproposeeManager;
    $joueurs = new JoueurManager;
    $mespartiesproposees = $managerPartieproposee->getListpppersonnelles($uidActif);
    
    if (count($mespartiesproposees) > 0)
        require('view/frontend/personalProposedGamesView.php');
    else
    {
        $managerParties = new PartieManager;
        $joueurs = new JoueurManager;
        $managerParties->setListePartiesActif($uidActif);
        $mesparties = $managerParties->getListepartiesActif();
    
        require('view/frontend/myGamesView.php');
    }
}

function partiesterminees()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $uidActif = $_SESSION['uid'];
    $managerParties = new PartieManager;
    $lesparties = $managerParties->getListPartiesterminees($uidActif);
    $joueurs = new JoueurManager;
    
    require('view/frontend/completedGamesView.php');
}

function partiesproposees()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);
        
    $uidActif = $_SESSION['uid'];
    $managerPartieproposee = new PartieproposeeManager;
    $joueurs = new JoueurManager;
    $lespartiesproposees = $managerPartieproposee->getList($uidActif);
    
    require('view/frontend/proposedGamesView.php');
}

function statistiques()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $uidActif = $_SESSION['uid'];
    $managerParties = new PartieManager;
    $joueur = $managerParties->trouveJoueur($uidActif);
    $managerStatistiques = new StatistiqueManager;
    $lesstatistiques = $managerStatistiques->getList();
    $statistique = $managerStatistiques->get($uidActif);
    $dateInscription = $managerStatistiques->formate_date($joueur->date_inscription());
    $gainsblancs = $statistique->gains_b();
    $gainsnoirs = $statistique->gains_n();
    $pertesblancs = $statistique->pertes_b();
    $nullesblancs = $statistique->nulles_b();
    $nullesnoires = $statistique->nulles_n();
    $pertesnoires = $statistique->pertes_n();
    $partiesavecblancs = $managerParties->countpartiesblancs($uidActif);
    $partiesavecnoirs = $managerParties->countpartiesnoirs($uidActif);
    $partiesencours = $partiesavecblancs+$partiesavecnoirs;
                    
    if ($partiesencours < 2)
        $message_pour_parties = 'partie en cours';
    else
        $message_pour_parties = 'parties en cours';
    if ($statistique->partiestotales() < 2)
        $message_parties_jouees = ' partie terminée ';
    else
        $message_parties_jouees = ' parties terminées ';
                        
    require('view/frontend/myStatisticView.php');
}

function profil()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    if (isset($_GET['pw1']))
        $pw1 = $_GET['pw1'];
    if (isset($_GET['pw2']))
        $pw2 = $_GET['pw2'];
    $joueurs = new JoueurManager;
    if (isset($pw1) & isset($pw2))
        $joueurs->traiterpassword($pw1,$pw2);
    
    require('view/frontend/profilView.php');
}

function usager()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $uidActif = $_SESSION['uid'];
    $sexe = null;
    if (isset($_GET['sexe']))
        $sexe = $_GET['sexe'];
    if (isset($_GET['pays']))
        $pays = $_GET['pays'];
    if (isset($_GET['jour']))
        $day = $_GET['jour'];
    if (isset($_GET['mois']))
        $month = $_GET['mois'];
    if (isset($_GET['annee']))
        $year = $_GET['annee'];
    if (isset($_GET['naissance']))
        $naissance = $_GET['naissance'];
    if (isset($_GET['photo']))
        $photo = $_GET['photo'];

    $usagers = new JoueurManager;
    $usager = $usagers->trouveJoueur($uidActif);
    $date_naissance = $usager->naissance();
    if ($date_naissance != null)
    {
        $arr1 = explode('-', $date_naissance);
        if ($arr1[0] != '0000')
        {
            $jour = $arr1[2];
            $mois = $arr1[1];
            $annee = $arr1[0];
        }
    }
    if (isset($sexe))
    {
        $changement = $year.'-'.$month.'-'.$day;
        $usagers->traiterinfos($sexe,$pays,$changement);
    }

    require('view/frontend/usagerView.php');
}

function maphoto()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $uidActif = $_SESSION['uid'];
    $resultat = false;
    $nom_destination = null;
    $nom_destination = './public/images/joueurs/'.'h'.$uidActif.'.jpg';
    $types = '{jpg,jpeg}';
    $joueurs = new JoueurManager;
    if (isset($_POST['MAX_FILE_SIZE']))
    {
        $taille_maximum = $_POST['MAX_FILE_SIZE'];
        $taille_image = $_FILES['nom_du_fichier']['size'];
        $nom_temporaire = $_FILES['nom_du_fichier']['tmp_name'];
    }
    if (isset($taille_maximum))
    {
        $type_fichier = $_FILES['nom_du_fichier']['type'];
        if (($taille_image < $taille_maximum) && ($type_fichier == "image/jpeg"))
        {
            $resultat = move_uploaded_file($nom_temporaire,$nom_destination);
            $filename = $nom_destination;
            $width = 200;
            $height = 200;
            list($width_orig, $height_orig) = getimagesize($filename);
            $ratio_orig = $width_orig/$height_orig;
            if ($width/$height > $ratio_orig)
                $width = $height*$ratio_orig;
            else
                $height = $width/$ratio_orig;
            // Redimensionnement
            $image_p = imagecreatetruecolor($width, $height);
            $image = imagecreatefromjpeg($filename);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
            imagejpeg($image_p,$nom_destination);
            imagedestroy($image_p);
            if ($resultat)
                $joueurs->updatephoto($uidActif);
        }
    }
    
    $uidActif = $_SESSION['uid'];
    $joueurs = new JoueurManager;
    $usager = $joueurs->trouveJoueur($uidActif);
    
    require('view/frontend/mypictureView.php');
}

function parties()
{
    $managerParties = new PartieManager;
    $joueurs = new JoueurManager;
    $lesparties = $managerParties->setListeParties();
    $lesparties = $managerParties->getListeParties();
    
    require('view/frontend/gamesView.php');
}

function joueurs()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);
    
    if (isset($_SESSION['uid']))    
        if ($_SESSION['uid'] == '1')
            $_SESSION['admin'] =  true;
        else
            $_SESSION['admin'] =  false;

    $managerJoueurs = new JoueurManager;
    $joueurs = $managerJoueurs->getList();
    
    require('view/frontend/playersView.php');
}

function statistica()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $statistiques = new StatistiqueManager;
    $nbpartiesjouees = $statistiques->nbpartiesjouees();
    $managerJoueurs = new JoueurManager;
    $managerParties = new PartieManager;
    $joueursinscrits = $managerJoueurs->countinscrits();
    $joueursconnectes = $managerJoueurs->countenligne();
    $joueursrecemmentconnectes = $managerJoueurs->countrecemmentconecte();
    $partiesencours = $managerParties->countencours();
    
    if ($joueursrecemmentconnectes > 1)
        $phrase_joueur_connecte = " joueurs se sont connectés ";
    else
        $phrase_joueur_connecte = " joueur s'est connecté ";
    if ($joueursconnectes > 1)
        $phrase_joueur_en_ligne = ' joueurs en ligne.';
    else
        $phrase_joueur_en_ligne = ' joueur en ligne.';
    if ($partiesencours > 1)
        $messagenbparties = " parties ";
    else
        $messagenbparties = " partie ";
    require('view/frontend/StatisticsView.php');
}

function montrerPartie($nopartie)
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $parties = new PartieManager;
    $joueurs = new JoueurManager;
    $ouvertures = new Ouvertures;
    $partie = $parties->get($nopartie);
    $ignPartie = $partie->getIgn();var_dump($ignPartie);
    
    $mangeaille = $partie->getMangeaille();
    $titre = $partie->getTitre();
    $affichagePromotion = null;
    $position = $parties->getPositionDepart();
    $trait = $parties->Montrait();//var_dump($trait);
    $lettres = array('a','b','c','d','e','f','g','h');
    $flip = $partie->getFlipBase();
    $cliquable = $partie->getCliquable();
    $lastmove = $parties->Lastmove();
    
    if($lastmove != '')
    {
        $derniercoup = -1;
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
        if (($position[$end] == 'p' && $trait == 1) || ($position[$end] == 'P' && $trait == -1))
            $derniercoup = $end;
    }
    else
    {
        $start = -1;
        $end = -1;
        $derniercoup = -1;
    }
    
    $cell1 = -1;
    $cell2 = -1;
    if (isset($_GET['depart']))
        $cell1 = $_GET['depart'];
            
    if (isset($_GET['arrivee']))
        $cell2 = $_GET['arrivee'];

    if ($cell2 != -1 && $cell2 == $cell1)
    {
        $cell1 = -1;
        $cell2 = -1;
    }
    if ($cell1 != -1)
    {
        if ($cell1>47 && $position[$cell1] == 'P')
        {
            $positiontemp = $position;
            $parties->setPromotion('Q');
            $affichagePromotion = $parties->dessinerPiecesPromotion('1',$partie->gid(),$cell1,$cell2);
        }
        if ($cell1<16 && $position[$cell1] == 'p')
        {
            $positiontemp = $position;
            $parties->setPromotion('q');
            $affichagePromotion = $parties->dessinerPiecesPromotion('-1',$partie->gid(),$cell1,$cell2);
        }
        if (isset($_GET['piece']))
        {
            $mapiece = $_GET['piece'];
            $parties->setPromotion($mapiece);
        }
        else
            $mapiece = '';
                
        $lapiece = $parties->trouve($position[$cell1]);
        $endroitsPossibles =  $lapiece->endroitsPossibles($position,$cell1,$trait,$derniercoup);
            
        if (isset($lapiece))
        {
            $lapiece->deplacer($position,$cell1,$trait,$derniercoup);
            $positions = $lapiece->positionsPossibles();
            $piecesattaquees = $lapiece->piecesAttaquees();
            $piecesdefendues = $lapiece->piecesDefendues();
        }   
    }
    $couleur = 1;
    require('view/frontend/playView.php');
}

function jouerlecoup($nopartie,$coup,$changementB,$changementN)
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $managerParties = new PartieManager;
    $managerParties->jouer($nopartie,$coup,$changementB,$changementN);
}

function proposerpartie()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $uidActif = $_SESSION['uid'];
    $proposeur = 0;
    if (isset($_GET['proposeur']))
        $proposeur = $_GET['proposeur'];
    if (isset($_GET['color']))
        $color = $_GET['color'];
    if (isset($_GET['cadence']))
        $cadence = $_GET['cadence'];
    if (isset($_GET['reserve']))
        $reserve = $_GET['reserve'];
    if (isset($_GET['commentaire']))
        $commentaire = $_GET['commentaire'];

    $partiesproposees = new PartieproposeeManager;
    $joueur = new JoueurManager;
    $uid = $joueur->exists($proposeur);
    
    if (isset($color))
        $partiesproposees->add($uid,$uidActif,$color,$cadence,$reserve,$commentaire);
    
    require('view/frontend/ProposeAPartView.php');
}

function mespartiesproposees()
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $uidActif = $_SESSION['uid'];
    $managerPartieproposee = new PartieproposeeManager;
    $joueurs = new JoueurManager;
    $mespartiesproposees = $managerPartieproposee->getListmespp($uidActif);
    
    require('view/frontend/myProposedGamesView.php');
}

function acceptation($nopartie)
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $managerParties = new PartieManager;
    $lesparties = $managerParties->acepter($nopartie,$_SESSION['uid']);
}

function refus($nopartie,$but)
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $managerParties = new PartieproposeeManager;
    $lesparties = $managerParties->refuser($nopartie,$but);
}

function effacer($nopartie,$but)
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $managerParties = new PartieproposeeManager;
    $lesparties = $managerParties->refuser($nopartie,$but);
}

function effacerjoueur($uid)
{
    if (!$_SESSION['admin'])
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $managerJoueurs = new JoueurManager;
    $managerJoueurs->effacer($uid);
}

function rejouer($gid)
{
    $_SESSION['nopartie'] = $gid;
    $parties = new  PartieManager;
    $partie = $parties->get($gid);
    $ignPartie = $partie->getIgn();

    $titre = $partie->getTitre();
    $totalcoups = $partie->getNbCoups();
    $mangeaille = $partie->getMangeaille();
    $ign = $parties->Ign();
    $flip = $partie->getFlipBase();
    $lastmove = $parties->Lastmove();
    if($lastmove != '')
    {
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
    }
    else
    {
        $start = -1;
        $end = -1;
    }
    $position = $parties->position();
    $lettres = array('a','b','c','d','e','f','g','h');
    $couleur = 1;
    require('view/frontend/replayView.php');
  }
  
function debutPartie()
{
    $gid = $_GET['id'];
    $flip = $_GET['f'];
    $parties = new PartieManager;
    $partie = $parties->get($gid);
    $ignPartie = $partie->getIgn();

    $titre = $partie->getTitre();
    $ign = '';
    $totalcoups = 0;
    $lettres = array('a','b','c','d','e','f','g','h');
    $parties->positionarbitraire($partie->getIgn(),$totalcoups);
    $position = $parties->position();
    $lastmove = $parties->Lastmove();
    if($lastmove != '')
    {
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
    }
    else
    {
        $start = -1;
        $end = -1;
    }
    $couleur = 1;
    require('view/frontend/replayView.php');
}
function coupPrecedent()
{
    $gid = $_GET['id'];
    $flip = $_GET['f'];
    $choix = $_GET['t'];
    $parties = new PartieManager;
    $partie = $parties->get($gid);
    $ignPartie = $partie->getIgn();

    $titre = $partie->getTitre();
    $ign = $partie->getIgn();
    $choix--;
    if ($choix <= 0)
    {
        $choix = 0;
        $ign = "";
    }
    $totalcoups = $choix;
    $lettres = array('a','b','c','d','e','f','g','h');
    $parties->positionarbitraire($partie->getIgn(),$choix);
    $mangeaille = $parties->getMangeaille();
    $position = $parties->position();
    $lastmove = $parties->Lastmove();
    if($lastmove != '')
    {
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
    }
    else
    {
        $start = -1;
        $end = -1;
    }
    $couleur = 1;
    require('view/frontend/replayView.php');
}

function coupSuivant()
{
    $gid = $_GET['id'];
    $flip = $_GET['f'];
    $choix = $_GET['t'];
    $parties = new PartieManager;
    $partie = $parties->get($gid);
    $ignPartie = $partie->getIgn();

    $titre = $partie->getTitre();
    $ign = $partie->getIgn();
    
    $totalcoups = $partie->getNbCoups();
    $choix++;
    if ($choix >= $totalcoups)
        $choix = $totalcoups;
    else
        $totalcoups = $choix;
    $lettres = array('a','b','c','d','e','f','g','h');
    $parties->positionarbitraire($partie->getIgn(),$choix);
    $mangeaille = $parties->getMangeaille();
    $position = $parties->position();
    $lastmove = $parties->Lastmove();
    if($lastmove != '')
    {
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
    }
    else
    {
        $start = -1;
        $end = -1;
    }
    $couleur = 1;
    require('view/frontend/replayView.php');
}

function finPartie()
{
    $gid = $_GET['id'];
    $flip = $_GET['f'];
    $parties = new PartieManager;
    $partie = $parties->get($gid);

    $mangeaille = $partie->getMangeaille();
    $titre = $partie->getTitre();
    $ign = $partie->getIgn();
    $totalcoups = $partie->getNbCoups();
    $lettres = array('a','b','c','d','e','f','g','h');
    $parties->positionarbitraire($partie->getIgn(),$totalcoups);
    $position = $parties->position();
    $lastmove = $parties->Lastmove();
    if($lastmove != '')
    {
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
    }
    else
    {
        $start = -1;
        $end = -1;
    }
    $couleur = 1;
    require('view/frontend/replayView.php');
}

function tournerEchiquier()
{
    $gid = $_GET['id'];
    $flip = $_GET['f'];
    $choix = $_GET['t'];
    $parties = new PartieManager;
    $partie = $parties->get($gid);
    $ignPartie = $partie->getIgn();

    $titre = $partie->getTitre();
    $ign = $partie->getIgn();
    $totalcoups = $partie->getNbCoups();
    if($flip == 0)
        $flip = 1;
    else
        $flip = 0;

    if ($choix <= 0)
    {
        $choix = 0;
        $ign = "";
    }
    if ($choix >= $totalcoups)
        $choix = $totalcoups;

    $totalcoups = $choix;
    $lettres = array('a','b','c','d','e','f','g','h');
    $parties->positionarbitraire($partie->getIgn(),$totalcoups);
    $mangeaille = $parties->getMangeaille();
    $position = $parties->position();
    $lastmove = $parties->Lastmove();
    if($lastmove != '')
    {
        $lmove = explode("-",$lastmove);
        $start = $lmove[0];
        $end = $lmove[1];
    }
    else
    {
        $start = -1;
        $end = -1;
    }
    $couleur = 1;
    require('view/frontend/replayView.php');
}

function nulle($nopartie)
{
    $managerParties = new PartieManager;
    $managerParties->indiquernulle($nopartie);
}

function abandon($nopartie)
{
    $uidActif = $_SESSION['uid'];
    $parties = new PartieManager;
    $parties->abandonner($uidActif,$nopartie);
}

function terminerpartie($nopartie)
{
    $uidActif = $_SESSION['uid'];
    $parties = new PartieManager;
    $parties->terminerPartie($uidActif,$nopartie);
}

function joueur($id)
{
    if (!isset($_SESSION['uid']))
        header('Location: '. $_SERVER['DOCUMENT_ROOT']);

    $managerjoueurs = new JoueurManager;
    $individu = $managerjoueurs->trouveJoueur($id);
    $managerStatistiques = new StatistiqueManager;
    $statistique = $managerStatistiques->get($id);
    
    $pseudo = $individu->pseudo();
    $elo = $individu->elo();
    $age = $individu->age();
    $description = $individu->description();
    $photo = $individu->photo();
    $monpays = $individu->pays();
    $partiestotales = $statistique->partiestotales();
    $gainstotaux = $statistique->gainstotaux();
    
    if (isset($monpays) and ($monpays != 'zz.png')) 
    {
        $pays = './public/images/pays/'.$individu->pays();
        $imagepays = '<img border="2" width="40" src="'.$pays.'">';
    }
    else
        $imagepays = '';
         

    
    require('view/frontend/UserView.php');
}

function echiquier()
{    
    $move = '';
    $flip = false;
    if (isset($_GET['id']))
        $idouverture = $_GET['id'];
    if (isset($_GET['move']))
        $move = $_GET['move'];
    if (isset($_GET['t']))
        $choix = $_GET['t'];
    if (isset($_GET['f']))
        $flip = $_GET['f'];
    if (isset($_GET['f']))
        $flip = $_GET['f'];
        
    $parties = new PartieManager;
    $ouvertures = new Ouvertures;
    $ouverture = $ouvertures->get($idouverture);
    $nomouverture = $ouverture->getOuverture();
    
        
    switch ($move) {
        case 'debut':
            $couleur = 1;
            $ignouverture = $ouverture->getIgn();
            $coups = explode(" ", $ignouverture);
            $ignouverture = '';
            $totalcoups = 0;
            $parties->positionarbitraire($ouverture->getIgn(),$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->positionactuelle($ignouverture);
            $lastmove = $parties->Lastmove();
            break;
        case 'precedent':
            $couleur = 1;
            $ignouverture = $ouverture->getIgn();
            $coups = explode(" ", $ignouverture);
            $totalcoups = sizeof($coups);
            $choix--;
            if ($choix <= 0)
                $choix = 0;
            $totalcoups = $choix;
            $parties->positionarbitraire($ignouverture,$choix);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        case 'suivant':
            $couleur = 1;
            $ignouverture = $ouverture->getIgn();
            $coups = explode(" ", $ignouverture);
            $totalcoups = sizeof($coups);
            $choix++;
            if ($choix >= $totalcoups)
                $choix = $totalcoups;
            else
                $totalcoups = $choix;
            $parties->positionarbitraire($ignouverture,$choix);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        case 'fin':
            $couleur = 1;
            $ignouverture = $ouverture->getIgn();
            $coups = explode(" ", $ignouverture);
            $totalcoups = sizeof($coups);
            $parties->positionarbitraire($ignouverture,$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        case 'tourner':
            $couleur = 1;
            $ignouverture = $ouverture->getIgn();
            $coups = explode(" ", $ignouverture);
            $totalcoups = sizeof($coups);
            if($flip == 0)
                $flip = 1;
            else
                $flip = 0;
            if ($choix <= 0)
                $choix = 0;
            if ($choix >= $totalcoups)
                $choix = $totalcoups;
            $totalcoups = $choix;
            $parties->positionarbitraire($ignouverture,$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        default:
            $couleur = 1;
            $ignouverture = $ouverture->getIgn();
            $coups = explode(" ", $ignouverture);
            $totalcoups = sizeof($coups);
            $parties->positionarbitraire($ignouverture,$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
    }
    
    require('view/frontend/EchiquierView.php');
}

function coupvariante()
{
    $move = '';
    $flip = false;
    if (isset($_GET['id']))
        $idvariante = $_GET['id'];
    if (isset($_GET['move']))
        $move = $_GET['move'];
    if (isset($_GET['t']))
        $choix = $_GET['t'];
    if (isset($_GET['f']))
        $flip = $_GET['f'];
    if (isset($_GET['f']))
        $flip = $_GET['f'];
        
    $parties = new PartieManager;
    $variantes = new Variantes;
    $variante = $variantes->getVariante($idvariante);//var_dump($variante);
    $nomouverture = $variante->getOuverture();
    $nomvariante = $variante->getVariante();
    $type = $variante->getType();
    
        
    switch ($move) {
        case 'debut':
            $couleur = 1;
            $ignvariante = $variante->getIgn();
            $coups = explode(" ", $ignvariante);
            $ignvariante = '';
            $totalcoups = 0;
            $parties->positionarbitraire($variante->getIgn(),$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->positionactuelle($ignvariante);
            $lastmove = $parties->Lastmove();
            break;
        case 'precedent':
            $couleur = 1;
            $ignvariante = $variante->getIgn();
            $coups = explode(" ", $ignvariante);
            $totalcoups = sizeof($coups);
            $choix--;
            if ($choix <= 0)
                $choix = 0;
            $totalcoups = $choix;
            $parties->positionarbitraire($ignvariante,$choix);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        case 'suivant':
            $couleur = 1;
            $ignvariante = $variante->getIgn();
            $coups = explode(" ", $ignvariante);
            $totalcoups = sizeof($coups);
            $choix++;
            if ($choix >= $totalcoups)
                $choix = $totalcoups;
            else
                $totalcoups = $choix;
            $parties->positionarbitraire($ignvariante,$choix);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        case 'fin':
            $couleur = 1;
            $ignvariante = $variante->getIgn();
            $coups = explode(" ", $ignvariante);
            $totalcoups = sizeof($coups);
            $parties->positionarbitraire($ignvariante,$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        case 'tourner':
            $couleur = 1;
            $ignvariante = $variante->getIgn();
            $coups = explode(" ", $ignvariante);
            $totalcoups = sizeof($coups);
            if($flip == 0)
                $flip = 1;
            else
                $flip = 0;
            if ($choix <= 0)
                $choix = 0;
            if ($choix >= $totalcoups)
                $choix = $totalcoups;
            $totalcoups = $choix;
            $parties->positionarbitraire($ignvariante,$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
            break;
        default:
            $couleur = 1;
            $totalcoups = 0;
            $ignvariante = $variante->getIgn();
            $coups = explode(" ", $ignvariante);
            if ($coups[0] != '')
                $totalcoups = sizeof($coups);
            $parties->positionarbitraire($ignvariante,$totalcoups);
            $mangeaille = $parties->getMangeaille();
            $position = $parties->position();
            $lastmove = $parties->Lastmove();
    }

    
    require('view/frontend/CoupvarianteView.php');
}
function monerreur()
{
    if (isset($_GET['erreur']))
        $msgErreur = $_GET['erreur'];
    
    require 'view/frontend/vueErreur.php';
}

function erreur($msgErreur) {
    
  require 'view/frontend/vueErreur.php';
}