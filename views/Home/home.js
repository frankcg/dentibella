function init() {
}

$(document).ready(function(){
    $.post("../../controllers/home.php?op=mostrarUsuarios", function(data){
        data=JSON.parse(data);
        $('#usuarios').html(data.usuarios);
    }); 
    $.post("../../controllers/home.php?op=mostrarPacientes", function(data){
        data=JSON.parse(data);
        $('#pacientes').html(data.pacientes);
    }); 
    $.post("../../controllers/home.php?op=mostrarCitas", function(data){
        data=JSON.parse(data);
        $('#citas').html(data.citas);
    });
    $.post("../../controllers/home.php?op=mostrarAu", function(data){
        data=JSON.parse(data);
        $('#ausentes').html(data.ausentes);
    });
    $.post("../../controllers/home.php?op=mostrarHis", function(data){
        data=JSON.parse(data);
        $('#historias').html(data.historias);
    });
    $.post("../../controllers/home.php?op=mostrarDoc", function(data){
        data=JSON.parse(data);
        $('#doctores').html(data.doctores);
    });
});

init();