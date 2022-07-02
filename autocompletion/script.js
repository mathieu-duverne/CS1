function autoC(){
    let word = $("#find").val();
    if(word.length < 1){
        $('#response').html("");
    }
    if(word.length > 0){
        $.ajax({
            url:'index.php',
            method:'post',
            data : {
                search : 1,
                s : word
            },
            success: function(data){
                $("#response").html(data);
                // console.log(data);
            },
            dataType : "text",
        });
        // console.log(word);
    }
}
function clickOnResult(country){
    var count = country.textContent;
    console.log(count);
    $('#find').val(count);
    $('#response').html("");
}
function list(){
    // console.log("sisi");
    $('#response').html("");
    let word = $("#find").val();
    // console.log(word.length);
    if(word.length == 0){
        $('#response').html("veuillez recherchez quelques choses !");
        return 1;
    }
    $.ajax({
        url:'recherche.php',
        method:'post',
        data : {
            search : 1,
            s : word
        },
        success: function(data){
            $("#resultat").html(data);
            // console.log(data);
        },
        dataType : "text",
    });
}

function clickresultatsearch(event){
   let id_country = event.id;
    $.ajax({
        url:'element.php',
        method:'post',
        data : {
            id : id_country
        },
        success: function(data){
            $("#element").html(data);
            // console.log(data);
        },
        dataType : "text",
    });
}