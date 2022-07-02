<?php 
require_once 'Model/Model.php';
class checkout extends Model
{
	protected $pdo;

public function insertInfoClient($nom,$prenom,$telephone,$email,$addresse,$addresse_comp,$code_postale,$ville,$id_utilisateur){
    $sql ="INSERT INTO client_commande SET
     nom=:nom,
     prenom=:prenom,
     telephone=:telephone,
     email=:email,
     addresse=:addresse,
     addresse_comp=:addresse_comp,
     ville=:ville,
     code_postale=:code_postale,
     id_utilisateur=:id_utilisateur";
     //requete preparée
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('nom','prenom','telephone','email','addresse','addresse_comp','code_postale','ville','id_utilisateur'));
}
public function selectInfoClient($id_utilisateur){
    $sql = "SELECT * FROM client_commande WHERE id_utilisateur = :id_utilisateur";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('id_utilisateur'));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// UPDATE DE 1 QUAND PAYMENT COMMANDE ACCEPTER
public function updateListeCommande($statut, $n_commande){
    $sql = "UPDATE liste_commande SET statut =:statut WHERE numero_commande=:numero_commande";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'statut' => $statut,
        'numero_commande' => $n_commande
    ]);
    
}

// CHECK COMMANDE VALIDE
public function selectCommande($id_utilisateur, $statut){
    $sql = "SELECT * FROM liste_commande WHERE id_utilisateur = :id_utilisateur AND statut=:statut";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('id_utilisateur', 'statut'));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function selectCommandeCookie($id_utilisateur_cookie, $statut){
    $sql = "SELECT * FROM liste_commande_cookie WHERE id_utilisateur_cookie = :id_utilisateur_cookie AND statut=:statut";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('id_utilisateur_cookie', 'statut'));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function updateInfoClient($id, $nom, $prenom, $telephone, $email, $addresse, $addresse_comp, $code_postale, $ville){
    $sql ="UPDATE client_commande SET
     nom=:nom,
     prenom=:prenom,
     telephone=:telephone,
     email=:email,
     addresse=:addresse,
     addresse_comp=:addresse_comp,
     code_postale=:code_postale,
     ville=:ville
     WHERE id = :id";
     //requete preparée
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nom' => $nom,'prenom' => $prenom,'telephone' => $telephone,'email' => $email,'addresse' => $addresse,'addresse_comp' => $addresse_comp,'ville' => $ville, 'code_postale' => $code_postale]);
}
public function deleteAdresseViaId($id){
    $sql = "DELETE FROM client_commande WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
}

// /////////////////


// requete n commande in user 
public function nCommandeExist($n_commande){
        $stmt = $this->pdo->prepare("SELECT numero_commande FROM liste_commande WHERE numero_commande = :numero_commande ;");
        $stmt->execute(['numero_commande' => $n_commande]);
        if($stmt->rowCount() > 0){
            return -1;
        } else 
            return 1;
}
// requete in cookie
public function nCommandeExistInCookie($n_commande){
    $stmt = $this->pdo->prepare("SELECT numero_commande FROM liste_commande_cookie WHERE numero_commande = :numero_commande ;");
    $stmt->execute(['numero_commande' => $n_commande]);
    if($stmt->rowCount() > 0){
        return -1;
    } else 
        return 1;
}

public function insertListCommandeCookie($id_produit, $quantite, $id_cookie, $statut, $n_commande){

    $sql = "INSERT INTO liste_commande_cookie SET
            id_produit_cookie= :id_produit_cookie,
            quantite = :quantite,
            id_utilisateur_cookie= :id_utilisateur_cookie,
            statut = :statut,
            numero_commande = :numero_commande
            ";
     $stmt = $this->pdo->prepare($sql);
     $stmt->execute(['id_produit_cookie' => $id_produit, 'quantite' => $quantite,'id_utilisateur_cookie' => $id_cookie, 'statut' => $statut, 'numero_commande' => $n_commande]);
}

	
}