<!doctype html>
<html lang="fr">

<head>
    <title>Panier</title>
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
        <h1 id="title">Ton Panier</h1>
<!--   PANIER CONNECTÉ AFFICHAGE   -->
        <?php
        $_SESSION['total'] = 0;
        if(isset($requestPanier)) {
            echo"<div class='container'>";
            for ($p = 0; isset($requestPanier[$p]); $p++) {
                echo "
                <div class='produit'>";
                echo "<h4 class='nomArticle'>" . $requestPanier[$p]['nom'] . "</h4>";
                echo "<img class='imageArticle' src='style/images/image_product/" . $requestPanier[$p]['image_url'] . "'>";
                echo "<p class='price'>Prix :" . $requestPanier[$p]['prix'] . "</p>";
                echo "<p class='quantity'>Quantite :" . $requestPanier[$p]['quantite'] . "</p>";
                echo "<div class='produits_article_contenu'> ";
                echo "<a href='index.php?page=cart&updatePanier=" . $requestPanier[$p]['id'] . '__' . $requestPanier[$p]['quantite'] . "'>+1</a>
                        <a href='index.php?page=cart&updatePanierMoin=" . $requestPanier[$p]['id'] . '__' . $requestPanier[$p]['quantite'] . "'>-1</a>
					<a href='index.php?page=cart&deletePanier=" . $requestPanier[$p]['id'] . "'>Supprimer</a>";
                echo "</div></div>";
                if($requestPanier[$p]['quantite'] == 1)
                {
                    $_SESSION['total'] = $requestPanier[$p]['prix'] + $_SESSION['total'];
                }
                else{
                    $_SESSION['total'] = ($requestPanier[$p]['prix'] * $requestPanier[$p]['quantite']) + $_SESSION['total'];
                }
            }
            echo"</div>";
        }
        else
        {
            echo $requestPanierCookie;
        }
        if(!isset($_SESSION['user']['id'])){
        parent::getPriceArticleCookie();
        }   
        ?>
        <div class="container_fluid">
        <h1 id="title">Finalisez votre commande ci-dessous</h1>
            <?php
            if(empty($infoLivraison)):
            ?>
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
                    <div style="display: none; color:brown;" id="error">
                    </div>
                    <label for="city">ville</label>
                    <select name="city" id="city">
                    </select><br><br>
                    <label for="">adresse de livraison</label>
                    <input id="addresse" type="text" name="adresse"><br>
                    <label for="">complement d'adresse</label>
                    <textarea id="addresse_comp" name="addresse_comp" cols="10" rows="5"></textarea>
                    <input type="submit" name="submit_adresse" value="Valide">
                    <p style="color: red;" id="erreur"></p>
                    <!-- id-user && id_commande   -->
                </form>
<!--checker le name submit-->-->
                <p style="color: red;" id="erreur"></p>
            <?php
            endif;
            if(isset($infoLivraison))
            {
                echo"<h1 id='title'>Informations de livraison</h1>";
                for($a=0;isset($infoLivraison[$a]);$a++)
                {
                    $x = $a+1;
                    echo"<form action='index.php?page=payment' method='post'>
    <div class='address_radio' id='para$x'>
    <input type='radio' name='address_livraison' id='$a' onchange='ShowHideDiv(this)' value='".$infoLivraison[$a]['id']."' >
    <span name='para' >
    ".$infoLivraison[$a]['nom']."
    ".$infoLivraison[$a]['prenom']."
    ".$infoLivraison[$a]['telephone']."
    ".$infoLivraison[$a]['email']."
    ".$infoLivraison[$a]['addresse']."
    ".$infoLivraison[$a]['ville']."
    ".$infoLivraison[$a]['code_postale']."</span><br>
    </div>";
                }
            }
         ?>
        </div>
        <div class="container">
   <div class="container_left_moitier">
       <div style="display: none" id="actives">
       <p>choisissez un mode de livraison</p>
        <div class="container_mode_livraison">
            <input onchange='ShowHideBtn(this)' value="ups-10.50" name="livraison" type="radio">&ensp;
            <i class="fab fa-ups fa-3x"></i>&ensp;&ensp;
            <p>Livraison en moins de 24h | 10.50$</p>
        </div>
        <div class="container_mode_livraison">
            <input onchange='ShowHideBtn(this)' value="dhl-6.50" name="livraison" type="radio">&ensp;
            <i class="fab fa-dhl fa-3x"></i>&ensp;&ensp;
            <p>Livraison en mois de 3 jours | 6.50$</p>
        </div>
        <div class="container_mode_livraison">
            <input onchange='ShowHideBtn(this)' name="livraison" value="Fedex-3.50" type="radio">&ensp;
            <i class="fab fa-fedex fa-3x"></i>&ensp;&ensp;
            <p>Livraison en point relais | 3.50$</p>
        </div>
   </div>
        </div>
        <br>
        <div class="result" style="display: none" id="active">
                <?php
                    if($_SESSION['total'] != 0){
                        echo" <p>Total: ".$_SESSION['total']." </p>";
                    }
                    else
                    {
                    if($_SESSION['totalWhenCookie'] != 0){
                        
                ?>
                <p>Total: <?= $_SESSION['totalWhenCookie'] ?> </p>
                <?php }
                    }
                ?>
            <button type="submit">Passer commande</button>
        </div>
        </form>
    </main>
</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->
<!--Inclusion du Footer -->
    <?php include'Vue/layout/footer.php'?>
    <!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script>
    <script>
        function ShowHideDiv(myChecks)
        {
            var activeBtns = document.getElementById("actives");
            activeBtns.style.display = myChecks.checked ? "block" : "none";
        }
        function ShowHideBtn(myCheck) {
            var activeBtn = document.getElementById("active");
            activeBtn.style.display = myCheck.checked ? "block" : "none";
            }
    </script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous">
</script>
<script src="style/script/form_client_commande.js"></script>
</body>

</html>
