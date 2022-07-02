<header>
	<div class="header_container">
		<div class="header_title">
			<!-- <p class="logo">SPIRIT</p> -->
			<img class="header_logo" alt="logo" src="style/images/logo.png">
		</div>

		<nav class="header_nav">
			<div class="header_link">
				<a href="index.php?page=accueil">Accueil</a>
				<a href="index.php?page=produits">Produits</a>
				<?php
				// // $_COOKIE['items']
				// // for($a=0;)
                // if(!isset($_COOKIE['items']))
                // {
                //     $_COOKIE['cookieItem']=0;
				// 	$_SESSION['totalWhenCookie'] = 0;
                // }
				// if(!isset($_COOKIE['items']))
				// {
				// 	$_COOKIE['cookieItem'] = 0;
				// }
				if(isset($_COOKIE['items']))
        		{
            		$requestPanierCookies = parent::recupPanierInCookie($_COOKIE['items']);
        		}
				if(isset($_SESSION['user'])){
					$request = parent::selectClientCommandeCheck($_SESSION['user']['id']);
				}
				else{
					if(!isset($_COOKIE['PHPSESSID'])){
						header("location: index.php");
					}
				$request = parent::selectClientCommandeCheck($_COOKIE['PHPSESSID']);
				}
				// if(empty($requestPanierCookies)){
				// 	$_COOKIE['cookieItem'] = 0;
				// }
                if(!isset($_SESSION['user']['id']))
                {
				if(!empty($requestPanierCookies)): ?>
                    <a style="color:white !important;" href='index.php?page=cart'><i class="fas fa-shopping-cart" aria-hidden="true"></i><?= $_COOKIE['cookieItem'] ?></a>
				<?php
				endif;
				
                }
				if(!empty($request)){
					echo"<a href='index.php?page=historique'>Historique d'achat</a>";
				}
	                	if(!isset($_SESSION['user'])):?>
						<a href="index.php?page=inscription">Inscription</a>
						<a href="index.php?page=connexion">Connexion</a>
				<?php endif; 
				if(isset($_SESSION['user'])):
                    if($_SESSION['user']['droits']==909){
                        echo "<a href='index.php?page=admin'>Administration</a>";
                    }
					$statut = 0;
                    $requestPanier = $this->panier->selectAllPanier($_SESSION['user']['id'], $statut);
                    ?>
                    <a style="color:white !important;" href="index.php?page=profil"><i class="far fa-user"></i></a>
                    <?php
                    if(!empty($requestPanier)){
                    	if(isset($_SESSION['user']['countProduct'])): 
					?>
                        <a style="color:white !important;" href='index.php?page=cart'><i class="fas fa-shopping-cart" aria-hidden="true"></i><?= $_SESSION['user']['countProduct'] ?></a>
                    <?php
                        endif;
                    }
                    ?>
                <a style="color:white !important;" href="index.php?page=deconnexion"><i class="fas fa-sign-out-alt"></i></a>
				<?php endif;
				?>
			</div>
		</nav>
		<div class="menu-btn">
			<div class="menu-btn_burger">  
			</div>
		</div>
	</div>
</header>