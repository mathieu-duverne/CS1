<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $pageTitle ?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/style.css">
</head>
<body>
	<header>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Module reservation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['login'])){?>
      <li class="nav-item">
        <a class="nav-link" href="planning.php<?php echo "?month=".date('m')."&year=".date('Y').""; ?>">Planning<span class="sr-only sr-only-focusable">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil<span class="sr-only sr-only-focusable">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">sign out<span class="sr-only sr-only-focusable">(current)</span></a>
      </li>
    <?php }?>
    <?php if(!isset($_SESSION['login'])){?>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php">Register<span class="sr-only sr-only-focusable">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">sign in</a>
      </li>
<?php
}
?>
    </ul>
  </div>
</nav>
	</header>
	
	<main>
	    <?= $pageContent ?>
	</main>

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</html>