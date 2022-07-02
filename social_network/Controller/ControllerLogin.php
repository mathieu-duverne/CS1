<?php

require_once "Controller/Controller.php";

class ControllerLogin extends Controller
{
    public function route_login(){
        if(!isset($_SESSION['user']['email'])) {

            // var error use in vue
            $error = [
                'email' => '',
                'password' => ''
            ];
            $success = [
                'login' => ''
            ];

            // IF USER CLICK ON LOGIN
            if (isset($_POST['login'])) {
                // var secure
                $email = parent::secureVar($_POST['email']);
                $password = parent::secureVar($_POST['password']);

                // if click on REMEMBER ME
                if (isset($_POST['remember'])) {
                    if ($_POST['remember'] = "on") {
                        setcookie("email", $email, time() + 3600);
                        setcookie("pass", $password, time() + 3600);
                    }
                }

                if (parent::validateEmail($email) === false) {
                    $error['email'] = "<div class='alert alert-danger' role='alert'>Enter a valid email address</div>";
                }
                if ($this->user->emailExist($email) === false) {
                    $error['email'] = "<div class='alert alert-danger' role='alert'>Your email is not valid</div>";
                } else {
                    $pass_hash = $this->user->getPasswordViaEmail($email);
                    if (parent::checkPassword($password, $pass_hash['password']) === false) {
                        $error['password'] = "<div class='alert alert-danger' role='alert'>The check passwords are wrong !</div>";
                    } else {
                        $id = $this->user->getIdViaEmail($email);
                        // get statut online 
                        $this->user->getStatutOnline($id['id']);
                        $role = $this->user->getRoleViaEmail($email);
                        $avatar = $this->user->getAvatarViaEmail($email);
                        $firstname = $this->user->getFirstnameViaEmail($email);
                        $surname = $this->user->getSurnameViaEmail($email);
                        $status = $this->user->getStatusViaEmail($email);
                        $_SESSION['user']['id'] = $id['id'];
                        $_SESSION['user']['firstname'] = $firstname['firstname'];
                        $_SESSION['user']['surname'] = $surname['surname'];
                        $_SESSION['user']['email'] = $email;
                        $_SESSION['user']['role'] = $role['role'];
                        $_SESSION['user']['status'] = $status['connect_status'];
                        $_SESSION['user']['avatar'] = $avatar['avatar_url'];
                        $success['login'] = "<div class='alert alert-success'>You are logged</div>";
                        header("refresh:2;url=home");
                    }
                }
            }
        }
        else {
            parent::Redirect("home");
        }
        require "Vue/vueLogin.php";
    }
}