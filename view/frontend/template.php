<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
        <script type="text/javascript" src="public/js/lalibrairie.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="public/js/jquery.infobulles.js"></script>
	        <script type="text/javascript">

	            $(function(){
	                // Sans option
	                $('.infobulle').infobulles();
	            });
	        </script>

    </head>

    <body>
        <?php
        $prive = array('mes parties' => 'Mes parties',
               'parties proposées' => 'Parties proposées',
               'mes statistiques' => 'Mes statistiques',
               'profil' => 'Profil',
               'deconnection' => 'deconnection');
        $publique = array('choix' => 'Ouvertures',
                'les parties' => 'Parties en cours',
                'les joueurs' => 'Joueurs',
                'statistiques' => 'Statistiques');
        ?>
        <header>
            <div class="petitecran">
                <img src="monlogo.gif" />
                <div id="messagebienvenue">
                    Bienvenue <?php if (isset($_SESSION['pseudo'])) echo $_SESSION['pseudo']; ?>
                </div>
            </div>
        </header>
        <br />
        <div class="petitecran">
            <nav>
                <div class="espace">
                    Espace membre
                </div>
                <ul id="espacepublic">
                    <?php
                    foreach ($prive as $key => $value):
                    ?>
                        <li><a href="?action=<?php echo $key ?>"><?php echo $value ?></a></li>
                    <?php
                    endforeach;
                    ?>
                </ul>
                <br />
                <div class="espace">
                    Espace publique
                </div>
                <ul id="espacepublic">
                    <?php
                    foreach ($publique as $key => $value):
                    ?>
                        <li><a href="?action=<?php echo $key ?>"><?php echo $value ?></a></li>
                    <?php
                    endforeach;
                ?>
                </ul>
            </nav>
            <section>
                <?= $content ?>
            </section>

    </body>
</html