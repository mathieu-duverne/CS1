<?php
require_once'Controleur.php';
require 'vendor/autoload.php';

//use GuzzleHttp\Client;
//const API_URL = 'https://geo.api.gouv.fr/';

class ControleurCheckoutInfo extends Controleur
{
    protected $checkout;
    
	public function route_checkoutinfo(){
        $error = [
            'address' => '',
            'empty' =>'' 
        ];
        $success = [
            'insert' => ''
        ];

        //API INCROYABLE
if(isset($_POST['submit']))  
{
    if(!empty($_POST['zipcode']) && !empty($_POST['city']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['adresse']))
      {
          if(empty($_POST['addresse_comp'])){
              $addresse_comp = "pas de complement !";
          }
          if(!empty($_POST['addresse_comp'])){
            $addresse_comp = htmlspecialchars($_POST['addresse_comp']);
          }
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $email = $_POST['email'];
            $telephone = $_POST['tel'];
            $adresse = htmlspecialchars($_POST['adresse']);
            $id_utilisateur = $_SESSION['user']['id'];
            $zipcode = strip_tags($_POST['zipcode']);
            $city = strip_tags($_POST['city']);
          //utilisation API C PAS UN TRUC DE FOU 
            $client = new \GuzzleHttp\Client(['base_uri' => API_URL]);
            $response = $client->request('GET', 'communes?codePostal='.$zipcode.'&fields=nom&format=json');
            $response = json_decode($response->getBody()->getContents());
        //transformer un array
            $cities = [];
        foreach($response as $rep){
            array_push($cities, $rep->nom);
        }
        if(in_array($city, $cities)){
            $this->checkout->insertInfoClient($nom,$prenom,$telephone,$email,$adresse,$addresse_comp,$zipcode,$cities[0],$id_utilisateur);
            $success['insert'] = 'Information envoyé';
        }
        else
        {
            $error['address']= 'le code postale est la commune ne corresponde pas';
        }
}
else{
    $error['empty'] = "champs vide !";
    } 
}
        if(isset($_SESSION['user']['id']))
        {
            $requestPanier = $this->panier->selectAllPanier($_SESSION['user']['id']);
            //si il n'y as pas de panier ciio
            if(empty($requestPanier))
            {
                parent::Redirect("produits");
            }
            $infoLivraison = $this->checkout->selectInfoClient();
        }
        if(!isset($_SESSION['info_livraison'])){
            //DOIT REPONDRE AUX FORMULAIRES
        }
		require 'Vue/vueCheckout_info.php';
	}
	
}