<?php
require_once'Model/ModelAccueil.php';
require_once'Model/ModelUser.php';
require_once'Model/ModelAdmin.php';
require_once'Model/ModelAdminUser.php';
require_once'Model/ModelAdminProduits.php';
require_once'Model/ModelAdminCategories.php';
require_once'Model/ModelAdminRegions.php';
require_once'Model/ModelProduct.php';
require_once'Model/ModelPanier.php';
require_once'Model/ModelCheckout.php';
require_once'Model/ModelPayment.php';
require_once'Model/ModelResume.php';
require_once'Model/ModelHistorique.php';


class Controleur
{
	
	protected $checkout;
	protected $user;
	protected $accueil;
	protected $admin;
	protected $adminuser;
	protected $adminproduits;
	protected $admincategories;
	protected $adminregions;
	protected $product;
	protected $panier;
	protected $payment;
	protected $resume;
	protected $historique;


	public function __construct()
	{
		$this->accueil = new accueil();
		$this->admincategories = new admincategories();
		$this->adminproduits = new adminProduits();
		$this->adminuser =new adminUser();
		$this->user = new user(); 
		$this->admin = new admin();
		$this->adminregions = new adminregions();
		$this->product = new product();
		$this->panier = new panier();
		$this->checkout = new checkout();
		$this->payment = new payment();
		$this->resume = new resume();
		$this->historique = new historique();
	}

	public function notConnect(){
	    if(!isset($_SESSION['user']['id'])){
	        header("location: index.php?page=accueil");
        }
    }


	public static function Redirect($url)
	{
		header("Location: index.php?page=".$url."");
		exit();
	}

	public function Verifypass($password, $password_hash){
		if(password_verify($password, $password_hash) === false)
		{
			return false;
		}
		else
			return true;
	}

	public function notAdmin($droits){
		if($droits!=909)
		{
			return false;
		}
		else
		return true;
	}

	public function produitExistInPanier($panier,$id_produit){
		for($x=0;isset($panier[$x]);$x++){
			if($panier[$x]['id_produit']==$id_produit){
				return $panier[$x]['quantite'];
			}
			
		}
				return false;
	}

	

	public function produitExistInCookie($id_produit,$items){
		ksort($items);
		$reindexe = array();
		$index = 0;
		//var_dump($items);
		foreach($items as $cle => $value){
			$reindexe[$index] = $items[$cle];
			$index++;
			for($v=0;isset($reindexe[$v]);$v++){
			$item = explode("__",$reindexe[$v]);
				for($x=0;isset($item[$x]);$x++){
					if($x%4==0){
						if($id_produit==$item[$x]){
							$p = $x +2;
					 		return $item = [$cle,$item[$x],$item[$p]];
					}
				}
			}
		}
	}
	return false;
}

//recupere tout les items du panier dans les cookie fait une requete au produits via l'id
	public function recupPanierInCookie($itemsPanier){
		ksort($itemsPanier);
		$reindexe = array();
		$index = 0;
		foreach($itemsPanier as $cle => $value){
			$reindexe[$index] = $itemsPanier[$cle];
			$index++;
			$viewPanierCookie = "<div class='container'>";
				for($z=0;isset($reindexe[$z]);$z++)
				{
					$item = explode("__",$reindexe[$z]);
						for($a=0;isset($item[$a]);$a++)
						{
							
							if($a%4==0)
							{
								$id_produit = $item[$a];
								$request = $this->product->selectPanierCookie($item[$a]);
								$viewPanierCookie.= "
                                                    <div class='produit'>
													<h4 class='nomArticle'>".$request['nom']."</h4>
													<img class='imageArticle' src='style/images/image_product/" . $request['image_url'] . "'>
													<p class='price'>Prix: ".$request['prix']."€</p>
													";
							}
							if($a%4==1)
							{
							$id_utilisateurCookie = $item[$a];
							}
							if($a%4==2)
							{
								$id_quantiteCookie = $item[$a];
								$viewPanierCookie.= "
								<p class='quantity'>Quantité: ".$id_quantiteCookie."</p>
								<a class='adminLinks' href='index.php?page=cart&update=".$id_produit.'__'.$id_utilisateurCookie.'__'.$id_quantiteCookie."'>+1</a>
								<a class='adminLinks' href='index.php?page=cart&delete=".$id_produit."'>Supprimer</a>
								</div>";
							}
							if($a%4==3)
							{
							$id_statutcookie = $item[$a];
							}		 
						}
                }
        }
        $viewPanierCookie.="</div>";
        return $viewPanierCookie;
	}
	//recupere tout les items du panier dans les cookie fait une requete au produits via l'id
	public function displayPanierInCookie($itemsPanier){
		ksort($itemsPanier); 
		$reindexe = array();
		$index = 0;
		foreach($itemsPanier as $cle => $value){
			$reindexe[$index] = $itemsPanier[$cle];
			$index++;
			$viewPanierCookie = "<div class='container'>";
				for($z=0;isset($reindexe[$z]);$z++)
				{
					$item = explode("__",$reindexe[$z]);
						for($a=0;isset($item[$a]);$a++)
						{
							
							if($a%4==0)
							{
								$id_produit = $item[$a];
								$request = $this->product->selectPanierCookie($item[$a]);
								$viewPanierCookie.= "
                                                    <div class='produit'>
													<h4 class='nomArticle'>".$request['nom']."</h4>
													<img class='imageArticle' src='style/images/image_product/" . $request['image_url'] . "'>
													<p class='price'>Prix: ".$request['prix']."€</p>";
							}
							if($a%4==1)
							{
							$id_utilisateurCookie = $item[$a];
							}
							if($a%4==2)
							{
								$id_quantiteCookie = $item[$a];
								$viewPanierCookie.= "
								<p class='quantity'>Quantité: ".$id_quantiteCookie."</p>
								</div>";
							}
							if($a%4==3)
							{
							$id_statutcookie = $item[$a];
							}		
						}
                }
        }
        $viewPanierCookie.="</div>";
        return $viewPanierCookie;
	}

