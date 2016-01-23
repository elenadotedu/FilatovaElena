<script src="{{ URL:: asset('assets/js/jquery.1.10.2.min.js') }}"></script>
<script src="{{ URL:: asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL:: asset('assets/startbootstrap-sb-admin-2-1.0.7/dist/js/sb-admin-2.js') }}"></script>

<!-- Datepicker -->
<script src="{{ URL:: asset('assets/bootstrap-datetimepicker/js/moment.js')}}"></script>
<script src="{{ URL:: asset('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript">
    $('.datepicker').datetimepicker({
        format: "YYYY-MM-DD"
    });
</script>

<!-- Data Tables -->
<script src="{{URL:: asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#object_list').DataTable();
    });
</script>

<!-- Query Builder (for report generation) -->
<script src="{{URL:: asset('assets/js/query-builder.standalone.min.js')}}"></script>

<!-- Main js file -->
<script src="{{URL:: asset('assets/js/main.js')}}"></script>