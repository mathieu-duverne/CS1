<?php
require_once "templates/templateHeaderForm.php";
?>
<main class="d-md-flex half">
        <div class="bg">
        </div>
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="nav-item">
                        </div>
                        <div class="form-block mx-auto">
                        <a href="home">Back</a>
                            <div class="text-center">
                                <?= $success['register'] ?>
                                <h3>Sign-in to <strong>Social</strong></h3>
                                <p>required field [ * ]</p>
                            </div>
                            <div>
                                <?= $error['field'].$error['email'].$error['password'].$error['img'] ?>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group first">
                                    <label for="email">Firstname *</label>
                                    <input type="text" class="form-control" name="first" placeholder="john" id="first">
                                </div>
                                <div class="form-group first">
                                    <label for="email">Surname *</label>
                                    <input type="text" class="form-control" name="sur" placeholder="Doe" id="sur">
                                </div>
                                <div class="form-group first">
                                    <label for="email">Email *</label>
                                    <input type="text" class="form-control" name="email" placeholder="your-email@gmail.com" id="email">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password *</label>
                                    <p>Min : 1 uppercase, 1 lowercase, 1 number & length greater than 8</p>
                                    <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="check_password">Check Password *</label>
                                    <input type="password" class="form-control" name="password2" placeholder="Check your Password" id="check_password">
                                </div>
                                <div class="form-group first">
                                    <label for="avatar">Avatar ( png / jpeg / jpg / svg / webp  :  Max Size < 1Mb )</label>
                                    <input value="" type="file" id="avatar" name="avatar">
                                </div>
                                <input type="submit" name="signin" value="Sign In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<?php
require_once "templates/templateFooterForm.php";