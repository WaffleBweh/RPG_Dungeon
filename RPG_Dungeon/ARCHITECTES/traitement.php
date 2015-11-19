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

/**
 * Connecte un utilisateur à la base de données
 * @param string $pseudo pseudo de l'utilisateur 
 * @param string $mdp Mot de passe crypté de l'utilisateur
 * @return string/array Si utilisateur trouver, renvoie les données de l'utilisateur sinon le message erreur est renvoyé
 */
function ConnectJoueur($pseudo, $mdp) {
    if (!empty($pseudo) && !empty($mdp)) {
        $joueur = ConnectJoueurDB($pseudo, $mdp);

        if ($joueur != '')
            return $joueur;
        else
            return 'erreur';
    }
}

/**
 * Récupère la position du joueur en X et Y
 * @param int $idJoueur Id du joueur
 * @return Array Tableau associatif ("X", "Y") de la position du joueur. Le tableau vaut -1 en x et y si aucun joueur n'est passer en paramètre
 */
function RecuperePosition($idJoueur) {
    $pos = Array("X" => -1, "Y" => -1);
    
    if (!empty($idJoueur)) {
        $position = RecuperePositionDB($idJoueur);
        $pos["X"] = $position["posX"];
        $pos["Y"] = $position["posY"];
    }
    
    return $pos;
}
