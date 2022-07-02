<?php
require_once'Controleur.php';

class ControleurCheckout extends Controleur
{
	protected $user;
	protected $adminproduits;
	protected $panier;

	public function route_checkout(){

        $success = [
            'insertPanier' => '',
            'updateQuantite' => '',
            'deleteProduit' => ''
        ];
        if(!isset($_COOKIE['items']) && !isset($_SESSION['user']['id']))
        {
            header("location: index?page=produits");
        }

        // ////////SI COOKIE
    if(!isset($_SESSION['user'])){
        if(isset($_COOKIE['items'])){
            if(empty($_POST['code_seize']) || empty($_POST['expiration']) || empty($_POST['code_securite']) ||  empty($_POST['addresse_commande']))
            {
                header("location:index.php?page=produits");
            }
            if($_POST['code_seize'] != "1212 1212 1212 1212")
            {
                header("location:index.php?page=produits");
            }
            if($_POST['code_securite'] != "999")
            {
                header("location:index.php?page=produits");
            }
            $_SESSION['client_addresses'] = $_POST['addresse_commande'];
            // $id_produit = parent::getidproduit();
            $result = parent::getIdAndQuantiteProduit();
            $n_commandNotcheck = $_SESSION['n_commande'];
            $n_commande = parent::recuriveWHOU($n_commandNotcheck);
            $_SESSION['n_check'] = $n_commande;
            // ICI INSERT EN LISTE COMMANDE COOKIE en 1 clef id & quantite
            for($a=0;isset($result[$a]);$a++){
                // var_dump($result);
                $statut = 0;
                if($a%2==0){
                    // echo"pair";
                    // var_dump($result[$a]);
                $_SESSION['id_produit'] = $result[$a];
                // 
                }
                else{
                    $quantite = $result[$a];
                    
                    $this->checkout->insertListCommandeCookie($_SESSION['id_produit'], $quantite,$_COOKIE['PHPSESSID'], $statut, $n_commande);
                }
            }
            header("location:index.php?page=resume"); 
        }
    }
    else{
        if(empty($_POST['code_seize']) || empty($_POST['expiration']) || empty($_POST['code_securite']) ||  empty($_POST['addresse_commande']))
            {
                header("location:index.php?page=produits");
            }
            if($_POST['code_seize'] != "1212 1212 1212 1212")
            {
                header("location:index.php?page=produits");
            }
            if($_POST['code_securite'] != "999")
            {
                header("location:index.php?page=produits");
            }
            $_SESSION['client_addresses'] = $_POST['addresse_commande'];
            // $id_produit = parent::getidproduit();
            // ici select le numero commande du panier
            // UPDATE DU STATUT
            $statut =1;
            $this->checkout->updateListeCommande($statut, $_SESSION['n_commande_check']);
            // ICI INSERT EN LISTE COMMANDE COOKIE en 1 clef id & quantite
            header("location:index.php?page=resume"); 
    }
	}
} 