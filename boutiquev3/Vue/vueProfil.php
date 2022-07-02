<!doctype html> 
<html lang="fr">

    <head>
        <title>Profil</title>
        <!-- inclusion des head -->
        <?php include'Vue/layout/head.php'?>
    </head>
	<body>
		<!-- Debut container general -->
		<div class="formpage_container_general">
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main class="formpage_main "> 
				<form class="formpage_main_form" action="" method="POST">	
					<div class="formpage_main_form_img">
						<img class="format_image-profil" src="style/images/people.jpg" alt="jackdaniels">
					</div>
					
					<div class="formpage_form_input">
						<h2 class="connexion_form_title" >Profile</h2>

						<div class="formpage_block_standard margin_between">
							<label>login</label>
							<input type="text" value="<?= $_SESSION['user']['login'] ?>"  name="login">
								<?= $error['login'] ?><br>
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Email</label>
							<input type="email" value="<?= $_SESSION['user']['email'] ?>"  name="email">
								<?= $error['email'] ?><br>
						</div>
					
						<div class="formpage_block_standard margin_between">
							<label>Password</label>
							<input type="password" value="<?= $_SESSION['user']['password'] ?>"  name="password"><br>
						</div>
						
						<div class="formpage_block_standard margin_between">
							<label>Confirm</label>
							<input type="password" value="<?= $_SESSION['user']['password'] ?>"  name="password2">
							<?= $error['password'].$error['empty'] ?><br>
						</div>

						<input class="formpage_boutton" type="submit" name="submit">
					</div>
				</form><br><br>
	<!-- WORK MATHIEU WAIT STYLE -->
		<!-- AFFICHAGE DES ADDRESSE -->
		<section class="profil_adr">
		<?php
			if(isset($infoLivraison))
			{
				echo"<h1>Vos addresses de livraisons</h1>";
			for($a=0;isset($infoLivraison[$a]);$a++)
    			{
					$telephone = str_pad($infoLivraison[$a]['telephone'], 7,"0", STR_PAD_LEFT);
    				echo"<span class='inprofile'>
    				".$infoLivraison[$a]['nom']."
    				".$infoLivraison[$a]['prenom']."
    				".$telephone."
    				".$infoLivraison[$a]['email']."
    				".$infoLivraison[$a]['addresse']."
    				".$infoLivraison[$a]['ville']."
    				".$infoLivraison[$a]['code_postale']."</span>
					<form method='POST' action='index.php?page=profil' class='formprof'>
					<button type='submit' name='updateAdresse' value='".$infoLivraison[$a]['id']."'>Mettre à jour</button>
					<button type='submit' name='deleteAdresse' value='".$infoLivraison[$a]['id']."'>Supprimer</button>
					</form>
    				";
        		}
			}
	if(isset($addresse)):
		//REPRENDRE LE TRAVAILLE AVEC VAR ADDRESSE QUI NE PASE PAR A PARTIR DU FOR MAIS DANS LE IF CBON IMOTEP
			 ?>
			<section class="flex_middle">
			<section class="profil_form">
				<h1>Modifie ton addresse de livraison</h1>
             	<form  action="index.php?page=profil" id="form_client_info" method="POST">
             	<label for="">Prénom</label>
             	<input id="prenom" type="text" value="<?= $addresse['prenom'] ?>" name="prenome"> 
             	<label for="">Nom</label>
             	<input id="nom" type="text" value="<?= $addresse['nom'] ?>" name="nome"><br><br>
             	<label for="">Téléphone</label>
             	<input value="<?= $addresse['telephone'] ?>" id="tel" type="text" name="tele">
             	<label for="">Email</label>
             	<input value="<?= $addresse['email'] ?>" id="email" type="email" name="emaile"><br><br>
             	<label for="zipcode">Code Postal</label>
            	<input autofocus="true"  value="<?= $addresse['code_postale'] ?>" type="text" name="zipcodee" id="zipcode">
            	<div style="display: none; color:brown;" id="error"></div>
            	<label for="city">Ville</label>
             	<select name="citye" id="city">
				 <!-- <option value="<?php $addresse['ville'] ?>"></option> -->
             	</select><br><br>
             	<label for="">Adresse de livraison</label> 
             	<input id="addresse" value="<?= $addresse['addresse'] ?>" type="text" name="adressee"><br> 
             	<label for="">Complement d'adresse</label>
             	<textarea id="addresse_comp" name="addresse_compe" cols="10" rows="5"><?= $addresse['addresse_comp'] ?></textarea>
             	<input type="submit" value="Valider" name="submitUpdatee">
             	<p style="color: red;" id="erreur"></p>
              	<!-- id-user && id_commande   -->
		 	</form>
		</section>
		</section>
		<?php
		endif;
		?>
		</section>
		<section class="flex_middle">
			<section class="profil_form">
				<h1>Ajouter une adresse de livraison</h1>
             	<form action="" id="form_client_info" method="POST">
             	<label for="">Prénom</label>
             	<input id="prenom" type="text" name="prenom"> 
             	<label for="">Nom</label>
             	<input id="nom" type="text" name="nom"><br><br>
             	<label for="">Téléphone</label>
             	<input id="tel" type="text" name="tel">
             	<label for="">Email</label>
             	<input id="email" type="email" name="email"><br><br>
             	<label for="zipcode">Code Postal</label>
            	<input type="text" name="zipcode" id="zipcode">
            	<div style="display: none; color:brown;" id="error">
            	</div>
            	<label for="city">Ville</label>
             	<select name="city" id="city">
             	</select><br><br>
             	<label for="">Adresse de livraison</label> 
             	<input id="addresse" type="text" name="adresse"><br> 
             	<label for="">Complement d'adresse</label>
             	<textarea id="addresse_comp" name="addresse_comp" cols="10" rows="5"></textarea>
             	<input type="submit" name="submit_adresse" value="Valider">
             	<p style="color: red;" id="erreur"></p>
              	<!-- id-user && id_commande   -->
		 	</form>
		</section>
		</section>
			</main>    
			</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->
			<!--Inclusion du Footer -->
				<?php include'Vue/layout/footer.php' ?>
				<!--Inclusion des Scripts -->
				<script src="style/script/boutique.js"></script> 
				<script 
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" 
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" 
            crossorigin="anonymous">
            </script>
			<script src="style/script/form_client_commande.js"></script>

		  </body>
</html>