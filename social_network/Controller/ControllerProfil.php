<?php

require_once "Controller/Controller.php";

class ControllerProfil extends Controller
{
    public function route_profil() {

        $error = [
          "empty" => '',
          "email" => '',
          "password" => '',
          "img" => ''
        ];
        $success = [
          "save" => ''
        ];
        // IF USER WENT UPDATE INFORMATION

        if(isset($_POST['profil'])) {


            // ---------- CHECK IMAGE ---------- //
            if ($_FILES['avatar']['type']!="" && $_FILES['avatar']['size']!=0) {
                $imageCheck = parent::checkImage();
            }
            else {
                $imageCheck = 3;
            }
            if ($imageCheck != 1 && $imageCheck != 2 && $imageCheck != 3) {
                $image_url = $imageCheck;
            } else { $image_url = "IMG-60cd17124ef4b6.52185263.png"; }


            if(empty($_POST['firstname'])) {
                $firstname = $_SESSION['user']['firstname'];
            }
            else {
                $firstname = parent::secureVar($_POST['firstname']);
            }
            if(empty($_POST['surname'])) {
                $surname = $_SESSION['user']['surname'];
            }
            else {
                $surname = parent::secureVar($_POST['surname']);
            }


            if ($imageCheck == 1) {
                $error['img'] = "<div class='alert alert-danger' role='alert'>Error your file is too large limit 1 MB</div>";
                require_once "Vue/vueProfil.php";
            } else if ($imageCheck == 2) {
                $error['img'] = "<div class='alert alert-danger' role='alert'>Extension is not compatible</div>";
                require_once "Vue/vueProfil.php";
                exit();
            }

            if($_POST['email'] == ""){
                $email = $_SESSION['user']['email'];
            }
            else
            {
                $email = parent::secureVar($_POST['email']);

                if (parent::validateEmail($email) === false) {
                    $error['email'] = "<div class='alert alert-danger' role='alert'>Enter a valid email address</div>";
                    require_once "Vue/vueProfil.php";
                    exit();
                }
                if( $this->user->emailExist($email) === true) {
                    $error['email'] = "<div class='alert alert-danger' role='alert'>Your email is not valid</div>";
                    require_once "Vue/vueProfil.php";
                    exit();
                }
            }

            if(isset($_POST['oldPassword'])) {
                $about = $this->user->getAboutViaEmail($_SESSION['user']['email']);
                if($about['about']===NULL && $_POST['about'] == "") {
                    $about = NULL;
                }
                else {
                    $about = parent::secureVar($_POST['about']);
                }
                $oldPassword = parent::secureVar($_POST['oldPassword']);
                $pass_hash = $this->user->getPasswordViaEmail($_SESSION['user']['email']);
                if (parent::checkPassword($oldPassword, $pass_hash['password'])===false) {
                    $error['password'] = "<div class='alert alert-danger' role='alert'>The check passwords are wrong !</div>";
                    require_once "Vue/vueProfil.php";
                    exit();
                }
                else if(parent::regexPassword($_POST['password']) === false) {
                    $error['password'] = "<div class='alert alert-danger' role='alert'>The new password must contain (Min : 1 uppercase, 1 lowercase, 1 number & length greater than 8)</div>";
                }
                else {
                    $password = parent::secureVar($_POST['password']);
                    $password_hashe = parent::password_hash($password);
                    $id = $_SESSION['user']['id'];
                    $role = $this->user->getRoleViaEmail($_SESSION['user']['email']);
                    $_SESSION['user']['firstname'] = $firstname;
                    $_SESSION['user']['surname'] = $surname;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['role'] = $role['role'];
                    $_SESSION['user']['about'] = $about;
                    $_SESSION['user']['avatar'] = $image_url;
                    $this->user->updateProfilUser($firstname, $surname, $email, $password_hashe, $about, $role['role'], $image_url, $id );
                    $success['save'] = "<div class='alert alert-success'>Information are saved</div>";
                    header("refresh:2;url=profil");
                }
            }
        }
        require_once "Vue/vueProfil.php";
    }
}