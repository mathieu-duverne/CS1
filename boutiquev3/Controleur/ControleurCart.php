<?php
require_once'Controleur.php';
require_once'vendor/autoload.php';

use GuzzleHttp\Client;
const API_URL = 'https://geo.api.gouv.fr/';

class ControleurCart extends Controleur
{

    public function route_cart(){
//    var_dump($_SESSION['user']);
        $error = [
            'address' => '',
            'empty' =>''
        ];
        $success = [
            'insertPanier' => '',
            'updateQuantite' => '',
            'deleteProduit' => '',
            'insert' => ''
        ];

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
        //si pas de panier cookie cio
        else
        {
            $requestPanierCookie = parent::recupPanierInCookie($_COOKIE['items']);
//            IL Y A UN PANIER TOUT COOKIE
        }
    }
//   SI USER CONNECTÉ UPDATE ARTICLES +1
        if(isset($_GET['updatePanier'])){
            $infoProduits = explode("__", $_GET['updatePanier']);
            $infoProduits[1]++;
            $this->panier->updateQuantite($infoProduits[1],$infoProduits[0],$_SESSION['user']['id']);
            $success['updateQuantite'] = '<span>rajoutez autant de fois cet article dans votre panier</span>';
            header("Refresh:2; url=index.php?page=cart");
        }
//        SI USER -1
        if(isset($_GET['updatePanierMoin'])){
            $infoProduits = explode("__", $_GET['updatePanierMoin']);
            $infoProduits[1]--;
            if($infoProduits[1]<=0)
            {
                $this->panier->deletePanier($_SESSION['user']['id'],$infoProduits[0]);
            }
            else {
                $this->panier->updateQuantite($infoProduits[1], $infoProduits[0], $_SESSION['user']['id']);
            }
            $success['updateQuantite'] = '<span>enlever autant de fois cet article de votre panier</span>';
            header("Refresh:0.1; url=index.php?page=cart");
        }

        //SI UPDATE QUANTITE ARTICLE
        if(isset($_GET['update'])){
            $itemUpdate = explode("__",$_GET['update']);
            $id_produit = $itemUpdate[0];
            $id_utilisateur=$itemUpdate[1];
            $quantite = $itemUpdate[2];
            $quantite++;
            $statut=0;
            $updateThisProduit = parent::produitExistInCookie($itemUpdate[0],$_COOKIE['items']);
            setcookie("items[$updateThisProduit[0]]", $id_produit."__".$id_utilisateur."__".$quantite."__".$statut, time()+7200);
            $success['updateQuantite'] = '<span>Votre Produit a était rajoutez</span>';
            parent::Redirect("cart&successUpdate=1");
        }
        //si USERCOOKIE delete une ligne ITEM
        if(isset($_GET['delete'])){
            $id_produit = intval($_GET['delete']);
            //controller
            $deleteThisProduit = parent::produitExistInCookie($id_produit,$_COOKIE['items']);
            setcookie("items[$deleteThisProduit[0]]", '', time()-3600);
            setcookie("cookieItem", $_COOKIE['cookieItem'] - 1, time()+7200);
            parent::Redirect("cart");
        }
//   SI USER CONNECTÉ DELETE ARTICLES
        if(isset($_GET['deletePanier'])){
            $id_produit = intval($_GET['deletePanier']);
            $this->panier->deletePanier($_SESSION['user']['id'],$id_produit);
            $success['deleteProduit'] = '<span>Votre Produit a était supprimer du panier</span>';
            header("Refresh:2; url=index.php?page=cart");
        }
//        user COOKIE VERIF ADDRESSE
        if(!isset($_SESSION['user']['id']))
        {
        $infoLivraison = $this->panier->adresseUserCookieExist($_COOKIE['PHPSESSID']);
        }
        //        regarder au dessus comment j'ai fait pour user co
//TRAITEMENT ADDRESSE
        if(isset($_POST['submit_adresse']))
        {
            if(!empty($_POST['zipcode']) && !empty($_POST['city']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['adresse']))
            {
                if(empty($_POST['addresse_comp']))
                {
                    $addresse_comp = "pas de complement !";
                }
                if(!empty($_POST['addresse_comp']))
                {
                    $addresse_comp = htmlspecialchars($_POST['addresse_comp']);
                }
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $email = $_POST['email'];
                $telephone = htmlspecialchars($_POST['tel']);
                $adresse = htmlspecialchars($_POST['adresse']);
                if(isset($_SESSION['user']))
                {
                $id_utilisateur = $_SESSION['user']['id'];
                }
                else{
                    $id_utilisateur = $_COOKIE['PHPSESSID'];
                }
                $zipcode = strip_tags($_POST['zipcode']);
                $city = strip_tags($_POST['city']);
                //utilisation API C PAS UN TRUC DE FOU
                $client = new \GuzzleHttp\Client(['base_uri' => API_URL]);
                $response = $client->request('GET', 'communes?codePostal='.$zipcode.'&fields=nom&format=json');
                $response = json_decode($response->getBody()->getContents());
                //transformer un array
                $cities = [];
                foreach($response as $rep)
                {
                    array_push($cities, $rep->nom);
                }
                if(in_array($city, $cities))
                {
                    $this->checkout->insertInfoClient($nom,$prenom,$telephone,$email,$adresse,$addresse_comp,$zipcode,$cities[0],$id_utilisateur);
                    $success['insert'] = 'Information envoyé';
                    header("Refresh:1; url=index.php?page=cart");
                }
                else
                {
                    $error['address']= 'le code postale est la commune ne corresponde pas';
                }
            }
            else
            {
                $error['empty'] = "champs vide !";
            }
        }
        require 'Vue/vueCart.php';
    }
}