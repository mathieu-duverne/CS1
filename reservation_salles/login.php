<?php 
session_start();
require_once'includes/Model.php';
require_once'includes/Controller.php';
$pageTitle  = 'Connexion';
$model = new Model();
$controller = new controller();
$success = "<p class='alert alert-success'>Vous avez était enregistrer</p>";
$msgSucess = $controller->success($_GET,$success);
$error = [                                                       'empty' => '',
  'login' => '',
  'password' => ''
];

if (isset($_POST['submit'])) {
    $error['empty'] = $controller->checkLogs($_POST);
    if($controller->checkLogs($_POST) === false){
        $login = $controller->getLogin();
    if($model->exists($login)===1){
        $error['login'] = "<p class='alert alert-danger'>Login invalide</p>";   
        }
    }
        $login = $controller->getLogin();
if($model->exists($login)===-1){   
        $password_conf = $model->selectPassHash($login);
        $password = $controller->getPass();
    if($controller->verifyPass($password,               $password_conf)===false){
        $error['password'] = "<p class='alert alert-danger'>Password Invalid</p>";   
    }
    else
    {   
            $model->selectUser($login);
            $_SESSION['pass']= $password;
            $controller->Redirect('index.php');
            }
        }       
    }
ob_start();
?>
<section class="login text-center">
	 <form class="form-signin" action="login.php" method="POST">
	 <?= $msgSucess ?>
	 	<h1 class="display-4">Connecte toi</h1>
	 	<p class="text-xl-center font-weight-light">Reservation salles</p>
	 	<div class="checkbox mb-3"></div>
	 	<br>
 	<input class="form-control"  name="logconnect" type="text" placeholder="Login"><br>
 	<?= $error['login'] ?>
 	<input class="form-control"  name="passconnect" type="password" placeholder="mot de passe"><br>
 	<?= $error['password'].$error['empty'] ?>
 	<input class="btn btn-lg btn-primary btn-block" value="Connexion"  type="submit" name="submit"><br>

 	<a class="text-center" href="inscription.php">s'inscrire</a>
    </form>
 	</section>
<?php
 $pageContent = ob_get_clean();
 require_once('includes/layout.php');
 ?>


