var tabla;

function init() {
    $("#menu_form").on("submit",function(e){
        actualizar(e);	
    });
}

$(document).ready(async function(){
    tabla=$('#usuario_table').dataTable({
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
            url:'../../controllers/usuario.php?op=listar',
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

function eliminar(id_usuario) {	
    swal({
        title: "DentiBella",
        text: "¿Estás seguro de eliminar el usuario?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
            $.post("../../controllers/usuario.php?op=eliminar", {id_usuario : id_usuario}, function (data) {
            }); 

            $('#usuario_table').DataTable().ajax.reload();

          swal("Eliminado", {
            icon: "success",
          });
        } else {
          swal("Cancelado", {
            icon: "error",});
        }
      });
}

function editar(id_usuario){
    $.post("../../controllers/usuario.php?op=mostrar",{id_usuario : id_usuario}, function(data, status){
        data = JSON.parse(data);
        $('#titulo_crud').html('MODIFICAR USUARIO');
        $('#nombre').val(data.nombre);
        $('#apellidos').val(data.apellidos);
        $('#usuario').val(data.usuario);
        $('#id_rol').val(data.id_rol);
        $('#clave').val(data.clave);
        $('#id_usuario').val(data.id_usuario);
    }); 
    $("#myModal").modal('show');	
}

function actualizar(e){
    e.preventDefault();
	var formData = new FormData($("#menu_form")[0]);
    $.ajax({
        url: "../../controllers/usuario.php?op=actualizar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#menu_form')[0].reset();
            $("#myModal").modal('hide');
            $('#usuario_table').DataTable().ajax.reload();	
            swal("Correcto!","Actualizado Correctamente","success");
        }
    }); 
}

init();