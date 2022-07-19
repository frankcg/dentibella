<script src="../../assets/libs/jquery/jquery.min.js"></script>
<script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../assets/libs/metismenu/metisMenu.min.js"></script>

<!-- Responsive table -->
<script src="../../assets/libs/RWD-Table-Patterns/js/rwd-table.min.js"></script>

<!-- App js -->
<script src="../../assets/js/jquery.core.js"></script>
<script src="../../assets/js/jquery.app.js"></script>

<script>
$(function() {
    $('.table-responsive').responsiveTable({
        addDisplayAllBtn: 'btn btn-secondary'
    });
});
</script>
<!-- Datatable js -->
<script src="../../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="../../assets/libs/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="../../assets/libs/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="../../assets/libs/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
<script src="../../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
<script src="../../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<!-- Key Tables -->
<script src="../../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<!-- Selection table -->
<script src="../../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Default Datatable
        $('#datatable').DataTable({
            keys: true
        });

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'print']
        });

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
</script>

<!-- Sweet Alert Js  -->
<script src="../../assets/libs/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../assets/js/jquery.sweet-alert.init.js"></script>

<!-- Parsley js -->
<script type="text/javascript" src="../../assets/libs/parsleyjs/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<!-- Modal-Effect -->
<script src="../../assets/libs/custombox/custombox.min.js"></script>

<!-- Chart JS -->
<script src="../../assets/libs/chart.js/Chart.bundle.min.js"></script>

<!-- Chart Init JS -->
<script src="../../assets/js/jquery.chartjs.js"></script>

<!-- select2 js -->
<script src="../../assets/libs/select2/js/select2.min.js"></script>
<script src="../../assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="../../assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="../../assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<!-- Mask input -->
<script src="../../assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
<!-- Bootstrap Select -->
<script src="../../assets/libs/bootstrap-select/js/bootstrap-select.min.js"></script>

<script src="../../assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

<script src="../../assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="../../assets/libs/moment/moment.js"></script>

<script src="../../assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="../../assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Init Js file -->
<script src="../../assets/js/jquery.form-advanced.js"></script>