<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Job04</title>
</head>
<body id="body">
<header id="header">
    <div id="z"></div>
    <a id="a" href="">Acueil</a>
    <div id="z"></div>
    <a id="a" href="">Présentation</a>
    <div id="z"></div>
    <a id="a" href="">Contact</a>
</header>
<div id="remplie">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let i = 0;
    $('#header').click(function(event){
        i++;
        if(i%2==0)
        {
            document.body.style.backgroundColor = "white";
            $('#remplie').empty();
        }
        else
        {
        document.body.style.backgroundColor = "grey";
        $("#remplie").append("<a id='e' href=''>Acueil</a>");
        $("#remplie").append("<a id='e' href=''>Présentation</a>");
        $("#remplie").append("<a id='e' href=''>Contact</a>");
        }
    });
</script>
</body>
</html>