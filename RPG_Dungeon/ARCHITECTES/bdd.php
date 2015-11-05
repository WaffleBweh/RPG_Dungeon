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


/* ***************************************************************************
 *                                 PERSONNAGES                               *
 *****************************************************************************/

/* ***************************************************************************
 *                                  TEXTURES                                 *
 *****************************************************************************/
function RecupererCheminImage($nom)
{
    global $pdo;
    $query = "SELECT Chemin FROM textures WHERE Nom = :Nom";
    $params = array('Nom' => $nom);
    $st = PrepareExecute($query,$params)->FetchAll();
    return $st;
}
/* ***************************************************************************
 *                                   DONJON                                  *
 *****************************************************************************/

/**
 * Récupère le donjon dans la base de données
 * @global pdo $pdo
 * @return array Tableau des éléments récupérer dans la bdd
 */
function RecupereDonjonDB(){
    global $pdo;
    
    $query = "SELECT x, y, idReference FROM plateformes ORDER BY x, y";
    $st = PrepareExecute($query)->FetchAll();
    
    return $st;
}


/* ***************************************************************************
 *                                 DEPLACEMENT                               *
 *****************************************************************************/