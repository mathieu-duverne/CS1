<?php
session_start();
require_once('includes/Vue.php');
require_once('includes/Controller.php');
$pageTitle  = 'Planning';
$vue = new view();
$controller = new controller();
$success = "<p class='alert alert-success'>Reservation validée</p>";
$msgSuccess = $controller->success($_GET,$success);
ob_start();
?>   
  
   <section class="text-center">
        <h1 class="display-4">Welcome click for reservation</h1><br>
        <br>
       <?= $msgSuccess ?>
        <?php
    $month = $controller->getMonth($_GET);
        $year = $controller->getYear($_GET);
    $controller->getExist($_GET);
       
        
        $planning = $vue->build($month, $year);
        echo $planning;
        ?>
</section>
<?php
$pageContent = ob_get_clean();
require_once('includes/layout.php');