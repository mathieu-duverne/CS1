<?php 
session_start();
require_once('includes/Model.php');
$pageTitle  = 'Reservation';
$model = new Model();
//var_dump($_GET['id']);
//var_dump($_SESSION);
//var_dump($evenement);
ob_start();
$id_event = $_GET['id'];
$evenement = $model->selectbooksid($id_event);
 ?>
 	<section class="text-center">
 	<div style="margin-top:50px;" >
 		<h1>Reservation</h1>
           <br><br>
           <?php if(isset($_SESSION['id'])){ ?>
            <div class="text-center">
 		    <div class="card bg-light container">
   <?php for($u=0;isset($evenement[$u]);$u++){ ?>
      <div class="card-header"><h2><?= $evenement[$u]; ?></h2></div>
      <div class="card-body">
      <?php
$u++;
$id_user = $evenement[$u];
$table_user = $model->selectid($id_user);
          ?>
    <h3 class="card-title">de <?= $table_user['login']; ?></h3>
    <?php $u++; ?>
    <h5 class="card-text"> <?= $evenement[$u]; ?></h5>
    <?php
$u++; 
$heuredebut=$evenement[$u]; 
$debut = date('H:i', strtotime($heuredebut));
$u++;
$heurefin=$evenement[$u];
$fin = date('H:i', strtotime($heurefin));      
?>
<p>de <?= $debut ?>h  à <?= $fin ?>h  </p>
<?php   break; } ?>
  </div>
</div>
    </div>
    <?php }
            
        else{
            echo"<br><p>Tu dois te connecté pour voir les Events<p><a href='login.php' class'btn btn-info'>Connecte toi</a>";   
        }
?>
    <br><br><br>
    </div>
 	</section>
 <?php
 $pageContent = ob_get_clean();
 require_once('includes/layout.php');