$("#button").click(function(){
    $.ajax({
    type:"get",
    url: "expression.txt",
    data:"data",
    dataType:"text",
    })
    .done(function(response){
        $("#vide").append(response);
    });

});