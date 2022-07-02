<?php
require_once'Controleur.php'; 

class ControleurPayment extends Controleur
{
    protected $payment;

    public function route_payment(){

        // check panier cart ecttt
        if(isset($_SESSION['user']['id'])) {
            //SI USER pas de panier
            $requestPanier = $this->panier->selectAllPanier($_SESSION['user']['id'], 0);
    
            if (empty($requestPanier)) {
                parent::Redirect("produits");
            }
            else
            {
    //        select address user connecté
                $infoLivraison = $this->checkout->selectInfoClient($_SESSION['user']['id']);
            }
        }
    //    ALORS EST CE QUIL A UN PANIER COOKIE SINON REDIRECTION
        else
        {
            if(!isset($_COOKIE['items']))
            {
                parent::Redirect("produits"); 
            }
        }
    // var_dump($_SESSION);
    if(isset($_POST['address_livraison']) && isset($_POST['livraison']))
    {
        if(isset($_POST['address_livraison']))
        {
            $info_address = $this->payment->check_address($_POST['address_livraison']);
        }
        if(isset($_POST['livraison']))
        {
            $explodeLivraison = explode("-",$_POST['livraison']);
            $priceLivraison = floatval($explodeLivraison[1]);
            // if($_SESSION['total'] != 0)
            // {
            //     $_SESSION['total'] = $_SESSION['total'] + $priceLivraison;
            // }
        }
        if(isset($_COOKIE['items']))
        {
            $requestPanierCookie = parent::displayPanierInCookie($_COOKIE['items']);
            $id_article_cookie = parent::getidproduit();
        }
    }
    if(isset($_POST['submitPayment']))
    {
        // var_dump($_POST);
    }
        require 'Vue/vuePayment.php';
    }
}
