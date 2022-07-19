var tabla;

function init() {
    $("#menu_form").on("submit",function(e){
        actualizar(e);	
    });
}

$(document).ready(async function(){
    tabla=$('#pago_table').dataTable({
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
            url:'../../controllers/pago.php?op=listar',
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

function eliminar(id_pago) {	
    swal({
        title: "DentiBella",
        text: "¿Estás seguro de eliminar el pago?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.post("../../controllers/pago.php?op=eliminar", {id_pago : id_pago}, function (data) {
            }); 

            $('#pago_table').DataTable().ajax.reload();

          swal("Eliminado", {
            icon: "success",
          });
        } else {
          swal("Cancelado", {
            icon: "error",});
        }
      });
}

function editar(id_cita){
    $.post("../../controllers/pago.php?op=mostrar",{id_cita : id_cita}, function(data, status){
        data = JSON.parse(data);
        $('#titulo_crud').html('MODIFICAR PAGO');
        $('#monto').val(data.monto);
        $('#tipo').val(data.tipo);
        $('#id_cita').val(data.id_cita);
    }); 
    $("#myModal").modal('show');	
}

function actualizar(e){
    e.preventDefault();
	var formData = new FormData($("#menu_form")[0]);
    $.ajax({
        url: "../../controllers/pago.php?op=actualizar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#menu_form')[0].reset();
            $("#myModal").modal('hide');
            $('#pago_table').DataTable().ajax.reload();	
            swal("Correcto!","Actualizado Correctamente","success");
        }
    }); 
}

function pago(id_cita) {
    swal({
        title: "DentiBella",
        text: "¿Estás seguro de cambiar a pagado la cita?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.post("../../controllers/pago.php?op=pago", {id_cita : id_cita}, function (data) {
            });
  
            $('#pago_table').DataTable().ajax.reload();
  
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