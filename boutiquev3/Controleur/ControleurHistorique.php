<?php
require_once'Controleur.php';

class ControleurHistorique extends Controleur
{
	public function route_historique(){
		
        if(isset($_SESSION['user'])){
            // requete liste_commande
           $response = $this->historique->getFactureViaId($_SESSION['user']['id']);
           foreach($response as $reponse){
            $n_commande = intval($reponse['numero_commande']);
            $infoAchat = $this->historique->selectListeCommandeBuyCookie($n_commande, 1);
        }
        }
        else{
            // requete liste_commande cookie
            $response = $this->historique->getFactureViaId($_COOKIE['PHPSESSID']);
            
            // var_dump($infoAchat);
        }
        if(!empty($response)){
            // var_dump($response);
        }
        else{
            header("location: index.php?page=accueil");
        }
		require 'Vue/vueHistorique.php';
	}
}