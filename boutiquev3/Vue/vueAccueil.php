<!doctype html>
<html lang="fr">

	<head>
		<title>Accueil</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
		<!-- Container general -->
		<div class="accueil_container_general">
				
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main class="accueil_main"> 
				<div class="accueil_text">
					<p>Discover</p>
					<h1>Home Of Spirit</h1>
				</div>
				<div class="accueil_image">
					<img src="style/images/spirithome.png"/>
				</div>
				<div class="newproduits">
					<h1 class="prodtitre">Nos nouveaux articles</h1>
					<div class="fproduits">
				<?php 
					echo("<div class='produit'>
						<span class='nomArticle'>".$liste[0][0]['nom']."</span>
						<img class='imageArticle' src='style/images/image_product/".$liste[0][0]['image_url']."'>
						<span class='prixArticle'>".$liste[0][0]['prix']." €</span>
						<form class='formArticle' method='POST' action='index.php?page=produits'>
							<button class='produits_article_button' name='product' value='".$liste[0][0]['id']."' type='submit'>Ajouter au panier</button>
						</form>
						</div>
						<div class='produit'>
						<span class='nomArticle'>".$liste[1][0]['nom']."</span>
						<img class='imageArticle' src='style/images/image_product/".$liste[1][0]['image_url']."'>
						<span class='prixArticle'>".$liste[1][0]['prix']." €</span>
						<form class='formArticle' method='POST' action='index.php?page=produits'>
							<button class='produits_article_button' name='product' value='".$liste[1][0]['id']."' type='submit'>Ajouter au panier</button>
						</form>
						</div>
						<div class='produit'>
						<span class='nomArticle'>".$liste[2][0]['nom']."</span>
						<img class='imageArticle' src='style/images/image_product/".$liste[2][0]['image_url']."'>
						<span class='prixArticle'>".$liste[2][0]['prix']." €</span>
						<form class='formArticle' method='POST' action='index.php?page=produits'>
							<button class='produits_article_button' name='product' value='".$liste[2][0]['id']."' type='submit'>Ajouter au panier</button>
						</form>
						</div>");
				?>
					</div>
				
				</div>
				<div class="accueil_boutton">
                    <?php
//                    var_dump($_SESSION);
                    ?>
					<a href="index.php?page=produits">Tell me more</a>
				</div>
			</main>    

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script> 
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>