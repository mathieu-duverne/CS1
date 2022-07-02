<?php 
require_once 'Model/Model.php';
class historique extends Model
{
    protected $pdo;
    public function getFactureViaId($id_utilisateur){
        $sql = "SELECT numero_commande, id_client_commande FROM factures WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_utilisateur' => $id_utilisateur
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function  selectListeCommandeBuy($n_commande, $statut){
        $sql = "SELECT * FROM liste_commande WHERE numero_commande = :numero_commande AND statut = :statut";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'numero_commande' => $n_commande,
            'statut' => $statut
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function  selectListeCommandeBuyCookie($n_commande, $statut){
        $sql = "SELECT id_produit_cookie FROM liste_commande_cookie WHERE numero_commande = :numero_commande AND statut = :statut";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'numero_commande' => $n_commande,
            'statut' => $statut
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectproduct($id){
        $sql = "SELECT * FROM produits WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectclient_commande($id){
        $sql = "SELECT * FROM client_commande WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
}

?>