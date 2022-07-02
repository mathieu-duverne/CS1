<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job03</title>
</head>
<body>
<div>
    <form action="index.php" id="pokemon" method="post">
    <input id="id" name="id" type="text">
    <input id="nom" name="nom" type="text">
    <select id="type" name="type">
        <option value="">Type</option>
        <option value="Fire">Fire</option>
        <option value="Flying">Flying</option>
        <option value="Water">Water</option>
        <option value="Bug">bug</option>
        <option value="Normal">normal</option>
        <option value="Electric">electric</option>
        <option value="Ground">ground</option>
        <option value="Fairy">fairy</option>
        <option value="Fighting">fighting</option>
        <option value="Psychic">psychic</option>
        <option value="Rock">rock</option>
        <option value="Steel">steel</option>
        <option value="Ice">ice</option>
        <option value="Ghost">ghost</option>
        <option value="Grass">grass</option>
        <option value="Poison">poison</option>
        <option value="Dragon">dragon</option>
    </select>
<button type="button" id="filtrer" name="go">Go</button>
</div>
</form>
<div id="rangee" style="display: flex;flex-direction: column;">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>
