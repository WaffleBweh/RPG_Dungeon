<?php 
include_once '../ARCHITECTES/bdd.php';
include_once './deplacement.php';

$direction = RecupereDirectionJoueur();

if(isset($_POST['AVANCER'])){
    switch ($direction[0][0]){
        case "NORD" : DeplacementAVANCER();
                      break;
        case "OUEST" : DeplacementGAUCHE();
                      break;
        case "SUD" : DeplacementRECULER();
                      break;
        case "EST" : DeplacementDROITE();
                      break;          
    }
}    
if(isset($_POST['GAUCHE'])){
        switch ($direction[0][0]){
        case "NORD" : DeplacementGAUCHE();
                      break;
        case "OUEST" : DeplacementRECULER();
                      break;
        case "SUD" : DeplacementDROITE();
                      break;
        case "EST" : DeplacementAVANCER();
                      break;          
    }
}

if(isset($_POST['RECULER'])){
        switch ($direction[0][0]){
        case "NORD" : DeplacementRECULER();
                      break;
        case "OUEST" : DeplacementDROITE();
                      break;
        case "SUD" : DeplacementAVANCER();
                      break;
        case "EST" : DeplacementGAUCHE();
                      break;          
    }
}

if(isset($_POST['DROITE'])){
        switch ($direction[0][0]){
        case "NORD" : DeplacementDROITE();
                      break;
        case "OUEST" : DeplacementAVANCER();
                      break;
        case "SUD" : DeplacementGAUCHE();
                      break;
        case "EST" : DeplacementRECULER();
                      break;          
    }
}

if(isset($_POST['ROTATIONGAUCHE'])){
    RotationGAUCHE();
}

if(isset($_POST['ROTATIONDROITE'])){
    RotationDROITE();
}

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Jouer</title>
        <link href="./script/css/bootstrap.min.css" rel="stylesheet">
        <link href="./script/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header class="container page-header">
            <img class="img-responsive col-sm-10 col-sm-offset-1" src="./IMG/logo dungeon.png">
        </header>
        <section>
            <div class="container contenu">

                <div class="modal-header col-sm-6 col-sm-offset-3">
                    <h1 class="text-center">Jouer</h1>
                </div>
                <div class="modal-body col-sm-6 col-sm-offset-3">
                    <form method="POST" action="jouer.php">
                    <input name="ROTATIONGAUCHE" value="0" type="image" src="./IMG/NORDOUEST.jpg" alt="Submit">
                    <input name="AVANCER" value="0" type="image" src="./IMG/NORD.jpg" alt="Submit">
                    <input name="ROTATIONDROITE" value="0" type="image" src="./IMG/NORDEST.jpg" alt="Submit"></br>
                    <input name="GAUCHE" value="0" type="image" src="./IMG/OUEST.jpg" alt="Submit">
                    <input name="RECULER" value="0" type="image" src="./IMG/SUD.jpg" alt="Submit">
                    <input name="DROITE" value="0" type="image" src="./IMG/EST.jpg" alt="Submit">
                    </form>
                    <?php AffichePosJoueur(); ?>
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


