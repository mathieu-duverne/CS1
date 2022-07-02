<?php
require_once "templates/templateHeader.php";
?>
<div class="container">
    <h1 class="display-4 m-5 text-center">Social network</h1>
    <div class="text-primary text-center">
        <i class="far fa-comment-dots fa-7x"></i>
    </div>
    <div class="d-flex justify-content-between align-items-center flex-wrap text-center">
        <?php
        if(isset($_SESSION['user'])){
            ?>
        <div>
            <img  class="rounded-circle mt-5" width="50px" src="./Style/images/avatar/<?= $_SESSION['user']['avatar'] ?>" alt="your avatar"><br><br>
            <em><?= $firstname['firstname'].' '.$surname['surname'] ?></em><br>
            <?= $status['connect_status'] ?></em><br><br>
            <a href="profil" class="btn btn-sm btn-outline-primary">Update</a>
        </div>
        <?php
        }
        ?>
        <div class="text-right"><br><br><br><br>
            <p>Click to see who is connected</p>
            <h5><a href="chat" class="btn btn btn-outline-primary "> User Online  <em> <?= $usersOnline[0]['COUNT(*)'] ?></em></a></h2>
        </div>
    </div>
</div>
<div class="container text-center">
    <h3>Last publication</h3>
    <a class="btn btn-sm btn-outline-primary m-3" href="post">See all publication</a>

    <?= $publication ?>
</div>


<?php
require_once "templates/templateFooter.php";