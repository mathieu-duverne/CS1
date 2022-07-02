<?php
require_once "templates/templateDashboard.php";
echo $header;
?>
<div class="container-fluid  text-center">
    <h1 class="m-3">Welcome to your Dashboard</h1>
    <div class="row">
        <div class="card col-12 p-2 mb-4 text-left">
            <div class="card-body">
                <h2 class="card-title">Number of customers <strong><em><b><?= $nbrUsers[0]["COUNT(*)"] ?></b></em></strong></h2>
                <p class="card-text">Customers never connected <strong><em><b><?= $nbrNeverConnected[0]["COUNT(*)"] ?></b></em></strong></p>
                <div class="column">
                    <p class="fs-4">Online <strong><em><b><?= $nbrOnline[0]["COUNT(*)"] ?></b></em></strong></p>
                    <p class="fs-4">Offline <strong><em><b><?= $nbrOffline[0]["COUNT(*)"] ?></b></em></strong></p>
                </div>
            </div>
        </div>
        <div class="card col-12 p-2 mb-4 text-right">
            <div class="card-body">
                <h5 class="card-title">Website vues</h5>
                <p class="card-text fs-1"><strong><em><b><?= $current ?></b></em></strong></p>
            </div>
        </div>
        <div class="card col-12 p-2 mb-4 text-left">
            <div class="card-body">
                <h5 class="card-title">Number of publication on website</h5>
                <p class="card-text fs-1"><strong><em><b><?= $nbrPosts[0]["COUNT(*)"] ?></b></em></strong></p>
            </div>
        </div>
        <div class="card col-12 p-2 mb-4 text-right">
            <div class="card-body">
                <h5 class="card-title">Messages send</h5>
                <p class="card-text fs-1"><strong><em><b><?= $nbrChats[0]["COUNT(*)"] ?></b></em></strong></p>
            </div>
        </div>     
    </div>
<div>
</div>
</div>
    </main>
<?php
echo $footer;
