$("#filtrer ").click(function order(){
     const idPok = $("#id").val();
     const typePok = $("#type option:selected").val();
     const namePok = $("#nom").val();
    $.ajax({
        type:"get",
        url: "pokemon.json",
        data:"data",
        dataType:"json",
    })
        .done(function (result){
            for(let i = 0; result.length;i++) {
                //tri via ID
                if (namePok == "") {
                    if (!typePok === true) {
                        if (idPok == result[i].id) {
                            $('#rangee').append(result[i].id);
                            $('#rangee').append(result[i].name.french);
                            $('#rangee').append(result[i].type);
                        }
                    }
                }
                if(idPok == "") {
                    if (!typePok === true) {
                        //trie vie name
                        if (namePok == result[i].name.french) {
                            $('#rangee').append(result[i].id);
                            $('#rangee').append(result[i].name.french);
                            $('#rangee').append(result[i].type);
                        }
                    }
                }
                if(idPok == "") {
                    if (namePok == "") {
                        //trie VIA leur type
                        if (typePok == result[i].type[0] || typePok == result[i].type[1]) {
                            $('#rangee').append(result[i].id);
                            $('#rangee').append(result[i].name.french);
                            $('#rangee').append(result[i].type);
                        }
                    }
                }
            }
        })
})
