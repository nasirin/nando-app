<!-- jQuery -->
<script src="/template/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/template/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/template/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="/template/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="/template/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/template/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="/template/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/template/vendors/Flot/jquery.flot.js"></script>
<script src="/template/vendors/Flot/jquery.flot.pie.js"></script>
<script src="/template/vendors/Flot/jquery.flot.time.js"></script>
<script src="/template/vendors/Flot/jquery.flot.stack.js"></script>
<script src="/template/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/template/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/template/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="/template/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/template/vendors/moment/min/moment.min.js"></script>
<script src="/template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datatable -->
<script src="/template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

<!-- jQuery Smart Wizard -->
<script src="/template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<!-- Custom Theme Scripts -->
<script src="/template/build/js/custom.js"></script>

<script type='text/javascript'>
    var max_fields = 100;
    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<section class="row"><div class="col-md-5 col-5"><input type="text" class="form-control form-control-sm" name="tambahan[]" required/></div><div class="col-md-5 col-5"><input type="number" class="form-control form-control-sm" name="biaya[]"/></div><div class="col-md-2 col-2"><a href="#" class="remove_field text-danger"><i class="fa fa-trash"></i></a></div> </section>'); //add input box
        }
    });

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parents('section').remove();
        x--;
    })

    let startYear = 1800;
    let endYear = new Date().getFullYear();
    for (i = endYear; i > startYear; i--) {
        $('#yearpicker').append($('<option />').val(i).html(i));
    }
</script>