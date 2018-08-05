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
        $prive = array('connexion' => 'Connection',
               'inscription' => 'Inscription',
               'oublie' => 'Oublié');
        $publique = array('choix' => 'Ouvertures',
                'les parties' => 'Parties en cours');
        ?>
        <header>
            <div class="petitecran">
                <img src="monlogo.gif" />
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
        </div>
    </body>
</html