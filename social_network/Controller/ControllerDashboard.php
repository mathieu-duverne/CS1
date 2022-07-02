<?php

require_once "Controller/Controller.php";

class ControllerDashboard extends Controller
{
    public function route_dashboard() {
        if($_SESSION['user']['role']==="791801") {

            //TAKE VUE OF WEBSITE
            if(file_exists('compteur_visites.txt'))
            {
                $current = file_get_contents('compteur_visites.txt');
            }
            $nbrChats = $this->chat->countMessage();
            $nbrPosts = $this->post->countPublication();
            $nbrUsers = $this->user->countUsers();
            $nbrOnline = $this->user->countUsersOnline();
            $nbrOffline = $this->user->countUsersOffline();
            $nbrNeverConnected = $this->user->countUsersNever();
        }
        else {
            parent::Redirect("home");
        }
        require_once "Vue/vueDashboard.php";
    }

}