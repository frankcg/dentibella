function init(){
    $("#doctor_form").on("submit",function(e){
        guardar(e);
    });
}

$(document).ready(function(){
});

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#doctor_form")[0]);
    $.ajax({
        url:"../../controllers/doctor.php?op=insert",
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#nombres').val('');
            $('#apellidos').val('');
            $('#especialidad').val('');
            $('#dni').val('');
            $('#fecha_nacimiento').val('');
            swal("Correcto!","Registrado Correctamente","success");
            }
    });
}
 
init();