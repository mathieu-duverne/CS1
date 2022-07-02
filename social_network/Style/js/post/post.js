function autoCompletion(){
    let word = $("#search").val();
        $("#publication").empty()
        $.ajax({
            url:'post?',
            method:'post',
            data : {
                search : word
            },
            dataType : "text",
            success: function(data){
                $("#publication").html(data);
            },
        });
}

// ------ IF USER POST A PUBLICATION insert in bdd IN AJAX------ //
function post() {
  $('#error').empty();
  if($("#title")[0].value !="" && $('#text')[0].value != "")
  {
    let title = $("#title")[0].value;
    let text = $("#text")[0].value;
      $("#text").empty()
      $("#title").empty()
    $.ajax({
      url: 'post',
      type: 'POST',
      data: {
        title : title,
        text : text
      },
      dataType: 'text',
    })
        .done(function (data)
        {
          if(data.indexOf("R")>=0) {
            $('#result').append("<div class=\"alert alert-danger text-right\" role='alert'>Connect to website</div>")
            window.setTimeout( function(){
            window.location = "post";
            { $('#result').empty()}
          }, 1500 );
          }
          else if(data.indexOf("null")>=1) {
              $('#result').append("<div class=\"alert alert-success text-right\" role='alert'>Your publication is posted</div>")
              window.setTimeout( function(){
              window.location = "post";
              { $('#result').empty()}
            }, 1500 );
            }
        });
        }
   else {
    $('#error').append("<div class='alert alert-danger' id='message'>Completed field !</div>");
    setTimeout(function(){ $('#error').empty(); }, 1500);
   }

}
function save(){

    $('#errors').empty();
    let texte = $("#textUpdate")[0].value
    let id = $("#titleUpdate")[0].name
    let title = $("#titleUpdate")[0].value
    let titlePlaceholder = $("#titleUpdate")[0].placeholder
    let textePlaceholder = $("#textUpdate")[0].placeholder
    let titlePost = ""
    let textePost = ""

    if(texte == "" && title == "") {
        $("#errors").append("<div class='alert alert-danger'>Vous n'avez rien modifier !</div>")
        window.setTimeout(function () {
            $('#errors').empty();
        }, 1000);
    }
    else if(texte == "" && title != ""){

         titlePost = title
         textePost = textePlaceholder
    }
    else if (title == "" && texte != "") {
         titlePost = titlePlaceholder
         textePost = texte
    }
    else {
         titlePost = title
         textePost = texte
    }
    if(title != "" || texte != "") {
        $.ajax({
            url: 'post',
            type: 'POST',
            data: {
                id : id,
                updateTitle: titlePost,
                updateTexte: textePost
            },
            dataType: 'text',
        })
            .done(function (data) {
                $('#errors').append("<div class='alert alert-success'>Votre publication a bien était modfié</div>");
                setTimeout(function(){ window.location = "post" }, 1500);
            });
    }
}

// ------ USER UPDATE PUBLICATION ------ //
function updatePost(id) {
    let idPost = id
    $("button").remove();
    // ---- get all Post Card ---- //
    let rem = document.getElementsByName(id);
    // ------ suppr all Post Card ------ //
    let title = rem[0].textContent
    let texte = rem[3].textContent
    let fullname = rem[7].textContent
    for (let i = 0; i < 3; i++){
        rem[0].remove();
    }
    // ----- POUR PLACEHOLDER VOIR SI JE PEUX PAS RECUP VALEUR AVANT DE REMOVE ////////
    // ---- get Card empty ---- //
    let card = $('.card')

    for (let w = 0; w < card.length;w++) {
        if(card[w].id==id) {
            $(card[w]).append(
                '<br><div id="errors"></div>' +
                '<div class="card-header">' +
                '<form method="post"><input type="text" name="'+ id +'" id="titleUpdate"  placeholder="' + title + '"/>' +
                '</div>' +
                '<div class="card-body">' +
                '<blockquote class="mb-0">' +
                '<div class="mb-3">\n' +
                '            <textarea id="textUpdate" placeholder="' + texte  + '" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>\n' +
                '</form></div>' +
                '<footer class="blockquote-footer">Created by the famous ' +
                '<span>'+ fullname +'' +
                '</span></footer></blockquote></div>' +
                '<div><div class="text-right">' +
                '<a onclick="save()" class="btn btn-sm btn-outline-secondary">Save</a>' +
                '<a href="post" class="btn btn-sm btn-outline-primary ">Back</a>' +
                '</div></div>');
        }
    }
}

function deletePost(id){
    let req = 1
    $.ajax({
        url: 'post',
        type: 'POST',
        data: {
            id : id,
            reqDelete : req
        },
        dataType: 'text',
    })
        .done(function (data) {
            $('#success').append("<div class='alert alert-success'>Votre publication a bien était supprimer</div>");
            setTimeout(function(){ window.location = "post" }, 1500);
        });
}