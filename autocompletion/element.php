<?php
$pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
if(isset($_POST['id'])){
//    var_dump($_POST['id']);
    $id_country =$_POST['id'];
    $sql = $pdo->prepare("SELECT * FROM country WHERE id = :id");
    $sql->execute([
        'id' => $id_country
    ]);
    $data = $sql->fetch();
    $response = "<div style='text-align: center'>
                   <h1>ELEMENT</h1>
                 <strong>id </strong> ".$data['id']."<br>
                <strong>iso </strong>  ".$data['iso']."<br>
                 <strong>name </strong> ".$data['name']."<br>
                <strong>nicename </strong> ".$data['nicename']."<br>
                 <strong>iso3 </strong> ".$data['iso3']."<br>
                 <strong>numcode </strong> ".$data['numcode']."<br>
                <strong>phonecode </strong> ".$data['phonecode']."<br>
                 </div>
                  ";
    exit($response);

}