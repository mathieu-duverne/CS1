<?php

require_once "Controller/Controller.php";

class ControllerChat extends Controller
{
    public function route_chat() {


        if(isset($_SESSION["user"]["role"])) 
        {
            if(isset($_POST['loadMessage']))
            {
                // ------- SELECT MESSAGE WITH 2 id ONload & all five second SETIMEOUT ------- //
                $dataMessage = $this->chat->selectMessageViaTwoId(intval($_SESSION['user']['id']), $_POST['loadMessage']); 
                $userChat = $this->user->selectUserForChatWithId($_POST['loadMessage']);
                if(empty($dataMessage)){

                    echo "<div class='alert alert-light text-center' role='alert'>you don't have any discussions yet</div>";
                }                    
                else {

                    foreach ($dataMessage as $dataMessages)
                    {

                        if($dataMessages['id_shipper']==intval($_SESSION['user']['id'])) {
                            echo '<div class="container">
                                <div class="row justify-content-end" style="margin-right:auto; text-align:right;">
                                    <p class="container border border-primary p-3" style="color:black; border-radius: 18px 0px 18px 18px"">'.$dataMessages['message'].'</p>
                                </div>
                            </div>';
                            } else {
                                echo '
                                    <div class="container">
                                        <div class="row" style="margin-left:auto;">
                                            <img width="28px" height="28px" class="rounded-circle m-1" src="./Style/images/avatar/'.$userChat[0]['avatar_url'].'">
                                            <p class="container border border-primary p-3" style="color:black; border-radius: 0px 18px 18px 18px">'.$dataMessages['message'].'<p>
                                        </div>
                                    </div>';
                                        }
                    }   
                }
                die();
            }
            

            // -----------  DISPLAY USER ONLOAD ----------- 
            if(isset($_GET["user_id"])){
                // ------ SELECT USER FOR TCHAT ------ 
                $user_id = intval($_GET['user_id']);

                $userChat = $this->user->selectUserForChatWithId($user_id);
                
                
                foreach($userChat as $usersData) 
                {
                    //CARD HEADER WHIT INFOSUSER
                    echo '<div id="response"></div><div class="card container border-secondary m-1">
                    <div class="card-header bg-transparent border-primary">
                        <div class="row justify-content-left">
                            <img class="rounded-circle m-1" width="60px" src="./Style/images/avatar/'.$usersData['avatar_url'].'">
                            <div style="text-align:center; vertical-align: center !important;">
                                <h6>'.$usersData['firstname'].' '.$usersData['surname'].'</h6>
                                <span style="color:#737373;" class="text-sm-left">'.$usersData['connect_status'].'</span>
                            </div>    
                        </div>
                    </div><div id="cardBody" class="card-body column">';


                                    echo '</div>
                                        <div class="card-footer bg-transparent col-12">
                                            <div class="container-sm">
                                                <div class="row justify-content-around">
                                                    <input onkeyup="autoCompletionMessage(event, '.$user_id.')" id="msg" class="col-11" style="outline:none;" autofocus type="text" name="message">
                                                    <span onclick="sendMessage('.$user_id.')" style="cursor:pointer;"><i class="far fa-paper-plane"></i></span>
                                                </div>        
                                            </div>
                                        </div>';
                }           
                die();
            }
            // -----------  DISPLAY USER ONLOAD ----------- 
            if(isset($_POST["call"])){
                if($_POST['call']=="back"){
                $userLists = $this->user->selectUserChat();
                foreach($userLists as $userList)
                {
                    if($userList['connect_status']==NULL){
                    }

                    if($userList['connect_status']=="Offline now") {
                    echo '<a style="text-decoration: none;"><div style="cursor:pointer" onclick="chatViaUserId('.$userList['id'].')" class="card m-1">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <img class="rounded-circle m-1" width="35px" src="./Style/images/avatar/'.$userList['avatar_url'].'" alt="avatar of user">
                                <span>'.$userList['firstname'].' '.$userList['surname'].'</span> 
                            </div>
                            <div>
                                <span style="font-size: 0.5em; color: light;">
                                    <i class="fas fa-circle"></i>
                                </span>
                            </div>
                        </div>
                    </div></a>';
                    }
                    if($userList['connect_status']=="Active now" && $userList['email'] != $_SESSION['user']['email']) {
                        echo '<a style="text-decoration: none;"><div style="cursor:pointer" onclick="chatViaUserId('.$userList['id'].')" class="card m-1">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <img class="rounded-circle m-1" width="35px" src="./Style/images/avatar/'.$userList['avatar_url'].'" alt="avatar of user">
                                    <span>'.$userList['firstname'].' '.$userList['surname'].'</span> 
                                </div>
                                <div>
                                    <span style="font-size: 0.5em; color: green;">
                                    <i class="fas fa-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div></a>';
                    }
                }
            }
            die();
            }
            // -----------  DISPLAY USER ON SEARCH ----------- 
            if(isset($_POST['search'])){
                $word = parent::secureVar($_POST['search']);
                $userList = $this->user->selectUserViaSearchBar($word);
                foreach($userList as $userLists) {
                    if($userLists['connect_status']==NULL){
                    }
                    if($userLists['connect_status']=="Offline now") {
                        echo '<a style="text-decoration: none;" ><div style="cursor:pointer" onclick="chatViaUserId('.$userLists['id'].')" class="card m-1">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <img class="rounded-circle m-1" width="35px" src="./Style/images/avatar/'.$userLists['avatar_url'].'" alt="avatar of user">
                                <span>'.$userLists['firstname'].' '.$userLists['surname'].'</span> 
                            </div>
                            <div>
                                <span style="font-size: 0.5em; color: light;">
                                    <i class="fas fa-circle"></i>
                                </span>
                            </div>
                        </div> 
                    </div></a>';
                    }
                            if($userLists['connect_status']=="Active now" && $userLists['email'] != $_SESSION['user']['email']) {
                        echo '<a style="text-decoration: none;" ><div style="cursor:pointer" onclick="chatViaUserId('.$userLists['id'].')" class="card m-1">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <img class="rounded-circle m-1" width="35px" src="./Style/images/avatar/'.$userLists['avatar_url'].'" alt="avatar of user">
                                <span>'.$userLists['firstname'].' '.$userLists['surname'].'</span> 
                            </div>
                            <div>
                                <span style="font-size: 0.5em; color: light;">
                                    <i class="fas fa-circle"></i>
                                </span>
                            </div>
                        </div>
                    </div></a>';
                    }
                }
                die();
                }

            } else {
            parent::Redirect("home");
            }

            if(isset($_POST['message']) && isset($_POST['id_recipient'])){
                $message = parent::secureVar($_POST['message']);
                $id_recipient = parent::secureVar($_POST['id_recipient']);
                $this->chat->sendMessage($message, $id_recipient);
                die();
            }
        require_once "Vue/vueChat.php";
    }
}