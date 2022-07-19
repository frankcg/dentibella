function init(){
    $("#usuario_form").on("submit",function(e){
        guardar(e);
    });
}

$(document).ready(function(){ 
});

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
        $.ajax({
            url:"../../controllers/usuario.php?op=insert",
            type:"POST",
            data:formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                $('#nombre').val('');
                    $('#apellidos').val('');
                    $('#usuario').val('');
                    $('#id_rol').val('');
                    $('#clave').val('');
                if (datos!='validado') {
                    swal("Correcto!","Registrado Correctamente","success");
                    
                }else{
                    swal("Incorrecto!","Ya exite el usuario","error");
                }
            }
                
        });
    
}
 
init();