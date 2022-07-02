$(document).ready(function(){
    const apiUrl = 'https://geo.api.gouv.fr/communes?codePostal=';
    const format = '&format=json';

    let zipcode = $('#zipcode'); 
    let city = $('#city');
    let errors = $('#error'); 

    $(zipcode).on('blur', function(){
        let code = $(this).val();
        // console.log(code);
        let url = apiUrl+code+format;
        //console.log(url);
        fetch(url, {method: 'get'}).then(response => response.json()).then(results => {
                //console.log(results);
                $(city).find('option').remove();
                if(results.length){
                    $(errors).text('').hide();
                    $.each(results, function(key, value){
                        // console.log(value);
                        console.warn(value.nom);
                        $(city).append('<option value="'+value.nom+'">'+value.nom+'</option>');
                    });
                }
                else{
                    if($(zipcode).val()){
                        console.log('Erreur de code Postale.');
                        $(errors).text('Aucune commune avec ce code postal.').show();
                    }
                    else{
                        $(errors).text('').hide();
                    }
                }
        }).catch(err => {
            console.log(err);
            $(city).find('option').remove();
        });
    });
});
document.getElementById("form_client_info").addEventListener("submit", function(e)
{
var erreur;
var inputs = this.getElementsByTagName("input");

for(var i = 0; i < inputs.length;i++){
    if(!inputs[i].value){
        erreur = "veuillez renseignez tout les champs";
    }
}
if(erreur)
{
    e.preventDefault();
    document.getElementById("erreur").innerHTML = erreur;
    return false;
} else {
    alert('formulaire envoyé');
}
});