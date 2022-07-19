function init(){
    $("#paciente_form").on("submit",function(e){
        guardar(e);
    });
}

$(document).ready(function(){
    
});

function edad() {
    var num = $("#fecha_nacimiento").val();
    var año = new Date(num).getFullYear();

    var currentTime = new Date();
    var year = currentTime.getFullYear();

    let age = year-año;

    if (age>=5 && age<=10) {
        document.getElementById('persona').value = 'Niño';
    }else{
        if (age>=11 && age<=17) {
            document.getElementById('persona').value = 'Adolescente';
        }else{
            if (age>=18 && age<=30) {
                document.getElementById('persona').value = 'Adulto Joven';
            }else{
                if (age>=31 && age<=64) {
                    document.getElementById('persona').value = 'Adulto';
                }else{
                    if (age>=65) {
                        document.getElementById('persona').value = 'Tercera Edad';
                    }else{
                        if (age>=0 && age<=4) {
                            document.getElementById('persona').value = 'Bebé';
                        }
                    }
                }
            }
        }
    }
    
}

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#paciente_form")[0]);
    $.ajax({
        url:"../../controllers/paciente.php?op=insert",
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#nombres').val('');
            $('#apellidos').val('');
            $('#dni').val('');
            $('#telefono').val('');
            $('#direccion').val('');
            $('#fecha_nacimiento').val('');
            $('#enfermedad').val('');
            $('#persona').val('');
            if (datos!='validado') {
                swal("Correcto!","Registrado Correctamente","success");
            }else{
                swal("Incorrecto!","Paciente Ya registrado","error");
            }
        }
    });
}
 
init();