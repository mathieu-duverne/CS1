//function creation du tableau de jeux
function board(paire){

    //boucle le nombre d'image
    for(let a = 1; a <= paire;a++){
        $('#board').append("<div id='"+a+"' onclick='clicOnImg(this)' class='card'><img id='"+a+"' src='images/"+a+".png' alt=''/></div>");
        $('#board').append("<div id='"+a+"' onclick='clicOnImg(this)' class='card'><img id='"+a+"' src='images/"+a+".png' alt=''/></div>");
    }

    //divs sont les parent de toutes les images
    let divs = $('.card');
    /*parent est la div de tableaux de jeux qui entoure TOUT*/
    let parent = $('#board');
    //function shuffle
    while (divs.length) {
        parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
    }
//    vide les options pour demarer le jeux input RADIO et button START
    $('#option').empty();
}

//player party
$("#start").click(function() {
    chronoStart();
    let n = $( "input:checked" );
    $("#error").empty();
    if(n.length != 1){
        $("#error").append("<p class='message_erreur'>veuillez cochez un input</p>");
    }
    else{
        if(n.val() == 1){
            board(4);
        }
        if(n.val() == 2){
            board(8);
        }
        if(n.val() == 3){
            board(16);
        }
    }
});
let temp = [];
let temp1 = [];
let win =0;
function clicOnImg(div){
    temp.push(div);
    if(temp.length == 1) {
        $(div).css("visibility", "hidden");
        $(div).children().css("visibility", "visible");
        $(div).children().css("opacity", "1");
    }
    if(temp.length == 2){
        $(div).css("visibility", "hidden");
        $(div).children().css("visibility", "visible");
        $(div).children().css("opacity", "1");
       for(let a = 0;a < temp.length; a++){
            if(temp[0].id == temp[1].id){
                $(temp[0]).children().css("border", "5px solid gold");
                $(temp[1]).children().css("border", "5px solid gold");
                temp = [];
                win++;
                if(win==4){
                    chronoTempWin();
                    let chrono = $('#chronotime').val();
                }
            }
            else{
                setTimeout(function(){
                $(temp[a]).css("visibility", "visible");
                $(temp[a]).children().css("visibility", "hidden");
                $(temp[a]).children().css("opacity", "1");
                }, 1000);
                setTimeout(function(){ temp = []; }, 1300);
            }
       }
    }
}


//ai partie
$('#startAlgo').click(function(){
    chronoStart();
    let n = $( "input:checked" );
    $("#error").empty();
    if(n.length != 1){
        $("#error").append("<p class='message_erreur'>veuillez cochez un input</p>");
    }
    else{
        if(n.val() == 1){
            let paire = 4;
            board(paire);
        }
        if(n.val() == 2){
            let paire = 8;
            board(paire);
        }
        if(n.val() == 3){
            let paire = 16;
            board(paire);
        }
        let div = $("#board").children();
        let tempoId = [];
        let arret = 0;
        let paire = div.length / 2;
        ai(paire, div, tempoId, arret);
    }
});

