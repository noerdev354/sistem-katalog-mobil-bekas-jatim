<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('assets/page-admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/page-admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/page-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/page-admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/page-admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/page-admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/page-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/page-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/page-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
</script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/page-admin/dist/js/adminlte.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/page-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/page-admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
        $("#dataTablesPesan").DataTable({
            lengthChange: false,
            autoWidth: false,
            buttons: [
                { extend: 'excel', className: 'btn-success', text: 'Export Excel' }
            ]
        }).buttons().container().appendTo('#dataTablesPesan_wrapper .col-md-6:eq(0)');
        $("#dataTables").DataTable({
            lengthChange: false,
            autoWidth: false,
        });
    });
</script>
@section('javascript')
@show
