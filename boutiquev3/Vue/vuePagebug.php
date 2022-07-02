<!doctype html>
<html lang="fr">

<head>
    <title></title>
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
        <div class="accueil_boutton">
            <a href="#">Tell me more</a>
        </div>
    </main>

    <!--Inclusion du Footer -->
    <?php include'Vue/layout/footer.php'?>

    <!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script>
</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

</body>

</html>