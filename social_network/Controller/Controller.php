<?php

require ("Model/ModelUser.php");
require ("Model/ModelPost.php");
require ("Model/ModelChat.php");

class Controller
{
    protected $user;
    protected $post;
    protected $chat;

    public function __construct() {
        $this->user = new ModelUser();
        $this->post = new ModelPost();
        $this->chat = new ModelChat();
    }

    public function Redirect($string): void{
        header('Location: '.$string.'');
        exit();
    }

    public function secureVar($variable): string{
        return htmlspecialchars(trim($variable));
    }

    public function checkImage(){
        $fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileError = $_FILES['avatar']['error'];
        $img_exe = pathinfo($fileName, PATHINFO_EXTENSION);
        $img_exe_str = strtolower($img_exe);
        $extension = array("jpg", "jpeg", "png", "svg", "webp");
        if($fileError===0) {
            if ($fileSize > 1000005) {
                return 1;
            }
            if (in_array($img_exe_str, $extension)) {
                $image_url = uniqid("IMG-", true).'.'.$img_exe_str;
                $img_in_path = 'Style/images/avatar/'.$image_url;
                move_uploaded_file($fileTmpName, $img_in_path);
                return $image_url;
            }
            else {
                return 2;
            }
            //ici UPDATE
            //IF si elle existe ALORS UPDATE LE PAR RAPPORT A L'ID DE L'Update
        }
    }

    // --------- PART : user / profile / admin --------- //
    public function regexPassword($password): bool{

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            return false;
        }
        else
            return true;
    }

    public function password_hash($password_hash): string{
        return password_hash($password_hash, PASSWORD_DEFAULT);
    }

    public function checkPassword($password, $password_hash): bool{
        if(password_verify($password, $password_hash) === false)
        {
            return false;
        }
        else
            return true;
    }

    public function validateEmail($email): bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        else
            return true;
    }

    public function isEmptyUser($firstname, $surname, $email, $password, $password2): bool{

        if (empty($firstname) || empty($surname) || empty($email) || empty($password) || empty($password2)) {
            return false;
        }
        else {
            return true;
        }
    }

    // --- DASHBOARD --- //
    public function tableOfAllUsers() {
        $listOfUsers = $this->user->getAllUser();
        $listUsers = "<tr>";
        foreach ($listOfUsers as $list){
            $listUsers .= "
                            <th id='".$list['id']."' scope='row'>".$list['id']."</th>
                           <td class='".$list['id']."'>".$list['firstname']."</td>
                           <td class='".$list['id']."'>".$list['surname']."</td>
                           <td class='".$list['id']."'>".$list['email']."</td>
                           <td class='".$list['id']."'>".$list['role']."</td>
                           <td class='".$list['id']."'>".$list['avatar_url']."</td>
                           <td class='".$list['id']."'>".$list['connect_status']."</td>
                           <td class='".$list['id']."'>".$list['created_at']."</td>
                           <td class='".$list['id']."'>".$list['updated_at']."</td>
                           <td class='".$list['id']."'><button class='btn btn-sm btn-outline-warning' onclick='update(".$list['id'].")'>Update</button></td>
                           <td class='".$list['id']."'><button class='btn btn-sm btn-primary' onclick='deletes(".$list['id'].")'>Delete</button></td>
                           <tr>";
        }
        if (isset($listUsers)) {
            return $listUsers;
        }
    }

    public function tableOfAllPosts() {
        $listOfPosts = $this->post->getAllPost();
        $listPosts = "<tr>";
        foreach ($listOfPosts as $list){
            $listPosts .= "
                            <th id='".$list['id']."' scope='row'>".$list['id']."</th>
                           <td class='".$list['id']."'>".$list['title']."</td>
                           <td class='".$list['id']."'>".$list['texte']."</td>
                           <td class='".$list['id']."'>".$list['id_user']."</td>
                           <td class='".$list['id']."'>".$list['created_at']."</td>
                           <td class='".$list['id']."'>".$list['updated_at']."</td>
                           <td class='".$list['id']."'><button class='btn btn-sm btn-primary' onclick='deletePost(".$list['id'].")'>Delete</button></td>
                           <tr>";
        }
        if (isset($listPosts)) {
            return $listPosts;
        }
    }

    public function displayPost($result) {
        $publication = "";
        foreach ($result as $results) {
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
        return $publication;
    }
}