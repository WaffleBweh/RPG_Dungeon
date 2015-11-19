<?php
/*
  Page: deconnexion.php
  Auteur : Wacker Dylan
  Description: Page qui permet à un utilisateur de se déconnecter
 */

 /* il faut demarrer la session*/
session_start();
if (isset($_SESSION['idUtilisateur'])) //les membres non connectes ne peuvent pas se deconnecter
{

    /*on vire toutes la variables de session*/
   
    session_destroy();
 
    /*on renvoie sur la page d'accueil*/
    header('Location: index.php');     
}
else
{
     echo "Vous n'avez pas le droit d'acceder a cette page";
}
?>