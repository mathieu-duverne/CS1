<?php

require_once "Model/Model.php";

class ModelPost extends Model
{
    protected $pdo;

    public function insertPost($title, $texte, $id_user) {
        $updated_at = NULL;
        $request_param = [
            "title" => $title,
            "texte" => $texte,
            "id_user" => $id_user,
            "updated_at" => $updated_at
        ];
        parent::send($this->pdo,'INSERT INTO social_post SET title = :title, texte = :texte, id_user=:id_user, updated_at=:updated_at', $request_param );
    }

    public function selectPost() {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT social_user.firstname, social_user.surname, social_post.id, social_post.id_user, social_post.title, social_post.texte, social_post.created_at, social_post.updated_at, social_post.created_at, social_post.updated_at FROM social_post INNER JOIN social_user ON social_post.id_user = social_user.id ORDER BY created_at DESC;", $request_param);
        return $stmt->fetchAll();
    }

    public function selectOlderPost() {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT social_user.firstname, social_user.surname, social_post.id, social_post.id_user, social_post.title, social_post.texte, social_post.created_at, social_post.updated_at FROM social_post INNER JOIN social_user ON social_post.id_user = social_user.id ORDER BY created_at ASC;", $request_param);
        return $stmt->fetchAll();
    }

    public function selectViaSearchPost($search) {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT social_user.firstname, social_user.surname, social_post.id, social_post.id_user, social_post.title, social_post.texte, social_post.created_at, social_post.updated_at FROM social_post INNER JOIN social_user ON social_post.id_user = social_user.id WHERE social_post.title LIKE '%$search%' ORDER BY created_at;", $request_param);
        return $stmt->fetchAll();
    }

    public function getAllPost(): array {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT id, title, texte, id_user, created_at, updated_at FROM social_post",$request_param );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePostViaId($id, $title, $texte) {
        $date = new DateTime();
        $updated_at = date_format($date, 'Y-m-d H:i:s');
        $request_param = ['id' => $id, 'title' => $title, 'texte' => $texte, 'updated_at' => $updated_at];
        parent::send($this->pdo, "UPDATE social_post SET title = :title, texte = :texte, updated_at =:updated_at WHERE id = :id", $request_param);
    }

    public function deletePostViaId($id) {
        $request_param = ["id" => $id];
        parent::send($this->pdo, "DELETE FROM social_post WHERE id = :id", $request_param);
    }

    //Count all post send 
    public function countPublication() {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT COUNT(*) FROM social_post ;", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //take three last post
    public function selectThreeLastPublication(){
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT social_user.firstname, social_user.surname, social_post.id, social_post.id_user, social_post.title, social_post.texte, social_post.created_at, social_post.updated_at FROM social_post INNER JOIN social_user ON social_post.id_user = social_user.id ORDER BY created_at DESC LIMIT 3;", $request_param);
        return $stmt->fetchAll();
    }

}