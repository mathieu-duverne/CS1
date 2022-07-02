<?php

$pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

if(isset($_POST['search'])){
    $s = strtoupper($_POST['s']);
//    var_dump($s);
    $sql = $pdo->query("SELECT id, name FROM country WHERE name LIKE '$s%'");
//    var_dump($sql);
    if($sql->rowCount() > 0){

            $response = "<ul>";
            while($data = $sql->fetch(PDO::FETCH_ASSOC))
                $response .= "<li onclick='clickOnResult(this)'>".strtolower($data['name'])."</li>";
//                var_dump($data);

            $response .= "</ul>";
    }
    else{
        $response = "<ul><li>no data found !</li></ul>";
    }


    exit($response);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>AutoCompletion</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="text"  id="find" onkeyup="autoC()" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="list()" id="search">Search</button>
        <span>Tape for find your country</span>
    </form>
    <h1>Auto-completion</h1>
</nav>
<div id="response">

</div>
<div id="resultat">

</div>
<div id="element"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>