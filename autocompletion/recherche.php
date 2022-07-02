<?php

$pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

if(isset($_POST['search'])) {
    $s = strtoupper($_POST['s']);
    $sql = $pdo->query("SELECT * FROM country WHERE name LIKE '$s%'");
//    var_dump($sql);
    if ($sql->rowCount() > 0) {
        $response = "<br><br><br><br>LIST of result";
        while ($data = $sql->fetch(PDO::FETCH_ASSOC))
            $response .= "<div onclick='clickresultatsearch(this)' class='resultatsearch' id='".$data['id']."'><p>
            <strong>Country name</strong>
               " . strtolower($data['name']) ."<br>
               <strong>Country code</strong>
               ".$data['iso3'] ."<br>
               <strong>Indicatif code</strong>
               ".$data['numcode']."</p>";
    $response.= "</div>";

    } else {
        $response = "Invalid search !";
    }
    exit($response);
}

?>


<div id="resultat">

</div>