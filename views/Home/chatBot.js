$(document).ready(function(){
    $("#send-btn").on("click", function(){
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        
        // start ajax code
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text='+$value,
            success: function(result){
                console.log(result);
                result.split(" ",1);
                console.log(result.split(" ",6));
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>Los Detalles son los siguientes: '+ result +'</p></div></div>';
                $(".form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});


$(document).ready(function(){
    $("#send").on("click", function(){
        $value = $("#send").val();
        console.log($value);
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        
        // start ajax code
        $.ajax({
            //url: '../ChatBot/message.php',
            //type: 'POST',
            //data: 'text='+$value,
            success: function(result){
                //console.log(result);
                //result.split(" ",1);
                //console.log(result.split(" ",6));
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>Hola!!</p></div></div>';
                $(".form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});

$(document).ready(function(){
    $("#envio").on("click", function(){
        $value = $("#envio").val();
        console.log($value);
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        
        // start ajax code
        $.ajax({
            success: function(){
                //console.log(result);
                //result.split(" ",1);
                //console.log(result.split(" ",6));
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>Bien y tú???</p></div></div>';
                $(".form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});
$(document).ready(function(){
    $("#enviar").on("click", function(){
        $value = $("#enviar").val();
        console.log($value);
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');
        
        // start ajax code
        $.ajax({
            //url: '../ChatBot/message.php',
            //type: 'POST',
            //data: 'text='+$value,
            success: function(result){
                //console.log(result);
                //result.split(" ",1);
                //console.log(result.split(" ",6));
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>Por favor ingresa el nombre del paciente</p></div></div>';
                $(".form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});