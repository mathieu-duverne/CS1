<?php

require_once "Controller/Controller.php";

class ControllerSignin extends Controller
{

    public function route_signin()
    {
        if(!isset($_SESSION['user']['email'])) {
            // var error use in vue
            $error = [
                'field' => '',
                'email' => '',
                'password' => '',
                'img' => ''
            ];
            $success = [
                'register' => ''
            ];
            if (isset($_POST['signin'])) {
                // var secure post
                $firstname = parent::secureVar($_POST['first']);
                $surname = parent::secureVar($_POST['sur']);
                $email = parent::secureVar($_POST['email']);
                $password = parent::secureVar($_POST['password']);
                $password2 = parent::secureVar($_POST['password2']);
                $password_hash = parent::password_hash($password2);

                // ---------- CHECK IMAGE ---------- //
                if ($_FILES['avatar']['type'] != "" && $_FILES['avatar']['size'] != 0) {
                    $imageCheck = parent::checkImage();
                } else {
                    $imageCheck = 3;
                }

                if (parent::isEmptyUser($firstname, $surname, $email, $password, $password2) === false) {
                    $error['field'] = "<div class='alert alert-danger' role='alert'>Fill in the required fields</div>";
                } else if ($imageCheck == 1) {
                    $error['img'] = "<div class='alert alert-danger' role='alert'>Error your file is too large limit 1 MB</div>";
                } else if ($imageCheck == 2) {
                    $error['img'] = "<div class='alert alert-danger' role='alert'>Extension is not compatible</div>";
                } else if (parent::validateEmail($email) === false) {
                    $error['email'] = "<div class='alert alert-danger' role='alert'>Enter a valid email address</div>";
                } else if ($this->user->emailExist($email) === true) {
                    $error['email'] = "<div class='alert alert-danger' role='alert'>This email have already an account</div>";
                } else if (parent::regexPassword($password) === false) {
                    $error['password'] = "<div class='alert alert-danger' role='alert'>The password must contain Min : 1 uppercase, 1 lowercase, 1 number & length greater than 8</div>";
                } else if (parent::checkPassword($password, $password_hash) === false) {
                    $error['password'] = "<div class='alert alert-danger' role='alert'>The check passwords are wrong !</div>";
                } else {
                    if ($imageCheck != 1 && $imageCheck != 2 && $imageCheck != 3) {
                        $image_url = $imageCheck;
                    } else {
                        $image_url = "IMG-60cd17124ef4b6.52185263.png";
                    }
                    $role = 1;
                    $this->user->registerUser($firstname, $surname, $email, $password_hash, $role, $image_url);
                    $success['register'] = "<div class='alert alert-success'>You are registred on ...</div>";
                    header("refresh:2;url=login");
                }
            }
        }
        else {
            parent::Redirect("home");
        }
        require "Vue/vueSignin.php";
    }
}