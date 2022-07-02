// ---------- On document Is ready Display User offline and online ---------- 
$( document ).ready(function() {
    displayUser();
});

function displayUser(){
    $.ajax({
        url:'chat',
        method:'post',
        data : {
            call : "back"  
        },
        dataType : "text",
        success: function(data){
            if (data.indexOf("true")){
                $("#userListOnline").html(data);
            }
            else {
                $("userLIstOnline").html(data);
            }
        },
    });
}
function homeToogle() {
    window.location.href = "chat";
}

function chatViaUserId(id){
    $("#backToDisplayUser").append("<button onclick='homeToogle()' class='btn btn-sm btn-outline-primary'>Back</button>")
    $("#userListOnline").empty();
    $("#searchBar").remove();
    $("#profilUser").removeClass( "col-5" ).addClass("col-12");
    $("#userListOnline").addClass( "overflow-scroll" );
    console.log(id);
    // ---- Ajax function laod message
    
        $.ajax({
            url:'chat',
            method:'get',
            data : {
                user_id : id  
            },
            dataType : "text",
            success: function(data){
                if (data.indexOf("true")){
                    $("#userListOnline").html(data);
                }
                else {
                    $("userLIstOnline").html(data);
                }
            },
        });
        intervalLoadMessage(id);
        
}

function intervalLoadMessage(id){
    setInterval(function(){ 
    $.ajax({
        url:'chat',
        method:'post',
        data : {
            loadMessage : id  
        },
        dataType : "text",
        success: function(datas){
            console.log(datas);
            $("#cardBody").html(datas);

        },
    });
}, 1000);
}







function autoCompletionUser(){
    $("#userListOnline").empty();
    let word = $("#search").val();
    if(word.length==0) {
        displayUser();
    }
    else {
    $.ajax({
        url:'chat',
        method:'post',
        data : {
            search : word  
        },
        dataType : "text",
        success: function(data){
            console.log(data.length);

            if(data.length == 0) {
                $("#userListOnline").html("<div class='alert alert-light text-center' role='alert'>No result for "+word+"</div>");
            }

            else {
                $("#userListOnline").html(data);
            }
        },
    });
    
    

}
}

//IF WRITE AND TAPE ENTER SEND MSG
function autoCompletionMessage(e, id){
    let word = $("#msg").val().trim();

    if(e.key == "Enter" && e.keyCode == 13) {
        if(word.length==0) {
            $("#response").html("<div class='alert alert-danger text-center' role='alert'>No message send</div>");
        }
        else {
    $("#msg").val('');
            console.log(word);
            $.ajax({
                url:'chat',
                method:'post',
                data : {
                    message : word,
                    id_recipient : id  
                },
                dataType : "text",
                success: function(data){    
                    $("#response").html("<div class='alert alert-success text-center' role='alert'>Message send</div>");
                },
            });
    setTimeout(function(){ 
        $("#response").empty();
        intervalLoadMessage(id);

    }, 1000);
        }
    }
}

//IF WRITE AND CLICK SEND MSG
function sendMessage(id){
    let word = $("#msg").val().trim();

    if(word.length==0) {
        $("#response").html("<div class='alert alert-danger text-center' role='alert'>No message send</div>");
    }
    else {
    $("#msg").val('');

         $.ajax({
            url:'chat',
            method:'post',
            data : {
                message : word,
                id_recipient: id
            },
            dataType : "text",
            success: function(data){
                $("#response").html("<div class='alert alert-success text-center' role='alert'>Message send</div>");
            },
        });

    setTimeout(function(){ 
        $("#response").empty();
        intervalLoadMessage(id);

    }, 1000);
    }
}