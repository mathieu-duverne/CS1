<?php 
require_once 'Model/Model.php';
class panier extends Model
{
	protected $pdo;

        //INSERT Article Panier(liste_commande)
public function insertPanier($id_produit,$id_utilisateur,$quantite,$statut,$numero_commande){
    $sql ="INSERT INTO liste_commande 
    SET id_produit=:id_produit, id_utilisateur=:id_utilisateur,quantite=:quantite,statut=:statut,numero_commande=:numero_commande";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('id_produit','id_utilisateur','quantite','statut','numero_commande'));
    }
   
    //Update quantite
public function updateQuantite($quantite, $id_produit, $id_utilisateur){
    $sql = "UPDATE liste_commande SET quantite=:quantite WHERE id_produit=:id_produit AND id_utilisateur=:id_utilisateur";
    $stmt= $this->pdo->prepare($sql);
	$stmt->execute([
        'id_produit' => $id_produit,   
        'quantite' => $quantite,
        'id_utilisateur' => $id_utilisateur
    ]);

}
//SI UTILISATEUR A DEJA UN PANIER
public function id_utilisateurExist($id_utilisateur, $statut){
    $stmt = $this->pdo->prepare("SELECT id_utilisateur, id_produit,quantite FROM liste_commande WHERE id_utilisateur=:id_utilisateur AND statut = :statut");
    $stmt->execute(['id_utilisateur' => $id_utilisateur, 'statut' => $statut]);
    if($stmt->rowCount() > 0){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else 
        return false ;
    }

//SELECT ALL PANIER UTILISATEUR
public function selectAllPanier($id_utilisateur, $statut)
{
    $sql = "SELECT produits.id, produits.nom,produits.prix,produits.image_url,liste_commande.quantite FROM produits 
        INNER JOIN liste_commande ON produits.id = liste_commande.id_produit
        WHERE id_utilisateur=:id_utilisateur AND statut=:statut";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id_utilisateur' => $id_utilisateur,
        'statut' => $statut
    ]);
    $_SESSION['user']['countProduct'] = $stmt->rowCount();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//DELETE LIGNE PANIER SUR ligne_commande ou est id_utilisateur egale a id_produits
public function deletePanier($id_utilisateur, $id_produit){
$sql = "DELETE FROM liste_commande WHERE id_utilisateur =:id_utilisateur AND id_produit=:id_produit";
$stmt= $this->pdo->prepare($sql);
	$stmt->execute([
        'id_utilisateur' => $id_utilisateur,
        'id_produit' => $id_produit
    ]);
}

public function selectAdresseViaId($id){
    $sql = "SELECT * FROM client_commande WHERE id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//chercher adresse avec phpsessid pour les user cookie
public function adresseUserCookieExist($id_utilisateur){
    $sql = "SELECT id, nom,prenom,telephone,email,addresse,addresse_comp,ville,code_postale FROM client_commande WHERE id_utilisateur = :id_utilisateur";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id_utilisateur' => $id_utilisateur
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}