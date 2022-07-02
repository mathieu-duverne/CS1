	<?php 
require_once('includes/_config.php');

        class Model{
protected $pdo;
private $id;
public $login;
public $password;
public $titre;
public $desc;
public $debut;
public $fin;
//connexion bdd
	public function __construct(){
		$this->pdo = \Database::getPdo();
	}
     
     //funct bdd table reservations
    public function insertbooks($name, $email, $date){
        $query = $this->pdo->prepare('INSERT INTO booking SET name = :name, email = :email, date = :date');
        if($query->execute([
            'name' => $name,
            'email' => $email,
            'date' => $date
        ])){
        $msg = "<p class'alert alert-success'>Reservation Validée</p>";
        return $msg;
           }
    }
public function insertresa($titre, $desc, $debut, $fin, $id_user){
         $query = $this->pdo->prepare('INSERT INTO reservations SET titre = :titre, description = :description, debut = :debut, fin = :fin, id_utilisateur = :id_utilisateur');
        $query->execute([
            'titre' => $titre,
            'description' => $desc,
            'debut' => $debut,
            'fin' => $fin,
            'id_utilisateur' => $id_user
        ]);
        return true;
           }

    
     public function selectbooks($month, $year){
         
        $sql = ('SELECT * FROM reservations WHERE MONTH(debut) = :month AND YEAR(debut) = :year ORDER BY debut, fin ASC');
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':month', $month);
        $stmt->bindValue(':year', $year);
        $stmt->execute();
        $bookings = array();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach($row as $result => $key){
           if($key['debut'] >= date('Y-m-d')){
            //var_dump($row['debut']);
        $bookings[] = $key['debut'];
        $bookings[] = $key['fin'];
        $bookings[] = $key['titre'];
        $bookings[] = $key['id_utilisateur'];
        $bookings[] = $key['id'];
         }
           }
                      return $bookings;             
         }
            
             public function selectbooksid($id_event){
         $stmt = $this->pdo->prepare("SELECT * FROM reservations WHERE id = :id ;");
         $stmt->execute(['id' => $id_event]);
         $event = array();
         $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach($row as $result => $key){
           if($key['debut'] >= date('Y-m-d')){
            //var_dump($row['debut']);
            $event[] = $key['titre'];
            $event[] = $key['id_utilisateur'];
            $event[] = $key['description'];
            $event[] = $key['debut'];
            $event[] = $key['fin'];  
         }
     }
         return $event;
    }
             public function insertreservation($titre, $desc, $debut, $fin){
 		$query = $this->pdo->prepare('INSERT INTO reservations SET titre = :titre, description = :description, debut = :debut, fin = :fin, id_utilisateur = :id_utilisateur');
		$query->execute([
			'titre' => $titre,
			'description' => $desc,
			'debut' => $debut,
			'fin' => $fin,
			'id_utilisateur' => $_SESSION['id']
	]);	
 }
       public function bookexist($debut){
    $stmt = $this->pdo->prepare("SELECT debut FROM reservations WHERE debut = :debut ;");
    $stmt->execute(['debut' => $debut]);
    if($stmt->rowCount() > 0){
        return -1;
    } else 
        return 1;
}   
            
            //FUNCT BDD UTILISATEUR
            
     public function selectid($id_user){
         $sql = ('SELECT id, login FROM utilisateurs WHERE id = :id');
         $stmt = $this->pdo->prepare($sql);
         $stmt->bindValue(':id', $id_user);
         $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
             return $row;
         
     }  
 public function verifyPass($password_conf, $password){
 	$checkPass = password_verify($password_conf, $password);
        if($checkPass===true){
            return true;
 	}
 	else 
 		return false;
 		
 }
 public function insert($login, $password){
 	$query = $this->pdo->prepare('INSERT INTO utilisateurs SET login = :login, password = :password');
	$query->execute(compact('login', 'password'));
 }

public function exists($login){
	$stmt = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login ;");
    $stmt->execute(['login' => $login]);
    if($stmt->rowCount() > 0){
        return -1;
    } else 
        return 1;
 }
            public function selectPassHash($login){
                $stmt = $this->pdo->prepare("SELECT password FROM utilisateurs WHERE login = :login ;");
            $stmt->execute(['login' => $login]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if(!$user){
		return false;
	}
     else 
        return $user['password'];
                
            }
 public function selectUser($login){
 	$sql = "SELECT id, login, password FROM utilisateurs WHERE login = :login";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute(['login' => $login]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$user){
		return false;
	}
	else   
			$_SESSION['login'] = $user['login'];
			$_SESSION['id'] = $user['id'];
 }

 public function update($login, $password, $password_conf, $id){
 	$sql = "UPDATE utilisateurs SET login=:login, password=:password WHERE id=:id";
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute(['login' => $login, 'password' => $password, 'id' => $id]);
       		$_SESSION['login'] = $login;
       		$_SESSION['pass'] = $password_conf;
       		$_SESSION['id'] = $id;
       		return $_SESSION;
    }
}