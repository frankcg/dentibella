var tabla;

function init() {
    $("#menu_form").on("submit",function(e){
        actualizar(e);	
    });
}

$(document).ready(async function(){
    tabla=$('#seguimiento_table').dataTable({
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
            url:'../../controllers/seguimiento.php?op=listar',
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

function espera(id_cita) {	
  swal({
      title: "DentiBella",
      text: "¿Estás seguro de cambiar a espera la cita?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
          $.post("../../controllers/seguimiento.php?op=espera", {id_cita : id_cita}, function (data) {
          }); 

          $('#seguimiento_table').DataTable().ajax.reload();

        swal("Cambiado", {
          icon: "success",
        });
      } else {
        swal("Cancelado", {
          icon: "error",});
      }
    });
}

function en_atencion(id_cita) {	
  swal({
      title: "DentiBella",
      text: "¿Estás seguro de cambiar a en atención la cita?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
          $.post("../../controllers/seguimiento.php?op=en_atencion", {id_cita : id_cita}, function (data) {
          }); 

          $('#seguimiento_table').DataTable().ajax.reload();

        swal("Cambiado", {
          icon: "success",
        });
      } else {
        swal("Cancelado", {
          icon: "error",});
      }
    });
}

function atendido(id_cita) {	
  swal({
      title: "DentiBella",
      text: "¿Estás seguro de cambiar a atendido la cita?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
          $.post("../../controllers/seguimiento.php?op=atendido", {id_cita : id_cita}, function (data) {
          }); 

          $('#seguimiento_table').DataTable().ajax.reload();

        swal("Cambiado", {
          icon: "success",
        });
      } else {
        swal("Cancelado", {
          icon: "error",});
      }
    });
}

function ausente(id_cita) {	
  swal({
      title: "DentiBella",
      text: "¿Estás seguro de cambiar a ausente la cita?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
          $.post("../../controllers/seguimiento.php?op=ausente", {id_cita : id_cita}, function (data) {
          }); 

          $('#seguimiento_table').DataTable().ajax.reload();

        swal("Cambiado", {
          icon: "success",
        });
      } else {
        swal("Cancelado", {
          icon: "error",});
      }
    });
}

init();