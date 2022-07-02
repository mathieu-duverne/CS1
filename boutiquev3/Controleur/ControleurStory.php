<?php
require_once'Controleur.php';

class ControleurStory extends Controleur
{
	protected $user;
	protected $adminproduits;

	public function route_story(){

		require 'Vue/vueStory.php';
	}
}
