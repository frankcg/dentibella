function init(){
    $("#historia_form").on("submit",function(e){
        guardar(e);
    });
}

$(document).ready(function(){
    $.post("../../controllers/historia.php?op=combo", function(data, status){
         $('#id_cita').html(data);
    }); 
});

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#historia_form")[0]);
    var totalfiles = $('#archivo').val().length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#archivo')[0].files[i]);
        }
    $.ajax({
        url:"../../controllers/historia.php?op=insert",
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#comentario').val('');
            $('#id_cita').val('');
            swal("Correcto!","Registrado Correctamente","success");
            }
    });
}
init();