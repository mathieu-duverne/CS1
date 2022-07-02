<?php

require_once "Controller/Controller.php";

class ControllerPost extends Controller
{

    public function route_post()
    {

        $error = [
            'empty' => ''
        ];
        
        // ------ DISPLAY ALL publication REQUEST POST in bdd IN AJAX------ //
        if (!isset($_POST['search']) && !isset($_GET['sort'])) {
            $result = $this->post->selectPost();
        }
        if(isset($_GET['sort'])){
        if($_GET['sort']=="older" && !isset($_POST['search'])) {
            $result = $this->post->selectOlderPost();
        }
    }

        if(isset($_POST['search'])){
            $search = parent::secureVar($_POST['search']);
            $results = $this->post->selectViaSearchPost($search);
            if(empty($results)){
                echo "<div class='alert alert-light text-center'><span class='text-center'>nothing has been found</span></div><br>";
            }
            $publication = parent::displayPost($results);
            echo $publication;
            die();
        }

        if(isset($result)) {
           $publication = parent::displayPost($result);
        }


        // ------- IF USER DELETE HIM POST
        if(isset($_POST["reqDelete"])) {
            $id = intval($_POST['id']);
            $this->post->deletePostViaId($id);
        }

        // ------- IF USER UPDATE HIM POST
        if(isset($_POST['updateTitle'])) {

            if(empty($_POST['updateTitle']) && empty($_POST['updateTexte'])) {
                $error['empty'] = "<div class='alert alert-danger'>you didn't change anything</div>";
                die();
            }
            else {
                $id = $_POST['id'];
                $updateTitle = parent::secureVar($_POST['updateTitle']);
                $updateTexte = parent::secureVar($_POST['updateTexte']);
                $this->post->updatePostViaId($id, $updateTitle, $updateTexte);
                die();
            }
        }

        // ------ IF USER POST A PUBLICATION insert in bdd IN AJAX------ //
        if(isset($_POST['title']) && isset($_POST['title'])) {
            if(!isset($_SESSION['user']['id'])){
                echo"R";
                die();
            }
            if (!empty($_POST['title']) && !empty($_POST['text'])) {
                $title = parent::secureVar($_POST['title']);
                $text = parent::secureVar($_POST['text']);
                $response = $this->post->insertPost($title, $text, $_SESSION['user']['id']);
                echo "<p style='display: none'>".json_encode($response)."</p>";
                die();
            }
            else {
                $error['empty'] = "<div class='alert alert-danger' id='message'>Completed field !</div>";
            }
        }
        

        require_once "Vue/vuePost.php";
    }

}