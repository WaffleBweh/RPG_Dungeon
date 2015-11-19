<?php

/*
 * Auteur : Lucien Camuglia  
 * Date   : 29.10.2015
 * Version: 1.0 LC Version de base
 * Description : Fichier contenant les requêtes de la BDD
 * Modification : 
 *               + 05.11.2015 AD Ajout de la fonction pour récupérer le donjon
 */

/**
 * Connexion à la base de données
 * @staticvar PDO $pdo  objet de connexion
 * @return PDO  connexion à la base
 */
function connexionDb() {
    //variables contenant les informations de connexion ainsi que la DB
    $serveur = '127.0.0.1';
    $pseudo = 'root';
    $pwd = '';
    $db = 'rpg_donjon';

    static $pdo = null;

    if ($pdo === NULL) {
        // Connexion à la base.
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;


        $pdo = new PDO("mysql:host=$serveur;dbname=$db", $pseudo, $pwd, $pdo_options);
        $pdo->exec("Set Character set UTF8");
    }
    return $pdo;
}

$pdo = connexionDb();

/**
 * Prépare et éxécute une requête
 * @param string $query requête a ééxécuter
 * @param tableau $params  éventuel paramètre pour la requête
 * @return PDOStatement
 */
Function PrepareExecute($query, $params = NULL) {
    global $pdo;
// Préparation de la requête SQL.
    $st = $pdo->prepare($query);
// Execution de la requête SQL.
    $st->execute($params);
    return $st;
}

/* * **************************************************************************
 *                                 PERSONNAGES                               *
 * *************************************************************************** */

/**
 * Connecte un joueur
 * @global pdo $pdo
 * @param type $pseudo Pseudo du joueur à vérifier
 * @param type $mdp Mot de passe du joueur
 * @return array Tableau associatif concernant le joueur
 */
function ConnectJoueurDB($pseudo, $mdp) {
    global $pdo;
    
    $query = "SELECT * FROM utilisateurs WHERE pseudo=:pseudo AND mdp=:mdp";
    $params = array('pseudo' => $pseudo, 'mdp' => $mdp);
    $st = PrepareExecute($query, $params)->Fetch();
    
    return $st;
}

/* * **************************************************************************
 *                                  TEXTURES                                 *
 * *************************************************************************** */

function RecupererCheminImage($nom) {
    global $pdo;
    $query = "SELECT Chemin FROM textures WHERE Nom = :Nom";
    $params = array('Nom' => $nom);
    $st = PrepareExecute($query, $params)->FetchAll();
    return $st;
}

/* * **************************************************************************
 *                                   DONJON                                  *
 * *************************************************************************** */

/**
 * Récupère le donjon dans la base de données
 * @global pdo $pdo
 * @return array Tableau des éléments récupérer dans la bdd
 */
function RecupereDonjonDB() {
    global $pdo;

    $query = "SELECT x, y, idReference FROM plateformes ORDER BY x, y";
    $st = PrepareExecute($query)->FetchAll();

    return $st;
}

/**
 * Mise à jour du donjon
 * @global pdo $pdo
 * @param array $carte Tableau de la carte a sauver 
 */
function MajDonjon($carte) {
    global $pdo;
    $indice1 = 0;
    EffaceDonjon();
    foreach ($carte as $ligne) {
        $indice2 = 0;
        foreach ($ligne as $case) {

            $query = "INSERT INTO plateformes(x, y, Direction, idReference) VALUES (:indice1,:indice2,:direction,:ref)";
            $params = array("indice1" => $indice1, "indice2" => $indice2, "direction" => NULL, ":ref" => $case + 1);
            PrepareExecute($query, $params);
            $indice2++;
        }
        $indice1++;
    }
}

/**
 * Vide le donjon de la BDD
 */
function EffaceDonjon() {
    $query = "DELETE FROM plateformes";
    PrepareExecute($query);
}

/* ***************************************************************************
 *                                 DEPLACEMENT                               *
 *****************************************************************************/
