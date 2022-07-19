var tabla;
function init(){
    $("#cita_form").on("submit",function(e){
        guardar(e);
    });
}

$(document).ready(function(){
    $.post("../../controllers/cita.php?op=comboDoc", function(data, status){
        $('#id_doctor').html(data);
    }); 
    $.post("../../controllers/cita.php?op=comboPac", function(data, status){
        $('#id_paciente').html(data);
    }); 
});

function guardar(e){
    e.preventDefault();
    var formData = new FormData($("#cita_form")[0]);
    $.ajax({
        url:"../../controllers/cita.php?op=insert",
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#id_doctor').val('');
            $('#id_paciente').val('');
            $('#fecha_cita').val('');
            $('#hora_cita').val('');
            $('#sintoma_uno').val('');
            $('#sintoma_dos').val('');
            $('#diagnostico').val('');
            $('#tiempo').val('');

            if (datos!='validado') {
                swal("Correcto!","Registrado Correctamente","success");
            }else{
                swal("Incorrecto!","No Disponibilidad de Agendar","error");
            }
        }
    });
}

$('#id_paciente').change(function(){
    var paciente= $(this).val();
    console.log(paciente);
    $.post("../../controllers/cita.php?op=persona",{paciente}, function(data, status){
        data = JSON.parse(data);
        console.log(data);
        $('#persona').val(data.persona);
    });         
});
 

$(document).ready(async function(){
    tabla=$('#agendas_table').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: true,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            ],
        "ajax":{
            url:'../../controllers/cita.php?op=listar_agenda',
            type:"post",
            dataType:"json",
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language":{
            "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
            "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
});

$('#btn-diagnosticar').click(function(){
    var array_sintomas = $('[name="sintomacheck[]"]:checked').map(function(){
        return this.value;
      }).get();    
    connect_swi_prolog(array_sintomas);
});

function connect_swi_prolog(array_sintomas){    

    var formData = {sintomas:array_sintomas.toString()};

    $.ajax({
        url: "../../controllers/cita.php?op=swiprolog",
        type: "POST",
        data: formData,
        success: function(data){
            console.log(data);
            $('#diagnostico').val(data);
            //$('#modal-sintomas').modal('hide');            
            $('#modal-sintoma-close').click();
            getTiempo();
        }
    });
    
}
function getTiempo(){
    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'periodontitis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'periodontitis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'periodontitis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'periodontitis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'periodontitis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'periodontitis') {
        document.getElementById('tiempo').value = '30 min';
    }
    
    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'necrosis dental') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'necrosis dental') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'necrosis dental') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'necrosis dental') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'necrosis dental') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'necrosis dental') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }

    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
        document.getElementById('tiempo').value = '60 min';
    }

    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'paricoronaritis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'paricoronaritis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'paricoronaritis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'paricoronaritis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'paricoronaritis') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'paricoronaritis') {
        document.getElementById('tiempo').value = '30 min';
    }

    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
        document.getElementById('tiempo').value = '60 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
        document.getElementById('tiempo').value = '60 min';
    }

    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'caries dental dertina') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'caries dental dertina') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'caries dental dertina') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'caries dental dertina') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'caries dental dertina') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'caries dental dertina') {
        document.getElementById('tiempo').value = '30 min o 60 min';
    }

    if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
        document.getElementById('tiempo').value = '30 min';
    }
    if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
        document.getElementById('tiempo').value = '30 min';
    }
}

init();