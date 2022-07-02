$("#button").click(function (){
    $(".active").append("<p>le $ est un bon élément\n" +
        "monétaire. Le # de twitter est une bonne I D. Il faudra faire le point avec la\n" +
        "classe pour cacher cet élément.</p>" );
});

$("#cache").click(function(){
   $(".active").empty();
});