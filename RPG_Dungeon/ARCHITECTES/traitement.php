<?php

/*
* Auteur : Alan Devaud 
* Date   : 5.11.2015
* Version: 1.0 AD Version de base
* Description : Fichier contenant les fonctions qui traitent les résultats de la base de données
*/

include_once './bdd.php';

/**
 * Récupère tout le donjon sous la forme d'un tableau à deux dimensions
 * @return array of array Tableau qui contient tout le donjon
 */
function RecupereDonjon() {
    $donjon = RecupereDonjonDB();
    $carte = Array();
    $idPrecedent = null;

    // Parcours tout le donjon
    foreach ($donjon as $case) {
        if ($idPrecedent != $case["x"]) // Test s'il faut ajouter un nouvelle axe y 
            $carte[] = Array();
        
        $carte[$case["x"]][$case["y"]] = $case["idReference"] - 1; // Ajout la référence - 1
        $idPrecedent = $case["x"];
    }
    
    return $carte;
}
