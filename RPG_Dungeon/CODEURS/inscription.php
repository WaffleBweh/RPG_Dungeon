<?php
session_start();
if (isset($_SESSION['idUtilisateur'])) {
    header('location: index.php');
    exit;
}
include('../ARCHITECTES/bdd.php');
//include('../ARCHITECTES/traitement.php');
$erreurConnexion = '';
/* Vérifier qu'on appuie sur le bouton */
if (isset($_POST['BoutonInscription'])) {
    /* il faut que toutes les variables du formulaire existent */
    if (isset($_POST['Pseudo']) && isset($_POST['MotDePasse']) && isset($_POST['ConfirmationMotDePasse'])) {
        /* il faut que tous les champs soient renseignes */
        if ($_POST['Pseudo'] != "" && $_POST['MotDePasse'] != "" && $_POST['ConfirmationMotDePasse'] != "") {
            if ($_POST['MotDePasse'] == $_POST['ConfirmationMotDePasse']) {
                connexionDb();
                /* on crypte le mot de passe pour faire le test */
                $passhache = sha1($_POST['MotDePasse']);
                /* on verifie qu'un membre a bien ce pseudo et ce mot de passe */
                $resultat = InscriptionJoueurDB($_POST['Pseudo'], $passhache);
                /* s'il n'y a pas de resultat, on renvoie a la page de connexion */
                if ($resultat == 'error') {
                    $erreurConnexion = 'L\'utilisateur existe déjà';
                } else {


                    /* on cree les variables de session du client qui lui serviront pendant sa session */
                    $_SESSION['idUtilisateur'] = $resultat;


                    /* on renvoie sur la page d'accueil */
                    header('Location: Index.php');
                }
            } else {
                $erreurConnexion = 'Les mots de passe ne sont pas identique';
            }
        } else {
            $erreurConnexion = 'Il faut remplir tous les champs';
        }
    } else {
        $erreurConnexion = 'Une erreur s\'est produite';
    }
}
?>
<!doctype html>
<html lang="fr">
    <head>

        <meta charset="utf-8">
        <title>Maquette</title>
        <link href="./script/css/bootstrap.min.css" rel="stylesheet">
        <link href="./script/css/style.css" rel="stylesheet">
        <link href="./script/css/loginStyle.css" rel="stylesheet">
        <script src="script/js/jquery.js"></script>
        <script src="./script/js/bootstrap.min.js"></script>
        <script src="./script/js/bootstrap.js"></script>


    </head>
    <body>
        <header class="container page-header">
            <img class="img-responsive col-sm-10 col-sm-offset-1" src="./IMG/logo dungeon.png">
        </header>
        <section>
            <div class="container contenu">

                <div class="modal-header col-sm-6 col-sm-offset-3">
                    <h1 class="text-center">Inscription</h1>                    
                    </div>
                    <div class="modal-body col-sm-6 col-sm-offset-3">
                        <div class = "container col-sm-10 col-sm-offset-1">
                            <?php
                            if (!empty($erreurConnexion)) {
                                ?>
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Erreur! </strong><?php echo $erreurConnexion; ?>
                                </div>
                                <?php
                            }
                            ?>
                        <form action="#" method="post" name="Login_Form" class="form-signin">       
                            <h3 class="form-signin-heading">Inscription!</h3>
                            <hr class="colorgraph"><br>

                            <input type="text" class="form-control" name="Pseudo" placeholder="Pseudo" required="" autofocus="" />
                            <input type="password" class="form-control" name="MotDePasse" placeholder="Mot de passe" required=""/>     		  
                            <input type="password" class="form-control" name="ConfirmationMotDePasse" placeholder="Confirmation Mot de passe" required=""/>  
                            <button class="btn btn-lg btn-primary btn-block"  name="BoutonInscription" value="Inscription" type="Submit">Inscription</button>  	
                            </br></br><a href="index.php" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                        </form>		


                    </div>
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


