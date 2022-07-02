<?php
session_start();
require_once'Controleur/ControleurInscription.php';
require_once'Controleur/ControleurConnexion.php';
require_once'Controleur/ControleurAccueil.php';
require_once'Controleur/ControleurProfil.php';
require_once'Controleur/ControleurAdmin.php';
require_once'Controleur/ControleurAdminuser.php';
require_once'Controleur/ControleurAdminproduits.php';
require_once'Controleur/ControleurAdmincategories.php';
require_once'Controleur/ControleurAdminregions.php';
require_once'Controleur/ControleurProduct.php';
require_once'Controleur/ControleurCheckout.php';
require_once'Controleur/ControleurCheckoutInfo.php';
require_once'Controleur/ControleurPagebug.php';
require_once'Controleur/ControleurPayment.php';
require_once'Controleur/ControleurCart.php';
require_once'Controleur/ControleurStory.php';
require_once'Controleur/ControleurResume.php';
require_once'Controleur/ControleurHistorique.php';


class Routeur
{
	public function routerRequete()
	{
		if(isset($_GET['page']))
		{
			if($_GET['page'] == 'accueil')
			{
				$accueil = new ControleurAccueil();
				$accueil->route_accueil();
			}
			if($_GET['page'] == 'historique')
			{
				$accueil = new ControleurHistorique();
				$accueil->route_historique();
			}
			if($_GET['page'] == 'story'){
				$story = new ControleurStory();
				$story->route_story();
			}
			if($_GET['page'] == 'resume'){
				$resume = new ControleurResume();
				$resume->route_resume();
			}
			if($_GET['page'] == 'inscription')
			{
				$inscription = new ControleurInscription();
				$inscription->route_inscription();
			}
			if($_GET['page'] == 'connexion')
			{
				 $connexion = new ControleurConnexion();
                 $connexion->route_connexion();
			}
			if($_GET['page'] == 'profil')
			{
				$profil = new ControleurProfil();
				$profil->route_profil();
			}
			if ($_GET['page'] == 'deconnexion')
			{
			    require_once'Controleur/ControleurDeconnexion.php';
			}
			if ($_GET['page'] == 'admin')
			{
			    $admin = new ControleurAdmin();
			    $admin->route_admin();
			}
			if($_GET['page'] == 'adminuser')
				{
					$adminuser = new ControleurAdminUser();
					$adminuser->route_adminUser();
				}
			if($_GET['page'] == 'adminproduits')
				{
					$adminproduct = new ControleurAdminProduct();
					$adminproduct->route_adminProduct();
				}
			if($_GET['page'] == 'admincategories')
			{
			    $admincategories = new ControleurAdminCategories();
			    $admincategories->route_adminCategories();
			}
			if($_GET['page'] == 'adminregions')
			{
			    $adminregions = new ControleurAdminRegions();
			    $adminregions->route_adminRegions();
			}
			if($_GET['page'] == 'produits')
			{
			    $produits = new ControleurProduct();
			    $produits->route_produits();
			}
			if($_GET['page'] == 'checkout')
			{
				$checkout = new ControleurCheckout();
				$checkout->route_checkout();
			}
			if($_GET['page'] == 'checkoutinfo')
			{
				$checkoutinfo = new ControleurCheckoutInfo();
				$checkoutinfo->route_checkoutinfo();
			}
            if($_GET['page'] == 'payment')
            {
                $payment = new ControleurPayment();
                $payment->route_payment();
            }
            if($_GET['page'] == 'cart')
            {
                $cart = new ControleurCart();
                $cart->route_cart();
            }
		}
		else {
				$accueil = new ControleurAccueil();
                $accueil->route_accueil();
		}
	}
}
