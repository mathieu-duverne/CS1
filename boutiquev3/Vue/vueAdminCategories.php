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

		<h1>PAGE ADMIN</h1>
        <?= $success['insert'].$success['update'].$success['delete'].$error['empty']?>
        <a class="adminlinks" href="index.php?page=admin">Retour</a>
        <?php
        if(isset($categories)):
        ?>
        <table>
        <thead>
        <tr>
        <td>id</td>
        <td>nom</td>
        <td>update</td>
        <td>delete</td>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        for($i=0;isset($categories[$i]);$i++){
            echo"<td>".$categories[$i]['id']."</td>
            <td>".$categories[$i]['nom_categorie']."</td>
            <td><form action='index.php?page=admincategories' method='POST'><button name='updateCategorie' value='".$categories[$i]['id']."'>Update</button></form></td>
            <td><form action='index.php?page=admincategories' method='POST'><button name='deleteCategorie' value='".$categories[$i]['id']."'>Delete</button></form></td>
            </tr>";
        }
        ?>
        </tbody>
        </table>

        <form action="" method="POST">
        <label for="">Categories</label>
        <input type="text" name="categorie">
        <input type="submit" name="insertCategorie">
        </form>
        <?php
        endif;
        //AU DESSUS C SI FORMULAIRE ET CATEGORIE LISTER ///// EN DESSOUS C FORMULAIRE SI OPTION UPDATE ADMIN/////////
        if(isset($categori)):
        ?>
        <table>
        <thead>
        <tr>
        <th>id</th>
        <th>nom</th>
        <th>#</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <form action="" method="POST">
        <?php
            echo"<td><input name='id' value='".$categori['id']."' placeholder='".$categori['id']."'></td>
                <td><input name='nom' value='".$categori['nom_categorie']."'></td>
                <td><input type='submit' name='categorieUpdate'></td>
            </tr>";
        ?>
        </form>
        </tbody>
        </table>

        <?php
        endif;
        ?>

        </section>
      </section>
	</main>

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
	<!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script>


</body>

</html>
