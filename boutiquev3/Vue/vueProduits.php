<!doctype html>
<html lang="fr">

	<head>
		<title>Accueil</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
		<!-- Container general -->
		<div class="produits_container_general">

			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<div class="produits_container_main">
			<!-- /// ICI AFFICHAGE PANIER SUCCES/////-->
			<div class="produits_panier_success">
            	<?= $success['insertPanier'].$success['updateQuantite'].$success['deleteProduit'] ?>
			</div>
			<div id="success"></div>
			<!-- /// ICI FILTRES CATEGORIES (type et region) /////////////////////////////////////////////////// -->
			<div class="produits_filtres">
				<!-- ici choix des différents types de spiritueux -->
				<div class="produits_filtres--types">
					<p>Types de spiritueux</p>
					<div class="produits_filtres_types_dropdown">
						<?php	
						for($i=0;isset($allCategories[$i]);$i++)
						{
							echo"<a href='index.php?page=produits&categories=".$allCategories[$i]['id']."&start=1'>".$allCategories[$i]['nom_categorie']."</a>";
						}
						?>
					</div>
				</div>
				
				<!-- ici choix de la région -->
				<div class="produits_filtres--regions">
					<p>Régions</p>
					<div class="produits_filtres_regions_dropdown">
						<?php
						for($i=0;isset($allRegions[$i]);$i++)
						{
							echo"<a href='index.php?page=produits&regions=".$allRegions[$i]['id']."&start=1'>".$allRegions[$i]['nom_region']."</a>";
						}
						?>
					</div>
				</div>
			
				<!-- Ici bouton pour effacer les filtres -->
				<div class="produits_filtres--supprimer">
					<a href='index.php?page=produits'>Supprimer les filtres</a>
				</div>	
			</div>		
					 	
			<!-- /// ICI AFFICHAGE DES PRODUITS  /////////////////////////////////////////////////// -->
			<div class="produits_liste">
				<?php
					//si aucun filtre liste tout
				if(isset($allProducts))
				{
    					//affichage des produits
					for($p=0;isset($allProducts[$p]);$p++)
					{
					echo "<div class='produits_article'>";
						echo "<div class='produits_article_image'> ";
							echo "<img class='produits_image' src='style/images/image_product/".$allProducts[$p]['image_url']."'>";
						echo "</div>";

						echo "<div class='produits_article_contenu'> ";
							echo "<div class='produits_article_contenu_top'> ";
								echo"<h4>".$allProducts[$p]['nom']."</h4>";
								echo "<p class='produits_article_cat'>".$allProducts[$p]['nom_categorie']."</p>";
								echo "<p class='produits_article_region'>".$allProducts[$p]['nom_region']."</p>";
								echo "<p class='produits_article_description'>".$allProducts[$p]['description']."</p>";
							echo "</div> ";
							echo "<div class='produits_article_contenu_bottom'> ";
								echo "<p class='produits_article_prix'>".$allProducts[$p]['prix']."€</p>";
								// echo "<p>stock :".$allProducts[$p]['stock']."</p>";
								echo "<form class='produits_article_form' method='POST' action=''>";
									echo "<button 'class='produits_article_button' name='product' value='".$allProducts[$p]['id']."' type='submit'>Ajouter au panier</button>";
								echo "</form>";
							echo "</div>";
						echo "</div>";	
					echo "</div><br><br><br>";	
					}

				}
				?>
			</div> <!-- /// FIN d'affichage des produits  /////////////////////////////////////////////////// -->
                <div class="container_pagination">
                    <?= $viewPagination ?>
                </div>
			</div> <!-- FIN CONTAINER MAIN /////\\\\\\//// -->

		</div> <!-- FIN CONTAINER GENERAL /////\\\\\\//// -->

		<!--Inclusion du Footer -->
		<?php include'Vue/layout/footer.php'?>
		<!--Inclusion des Scripts -->
		<script src="style/script/boutique.js"></script> 
	</body>
</html>