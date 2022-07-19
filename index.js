function init(){

}

$(document).ready(function(){ 

});

$(document).on("click", "#btnasistente", function () {
    if ($('#rol').val()==1){
        $('#lbltitulo').html("Acceso Asistente");
        $('#btnasistente').html("Acceso Administrador");
        $('#rol').val(2);
    }else{
        $('#lbltitulo').html("Acceso Administrador");
        $('#btnasistente').html("Acceso Asistente");
        $('#rol').val(1);
    }
});

init();