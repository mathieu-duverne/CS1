<?php 
require_once('includes/Model.php');
session_start();
//voir header $pagetitle = title
$pageTitle  = 'Accueil';
 ob_start();
?>
    <section class="text-center">
	<h1 class="display-4">Welcome to my Module reservation</h1>
	<h5>My calendar is displayed month by month and you can only book between 8am and 7pm every day EXCEPT the weekend!</p>
	<img src="image/google.png" alt="logo de mon agenda">
	<br><br><br>
</section>
<?php
$pageContent = ob_get_clean();
require_once('includes/layout.php');
