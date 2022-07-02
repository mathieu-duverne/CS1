<!doctype html>
<html lang="fr">

	<head>
		<title>Administration regions</title>
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

	<h1 id="title">Administration des régions</h1>
		<a class="adminlinks" href="index.php?page=admin">BACK</a>
    <?= $error['empty'].$success['insert'].$success['update'].$success['delete'] ?>
    <h2>ALL regions</h2>

    <?php
    //SELECT ALL regions
    if(isset($regions)):
        ?>
    <table>
        <thead>
        <tr>
        <th>id</th>
        <th>nom</th>
        </tr>
        </thead>
        <tbody><tr>
<?php
        for($i=0;isset($regions[$i]);$i++){
            echo"<td>".$regions[$i]['id']."</td>
                <td>".$regions[$i]['nom_region']."</td>
    <td><form action='index.php?page=adminregions' method='POST'><button name='updateRegion' value='".$regions[$i]['id']."'>Update</button></form></td>
    <td><form action='index.php?page=adminregions' method='POST'><button name='deleteRegion' value='".$regions[$i]['id']."'>Delete</button></form></td>
                </tr>";
        }

?>
        </tbody>
    </table>
    <form action="" method="POST">
                <label for="">Régions</label>
                <input type="text" name="regions">
                <input type="submit" name="insertRegion">
            </form>
    <?php endif;
    //solo for update
        if(isset($region)):
    ?>
    <table>
    <thead>
            <tr>
                <th>id</th>
                <th>region</th>
                <th>#</th>
            </tr>
    </thead>
    <tbody>
            <tr>
            <form action="" method="POST">
                <?php
                    echo "<td><input type='number' name='id' value='".$region['id']."'</td>
                    <td><input type='text' name='nom' value='".$region['nom_region']."'></td>
                    <td><input type='submit' name='submitUpdate'></td></form>
                    </tr>";
?>

    </tbody>

    </table>
    <?php endif; ?>
			</section>
			</section>
			</main>

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script>
		</body>

</html>
