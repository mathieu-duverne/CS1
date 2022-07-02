<!doctype html>
<html lang="fr">

	<head>
		<title>Adresse de livraison</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
		<!-- Container general -->
		<div class="accueil_container_general">
				
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main --><main class="accueil_main"> 
            <?= $error['empty'].$error['address'].$success['insert'] ?>
<!-- ESPACE WORKING CONSTRUCT FINAL COMMAND LINE BDD USER 
    A VOIR DEMAIN PARLER A DENIS DE COMMENT FAIRE UN PTIT TRUC STYLER
    LA TRANSFORMATION EN SESSION SE FERA AU CLICK DU CHECKBOX 
-->
<?php 
var_dump($_POST);
 if(isset($infoLivraison))
{
// var_dump($infoLivraison);
echo"<h1>Choisit la bonne addresse de livraison</h1>";
    for($a=0;isset($infoLivraison[$a]);$a++)
    {
    $x = $a+1;
    echo"<form action='index.php?page=payment' method='post'>
    <div id='para$x' >
    <input type='radio' id='$a' name='id' onchange='ShowHideDiv(this)' value='".$infoLivraison[$a]['id']."' >
    <span name='para'>
    ".$infoLivraison[$a]['nom']."
    ".$infoLivraison[$a]['prenom']."
    ".$infoLivraison[$a]['telephone']."
    ".$infoLivraison[$a]['email']."
    ".$infoLivraison[$a]['addresse']."
    ".$infoLivraison[$a]['ville']."
    ".$infoLivraison[$a]['code_postale']."</span><br>
    </div>";
        }echo"<div id='active'                                                                                                                                                             ' style='display: none'>
    <button type='submit' >Valider ton addresse</button>
    <a href='index.php?page=profil'>Modifié votre adresse</a><form>
    </div>";
}
//regarder comment mettre en relation une boucle php avec une javascript
if(empty($infoLivraison)): 
?>
            <h1>Info de livraisons</h1>
             <form action="" id="form_client_info" method="POST">
             <label for="">prenom</label>
             <input id="prenom" type="text" name="prenom"> 
             <label for="">nom</label>
             <input id="nom" type="text" name="nom"><br><br>
             <label for="">téléphone</label>
             <input id="tel" type="text" name="tel">
             <label for="">email</label>
             <input id="email" type="email" name="email"><br><br>
             <label for="zipcode">Code Postale</label>
             <input type="text" name="zipcode" id="zipcode">
             <div style="display: none; color:brown;" id="error"></div>
            <label for="city">ville</label>
             <select name="city" id="city">
             </select><br><br>
             <label for="">adresse de livraison</label> 
             <input id="addresse" type="text" name="adresse"><br> 
             <label for="">complement d'adresse</label>
             <textarea id="addresse_comp" name="addresse_comp" cols="10" rows="5"></textarea>
             <input type="submit" name="submit" value="Valide">
             <p style="color: red;" id="erreur"></p>
              <!-- id-user && id_commande   -->
         </form>
         <?php
            endif;
         ?>
			</main>    
			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>
			<!--Inclusion des Scripts -->
            <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" 
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" 
            crossorigin="anonymous">
            </script>
			<script src="style/script/boutique.js"></script>
			<script src="style/script/form_client_commande.js"></script> 
            <script>
            function ShowHideDiv(myChecks)
            {
            // var borderrs = document.getElementsByClassName("borderr");
            // if (borderrs.length > 0){
            //     Array.prototype.forEach.call(borderrs, borderr => {
            //     borderr.classList.remove("borderr");
            //     });
            // }
            // var displayP = document.getElementById("para"+myCheck.value);
            // displayP.classList.add("borderr");
            var activeBtns = document.getElementById("actives");
            activeBtns.style.display = myChecks.checked ? "block" : "none";
            }
               //PETITE FUNCTION POUR CHANGER STYLE RENDRE DISABLED INPUT
            </script>
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>