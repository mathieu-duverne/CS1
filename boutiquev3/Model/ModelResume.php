<?php 
require_once 'Model/Model.php';
class resume extends Model
{
	protected $pdo;

    public function getstatutListe( $status, $n_commande){
        $sql = "UPDATE liste_commande_cookie SET statut =:statut WHERE numero_commande=:numero_commande";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'statut' => $status,
            'numero_commande' => $n_commande
        ]);
        
    }

    public function selectListeCommandeCookie($n_commande, $status){
        $sql = "SELECT id_produit_cookie  FROM liste_commande_cookie WHERE numero_commande = :numero_commande AND statut = :statut ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'numero_commande' => $n_commande,
            'statut' => $status,
        ]);
        while($id_produit = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        return $id_produit;
        }
    }

    public function insertFacture($n_commande, $client_commande, $id_utilisateur){
        $sql = "INSERT INTO factures SET 
                numero_commande=:numero_commande,
                id_client_commande=:id_client_commande,
                id_utilisateur =:id_utilisateur ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'numero_commande' => $n_commande,
            'id_client_commande' => $client_commande,
            'id_utilisateur' => $id_utilisateur
        ]);
    }
}