<?php
require'Controleur/Routeur.php';

// var_dump($_COOKIE);
$_SESSION['n_commande'] = rand(1, 100);
setcookie("init", 0, time()+7200);

$routeur = new Routeur();
$routeur->routerRequete();