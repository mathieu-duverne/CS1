<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job01</title>
</head>
<body>
<h1>Bienvenue</h1>
<?php
session_start();
if(!isset($_SESSION['email'])){
echo"<button type='button' id='register' name='inscription'>Inscription</button>";
echo"<button type='button' id='login' name='connexion'>Connexion</button>";
}
else
{
    echo"Bienvenue". " " .$_SESSION['prenom']."<br>";
    echo"<a href='deconnexion.php'>Déconnexion</a>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>