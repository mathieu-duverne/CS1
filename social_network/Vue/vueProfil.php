<?php
require_once "templates/templateHeader.php";
?>
<main>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img onclick="hideShowInput()" class="rounded-circle mt-5" style="cursor: pointer" width="150px" src="./Style/images/avatar/<?= $_SESSION['user']['avatar'] ?>" alt="your avatar">
                    <div class="mb-12" id="inputAvatar" style="display: none">
                        <label for="formFileSm" class="form-label">png, jpeg, jpg, svg, webp <br> Max size < 1Mb </label><br>
                        <input name="avatar" class="form-control-sm" id="formFileSm" type="file">
                    </div>
                    <span id="inputCLick" style="display: block" class="text-black-50">click on avatar for change</span>
                    <span class="font-weight-bold"><?= $_SESSION['user']['firstname']." ".$_SESSION['user']['surname'] ?></span>
                    <span><?= $_SESSION['user']['email'] ?></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <?= $success['save'].$error['email'].$error['img'].$error['password'] ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings *</h4>
                        <h6 class="text-left">(password must be completed)</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Firstame</label><input type="text" name="firstname" class="form-control" placeholder="<?= $_SESSION['user']['firstname'] ?>"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="surname" class="form-control" placeholder="<?= $_SESSION['user']['surname'] ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" class="form-control"  placeholder="<?= $_SESSION['user']['email'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Old password</label><input name="oldPassword" type="password" class="form-control" value="password"></div>
                        <div class="col-md-12"><label class="labels">Password</label><input name="password" type="password" class="form-control" value="password"></div>
                        <div class="col-md-12"><label class="labels">About</label><input type="text" name="about" class="form-control" placeholder="<?php if(isset($_SESSION['user']['about'])){ echo $_SESSION['user']['about']; } else echo"About you"; ?>"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name='profil' type="submit">Save Profile</button></div>
                </div>
            </div>
            </form>
            <div class="col-md-4">
                <div class="p-3 py-5">
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once "templates/templateFooterProfil.php";