//function AI
function ai(paire, div, tempoId, arret) {
    if (arret == paire) {
        return 3;
    }
    for (let z = 0; z < 2; z++) {
        let w = z + 2;
        $(div[z]).css("visibility", "hidden");
        $(div[z]).children().css("visibility", "visible");
        $(div[z]).children().css("opacity", "1");
        temp.push($(div[z]));
        temp1.push($(div).children()[z].id);
        if (temp.length == 2) {
            // SI la premiere carte et la deuxieme match entre elle
            if (temp[1][0].id == temp[0][0].id) {
                setTimeout(function () {
                    $(temp[0]).children().css("border", "5px solid gold");
                    $(temp[1]).children().css("border", "5px solid gold");
                    temp = [];
                    temp1 = [];
                    div.splice(div[0], 1);
                    div.splice(div[1], 1);
                    arret++;
                    ai(paire, div, tempoId, arret);
                }, 1000);
            }
            //SINON CACHE LES 2 VISIBLES ET RELANCE LES 2 SUIVANTES
            else {
                let pb = [];
                let divs = $("#board").children();
                //IL FAUT GERE SI LES DEUX SONT GOOD SI JUSTE UNE LAQUEL ECT.....
                if (tempoId.includes(temp1[0]) && tempoId.includes(temp1[1])) {
                    for (let c = 0; c < divs.length; c++) {
                        if (divs[c].id == temp1[0]) {
                            pb.push(c);
                            setTimeout(function () {
                                $(temp[0]).css("visibility", "visible");
                                $(temp[0]).children().css("visibility", "hidden");
                                $(temp[0]).children().css("opacity", "1");
                                $(temp[1]).css("visibility", "visible");
                                $(temp[1]).children().css("visibility", "hidden");
                                $(temp[1]).children().css("opacity", "1");
                            }, 1000);
                            setTimeout(function () {
                                $(divs[c]).css("visibility", "hidden");
                                $(divs[c]).children().css("visibility", "visible");
                                $(divs[c]).children().css("opacity", "1");
                                $(divs[c]).children().css("border", "5px solid gold");
                            }, 1500);
                        }
                        if (divs[c].id == temp1[1]) {
                            pb.push(c);
                            console.log(pb.length);
                            setTimeout(function () {
                                $(divs[c]).css("visibility", "hidden");
                                $(divs[c]).children().css("visibility", "visible");
                                $(divs[c]).children().css("opacity", "1");
                                $(divs[c]).children().css("border", "5px solid gold");
                            }, 4000);

                            if (pb.length == 4) {
                                setTimeout(function () {
                                    temp = [];
                                    temp1 = [];
                                    tempoId.push($(div).children()[0].id);
                                    tempoId.push($(div).children()[1].id);
                                    div.splice(div[0], 1);
                                    div.splice(div[1], 1);
                                    arret++;
                                    ai(paire, div, tempoId, arret);
                                }, 4500);
                            }
                        }
                    }
                }
                else if (tempoId.includes(temp1[0]) || tempoId.includes(temp1[1])) {

                    for (let c = 0; c < divs.length; c++) {
                        if (tempoId.includes(temp1[0])) {
                            if (divs[c].id == temp1[0]) {
                                pb.push(c);
                                // console.log(pc.length);
                                setTimeout(function () {
                                    $(temp[0]).css("visibility", "visible");
                                    $(temp[0]).children().css("visibility", "hidden");
                                    $(temp[0]).children().css("opacity", "1");
                                    $(temp[1]).css("visibility", "visible");
                                    $(temp[1]).children().css("visibility", "hidden");
                                    $(temp[1]).children().css("opacity", "1");
                                }, 1000);
                                setTimeout(function () {
                                    $(divs[c]).css("visibility", "hidden");
                                    $(divs[c]).children().css("visibility", "visible");
                                    $(divs[c]).children().css("opacity", "1");
                                    $(divs[c]).children().css("border", "5px solid gold");

                                }, 1500);
                                if (pb.length == 1) {
                                    setTimeout(function () {
                                        temp = [];
                                        temp1 = [];
                                        tempoId.push($(div).children()[0].id);
                                        tempoId.push($(div).children()[1].id);
                                        div.splice(div[0], 1);
                                        div.splice(div[1], 1);
                                        arret++;
                                        ai(paire, div, tempoId, arret);
                                    }, 2000);
                                }
                            }
                        }
                        if (tempoId.includes(temp1[1])) {
                            if (divs[c].id == temp1[1]) {
                                pb.push(c);
                                // console.log(pc.length);
                                setTimeout(function () {
                                    $(temp[0]).css("visibility", "visible");
                                    $(temp[0]).children().css("visibility", "hidden");
                                    $(temp[0]).children().css("opacity", "1");
                                    $(temp[1]).css("visibility", "visible");
                                    $(temp[1]).children().css("visibility", "hidden");
                                    $(temp[1]).children().css("opacity", "1");
                                }, 1000);
                                setTimeout(function () {
                                    $(divs[c]).css("visibility", "hidden");
                                    $(divs[c]).children().css("visibility", "visible");
                                    $(divs[c]).children().css("opacity", "1");
                                    $(divs[c]).children().css("border", "5px solid gold");
                                }, 1500);
                                if (pb.length == 1) {
                                    setTimeout(function () {
                                        temp = [];
                                        temp1 = [];
                                        tempoId.push($(div).children()[0].id);
                                        tempoId.push($(div).children()[1].id);
                                        div.splice(div[0], 1);
                                        div.splice(div[1], 1);
                                        arret++;
                                        ai(paire, div, tempoId, arret);
                                    }, 2000);
                                }
                            }
                        }
                    }
                }
                else {
                        setTimeout(function () {
                            $(temp[0]).css("visibility", "visible");
                            $(temp[0]).children().css("visibility", "hidden");
                            $(temp[0]).children().css("opacity", "1");
                            $(temp[1]).css("visibility", "visible");
                            $(temp[1]).children().css("visibility", "hidden");
                            $(temp[1]).children().css("opacity", "1");
                        }, 1000);
                        setTimeout(function () {
                            temp = [];
                            temp1 = [];
                            tempoId.push($(div).children()[0].id);
                            tempoId.push($(div).children()[1].id);
                            div.splice(div[0], 1);
                            div.splice(div[1], 1);
                            arret++;
                            ai(paire, div, tempoId, arret);
                        }, 1000);
                    }
                }
            }
        }
}


//function chronometre
    let startTime = 0
    let start = 0
    let end = 0
    let diff = 0
    let timerID = 0

    function chrono() {
        end = new Date()
        diff = end - start
        diff = new Date(diff)
        let msec = diff.getMilliseconds()
        let sec = diff.getSeconds()
        let min = diff.getMinutes()
        let hr = diff.getHours() - 1
        if (min < 10) {
            min = "0" + min
        }
        if (sec < 10) {
            sec = "0" + sec
        }
        if (msec < 10) {
            msec = "00" + msec
        } else if (msec < 100) {
            msec = "0" + msec
        }
        document.getElementById("chronotime").innerHTML = hr + ":" + min + ":" + sec + ":" + msec
        timerID = setTimeout("chrono()", 10)
    }

    function chronoStart() {
        document.chronoForm.stop.onclick = chronoStop
        start = new Date()
        chrono()
    }

    function chronoTempWin() {
        clearTimeout(timerID);
    }

    function chronoStop() {
        window.location.href = 'index.html';
    }