<?php
require_once'Controleur.php';

class ControleurAdminUser extends Controleur
{
    protected $adminuser;
    protected $id_address;

	public function route_adminUser(){
        $error = [
            'empty' => '',
            'address' => '',
            'accept' => ''
        ];
        $success = [
            'update' => '',
            'delete' => '',
            'accept' => '',
        ];


        //        ADMIN UPDATE ADRESS
        if(isset($_POST['address']))
        {
            $user_Address = $this->adminuser->selectUser_Address($_POST['address']);
            if($user_Address===false)
            {
                $error['address'] = "pas d\'adresse enregistré pour cet utilisateur";
            }
            else
            {

            }
        }

        if(!isset($_POST['update']) && empty($user_Address) && !isset($_POST['updateAddress'])){
        $user = $this->adminuser->selectalluser();
        }

        //si ADMIN appuie SUR UPDATE
        if(isset($_POST['update'])){
            $id_utilisateur = intval($_POST['update']);
            $userUpdate = $this->adminuser->selectViaId($id_utilisateur);
        }

        //ADMIN UPDATE
        if(isset($_POST['updateUser'])){
            if(empty($_POST['id']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['id_droits']))
            {
                $error['empty'] = "<span>Il y a des champs vide</span>";
            }
            else
            {
                $login = htmlspecialchars($_POST['login']);
                $email = htmlspecialchars($_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $id_droits = intval($_POST['id_droits']);
                $id = intval($_POST['id']);
                $this->adminuser->updateUser($login,$email,$password,$id_droits, $id);
                $success['update'] = "<span>L'utilisateur va être modifié dans 3 2 1 0</span>";
                header("refresh: 2;");
            }
        }
        //ADMIN DELETE
        if(isset($_POST['delete'])){
            $success['accept'] = "<span>ETES VOUS SUR DE VOULOIR EFFACER ID n° ".$_POST['delete']."</span><br>
            <form action='index.php?page=adminuser' method='POST'>
            <button type='submit' name='accept' value='".$_POST['delete']."'>OUI</button>
            <button type='submit' name='non' value='0'>NON</button>
            </form>";
        }
        //ADMIN ACCEPT DELETE
        if(isset($_POST['accept'])){
            $this->adminuser->deleteUser($_POST['accept']);
            $success['delete'] = "<span>L'utilisateur va être supprimé dans 3 2 1 0</span>";
            header("refresh: 2;");
        }
        if(isset($_POST['non'])){
            echo"Ok calme toi";
        }

//        ADMIN UPDATE ADDRESS
        if(isset($_POST['updateAddress']))
        {
            $this->id_address = $_POST['updateAddress'];
            $updateAddr = $this->adminuser->selectAdressId($_POST['updateAddress']);
            $_SESSION['id_address'] = $updateAddr['id'];
        }
        //        CONTROLLER UPDATE ADDRESS
        if(isset($_POST['update_Adresse_User']))
        {
            if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['telephone']) || empty($_POST['email']) || empty($_POST['addresse']) || empty($_POST['addresse_comp']) || empty($_POST['ville']) || empty($_POST['code_postale']))
            {
                $error['empty'] = "champs vide !";
            }
            else{
                $this->adminuser->update_User_Adress($this->id_address, $_POST);
            }
        }
//        CONTROLLER DELETE ADDRESS
        if(isset($_POST['deleteAddress']))
        {
            $this->adminuser->delete_User_Address($_POST);
        }

        //GERER TABLEAU ERROR 1 SUCCESS
        if(array_filter($success))
        {
        }
        if(array_filter($error))
        {
        }
        require'Vue/vueAdminUser.php';
    }
}