<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Job01</title>
</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Accueil</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Connexion</a></li>
                <li><a href="index.php">Inscription</a></li>
                <li><a href="index.php"><i class="material-icons search">search</i></a></li>
            </ul>
        </div>
    </nav>
</header>

<section>
    <form action="">
        <p>
            <label>
                <input name="sexe" value="homme" type="radio" checked />
                <span>Homme</span>
            </label>
        </p>
        <p>
            <label>
                <input name="sexe" value="femme" type="radio" />
                <span>Femme</span>
            </label>
        </p>
        <input type="text" placeholder="prenom" name="prenom">
        <input type="text" placeholder="nom" name="nom">
        <input type="text" placeholder="adresse" name="adresse">
        <input type="email" placeholder="email" name="email">
        <label for="">Password</label>
        <input type="password" name="pass">
        <label for="">Password repeat</label>
        <input type="password" name="check_pass">
        <p>
            <label>
                <input type="checkbox" value="Informatique" class="filled-in" />
                <span>Informatique</span>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" value="Voyages" class="filled-in" />
                <span>Voyages</span>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" value="Sport" class="filled-in" />
                <span>Sport</span>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" value="Lecture" class="filled-in" />
                <span>Lecture</span>
            </label>
        </p>
        <input type="button" name="confirmer">
    </form>
</section>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
