<?php

require_once "Model/Model.php";

class ModelUser extends Model
{
    protected $pdo;

    // ------ ------ ------ GETTER ------ ------ ------  //
    public function getIdViaEmail($email): array  {
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT id FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPasswordViaEmail($email){
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT password FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRoleViaEmail($email): array {
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT role FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAboutViaEmail($email){
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT about FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAvatarViaEmail($email): array {
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT avatar_url FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getFirstnameViaEmail($email): array {
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT firstname FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSurnameViaEmail($email): array {
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT surname FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStatusViaEmail($email): array{
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT connect_status FROM social_user WHERE email = :email;", $request_param );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // ------ getter ------ //


    //Count all user send 
    public function countUsers() {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT COUNT(*) FROM social_user ;", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // SELECT ALL USER ONLINE
    public function countUsersOnline(){
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT COUNT(*) FROM `social_user` WHERE connect_status = 'Active now'", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // SELECT ALL USER OFFLINE
    public function countUsersOffline(){
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT COUNT(*) FROM `social_user` WHERE connect_status = 'Offline now'", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // SELECT ALL USER NEVER CONNECTED
    public function countUsersNever(){
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT COUNT(*) FROM `social_user` WHERE connect_status IS NULL", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function emailExist($email): bool {
        $request_param = ['email' => $email];
        $stmt = parent::send($this->pdo, "SELECT email FROM social_user WHERE email = :email;", $request_param );

        if($stmt->rowCount() > 0){
            return true;
        }
        else
            return false;
    }

    public function registerUser($firstname, $surname, $email, $password, $role, $avatar_url){

        $updated_at = null;
        $request_param = [
            "firstname" => $firstname,
            "surname" => $surname,
                "email" => $email,
                "password" => $password,
                "role" => $role,
                "avatar_url" => $avatar_url,
                "updated_at" => $updated_at
        ];
        parent::send($this->pdo, "INSERT INTO social_user SET firstname=:firstname, surname =:surname, email = :email, role = :role, password = :password, avatar_url = :avatar_url, updated_at = :updated_at", $request_param);
    }

    public function updateProfilUser($firstname,$surname,$email, $password, $about, $role, $avatar_url, $id) {
        // ----- init datetime for updated
        $date = new DateTime();

        $updated_at = date_format($date, 'Y-m-d H:i:s');
        //param request sql
        $request_param = [
            "id" => $id,
            "firstname" => $firstname,
            "surname" => $surname,
            "email" => $email,
            "password" => $password,
            "about" => $about,
            "role" => $role,
            "avatar_url" => $avatar_url,
            "updated_at" => $updated_at
            ];
        parent::send($this->pdo, "UPDATE social_user SET firstname=:firstname, surname=:surname, email=:email, password=:password,about=:about, role=:role, avatar_url=:avatar_url, updated_at=:updated_at WHERE id = :id", $request_param);
    }

    public function updateUser($firstname,$surname,$email, $role, $avatar_url, $id ) {
        //init date DAY
        $date = new DateTime();
        $updated_at = date_format($date, 'Y-m-d H:i:s');
        //param request sql
        $request_param = [
            "id" => $id,
            "firstname" => $firstname,
            "surname" => $surname,
            "email" => $email,
            "role" => $role,
            "avatar_url" => $avatar_url,
            "updated_at" => $updated_at
        ];
        parent::send($this->pdo, "UPDATE social_user SET firstname=:firstname, surname=:surname, email=:email, role=:role, avatar_url=:avatar_url, updated_at=:updated_at WHERE id = :id", $request_param);
    }

    public function deleteUser($id){
        var_dump($id);
        $request_param = ["id" => $id];
        parent::send($this->pdo, "DELETE FROM social_user WHERE id = :id", $request_param);
    }
    public function deletePostViaId($id) {
        $request_param = ["id" => $id];
        parent::send($this->pdo, "DELETE FROM social_post WHERE id = :id", $request_param);
    }

    public function getAllUser(): array {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT id, firstname, surname, email, role, avatar_url, connect_status, created_at, updated_at FROM social_user", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatutOnline($id): void{
        $connect_status = "Active now";
        $request_param = ["id" => $id, "connect_status" => $connect_status];
        parent::send($this->pdo, "UPDATE social_user SET connect_status= :connect_status WHERE id = :id;", $request_param);
    }
    public function getStatutOffline($id): void{
        $connect_status = "Offline now";
        $request_param = ["id" => $id, "connect_status" => $connect_status];
        parent::send($this->pdo, "UPDATE social_user SET connect_status= :connect_status WHERE id = :id;", $request_param);
    }

    public function selectUserChat(): array {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT id, firstname, surname,email, role, avatar_url, connect_status, created_at FROM social_user ORDER BY connect_status ASC", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectUserViaSearchBar($word){
        $request_param = ['word' => $word];
        $stmt = parent::send($this->pdo, "SELECT id, firstname, surname,email, role, avatar_url, connect_status, created_at FROM social_user WHERE LOCATE(:word, firstname) OR LOCATE(:word, surname) ORDER BY connect_status ASC;", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectUserForChatWithId($id): array{
        $request_param = ['id' => $id];
        $stmt = parent::send($this->pdo, "SELECT id, firstname, surname, email, role, avatar_url, connect_status, created_at FROM social_user WHERE id = :id", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}