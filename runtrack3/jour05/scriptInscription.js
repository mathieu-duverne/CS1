function ValidateEmail(mail)
{
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
    {
        return true
    }
    return false
}
var success = [];
$('#recuperation').click( function (event){
    var nom = $("#nom").val();
    var prenom = $('#prenom').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_hash = $('#password_hash').val();
    var inscription_submit = $('#recuperation').val();
    //ici vide les erreurs
    $("#error_empty").empty();
    $("#error_email").empty();
    $("#error_password").empty();
    var error = [];
    if(nom == "" || prenom == "" || email == "" || password == "" || password_hash == "")
    {
        if($('#error').children().length == 0){
            error['empty'] = "<p style='color: red'>Champs Vide !</p>";
            var error_empty = $("#error_empty").val();
            $("#error_empty").append(error['empty']);
        }
    }
    if(ValidateEmail(email)===false)
    {
        error['email'] = "<p style='color: red'>Email non valide</p>";
        var error_email = $("#error_email").val();
        $("#error_email").append(error['email']);
    }
    if(password!=password_hash)
    {
        var error_password = $("#error_password").val();
        error['password'] = "<p style='color: red'>Password non valide !</p>";
        $("#error_password").append(error['password']);
    }
    else if(ValidateEmail(email)===true && nom != "" && prenom != ""){
       $.ajax({
            url: 'Controleur_inscription.php',
            type: 'POST',
            data:{
                nom:nom,
                prenom:prenom,
                email:email,
                password:password,
                password_hash:password_hash,
                inscription:inscription_submit,
            },
            dataType: 'text',
        })
            .done(function(data){
                $('#result').html(data);
                if(data.indexOf('success') >=0){
                    window.setTimeout( function(){
                        window.location = "connexion.php";
                        { alert("Inscription effectué avec succée") }
                    }, 100 );
                }
            })
    }
});
   

