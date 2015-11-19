<?php

include './bdd.php';
include './traitement.php';

$carte =  [
        [1,1,1,1,1,1],
        [1,1,0,0,0,0],
        [0,0,2,1,1,1],
        [1,1,0,1,1,1],
        [1,1,1,1,1,1]
    ];    

MajDonjon($carte);

$carte = RecupereDonjon();

print_r($carte);