<?php
session_start();
include('../ARCHITECTES/bdd.php');
include('../ARCHITECTES/traitement.php');
?>
<!doctype html>
<html lang="fr">
    <head>

        <meta charset="utf-8">
        <title>Dungeons Tech's - Menu</title>
        <link href="script/css/bootstrap.min.css" rel="stylesheet">
        <link href="script/css/style.css" rel="stylesheet">

    </head>
    <body>
        <header class="container page-header">
            <img class="img-responsive col-sm-10 col-sm-offset-1" src="./IMG/logo dungeon.png">
        </header>
        <section>
            <div class="container contenu">

                <div class="modal-header col-sm-6 col-sm-offset-3">
                    <h2 class="text-center">Menu</h2>
                </div>
                <div class="modal-body col-sm-6 col-sm-offset-3">
                    <ul id="lsMenu" class="nav nav-pills nav-stacked">
                        <?php
                        /* si le membre est connecte */
                        if (isset($_SESSION['idUtilisateur'])) {
                            if ($_SESSION['idUtilisateur'] != "" || $_SESSION['Pseudo'] != "") {
                                ?>
                                <li>
                                    <a href="jouer.php">Jouer</a>
                                </li>
                                <li>
                                    <a href="deconnexion.php">Déconnexion</a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="connexion.php">Connexion</a>
                            </li>
                            <li>
                                <a href="inscription.php">Inscription</a>
                            </li>

                            <?php
                        }
                        ?>

                        <li>
                            <a href="informations.php">Informations</a>
                        </li>
                        <li>
                            <a href="credits.php">Crédits</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <footer class="container">
            <p class="navbar-text">
                Technicien Informatique ES 2015 T.IS-E1AB 
            </p>
        </footer>
    </body>
</html>


