<!doctype html>
<html lang="fr">

	<head>
		<title>Administrer Utilisateurs</title>
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

            <?= $success['accept'].$success['update'].$success['delete'].$error['empty'].$error['address']?><br>

				<?php
            //GERER LES UTILISATEURS//
        if(isset($user)):
            ?>
						<h1 id="title">Administrer vos utilisateurs</h1>
        <table>
        <a class="adminlinks" href="index.php?page=admin">Retour Menu Admin</a>
        <thead>
            <tr>
            <th>id</th>
            <th>login</th>
            <th>email</th>
            <th>password</th>
            <th>id droits</th>
            <th>update</th>
            <th>delete</th>
                <th>adresse</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach($user as $users){
                if($users['id']!=0){
                echo "<td>".$users['id']."</td>
                    <td>".$users['login']."</td>
                    <td>".$users['email']."</td>
                    <td>".$users['password']."</td>
                    <td>".$users['id_droits']."</td>
                    <td>
                    <form action='index.php?page=adminuser' method='POST'><button class='btnUpdate' name='update' value='".$users['id']."'><i class='fas fa-wrench''></i></button></form>
                    </td>
                    <td>
                    <form  action='index.php?page=adminuser' method='POST'><button class='btnDelete' name='delete' value='".$users['id']."'><i class='far fa-trash-alt'></i></button></form>
                    </td>
                    <td>
                    <form action='index.php?page=adminuser' method='POST'><button class='btnAddress' name='address' value='".$users['id']."'><i class='far fa-address-card'></i></button></form>
</td>
                </tr>";
            }
        }
            echo"</tbody></table>";
    endif;
//    USER UPDATE AN USER
     if(isset($userUpdate)):?>
         <a class="adminlinks" href="index.php?page=adminuser">Retour</a>
    <table>
        <thead>
            <tr>
            <th>id</th>
            <th>login</th>
            <th>email</th>
            <th>password</th>
            <th>id droits</th>
            </tr>
        </thead>
        <tbody>
    <tr>
<form action="index.php?page=adminuser" method="POST">
<?php
        echo "<td><input type='text' name='id' value='".$userUpdate['id']."'></td>
    <td><input type='text' name='login' value='".$userUpdate['login']."'></td>
    <td><input type='text' name='email' value='".$userUpdate['email']."'></td>
    <td><input type='text' name='password' value='".$userUpdate['password']."'></td>
    <td><input type='text' name='id_droits' value='".$userUpdate['id_droits']."'></td></tr>";
?>
        </tbody>
    </table>
<button type="submit" name="updateUser">Update user</button>
</form>
     <?php
     endif;
//     LISTER ADDRESSE
     if (!empty($user_Address)): ?>
         <a href="index.php?page=adminuser">BACK</a>
    <table>
        <tr>
        <th>prenom</th>
        <th>nom</th>
        <th>telephone</th>
        <th>email</th>
        <th>addresse</th>
        <th>addresse_comp</th>
        <th>ville</th>
        <th>code_postale</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
            <?php
            for($a=0;isset($user_Address[$a]);$a++){
                echo"<td>".$user_Address[$a]['prenom']."</td>
                    <td>".$user_Address[$a]['nom']."</td>
                    <td>".$user_Address[$a]['telephone']."</td>
                    <td>".$user_Address[$a]['email']."</td>
                    <td>".$user_Address[$a]['addresse']."</td>
                    <td>".$user_Address[$a]['addresse_comp']."</td>
                    <td>".$user_Address[$a]['ville']."</td>
                    <td>".$user_Address[$a]['code_postale']."</td>
                    <td><form action='index.php?page=adminuser' method='POST'><button class='btnUpdate' name='updateAddress' value='".$user_Address[$a]['id']."'><i class='fas fa-wrench''></i></button></form></td>
                    <td><form action='index.php?page=adminuser' method='POST' action=''><button class='btnDelete' name='deleteAddress' value='".$user_Address[$a]['id']."'><i class='far fa-trash-alt'></i></button></form></td>
                    </tr>";
            }

            ?>
    </table>
     <?php
     endif;
//     SI ADMIN UPDATE USER_ADDRESS LISTE SOLO ADDRESS
            if(isset($updateAddr)):?>
                <a href="index.php?page=adminuser">BACK</a>
       <?php
       echo"<form action='' method='POST'><br>
                 prenom
                <input name='prenom' type='text' value='".$updateAddr['prenom']."'>
                nom
                <input name='nom' type='text' value='".$updateAddr['nom']."'>
                telephone
                <input name='telephone' type='text' value='".$updateAddr['telephone']."'>
                email
               <input name='email' type='text' value='".$updateAddr['email']."'>
               addresse
                <input name='addresse' type='text' value='".$updateAddr['addresse']."'><br><br>
                compelement d'adresse
                <input name='addresse_comp' type='text' value='".$updateAddr['addresse_comp']."'>
                ville
                <input name='ville' type='text' value='".$updateAddr['ville']."'>
                code postale
                <input name='code_postale' type='text' value='".$updateAddr['code_postale']."'>
                <input type='submit' name='update_Adresse_User' value='Update'>
                </tr>";
                    ?>
                </form>
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
