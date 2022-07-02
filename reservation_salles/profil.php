<?php
session_start();
require_once('includes/Model.php');
require_once('includes/Controller.php');
$pageTitle = "Profil";
$model = new Model();
$controller = new controller();

      $login = $password = $password_conf = '';       
$error = [                                                       'empty' => '',
  'login' => '',
  'password' => ''
];
$error['empty'] = $controller->verif($_POST); 

if($error['empty']===false){
    
      $login = htmlspecialchars($_POST['login']);
      if ($model->exists($login)===-1) {
      	$error['login'] = "<p class='alert alert-danger'>Login deja pris</p>";
      }
if($model->exists($login)===1){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $password_conf = htmlspecialchars($_POST['password_conf']);
      if ($controller->verifyPass($password_conf, $password) === false) {
          $error['password'] = "<p class='alert alert-danger'>Invalid password</p>";	
      }
      else{
      	 $id = $_SESSION['id'];
      	$model->update($login, $password, $password_conf, $id);
      	$controller->Redirect("profil.php");
      }
    }
  }
ob_start();
?>
<section class="text-center">
<?php if (isset($_SESSION['login'])) { ?>
 				<h3 class="display-4 text-center">Change tes informations</h3>
 				<form class="text-center container" method="POST" action="profil.php">
 <label for="">Change ton login</label>
 <input class="form-control" type="text" value="<?php echo $_SESSION['login'];?>" name="login"><br>
 <?= $error['login'] ?>
 <label for="">Change ton mot de passe</label>
 <input class="form-control" type="password" name="password" value="<?php echo $_SESSION['pass'] ?>">
 <label for="">Change ton nouveau mot de passe</label>
 <input class="form-control" type="password" name="password_conf" value="<?php echo $_SESSION['pass'] ?>"><br>
  <?= $error['password'].$error['empty'] ?>
 <input  class="btn btn-lg btn-primary btn-block p-3" type="submit" name="submit"><br>
             
 				</form>
 		<?php }
 		if (!isset($_SESSION['login'])) {
 			echo "<div class=\"text-center\"<h1 class=\"alert alert-danger\">Veuillez vous inscrire ou vous connectez please</h1></div>";
 		} 
?>
</section>
<?php
 $pageContent = ob_get_clean();

require_once('includes/layout.php');
      
