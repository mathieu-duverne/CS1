<?php
session_start();
// CONNEXION BDD
try
{
    $conn = new PDO("mysql:host=localhost;dbname=utilisateurs", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch
(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
///////////////////// FUNCTION ////////////////
 $stmt = $conn->prepare("SELECT email , password FROM utilisateurs WHERE email = :email ;");

if(isset($_POST['connexion']))
{
    if(empty($_POST['email']) || empty($_POST['password']))
    {
        exit();
    }
    $stmt = $conn->prepare("SELECT nom, prenom, email , password FROM utilisateurs WHERE email = :email ;");
    $stmt->execute(['email' => $_POST['email']]);
    if($stmt->rowCount() == 0){
        echo"<p style='color:red;'>Email non valide !</p>";
    }
    else{
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user['password']==$_POST['password'])
        {
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['email'] = $_POST['email'];
            exit('<p style="display: none;">success</p>');
        }
        if($user['password']!=$_POST['password'])
        {
            echo"<p style='color:red;'>Password not working !</p>";
        }
    }
}

?>