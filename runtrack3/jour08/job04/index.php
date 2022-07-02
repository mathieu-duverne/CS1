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
    <title>Job04</title>
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
        <div>
            <i class="material-icons perm_identity">perm_identity</i>
            <input type="text" placeholder="prenom" name="prenom">
        </div>
        <div>
            <i class="material-icons person">person</i>
            <input type="text" placeholder="nom" name="nom">
        </div>
        <div>
            <i class="material-icons location_city">location_city</i>
            <input type="text" placeholder="adresse" name="adresse">
        </div>
        <div>
        <i class="material-icons mail_outline">mail_outline</i>
        <input type="email" placeholder="email" name="email">
        </div>
        <div>
            <i class="material-icons vpn_key">vpn_key</i>
            <label for="">Password</label>
            <input type="password" name="pass">
            </div>
        <div>
            <i class="material-icons vpn_key">vpn_key</i>
        <label for="">Password repeat</label>
        <input type="password" name="check_pass">
        </div>
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
        <input type="button" value="Validé" name="confirmer">
    </form>
</section><br>




<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
