let cloud = '';
$("#button").click(function () {
    var parent = $("#shuffle");
    const divs = parent.children();
    while (divs.length) {
        parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
    }
});
$('img').click(function(event){
    cloud += event.target.id;
    // console.log(cloud);
    $("#rangee").append(this);
    console.log(this)
    // console.log(cloud.length);
    // console.log(cloud);
    if(cloud.length==6)
    {
        if(cloud == 123456)
        {
            document.write("<h1 style='color: green'>Tu as gagné Bravo Quelle jolie arc en ciel !!</h1>");
        }
        else
            document.write("<h1 style='color: red'>Tu as perdu !! Recommence</h1>");
    }
});