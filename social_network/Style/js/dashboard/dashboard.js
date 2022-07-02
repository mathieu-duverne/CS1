

function updateAjax() {
    console.log("updateAjax");
    id = $('button')[0].value;
    let firstname = $('input[name="firstname"]')
    let surname = $('input[name="surname"]')
    let email = $('input[name="email"]')
    let role = $('input[name="role"]')
    let avatar_url = $('input[name="avatar_url"]')

    // ------ INIT VAR USER FOR AJAX REQUEST ------- //
    let User = [];

    $('#error').empty();
    if (firstname[0].value == "" && surname[0].value == "" && email[0].value == "" && role[0].value == "" && avatar_url[0].value == "") {
        $('#error').append("<div class='alert-danger text-center' id='message'><br>" +
                            "<span>you did not make any changes</span></div>");
        setTimeout(function(){ $('#error').empty(); }, 1500);
    } else {

        // ---- CHECK FIRSTNAME ---- //
        if (firstname[0].value == "") {
            firstname = $(firstname).attr('placeholder');
        } else {
            firstname = firstname[0].value;
        }

        // ---- CHECK SURNAME ---- //
        if (surname[0].value == "") {
            surname = $(surname).attr('placeholder');
        } else {
            surname = surname[0].value;
        }

        // ---- CHECK email ---- //
        if (email[0].value == "") {
            email = $(email).attr('placeholder');
        } else {
            email = email[0].value;
        }

        // ---- CHECK role ---- //
        if (role[0].value == "") {
            role = $(role).attr('placeholder');
        } else {
            role = role[0].value;
        }

        // ---- CHECK avatar_url ---- //
        if (avatar_url[0].value == "") {
            avatar_url = $(avatar_url).attr('placeholder');
        } else {
            avatar_url = avatar_url[0].value;
        }
        $.ajax({
            url: 'dashboarduser',
            type: 'POST',
            data: {
                id : id,
                firstname: firstname,
                surname: surname,
                email: email,
                role: role,
                avatar_url: avatar_url
            },
            dataType: 'text',
        })
            .done(function (data) {
                $('#resulte').html(data);
                if(data.indexOf("null")>=1){
                    $('#error').append("<div class='alert-success text-center' id='message'><br>" +
                    "<span>You modification are saved</span></div>")
                  window.setTimeout( function(){
                     window.location = "dashboarduser";
                      { $('#error').empty()}
                }, 1500 );
                }
            });
    }
}


function update(id) {
    // --- remove all link of dashboard --- //
    $("button").remove();

    // --- get td via class id --- //
    let td = document.getElementsByClassName(id);
    // ---- value of TD in UPDATE ---- //
    let firstname = td[0]
    let surname = td[1]
    let email = td[2]
    let role = td[3]
    let avatar_url = td[4]

    // ----- remove all td ligne for update ----- //
    $($(`.`+id)).remove();

    // --- get parent of td via class id --- //
    let parentTh = document.getElementById(id)

    // --- REPLACE by input for update --- //
    $(parentTh).after("<td><form>" +
        "<input placeholder='" + firstname.textContent + "' name='firstname' type='text'></td>" +
        "<td><input placeholder='" + surname.textContent + "' name='surname' type='text'></td>" +
        "<td><input placeholder='" + email.textContent + "' name='email' type='email'></td>" +
        "<td><input placeholder='" + role.textContent + "' name='role' type='text'></td>" +
        "<td><input placeholder='" + avatar_url.textContent + "' name='avatar_url' type='text'></td>" +
        "<td></td><td> </td><td><button onclick='updateAjax()' type='button' class=\"btn btn-block btn-primary\" value='"+ id +"'>Save</button></td>" +
        "<td><a href='dashboarduser' class=\"btn btn-block btn-outline-primary\" >Back</a></td>" +
        "</form></td>");
}

function deletes(id) {
    console.log(id);
    if(id===1){
        $('#error').append("<div class='alert-danger text-center' id='message'><br>" +
            "<span>you can't delete admin</span></div>");
        setTimeout(function(){ $('#error').empty(); }, 1500);
    }
    else {
        $.ajax({
            url: 'dashboarduser',
            type: 'POST',
            data: {
                deletes : id
            },
            dataType: 'text',
        })
            .done(function (data) {
                $('#resulte').html(data);
                if(data.indexOf("null")>=1){
                    $('#error').append("<div class='alert-success text-center' id='message'><br>" +
                        "<span>User are deleted</span></div>")
                        window.setTimeout( function(){
                        window.location = "dashboarduser";
                        { $('#error').empty()}
                    }, 1500 );
                }
            });
    }
}
function deletePost(id) {
        $.ajax({
            url: 'dashboardpost',
            type: 'POST',
            data: {
                delete : id
            },
            dataType: 'text',
        })
            .done(function (data) {
                $('#resulte').html(data);
                if(data.indexOf("null")>=1){
                    $('#error').append("<div class='alert-success text-center' id='message'><br>" +
                        "<span>Publication are deleted</span></div>")
                        window.setTimeout( function(){
                        window.location = "dashboardpost";
                        { $('#error').empty()}
                    }, 1500 );
                }
            });
    }