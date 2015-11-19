<?php
include './bdd.php';
include './traitement.php';
/*
  $carte =  [
  [1,1,1,1,1,1],
  [1,1,0,0,0,0],
  [0,0,2,1,1,1],
  [1,1,0,1,1,1],
  [1,1,1,1,1,1]
  ];

  MajDonjon($carte);

  $carte = RecupereDonjon();

  print_r($carte); */

if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
    $connect = ConnectJoueur($_POST["pseudo"], $_POST["mdp"]);

    if ($connect != 'erreur') {
        echo 'Pseudo : ' . $connect["pseudo"] . ' <br />PosX : ' . $connect["posX"] . ' <br />PosY : ' . $connect["posY"];
    } else {
        echo 'Erreur';
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <form method="Post" action="resultFonction.php">
            <label>Pseudo</label>
            <input type="text" name="pseudo" id="pseudo"/>
            <label>Mdp</label>
            <input type="password" name="mdp" />
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
