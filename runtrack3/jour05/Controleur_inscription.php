<?php
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
// ////////////////////

if(isset($_POST['inscription'])){
    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password']))
    {
        exit();
    }
    if ($_POST['password'] != $_POST['password_hash']) 
    {
        exit();
    }
    else if(isset($_POST['nom']) || isset($_POST['prenom']))
    {
               $sql = "INSERT INTO utilisateurs SET nom = :nom, prenom = :prenom, email = :email, password = :password";
               $stmt = $conn->prepare($sql);
               $stmt->execute([
                   "nom" => $_POST['nom'],
                   "prenom" => $_POST['prenom'],
                   "email" => $_POST['email'],
                   "password" => $_POST['password']
               ]);
               exit('<p style="display:none";>success</p>');
    }
}

           