<?php
require_once'Controleur.php';

class ControleurAccueil extends Controleur
{
	protected $user;
	protected $adminproduits;

	public function route_accueil(){
		
		$liste = $this->accueil->selectTroisDerniersProducts();
		

		require 'Vue/vueAccueil.php';
	}
}