$('#recuperation').click( function (event){
    var email = $('#email').val();
    var password = $('#password').val();
    var connexion_submit = $('#recuperation').val();;
    $("#error_empty").empty();
    var error = [];
    if(email == "" || password == "")
    {
        error['empty'] = "<p style='color: red'>Champs Vide !</p>";
        $("#error_empty").append(error['empty']);
    }
    else
    {
        $.ajax({
            url: 'controleur_connexion.php',
            type: 'POST',
            data:{
                email:email,
                password:password,
                connexion:connexion_submit,
            },
            dataType: 'text',
        })
            .done(function(data){
                $('#resulte').html(data);
                if(data.indexOf('success') >=0){
                    window.setTimeout( function(){
                        window.location = "index.php";
                        { alert("Connexion réussie !") }
                    }, 100 );
                }
            });
    }
})