<?php
/*
* Auteur : Lucien Camuglia  
* Date   : 29.10.2015
* Version: 1.0 LC Version de base
* Description : Fichier contenant les requêtes de la BDD
*/


/**
 * Connexion à la base de données
 * @staticvar PDO $pdo  objet de connexion
 * @return PDO  connexion à la base
 */
function connexionDb() {
    //variables contenant les informations de connexion ainsi que la DB
    $serveur = '';
    $pseudo = '';
    $pwd = '';
    $db = '';

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


/* ***************************************************************************
 *                                 PERSONNAGES                               *
 *****************************************************************************/


/* ***************************************************************************
 *                                   DONGEON                                 *
 *****************************************************************************/


/* ***************************************************************************
 *                                 DEPLACEMENT                               *
 *****************************************************************************/