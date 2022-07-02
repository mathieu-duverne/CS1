<?php
require_once "Controller/Controller.php";

class ControllerDashboardPost extends Controller
{
public function route_dashboardpost(){
    if($_SESSION['user']['role']==="791801") {
        $tableBody = parent::tableOfAllPosts();
        // ------ ADMIN UPDATE USER ------ //
        if(isset($_POST['delete'])) {
            $id = intval($_POST['delete']);
            if(intval($_POST['delete'])) {
                $response = $this->post->deletePostViaId($id);
                echo "<p style='display: none'>".json_encode($response)."</p>";
                exit();
            }
        }
    }
    else {
        parent::Redirect("home");
    }
    require "Vue/vueDashboardpost.php";
}

}