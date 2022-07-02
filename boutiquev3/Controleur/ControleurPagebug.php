<?php
require_once'Controleur.php';

class ControleurPagebug extends Controleur
{

    public function route_pagebug(){
        header('location: index.php');
    }

}
