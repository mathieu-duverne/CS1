// VERIF PAYMENT AJAX && JS
$('#submitPayment').click( function (event){
        
    var seize = $("#code_seize").val();
    var exp = $("#exp").val();
    var ccv = $("#ccv").val();
    var addresse = $("#addresse").children()[0].id;
    console.log(addresse);
    
     $("#error_empty").empty();
     $("#error_ccv").empty();
     $("#error_exp").empty();
     $("#error_seize").empty();
     var error = [];
 
            if(seize == "" || exp == "" || ccv == "")
            {
                error['empty'] = "<p style='color: red'>Champs Vide !</p>";
                $("#error_empty").append(error['empty']);
            }
            if(seize != "1212 1212 1212 1212")
            {   
                error['seize'] = "<p style='color: red'>mauvais code a seize chiffres</p>";
                $("#error_seize").append(error['seize']);
            }
            if(exp.length != 4)
            {
                error['exp'] = "<p style='color: red'>date d'expiration non Valide</p>";
                $("#error_exp").append(error['exp']);             
            }
            if(ccv.length != 3)
            {
                error['ccv'] = "<p style='color: red'>Code de sécurité non valide</p>";
                $("#error_ccv").append(error['ccv']); 
            }
            else if(seize == "1212 1212 1212 1212" && ccv == "999")
            {
                $.ajax({
                    type: "post",
                    url: "index.php?page=checkout",
                    data:{
                        code_seize:seize,
                        expiration:exp,
                        code_securite:ccv,
                        addresse_commande:addresse,

                    },
                    dataType: "text",
                    success: function (response) {
                        // $('#result').html(response);
                        console.log(response);
                        window.location.href = "index.php?page=produits";
                    }
                });
            }
 });