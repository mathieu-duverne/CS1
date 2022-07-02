<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Job02</title>
</head>
<body >
<nav class="navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand" href="#">LPTF</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="https://laplateforme.io/">Accueil<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" >Units</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" >Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" >Skills</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid bg-light p-3 py-3">
    <div class="row">
        <h1 class="text-center">La plateforme_</h1>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="papillon.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Open modal
                    </button>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Acheter ce magnifique papillon</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <img src="papillon.jpg" class="card-img-top" alt="...">
                                    <div class="text-center">
                                    <p>119$</p>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Payer</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="py-5 p mb-3 p-3 jumbotron bg-secondary">
                <h2 id="remplace">
                    Bonjour, monde!
                </h2>
                <p id="remplace1">
                    This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                </p>
                <hr class="my-4">
                <p id="remplace2">
                    le sens etendue désigne l'univers dans son ensemble.
                </p>
                <div class="container">
                    <div class="text-right">
                        <a class="btn btn-danger btn-large" id="reboot" type="button" href="#">Rebooter le monde</a>

                        <div class="spinner-border text-primary" role="status">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <nav class="d-flex flex-row-reverse" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a id="1" class="page-link" href="#">1</a></li>
                            <li class="page-item"><a id="2" class="page-link" href="#">2</a></li>
                            <li class="page-item"><a id="3" class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="w-50">
                <div class="d-flex flex-row-reverse">
                    <h6>Installation de AI 9000</h6>
                </div>

                <div class="progress">
                    <div><button id="plus" type="button">&#x21E4;</button></div>
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    <div id="moins"><button>&#x21E5;</button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3 p-4">
        <div class="col-4 offset-2 p-3">
            <span>Recevez votre copie gratuite d'internet</span>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                </div>
            </div>

            <label for="basic-url">Your vanity URL</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                </div>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">With textarea</span>
                </div>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="col-2 offset-2 p-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script>
let p = $(".progress-bar").attr("aria-valuenow");
    $("#plus").click(function(event){
        if(p < 100) {
            p = p - 10;
            $(".progress-bar").css("width", p + "%").text(p + " %");
        }
    })
$("#moins").click(function(event){
    if(p < 100) {
        p = p + 10;
        $(".progress-bar").css("width", p + "%").text(p + " %");
    }
})
$("#reboot").click(function(event){
        $("#remplace").empty();
    $("#remplace").append("T’endors pas c’est l’heure de mourir.");
})
$("#1").click(function(event){
    $("#remplace").empty();
    $("#remplace1").empty();
    $("#remplace2").empty();
    $("#remplace3").empty();
    $("#reboot").empty();
    $("#remplace").append("OK");
    $("#remplace1").append("Les");
    $("#remplace2").append("boGoss");
    $("#remplace3").append("Je vous aime");
    $("#reboot").append("Rebooter mon coeur");

})
$("#2").click(function(event){
    $("#remplace").empty();
    $("#remplace1").empty();
    $("#remplace2").empty();
    $("#remplace3").empty();
    $("#reboot").empty();
    $("#remplace").append("Non");
    $("#remplace1").append("PAS");
    $("#remplace2").append("boGoss");
    $("#remplace3").append("Je vous aime PAS");
    $("#reboot").append("boot mon coeur");
})
$("#3").click(function(event){
    $("#remplace").empty();
    $("#remplace1").empty();
    $("#remplace2").empty();
    $("#remplace3").empty();
    $("#reboot").empty();
    $("#remplace").append("c'est un non oui");
    $("#remplace1").append("kousi koussa");
    $("#remplace2").append("bogossss kifkif");
    $("#remplace3").append("Je vous aime moyen");
    $("#reboot").append("Reboot le scooter");
})
</script>
</body>
</html>
