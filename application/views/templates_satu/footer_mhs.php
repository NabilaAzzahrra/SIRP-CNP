<style>
    .tulisan {
        color: #0073BD;
    }
</style>
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#" class="tulisan">Cooperation and Placement Politeknik LP3I Kampus Tasikmalaya </a></strong>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>

<!-- jQuery -->
<script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/select2/js/i18n/id.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/jquery-validation/localization/messages_id.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?= base_url('assets/template'); ?>/plugins/toastr/toastr.min.js"></script>

<!-- FLOT CHARTS -->
<script src="<?= base_url('assets/template'); ?>/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= base_url('assets/template'); ?>/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= base_url('assets/template'); ?>/plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- Page script -->



<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>



<script src="<?= base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
<script src="<?= base_url('assets/template') ?>/plugins/chart.js/Chart.min.js"></script>


<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "searching": true,
            "lengthChange": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example3').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
        $('.select2').select2({
            dropdownParent: $('#Modal')
        });
    });
</script>
<script src="<?= base_url('assets/template') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(function() {
        $('#logout').click(function() {
            $('#ModalLogout').modal('show');
            $('.modal-dialog').removeClass('modal-lg');
        });
    });
</script>
<script>
    $('[data-widget="pushmenu"]').PushMenu('toggle')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>