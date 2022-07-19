function init(){
    $("#pago_form").on("submit",function(e){
        guardar(e);
    });
}

$(document).ready(function(){
    $.post("../../controllers/pago.php?op=comboCit", function(data, status){
        $('#id_cita').html(data);
    }); 
});

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#pago_form")[0]);
    $.ajax({
        url:"../../controllers/pago.php?op=insert",
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#id_cita').val('');
            $('#monto').val('');
            $('#tipo').val('');
            swal("Correcto!","Registrado Correctamente","success");
            }
    });
}
 
init();