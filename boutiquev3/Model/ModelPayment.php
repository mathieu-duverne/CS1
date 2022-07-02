<?php
require_once 'Model/Model.php'; 
class payment extends Model
{
    protected $pdo;

//    select address with this id
    public function check_address($id){
        $sql = "SELECT * FROM client_commande WHERE id = :id";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([ 
            'id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
//

}