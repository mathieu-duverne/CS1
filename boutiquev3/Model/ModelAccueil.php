<?php 
require_once 'Model/Model.php';
class accueil extends Model
{
    protected $pdo;

    public function selectTroisDerniersProducts(){
        $sql = "SELECT * FROM ( SELECT * FROM produits ORDER BY id DESC LIMIT 3 ) as r ORDER BY id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $tab = array();
        $i = 0;
        while($liste = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tab[$i][] = $liste;
            $i++;
        }
        return $tab;
    }
	
}

?>