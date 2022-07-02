<!doctype html>
<html lang="fr">

<head>
	<title>Administration</title>
	<!-- inclusion des head -->
	<?php include'Vue/layout/head.php' ?>

</head>
<body>
	<!-- Inclusion du header -->
	<?php include'Vue/layout/header.php'?>

	<!-- Main -->
	<main>
      <section id="admin">
        <section id="container">
          <h1 id="title" >PAGE ADMIN</h1>
          <nav id="adminnav">
          <!-- ICI CREE UNE VUE CONTROLLER MODEL -->
            <a class="adminlinks" href="index.php?page=adminuser">Gerer les utilisateurs</a>
            <a class="adminlinks" href="index.php?page=adminproduits">Gerer les Produits</a>
            <a class="adminlinks" href="index.php?page=admincategories">Gerer les categories</a>
            <a class="adminlinks" href="index.php?page=adminregions">Gerer les regions</a>
            <!-- ICI GERER LES REQUETES POUR AFFICHER  -->
            <a class="adminlinks" href="index.php?page=adminfacture">Gerer les factures</a>
            <!-- faut separer les deux tables easy y penser   -->
            <a class="adminlinks" href="index.php?page=admincommande">Gerer les commande</a>
          </nav>
        </section>
      </section>
	</main>

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
	<!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script>


</body>

</html>
