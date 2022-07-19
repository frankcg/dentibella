var tabla;

function init() {
    $("#menu_form").on("submit",function(e){
        actualizar(e);	
    });
    var year = currentTime.getFullYear()
    console.log(year);
}

$(document).ready(async function(){
    
    tabla=$('#cita_table').dataTable({
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
            url:'../../controllers/cita.php?op=listar',
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

function eliminar(id_cita) {	
    swal({
        title: "DentiBella",
        text: "¿Estás seguro de eliminar la cita?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.post("../../controllers/cita.php?op=eliminar", {id_cita : id_cita}, function (data) {
            }); 

            $('#cita_table').DataTable().ajax.reload();

          swal("Eliminado", {
            icon: "success",
          });
        } else {
          swal("Cancelado", {
            icon: "error",});
        }
      });
}

$(document).ready(function(){
    $.post("../../controllers/cita.php?op=comboPac", function(data, status){
         $('#id_paciente').html(data);
    }); 
    $.post("../../controllers/cita.php?op=comboDoc", function(data, status){
        $('#id_doctor').html(data);
   }); 
 });


function editar(id_cita){
    $.post("../../controllers/cita.php?op=mostrar",{id_cita : id_cita}, function(data, status){
        data = JSON.parse(data);
        $('#titulo_crud').html('MODIFICAR CITA');
        $('#fecha_cita').val(data.fecha_cita);
        $('#hora_cita').val(data.hora_cita);
        $('#id_cita').val(data.id_cita);
    }); 
    $("#myModal").modal('show');	
}

function actualizar(e){
    e.preventDefault();
	var formData = new FormData($("#menu_form")[0]);
    $.ajax({
        url: "../../controllers/cita.php?op=actualizar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#menu_form')[0].reset();
            $("#myModal").modal('hide');
            $('#cita_table').DataTable().ajax.reload();	
            swal("Correcto!","Actualizado Correctamente","success");
        }
    }); 
}

init();