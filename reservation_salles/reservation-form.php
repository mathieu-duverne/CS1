<?php 
session_start();
require_once('includes/Model.php');
require_once('includes/Controller.php');
$pageTitle  = 'Reservation de salle'; 
$model = new Model();
$controller = new controller();

//traitement des donnée recu par l'url
$date = $controller->dateBook();
$controller->notWeek();
$month = $controller->getMonths();
$year = $controller->getYears();

$error = [                                                       'empty' => '',
  'book' => '',
  'password' => ''
];

//ici on traite les donée recu par l'user
if(isset($_POST['submit'])){
    $error['empty'] = $controller->verifPost($_POST);
    
 if($controller->verifPost($_POST)=== false){
    $debut = $controller->getFormatStart($date);
     
if ($model->bookexist($debut)=== -1) {
    $error['book'] = "<p class='alert alert-success'>Already exists</p>";
}
 if($model->bookexist($debut)===1){
     
     if($controller->calculInt($_POST)===false){
         $error['book'] = "<p class='alert alert-success'>Enter a reservation valid for only one hour</p>";
     }
else{ 
    $titre = $controller->getTitle();
    $desc = $controller->getDesc();
    $fin = $controller->getFormatEnd($date);
    $id_user = $controller->getId();
        $model->insertresa($titre, $desc, $debut, $fin, $id_user);
        $controller->Redirect("planning.php?month=".$month."&year=".$year."&success=1");  
                }  
            }
        }
    }
ob_start(); 
//ici on traduit function traduit mois jour ect 
$dateFR = $controller->dateToFrench($date, "l j F Y");
?>
 	<section  class="text-center">
     <h1 class="display-4">Reservation for the <?php echo $dateFR; ?></h1><br>
 		<form class="form-signin" action="" method="post">
             <div class="mb-3">
 			<input class="form-control" type="text" name="titre" placeholder="title"><br>
             </div>
             <input class="form-control" type="text" name="description" placeholder="description"><br>
 			<label class="form-control" for="">8am Min </label><br>
 			<input class="form-control" type="time" id="debut" value=" <?php $time ?>" name="debut" min="08:00" max="18:00" step="3600" required>
 			<br>
 			<label class="form-control" for="">19pm Max</label><br>
 			<input class="form-control" type="time" id="appt" name="fin" min="09
 			:00" max="19:00" step="3600" required><br>
 			<input class="form-control" type="submit" name="submit">
 			<?= $error['empty'].$error['book'] ?>
 		</form>
 	</section> 
 <?php
    $pageContent = ob_get_clean();
 require_once('includes/layout.php');
    ?>