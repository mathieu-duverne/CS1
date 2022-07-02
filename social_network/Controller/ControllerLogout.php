<?php

require_once "Controller/Controller.php";

class ControllerLogout extends Controller
{
    public function route_logout () {
        session_start();
        $this->user->getStatutOffline($_SESSION['user']['id']);
        session_destroy();
        header('location: home');
    }

}