
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('backEnd') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('backEnd') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backEnd') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backEnd') }}/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('backEnd') }}/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('backEnd') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('backEnd') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('backEnd') }}/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('backEnd') }}/js/pages/dashboard2.js"></script>

<!-- DataTables -->
<script src="{{ asset('backEnd') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('backEnd') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('backEnd') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('backEnd') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('backEnd') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backEnd') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('backEnd') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "responsive": true,
        });
    });
    $(document).on('click', '.btn-changing', function() {
        $('#setType').val($(this).data('type'));
        $('#setChangeId').val($(this).data('id'));
        $('#changeFor').val($(this).data('changeFor'));
        $('#modal-success').modal('show');
    })

    $(document).on('click', '.btn-changing-dan', function() {
        $('#setTypeDan').val($(this).data('type'));
        $('#setChangeIdDan').val($(this).data('id'));
        $('#changeFor').val($(this).data('changeFor'));
        $('#modal-danger').modal('show');
    })

    $(document).on('click', '.btn-contactus-action', function() {
        $('#setActionedId').val($(this).data('id'));
        $('#modal-success-contact-action').modal('show');
    })

    $(document).on('click', '.btn-contactus-ticket', function() {
        $('#setTicketId').val($(this).data('id'));
        $('#modal-success-contact-ticket').modal('show');
    })

    $(function () {
        // Summernote
        $('.textarea').summernote({
            height: 500,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        })
    })

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
