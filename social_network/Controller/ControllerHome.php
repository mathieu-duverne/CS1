<?php
require_once "Controller/Controller.php";
class ControllerHome extends Controller
{

    public function route_home()
    {
        if(isset($_SESSION['user'])){
            $firstname = $this->user->getFirstnameViaEmail($_SESSION['user']['email']);
            $surname = $this->user->getSurnameViaEmail($_SESSION['user']['email']);
            $avatar_url = $this->user->getAvatarViaEmail($_SESSION['user']['email']);
            $status =  $this->user->getStatusViaEmail($_SESSION['user']['email']);
        }
        $usersOnline = $this->user->countUsersOnline();
        $threeLastPublication = $this->post->selectThreeLastPublication();
        $publication = "";
        foreach ($threeLastPublication as $results) {
            if(isset($_SESSION['user'])){
            if ($results['id_user'] === $_SESSION['user']['id']) {
                $publication .=  '<br><div id="' . $results['id'] . '" class=\'card\'><div name="' . $results['id'] . '" class=\'card-header\'>
               ' . $results["title"] . '
           </div>
           <div name="' . $results['id'] . '" class=\'card-body\'>
               <blockquote name="' . $results['id'] . '" class=\'mb-0\'>
                   <p name="' . $results['id'] . '"><em name="' . $results['id'] . '">' . $results["texte"] . '<em></p>
                   <footer name="' . $results['id'] . '" class=\'blockquote-footer\'>Created by the famous <span name="' . $results['id'] . '">' . $results["firstname"] . ' ' . $results["surname"] . '</span><br>&ensp; <span name="' . $results['id'] . '">at '. $results['created_at'] .'</span></footer>
               </blockquote>
           </div>
           <div name="' . $results['id'] . '">
                <div name="' . $results['id'] . '" class="text-right">
                    <button name="' . $results['id'] . '" onclick="updatePost(' . $results['id'] . ')" class="btn btn-sm btn-outline-secondary text-right">Update</button>     
                    <button name="' . $results['id'] . '" onclick="deletePost(' . $results['id'] . ')" class="btn btn-sm btn-outline-primary text-right">delete</button>     
                </div>
           </div>
           </div>';
            } else {
                $publication .= '<br><div class=\'card\'><div class=\'card-header\'>
               ' . $results["title"] . '
           </div>
           <div class=\'card-body\'>
               <blockquote class=\'mb-0\'>
                   <p><em>' . $results["texte"] . '<em></p>
                   <footer class=\'blockquote-footer\'>Created by the famous <span title=\'Source Title\'>' . $results["firstname"] . ' ' . $results["surname"] . '</span><br>&ensp;  <span name=" ' . $results['id'] . '">at '. $results['created_at'] .''.$results['updated_at'] .'</span></footer>
               </blockquote>
           </div>
       </div>';
            } } elseif(isset($results)) {
                $publication .= '<br><div class=\'card\'><div class=\'card-header\'>
               ' . $results["title"] . '
           </div>
           <div class=\'card-body\'>
               <blockquote class=\'mb-0\'>
                   <p><em>' . $results["texte"] . '<em></p>
                   <footer class=\'blockquote-footer\'>Created by the famous <span title=\'Source Title\'>' . $results["firstname"] . ' ' . $results["surname"] . '</span><br>&ensp;  <span name=" ' . $results['id'] . '">at '. $results['created_at'] .''.$results['updated_at'] .'</span></footer>
               </blockquote>
           </div>
       </div>';
            }
        }

        require 'Vue/vueHome.php';
    }

}