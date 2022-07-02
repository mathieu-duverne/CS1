<?php 
require_once'includes/Model.php';
require_once'includes/Controller.php';
$pageTitle  = 'Inscription';
$controller = new controller();
$model = new Model();
$login = $password = $password_conf = '';       
$error = [                                                       'empty' => '',
  'login' => '',
  'password' => ''
];
$error['empty'] = $controller->verif($_POST); 
if($error['empty']===false){
    $login = htmlspecialchars($_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
     
    $password_conf = htmlspecialchars($_POST['password_conf']);
     $controller->verifyPass($password_conf, $password);
    
    if($model->exists($login)===-1){
        $error['login'] = "<p class='alert alert-danger'>Login deja pris</p>";
    }
        if($model->exists($login)===1){   
            if($controller->verifyPass($password_conf,             $password)===false){
                $error['password'] = "<p class='alert alert-danger'>mot de passe non identique</p>";
        }
                else{
                    $model->insert($login, $password);
                    $controller->Redirect("login.php?success=1");
        }
    }
}
ob_start();
?>
<section class="text-center container">
		<br>
		<form class="text-center border border-light p-4" method="post" action="inscription.php">
			 <p class="h4 mb-4">Inscritpion</p>
			<div class="form-row p-3">
				<div class="col">
	<input class="form-control p-2" name="login" type="text" placeholder="Login">
</div>

</div>
	<?= $error['login'] ?>
<div class="form-row p-3">
				<div class="col">
	<input class="form-control p-2" name="password" type="password" placeholder="mot de passe">
	</div>
</div>
<div class="form-row p-3">
				<div class="col">
	<input class="form-control p-2" name="password_conf" type="password" placeholder="Confirme ton mot de passe">
	</div><br><br>
</div>
	<?= $error['password'].$error['empty']?>
<div class="form-row p-3">
				<div class="col">
	<input class="form-control btn btn-primary" type="submit" name="submit">
	<br>
	<br>
	<a class="btn btn-primary-outliner" href="login.php">Connexion</a>
		</div>	
	</div>
		</form>
    </section>
    <?php
$pageContent = ob_get_clean();
require_once('includes/layout.php');