	// delete all cookie panier ACHAT EFFECTUER
	public function deletePanierCookie(){
			setcookie('cookieItem', 0, time()+3600);
			$_COOKIE['cookieItem'] = 0;
			foreach($_COOKIE['items'] as $items)
			{
				$item = explode("__",$items);
				// var_dump($item[0]);
				$deleteThisProduit = $this->produitExistInCookie($item[0],$_COOKIE['items']);
				setcookie("items[$deleteThisProduit[0]]", '', time()-3600);
				
			}
		}

	public function getPriceArticleCookie(){
		$_SESSION['totalWhenCookie']=0;
		foreach($_COOKIE['items'] as $items)
		{
			$item = explode("__",$items);
			$requestArticle = $this->product->selectPanierCookie($item[0]);
			if($item[2] > 1)
			{
				$_SESSION['totalWhenCookie'] = ($requestArticle['prix'] * $item[2]) + $_SESSION['totalWhenCookie'];
			}
			else
			{
				$_SESSION['totalWhenCookie'] = $requestArticle['prix'] + $_SESSION['totalWhenCookie'];
			}
			}	
			
	}

	public function getidproduit(){
		$id_article = [];
		foreach($_COOKIE['items'] as $items)
		{
			$item = explode("__",$items);	
				array_push($id_article, $item[0]);
		}
		return $id_article;
	}
	public function getIdAndQuantiteProduit(){
		$idandquantite = [];
		foreach($_COOKIE['items'] as $items)
		{
			$item = explode("__",$items);
				array_push($idandquantite, $item[0]);
				array_push($idandquantite, $item[2]);
		}
		return $idandquantite;
	}

	// VERIF SI NUMERO COMMANDE EXIST GIVE A OTHER
		public function checkNumeroCommande($n_commande){
				$response = $this->checkout->nCommandeExistInCookie($n_commande);
    			$response1 = $this->checkout->nCommandeExist($n_commande);
				if($response===-1){
					return false;
				}
				else{
					return true;
				}
				if($response1===-1){
					return false;
				}
				else{
					return true;
				}
			}
		
		public function recuriveWHOU($n_commandNotcheck){
				$response = $this->checkNumeroCommande($n_commandNotcheck);
                   if($response===false)
                   {
                       	$n_commande = rand(1,100);
						$response = $this->recuriveWHOU($n_commande);
                   }
                   else
                   {
					return $n_commandNotcheck;
                   }
		}
		public function selectClientCommandeCheck($id_utilisateur){
			$statut =1;
			if(isset($_SESSION['user'])){
				$response = $this->checkout->selectCommande($id_utilisateur, $statut);
				return $response;
			}
			else{
				$response1 = $this->checkout->selectCommandeCookie($id_utilisateur, $statut);
				return $response1;
			}
		}
}