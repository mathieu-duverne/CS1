<?php
require_once ('Controller.php');
class ControllerDashboardUser extends Controller
{

    public function route_dashboarduser() {
        if($_SESSION['user']['role']==="791801") {

            // ----- TABLE BODY OF ALL USERS ----- //
            $tableBody = parent::tableOfAllUsers();

            // ------ ADMIN UPDATE USER ------ //
                if(isset($_POST['firstname'])) {
                    $id = intval($_POST['id']);
                    $firstname = parent::secureVar($_POST['firstname']);
                    $surname =  parent::secureVar($_POST['surname']);
                    $email =parent::secureVar($_POST['email']);
                    $role = parent::secureVar($_POST['role']);
                    $avatar_url = parent::secureVar($_POST['avatar_url']);
                    //finir func UPDATE
                    $User = [
                        'firstname' => $firstname,
                        'surname' => $surname,
                        'email' => $email,
                        'role' => $role,
                        'image_url' => $avatar_url
                    ];
                    $response =  $this->user->updateUser($firstname,$surname, $email, $role, $avatar_url, $id);
                    echo "<p style='display: none'>".json_encode($response)."</p>";
                    exit();
                }

            // ------ ADMIN UPDATE USER ------ //
            if(isset($_POST['deletes'])) {
                $id_user = $_POST['deletes'];
                if($id_user != 1) {
                    echo"<br>";
                    echo"<br>";
                    echo"<br>";
                    echo"<br>";
                    echo"<br>";
                    var_dump($id_user);
                    $response = $this->user->deleteUser($id_user);
                    echo "<p style='display: none'>".json_encode($response)."</p>";
                    exit();
                }
                else {
                    parent::Redirect("dashboarduser");
                    exit();
                }
            }


            // ----- IF UPDATE USER ----- //
                if(isset($_GET['update'])) {
                    $id = intval($_GET['update']);
                }
            }
            else {
                parent::Redirect("home");
            }
        require_once "Vue/vueDashboardUser.php";
    }
}