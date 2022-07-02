<?php
require_once'Controleur.php';
require 'vendor/autoload.php';
use GuzzleHttp\Client;
const API_URls = 'https://geo.api.gouv.fr/';

class ControleurProfil extends Controleur
{
	protected $panier;

	public function route_profil()
	{
	    parent::notConnect();

		$error = [
			'empty' => '', 
			'email' => '',                                                     
  			'login' => '',
  			'password' => ''
			];
			if(isset($_SESSION['user']['id']))
			{
				$requestPanier = $this->panier->selectAllPanier($_SESSION['user']['id'], 0);
			}
			//CLICK ON BUTTON UPDATE
			if(isset($_POST['updateAdresse']))
			{
				if(intval($_POST['updateAdresse']))
				{
					$_SESSION['addr_id'] =  $_POST['updateAdresse'];
					$addresse = $this->panier->selectAdresseViaId($_SESSION['addr_id']);
				}
			}
			// delete addresse
			if(isset($_POST['deleteAdresse'])){
				if(intval($_POST['deleteAdresse']))
				{
					$id = $_POST['deleteAdresse'];
					$this->checkout->deleteAdresseViaId($id);
				}
			}
			// UPDATE DE L4ADRESSE PAR LE CLIENT
			if(isset($_POST['submitUpdatee']))
			{
				
				if(!empty($_POST['zipcodee']) && !empty($_POST['citye']) && !empty($_POST['prenome']) && !empty($_POST['nome']) && !empty($_POST['tele']) && !empty($_POST['emaile']) && !empty($_POST['adressee']))
				  {
					  if(empty($_POST['addresse_compe']))
					  {
						  $addresse_comp = "pas de complement !";
					  }
					  if(!empty($_POST['addresse_compe']))
					  {
						$addresse_comp = htmlspecialchars($_POST['addresse_compe']);
					  }
						$prenom = htmlspecialchars($_POST['prenome']);
						$nom = htmlspecialchars($_POST['nome']);
						$email = $_POST['emaile'];
						$telephone = htmlspecialchars($_POST['tele']);
						$adresse = htmlspecialchars($_POST['adressee']);
						$zipcode = strip_tags($_POST['zipcodee']);
						$city = strip_tags($_POST['citye']);
					  //utilisation API C PAS UN TRUC DE FOU
					$client = new \GuzzleHttp\Client(['base_uri' => API_URls]);
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
						$this->checkout->updateInfoClient($_SESSION['addr_id'],$nom,$prenom,$telephone,$email,$adresse,$addresse_comp,$zipcode,$cities[0]);
						$success['insert'] = 'Information envoyé';
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
						$id_utilisateur = $_SESSION['user']['id'];
						$zipcode = strip_tags($_POST['zipcode']);
						$city = strip_tags($_POST['city']);
					  //utilisation API C PAS UN TRUC DE FOU
					$client = new \GuzzleHttp\Client(['base_uri' => API_URls]);
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
			

			//traitement addresse
		if(isset($_POST['submit']))
		{
			//si vide
			if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']))
			{
				$error['empty'] = "<span>Champs vide</span>";
			}
			//pregmatch
			$pattern = "/^\S*[a-z,A-Z,0-9]{4,}\S*/";
			if(!preg_match($pattern, $_POST['login']))
			{
				$error['login'] = "<span>commence bien au début, 4 caractéres minimum, majuscule,minuscules,chiffres autorisées</span>";
			}
			//si user existe en bdd
			if($_POST['login'] != $_SESSION['user']['login'])
			{
				if($this->user->exists($_POST['login'])===-1)
				{
					$error['login'] = "<span>Login deja pris</span>";
				}
			}
			// else{

			// }
			//si mauvais format d'email
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
  				 $error['email'] = "<span>Saisissez un email valide</span>";
			}
			$password = htmlspecialchars($_POST['password2']);
			//pregmatch pour password
			if(!preg_match($pattern, $password))
			{
				$error['password'] = "<span>commence bien au début, 4 caractéres minimum, majuscule,minuscules,chiffres autorisées</span>";
			}
			$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$login = htmlspecialchars($_POST['login']);
			$email = htmlspecialchars($_POST['email']);
			//si password pas identique
			if(parent::Verifypass($password, $password_hash)===false)
			{
				 $error['password'] = "<span>Mot de passe non identique</span>";
			}
			//si il y a des error
			if(array_filter($error))
			{
			}
			//sinon
			else
			{
				$this->user->updateUser($login,$email,$password_hash, $_SESSION['user']['id']);
				$_SESSION['user']['login'] = $login;
				$_SESSION['user']['email'] = $email;
				$_SESSION['user']['password'] = $password;
			}
		}

		if(isset($_SESSION['user']['id']))
        {
            $infoLivraison = $this->checkout->selectInfoClient($_SESSION['user']['id']);
        }
require 'Vue/vueProfil.php';
	}
}