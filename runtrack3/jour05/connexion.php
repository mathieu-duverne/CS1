<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
<form action="connexion.php" method="post" enctype="multipart/form-data">
    Email
    <input id="email" name="email" type="email"><br>
    <div id="error_wrong_email">
    </div>
    Password
    <input id="password" name="password" type="password"><br>
    <div id="error_wrong_password">
    </div>
    <button type="button" name="Connexion" value="1" id="recuperation">Connexion</button><br>
    <div id="error_empty">
    </div>
    <div id="resulte">

    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="scriptConnexion.js"></script>
</body>
</html>
