<?php
require_once'Controleur.php';

class ControleurResume extends Controleur
{

	public function route_resume(){

        $success = [
            'commande' => '',
        ];
        
        // COOKIE
        if(!isset($_SESSION['user']))
        {
        if(isset($_SESSION['client_addresses']))
        {
        $status = 1;
        $this->resume->getstatutListe($status, $_SESSION['n_check']);
        $this->resume->insertFacture($_SESSION['n_check'], $_SESSION['client_addresses'],$_COOKIE['PHPSESSID']);
        parent::deletePanierCookie();
        // unset($_COOKIE['items']);
        $success['commande'] = "<span style='color:green;'>VOTRE COMMANDE A bien était validé vous pouvez la retrouvée dans vos historiques de commandes REDIRECTION VERS LA BOUTIQUE</span>";
            header("location:index.php?page=produits");
        // header("location:index.php?page=resume&success=1");
        }
        else{
            header("location:index.php?page=produits");
        }
    }
    // USER
    else{
        $this->resume->insertFacture($_SESSION['n_commande_check'], $_SESSION['client_addresses'], $_SESSION['user']['id']);
        $_SESSION['user']['countProduct'] = 0;
    }
		require 'Vue/vueResume.php';
	}
}