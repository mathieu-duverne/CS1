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

		<h1 id="title">Administrer vos produits</h1>
		<a class="adminlinks" href="index.php?page=admin">Retour Menu Admin</a></br>
        <?= $success['update'].$success['delete'].$success['product'].$error['empty'].$error['img'] ?><br>
		<section>
        <?php
    //AFFICHAGE DE TOUT LES PRODUITS SI IL Y EN A
    if(isset($allProducts)):?>

		<table id="table">
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>description</th>
            <th>prix</th>
            <th>image</th>
            <th>stock</th>
            <th>id_categorie</th>
            <th>id_region</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
       <?php
            for($i=0;isset($allProducts[$i]);$i++){
    echo "<td class='td'>".$allProducts[$i]['id']."</td>
          <td class='td'>".$allProducts[$i]['nom']."</td>
          <td class='td'>".$allProducts[$i]['description']."</td>
          <td class='td'>".$allProducts[$i]['prix']."</td>
          <td><img class='img' width='50' height='75' src='style/images/image_product/".$allProducts[$i]['image_url']."'></td>
          <td class='td'>".$allProducts[$i]['stock']."</td>
          <td class='td'>".$allProducts[$i]['id_categorie']."</td>
          <td class='td'>".$allProducts[$i]['id_region']."</td>
          <td><form action='index.php?page=adminproduits&img=".$allProducts[$i]['image_url']."' method='POST'><button name='updateProduct' value='".$allProducts[$i]['id']."'>Update</button></form></td>
          <td><form action='index.php?page=adminproduits' method='POST'><button name='deleteProduct' value='".$allProducts[$i]['image_url']."'>Delete</button></form></td>
          </tr>";
            }
       // }

    echo"</tbody></table>";
endif;
            //FORMULAIRE UPDATE PRODUCT SI ADMIN APPUIS SUR UPDATE*
    if(isset($productUpdates)):?>
        <table>
        <thead>
            <tr>
            <td>id</td>
            <td>nom</td>
            <td>description</td>
            <td>prix</td>
            <td>image</td>
            <td>stock</td>
            <td>id_categorie</td>
            <td>id_regions</td>
            </tr>
        </thead>
        <tbody>
    <tr>
<form action="index.php?page=adminproduits" method="POST" enctype="multipart/form-data">
<?php
        echo "<td><input type='text' name='id' value='".$productUpdates['id']."'></td>
    <td><input type='text' name='nom' value='".$productUpdates['nom']."'></td>
    <td><textarea name='description' id='' cols='15' rows='15'>".$productUpdates['description']."</textarea></td>
    <td><input type='text' name='prix' value='".$productUpdates['prix']."'></td>
    <td><img  src='style/images/image_product/".$productUpdates['image_url']."'><input type='file' name='image'></td>
    <td><input type='text' name='stock' value='".$productUpdates['stock']."'></td>
    <td><input type='text' name='categorie' value='".$productUpdates['id_categorie']."'></td>
    <td><input type='text' name='region' value='".$productUpdates['id_region']."'></td>
    <td><input type='submit' name='productUpdate'</td>
    </tr>";
?>
        </tbody>
    </table>
    <?php
    endif;
    if(isset($_POST['deleteProduct'])){
        echo $accepte;
    }
    //FORMULAIRE DE PRODUITS S'AFFICHE SI ADMIN AAPUUIE SUR UPDATE
    if(isset($product) && isset($allProducts)):?>
        <form action="index.php?page=adminproduits" method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Porduct name">
        <textarea name="description" id="" cols="30" rows="10" placeholder="Description de produits"></textarea>
        <input type="number" name="prix" placeholder="prix en euro">
        <input type="file" name="image">
        <input type="number" name="stock" placeholder="stock">
        <label for="">Select categorie</label>
        <select name="categorie" id="">
            <?php
            foreach($categories as $key => $categorie){

                echo'<option value="'.$categorie['id'].'">'.$categorie['nom_categorie'].'</option>';
            }
            ?>
        </select>
        <label for="">Select regions</label>
        <select name="region" id="">
            <?php
                foreach($regions as $key => $region){
                    echo'<option value="'.$region['id'].'">'.$region['nom_region'].'</option>';
                }
            ?>
        </select>
        <button type="submit" name="submitProduct">INSERT</button>
        </form>
        <?php
        endif;
       ?>
        </tbody>
        </table>
        </section>
			</section>
		</section>
	</main>

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
	<!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script>


</body>

</html>
