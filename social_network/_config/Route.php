<?php
session_start();
require_once "./Controller/ControllerHome.php";
require_once "./Controller/ControllerSignin.php";
require_once "./Controller/ControllerLogin.php";
require_once "./Controller/ControllerLogout.php";
require_once "./Controller/ControllerProfil.php";
require_once "./Controller/ControllerDashboard.php";
require_once "./Controller/ControllerDashboardUser.php";
require_once "./Controller/ControllerPost.php";
require_once "./Controller/ControllerDashboardPost.php";
require_once "./Controller/ControllerChat.php";


class Route
{
    function __construct() {
        
        // -------- COMPTEUR DE VISITE -------- //
        if(file_exists('compteur_visites.txt'))
        {
            $compteur_f = fopen('compteur_visites.txt', 'r+');
            $compte = fgets($compteur_f);
        }
        else
        {
                $compteur_f = fopen('compteur_visites.txt', 'a+');
                $compte = 0;
        }
        if(!isset($_SESSION['compteur_de_visite']))
        {
            $_SESSION['compteur_de_visite'] = 'visite';
            $compte++;
            fseek($compteur_f, 0);
            fputs($compteur_f, $compte);
        }
        fclose($compteur_f);
    }

    public function routerRequete()
    {
        // ---------- ROUTER GET ---------- //
        if (isset($_GET['page'])) {

            switch($_GET['page']){

                case "login":

                    $_SESSION['title'] = 'login';

                    $default = new ControllerLogin();
                    $default->route_login();
                    break;

                case "signin":

                    $_SESSION['title'] = 'signin';

                    $default = new ControllerSignin();
                    $default->route_signin();
                    break;

                case "logout":

                    $_SESSION['title'] = 'logout';

                    $default = new ControllerLogout();
                    $default->route_logout();
                    break;

                case "profil":

                    $_SESSION['title'] = 'profil';

                    $default = new ControllerProfil();
                    $default->route_profil();
                    break;

                case "dashboard":

                    $_SESSION['title'] = 'dashboard';

                    $default = new ControllerDashboard();
                    $default->route_dashboard();
                    break;

                case "dashboarduser":

                    $_SESSION['title'] = 'dashboarduser';

                    $default = new ControllerDashboardUser();
                    $default->route_dashboarduser();
                    break;

                case "post":

                    $_SESSION['title'] = 'post';

                    $default = new ControllerPost();
                    $default->route_post();
                    break;

                case "dashboardpost":

                    $_SESSION['title'] = 'dashboardpost';

                    $default = new ControllerDashboardPost();
                    $default->route_dashboardpost();
                    break;
                   
                case "chat":

                    $_SESSION['title'] = 'chat';
    
                    $default = new ControllerChat();
                    $default->route_chat();
                    break;    

                case "home":

                    $_SESSION['title'] = 'home';

                    $default = new ControllerHome();
                    $default->route_home();
                    break;

                default:

                    $_SESSION['title'] = 'home';

                    $default = new ControllerHome();
                    $default->route_home();
                    break;
            }
            
        }
        // ------- IF nothing param page redirect to home
        else
        {
            $_SESSION['title'] = 'home';

            $default = new ControllerHome();
            $default->route_home();
        }
    }
}