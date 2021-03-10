
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!-- Required datatable js -->
<script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset ('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset ('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<!-- Main js -->
<script src="{{ asset ('js/main.js?v='.time()) }}"></script>
<script src="{{ asset ('plugins/PACE/pace.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

<script src="{{ asset ('js/prettify.js?v='.time()) }}" crossorigin="anonymous"></script>
<script src="{{ asset ('js/bootstrap-timepicker.js?v='.time()) }}" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Sweet-Alert  -->
<script src="{{ asset ('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>

<script>
    $(function () {
        <?php if (Session::has('Success')){ ?>
        setTimeout(function () {
            swal({
                icon: "success",
                title: "Success",
                text: "<?php echo Session::get('Success')?>",
            });
        }, 500);
        <?php } ?>
        <?php if (Session::has('Error')){ ?>
        setTimeout(function () {
            swal({
                icon: "error",
                title: "Oops...",
                text: "<?php echo Session::get('Error')?>",
            });
        }, 500);
        <?php } ?>
    });
    <?php
    session()->forget('Success');
    session()->forget('Error');
    ?>
</script>
@stack('scripts')
</body>
</html>