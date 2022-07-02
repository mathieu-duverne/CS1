<?php
require_once "templates/templateHeader.php";
?>
<main class="container">
    <form method="post">
        <div class="mb-3">
            <br>
            <h4>Create your publication</h4>
            <span class="">* fields must be completed</span>
            <div id="result"></div>
            <div id="error"><?= $error['empty'] ?></div>
            <hr class="bg-primary border-primary">
            <input id="title" placeholder="Title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <textarea id="text" placeholder="Here go write your publication" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div>
            <a onclick="post()" class="btn btn-primary">Published</a>
        </div>
    </form><br>
    <h2 class="text-center">Publication</h2>

    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
            <a href="post" class="btn btn-sm btn-outline-secondary m-auto">latest</a>
            <a href="post?sort=older" class="btn btn-sm btn-outline-secondary m-auto">older</a>
        </div>
        <div class="input-group">
            <div id="response"></div>
            <form class="d-flex">
                <input id="search" onkeyup="autoCompletion()" class="form-control me-2" type="text" placeholder="Search publication" aria-label="Search">
                <a  class="btn btn-sm btn-outline-primary" >Search</a>
            </form>
        </div>
    </div>
    <hr class="bg-primary border-primary"><br>
    <div id="success"></div>

    <div id="publication">
        <?= $publication ?>
    </div>


</main>
<?php
require_once "templates/templateFooterPost.php";
