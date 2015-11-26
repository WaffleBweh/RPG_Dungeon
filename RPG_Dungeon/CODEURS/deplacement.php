<?php

include_once '../ARCHITECTES/bdd.php';
include_once '../ARCHITECTES/traitement.php';

function AffichePosJoueur() {
    $pos_j_ligne = 0;
    $pos_j_case = 0;
    $numLigne = 0;
    $numCase = 0;
    $carte = RecupereDonjon();
    foreach ($carte as $ligne) {
        echo '-----------Ligne' . $numLigne . '-------------';
        echo '</br>';
        $numLigne++;
        $numCase = 0;
        echo '<p>';
        foreach ($ligne as $case) {
            echo 'Case ' . $numCase . ' :';
            print_r($case);
            if ($case == 2) {
                echo ' <--- Joueur';
            }
            echo '</br>';
            $numCase++;
        }
        echo '</p>';
    }
}

function RecupPosJoueur() {
    $pos_j_ligne = 0;
    $pos_j_case = 0;
    $numLigne = 0;
    $numCase = 0;
    $carte = RecupereDonjon();
    foreach ($carte as $ligne) {
        $numLigne++;
        $numCase = 0;
        foreach ($ligne as $case) {
            if ($case == 2) {
                $pos_j_ligne = $numLigne - 1;
                $pos_j_case = $numCase;
            }
            $numCase++;
        }
    }
    $posXY = array($pos_j_ligne, $pos_j_case);
    return $posXY;
}

function DeplacementAVANCER() {
    $posXY = RecupPosJoueur();
    $direction = RecupereDirectionJoueur();
    $x = $posXY[0];
    $y = $posXY[1];

    $carte = RecupereDonjon();

    if ($x != 0) {
        $carte[$x][$y] = 0;
        $carte[$x-1][$y] = 2;
        MajDonjon($carte,$direction[0][0]);
    } else {
        echo 'Action invalide';
    }
    
    $direction = RecupereDirectionJoueur();
    echo $direction[0][0];
}

function DeplacementRECULER() {
    $posXY = RecupPosJoueur();
    $direction = RecupereDirectionJoueur();
    $x = $posXY[0];
    $y = $posXY[1];

    $carte = RecupereDonjon();
    
    if ($x != 5) {
        $carte[$x][$y] = 0;
        $carte[$x+1][$y] = 2;
        MajDonjon($carte,$direction[0][0]);
    } else {
        echo 'Action invalide';
    }
    
    $direction = RecupereDirectionJoueur();
    echo $direction[0][0];
}

function DeplacementGAUCHE() {
    $posXY = RecupPosJoueur();
    $direction = RecupereDirectionJoueur();
    $x = $posXY[0];
    $y = $posXY[1];

        $carte = RecupereDonjon();
    
    if ($y != 0) {
        $carte[$x][$y] = 0;
        $carte[$x][$y-1] = 2;
        MajDonjon($carte,$direction[0][0]);
    } else {
        echo 'Action invalide';
    }
    
    $direction = RecupereDirectionJoueur();
    echo $direction[0][0];
}

function DeplacementDROITE() {
    $posXY = RecupPosJoueur();
    $direction = RecupereDirectionJoueur();
    $x = $posXY[0];
    $y = $posXY[1];

    $carte = RecupereDonjon();
    
    if ($y != 5) {
        $carte[$x][$y] = 0;
        $carte[$x][$y+1] = 2;
        MajDonjon($carte,$direction[0][0]);
    } else {
        echo 'Action invalide';
    }
    
    $direction = RecupereDirectionJoueur();
    echo $direction[0][0];
}

function RotationGAUCHE() {
    $carte = RecupereDonjon();
    
    $direction = RecupereDirectionJoueur();
    if($direction[0][0] == "NORD"){
        $direction[0][0] = "OUEST";

    }elseif($direction[0][0] == "OUEST"){
        $direction[0][0] = "SUD";

    }elseif($direction[0][0] == "SUD"){
        $direction[0][0] = "EST";

    }elseif($direction[0][0] == "EST"){
        $direction[0][0] = "NORD";
        
    }
    MajDonjon($carte,$direction[0][0]);
    
    $direction = RecupereDirectionJoueur();
    echo $direction[0][0];
}

function RotationDROITE() {
    $carte = RecupereDonjon();
    
    $direction = RecupereDirectionJoueur();
    
    if($direction[0][0] == "NORD"){
        $direction[0][0] = "EST";

    }elseif($direction[0][0] == "EST"){
        $direction[0][0] = "SUD";

    }elseif($direction[0][0] == "SUD"){
        $direction[0][0] = "OUEST";

    }elseif($direction[0][0] == "OUEST"){
        $direction[0][0] = "NORD";

    }
    MajDonjon($carte,$direction[0][0]);
    
    $direction = RecupereDirectionJoueur();
    echo $direction[0][0];
}
?>

