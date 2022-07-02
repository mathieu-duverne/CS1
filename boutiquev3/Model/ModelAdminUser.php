<?php 
require_once 'Model/ModelAdmin.php';
class adminUser extends admin
{
	protected $pdo;

//SELECT ALL USER
public function selectalluser(){
    $sql = "SELECT id, login, email, password, id_droits FROM utilisateurs";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    while($user = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        return $user;
    }
}
//SELECT ADRESSE WITH ID
public function selectAdressId($id_address){
    $sql = "SELECT * FROM client_commande WHERE id = :id ";
    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([
        'id' => $id_address
    ]);
    $address = $stmt->fetch(PDO::FETCH_ASSOC);
    return $address;
}

//SELECT USER VIA ID
public function selectViaId($id){
$sql = "SELECT id, login, email, password, id_droits FROM utilisateurs WHERE id = :id";
$stmt = $this->pdo->prepare($sql);
$stmt->execute([
    'id' => $id
]);
$userid = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$userid)
{
    return false;
}
    else
    {
    return $userid;
    }
}

//UPDATE USER ADRESS
//REGLER REQUETE QUI N'UPDATE PAS VIA L'ID
    public function update_User_Adress(){
        $sql = "UPDATE client_commande SET nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, addresse = :addresse, addresse_comp = :addresse_comp, ville = :ville, code_postale = :code_postale WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email'],
            'addresse' => $_POST['addresse'],
            'addresse_comp' => $_POST['addresse_comp'],
            'ville' => $_POST['ville'],
            'code_postale' => $_POST['code_postale'],
            'id' => $_SESSION['id_address']
        ]);
    }

public function delete_User_Address(){
    $sql = "DELETE FROM client_commande WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $_POST['deleteAddress']
    ]);
}

//DELETE USER VIA ID
public function deleteUser($id){
$sql = "DELETE FROM utilisateurs WHERE id = :id";
    $stmt= $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
                   ]);
}
//UPDATE USER VIA ID
public function updateUser($login, $email, $password, $id_droits, $id){
	$sql = "UPDATE utilisateurs SET login=:login, email=:email, password=:password, id_droits=:id_droits WHERE id=:id";
	$stmt= $this->pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'password' => $password, 'email' => $email, 'id_droits' => $id_droits, 'id' => $id]);
	}

public function selectUser_Address($id_utilisateur){
    $sql = "SELECT * FROM client_commande WHERE id_utilisateur = :id_utilisateur";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id_utilisateur' => $id_utilisateur
    ]);
    if($stmt->rowCount() == 0)
    {
        return false;
    }
    else{
        while($address = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            return $address;
        }
    }
}

}