var tabla;

function init() {
    $("#menu_form").on("submit",function(e){
        actualizar(e);	
    });
}

$(document).ready(async function(){
    tabla=$('#paciente_table').dataTable({
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
            url:'../../controllers/paciente.php?op=listar',
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

function eliminar(id_paciente) {	
    swal({
        title: "DentiBella",
        text: "¿Estás seguro de eliminar el paciente?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.post("../../controllers/paciente.php?op=eliminar", {id_paciente : id_paciente}, function (data) {
            }); 

            $('#paciente_table').DataTable().ajax.reload();

          swal("Eliminado", {
            icon: "success",
          });
        } else {
          swal("Cancelado", {
            icon: "error",});
        }
      });
}

function editar(id_paciente){
    $.post("../../controllers/paciente.php?op=mostrar",{id_paciente : id_paciente}, function(data, status){
        data = JSON.parse(data);
        $('#titulo_crud').html('MODIFICAR PACIENTE');
        $('#nombres').val(data.nombres);
        $('#apellidos').val(data.apellidos);
        $('#dni').val(data.dni);
        $('#telefono').val(data.telefono);
        $('#direccion').val(data.direccion);
        $('#id_paciente').val(data.id_paciente);
    }); 
    $("#myModal").modal('show');	
}

function actualizar(e){
    e.preventDefault();
	var formData = new FormData($("#menu_form")[0]);
    $.ajax({
        url: "../../controllers/paciente.php?op=actualizar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#menu_form')[0].reset();
            $("#myModal").modal('hide');
            $('#paciente_table').DataTable().ajax.reload();	
            swal("Correcto!","Actualizado Correctamente","success");
        }
    }); 
}

init();