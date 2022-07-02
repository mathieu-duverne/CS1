<!doctype html>
<html lang="fr">
 
<head>
    <title>Payment</title>
    <!-- inclusion des head -->
    <?php include'Vue/layout/head.php' ?>

</head>

<body>
<!-- Container general -->
<div class="accueil_container_general">

    <!-- Inclusion du header -->
    <?php include'Vue/layout/header.php'?>

    <!-- Main -->
    <main>
        <h1 class="recap1">RECAPITULATIF</h1><br>
        <h2 class="recap2">Produit(s) commandé(s)</h2>
        <div class="container">
        <?php
    if(isset($_SESSION['user']['id']))
    {
        for($p=0;isset($requestPanier[$p]);$p++)
        {
            echo "<div class='produit'>";
                echo"<h4 class='nomArticle'>".$requestPanier[$p]['nom']."</h4>";
                echo "<img class='imageArticle' src='style/images/image_product/".$requestPanier[$p]['image_url']."'>";
            echo "<p class='price'>Prix :".$requestPanier[$p]['prix']."</p>";
            echo "<p class='quantity'>Quantite :".$requestPanier[$p]['quantite']."</p>";
            echo "</div>";
        }
    }
    else
    {
        echo"<div id='paniercookie'>" .$requestPanierCookie. "</div>";
    }
        ?> 
        </div>
        <br><br>
        <div class='profil_adr'>
        <h2 class="recap3">Votre addresse de livraison</h2>
        <?php
           echo"
               <span id='addresse' name='para' >
               <div id='".$info_address['id']."'></div>

               <span class='adrprofile'>

               ".$info_address['prenom']."
               ".$info_address['nom']."
               ".$info_address['telephone']."
               ".$info_address['email']."
               ".$info_address['addresse']."
               ".$info_address['ville']."
               ".$info_address['code_postale']."
               </span><br>";
        ?>
        </div>
        <?php
            if($_SESSION['total'] != 0):
        ?>
        <div class="profil_adr">
        <h2 class="recap3">MODE DE LIVRAISON : <?= $explodeLivraison[0].", ". $priceLivraison ?>€</h2>
        <h2 class="recap3">TOTAL des produits: <?= $_SESSION['total'] ?>€</h2>
        <?php
            $_SESSION['totals'] = $_SESSION['total'] + $priceLivraison;
        ?>
        <h2 class="recap3">TOTAL des produits + mode de livraison: <?= $_SESSION['totals'] ?>€</h2>
        </div>
        <?php
        else:
        ?>
        <div class="profil_adr">
        <h2 class="recap3">MODE DE LIVRAISON : <?= $explodeLivraison[0].", ". $priceLivraison ?>€  </h2>
        <h2 class="recap3">TOTAL des produits: <?= $_SESSION['totalWhenCookie'] ?>€</h2>
        <?php
            $_SESSION['totalPriceCookie'] = $_SESSION['totalWhenCookie'] + $priceLivraison;
        ?>
        <h2 class="recap3">TOTAL des produits + mode de livraison: <?= $_SESSION['totalPriceCookie'] ?>€</h2>
        </div>
        <?php
            endif;
            ?>
        
        <div class="profil_adr">
        <h2 class="recap3">Paiement</h2>
            <form action="" method="post" enctype="multipart/form-data">
        <input class="payput" name="code_seize" id="code_seize" placeholder="0000 / 000 / 000 / 0000" type="text">
        <div id="error_seize"></div>
        <input class="payput" name="exp" id="exp" placeholder="MM / DD" type="text">
        <div id="error_exp"></div>
        <input class="payput" name="ccv" id="ccv" placeholder="CCV" type="text">
        <div id="error_ccv"></div>
        <button class="payput" class="paysub" type="button" id="submitPayment" name="submitPayment">PAYER</button>
        <div id="error_empty"></div>
        </form>
        <div id="result"></div>
        </div>
    </main>

    <!--Inclusion du Footer -->
    <?php include'Vue/layout/footer.php'?>

    <!--Inclusion des Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                var paniercookie = <?php echo json_encode($id_article_cookie); ?>;
            </script>
    <script src="style/script/payment.js"></script>
</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

</body>

</html>
