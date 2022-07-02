<?php  

class controller{
    private $month;
    private $year;
    private $jour;
    private $id_user;
    public $start;
    private $end;
    private $titre;
    private $desc;
    private $login;
    private $pass;
    //fonctionnalité du projets non specifique
    public static function Redirect(string $url){
	   header("Location: ".$url."");
	 exit();
	}
    public function success($GET=null,$succee){
        if(isset($_GET['success'])){
            if($_GET['success']==1)
                return $succee;
        }
        else 
            return false;
    }
    //fonctionnalités sur les user
    
     public function verif(){
 		if(isset($_POST['submit']))
 	if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password_conf'])) {
        $error = "<p class='alert alert-danger'>Remplit bien tous les champs</p>";
 	return $error;
 }
 else
 	return false;
} 
public function checkLogs(){
    if(!empty($_POST['logconnect']) && !empty($_POST['passconnect'])){
            $this->login = $_POST['logconnect'];
            $this->pass = $_POST['passconnect'];
        return false;
        }
    else
        return $error = "<p class='alert alert-danger'>Champs vide</p>";
    }
    public function getLogin(){
        return $this->login;
    }
     public function getPass(){
        return $this->pass;
    }
    
  public function verifyPass($password_conf, $password){
 	if(password_verify($password_conf, $password) === true){
 		return true;
 	}
 	else 
 		return false;
 }  
    
    
    //fonctionnalités sur la reservation le planning les books
    
    public function getMonth(){
         $infoPremierJour = getdate();
        if(isset($_GET['month'])){
        $this->month = $_GET['month'];
            return $this->month;
        }
        else{   
        $this->month = $infoPremierJour['mon'];
            return $this->month;
        }
    }
    public function getMonths(){
        return $this->month;
    }
    public function getYears(){
        return $this->year;
    }
    
    public function getyear(){
         $infoPremierJour = getdate();
        if(isset($_GET['year'])){
            $this->year = $_GET['year'];
            return $this->year;
        }
        else{
             $this->year = $infoPremierJour['year'];
            return $this->year;
        }
    }
    public function getExist(){
        if(empty($_GET)){
            $this->month = str_pad($this->month, 2, 0, STR_PAD_LEFT);
           controller::Redirect("planning.php?month=".$this->month."&year=".$this->year.""); 
        }
    }
    
    public function dateBook(){
    
        if(isset($_GET['date'])){
        $date = $_GET['date'];
//    var_dump($numYear);
    //lejour de la date en anglais
        $this->month = date('m', strtotime($date));
        $this->year = date('Y', strtotime($date));
    $this->jour = date('l', strtotime($date));
            return $date;
        }
        else{
            controller::Redirect("planning.php?month=".$this->month."&year=".$this->year."");
        }
        
    }
    
    public function notWeek(){
        if($this->jour == "Sunday" || $this->jour == "Saturday"){
      controller::Redirect("planning.php?month=".$this->month."&year=".$this->year."");
  }
        }
    //a revoir defaut dans la mise en classe trouver comment gere bien les entree des formulaires
    public function verifPost(){
            
            if(!empty($_POST['debut']) && !empty($_POST['fin']) && !empty($_POST['titre']) && !empty($_POST['description'])){
            $this->titre = $_POST['titre'];
            $this->desc = $_POST['description'];
            $this->id_user = $_SESSION['id'];
            $this->start = $_POST['debut'];
            $this->end = $_POST['fin'];
                return false;
    }
        else 
            return $error['empty'] = "<p class='alert alert-success'>Champ vide</p>";
    }
    
    public function getTitle(){
        return $this->titre;
    }
     public function getDesc(){
                 return $this->desc;
    }
     public function getId(){
                 return $this->id_user;
     }
    public function getStart(){
        return $this->start;
    }

    
    public function getFormatStart($date){
        
$findStart = DateTime::createFromFormat('Y-m-d H:i', $date .' '. $this->start);
        $debut = $findStart->format('Y-m-d H:i');
        return $debut;
        
    }
    public function getFormatEnd($date){
        
        $findEnd = DateTime::createFromFormat('Y-m-d H:i', $date .' '. $this->end);
        $fin = $findEnd->format('Y-m-d H:i');
                return $fin;
    }
    public function calculInt(){
        $debut = date('H', strtotime($_POST['debut']));
        $fin = date('H', strtotime($_POST['fin']));
        $int = $fin - $debut;
        if($int === 1){
        return true;
        }
        else
            return false;
    }

 public static function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
} 
    
    
}