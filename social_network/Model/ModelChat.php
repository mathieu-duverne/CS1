<?php

require_once "Model/Model.php";


class ModelChat extends Model
{

        protected $pdo;

    public function sendMessage($msg, $id_recipient): void{
        $request_param = [
               'message' => $msg,
               'id_shipper' => $_SESSION['user']['id'],
               'id_recipient' => $id_recipient
        ];
        parent::send($this->pdo, "INSERT INTO social_chat SET message =:message, id_shipper =:id_shipper, id_recipient=:id_recipient", $request_param);
    }

    public function selectMessageViaTwoId($id_user, $id_other_user): array{
            $request_param = [];
            $stmt = parent::send($this->pdo, "SELECT * FROM social_chat WHERE id_shipper = {$id_user} AND id_recipient = {$id_other_user} OR id_shipper = {$id_other_user} AND id_recipient = {$id_user} ORDER BY created_at ASC", $request_param);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Count all message send 
    public function countMessage() {
        $request_param = [];
        $stmt = parent::send($this->pdo, "SELECT COUNT(*) FROM social_chat ;", $request_param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
