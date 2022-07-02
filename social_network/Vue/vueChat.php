<?php
require_once "templates/templateHeader.php";
?>
<section class="d-flex justify-content-center">
<main onload="displayUser()" class='container border m-5'>
<div class='container col-12 pt-1'> 
    <h1 class="display-4 text-center">Messaging</h1>
    <div class='row'>
        <div id="profilUser" class='col-5 text-center'>
            <img class="rounded-circle mt-2" width="60px" src="./Style/images/avatar/<?= $_SESSION['user']['avatar'] ?>" alt="your avatar">
            <h6><?= $_SESSION['user']['firstname']." ".$_SESSION['user']['surname'] ?></h6>
        </div>
            <div id="searchBar" class='col-7 col-5-md text-center pt-4'>
                <form class='d-inline-flex'>
                    <input id="search" onkeyup="autoCompletionUser()" class="form-control me-2" type="text" placeholder="Find user" aria-label="Search">
                    <button class="btn btn-sm btn-outline-primary">Search</button>
                </form>
           </div>
       </div>
    </div>
    <div id="backToDisplayUser"></div>
    <hr class='bg-secondary border-secondary'>
    <div id='userListOnline' class='container col-12'>
        <?php
        if(isset($infoUsers))
        {
         echo $infoUsers;  
        }
        ?>
    </div>  
    <hr class='bg-secondary border-secondary'>
</div>  
</main>    
</section>
<?php
require_once "templates/templateFooterChat.php";