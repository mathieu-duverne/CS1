<?php
require_once "templates/templateHeaderForm.php";
?>
<main>
    <div class="d-md-flex half">
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                        <span><a class="" href="home">Back</a></span>

                            <div class="text-center mb-5">
                                <?= $success['login'] ?>
                                <h3>Login to <strong>Social</strong></h3>
                                <?= $error['email'].$error['password'] ?>
                            </div>
                            <form action="" method="post">
                                <div class="form-group first">
                                    <label for="email">email</label>
                                    <input name="email" type="text" class="form-control" placeholder="your-email@gmail.com" id="email">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Your Password" id="password">
                                </div>
                                <span><a href="signin">you are not register</a></span>
                                <input type="submit" name="login" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg">
        </div>
    </div>
</main>
<?php
require_once "templates/templateFooterForm.php";