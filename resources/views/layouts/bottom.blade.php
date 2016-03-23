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

<!-- Misc javascripts -->
<script type="text/javascript">
    $('.numbers-only').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    var bugs = new function()
    {
        var that = this;
        this.options = {
            dead_count_class: 'bugs_dead_count',
            total_class: 'bugs_total_count'
        };

        this.init = function (options)
        {
            $.extend(true, this.options, options);

            // initialize events
            $('.bug').click(function () {
                // remove bug and bug wrapper
                var id = $(this).parent().attr('id');
                that.kill(id);
            });

            return true;
        }

        this.kill = function(id)
        {
            $('#' + id + ' .bug').remove();

            jQuery.ajax({
                        url:  '{{route("bugs.kill")}}' + '?id=' + id,
                    })
                    .done(function(data) {
                        that.updateScore();
                    })
                    .fail (function () {
                        alert("Error killing bug");
                    });
        }

        this.updateScore = function()
        {
            // increment bug count
            $("." + that.options.dead_count_class).html(
                    parseInt($("." + that.options.dead_count_class).html()) + 1
            );
           /* jQuery.ajax({
                        url:  '{{route("bugs.dead_count")}}',
                    })
                    .done(function(data) {
                        $("." + that.options.dead_count_class).html(data);

                        // animate counters
                        $(".bugs_counts_outer").removeClass('bugs_counts_outer_animation');
                        $(".bugs_counts_outer").addClass('bugs_counts_outer_animation');
                    })
                    .fail (function () {
                        alert("Error updating count");
                    });*/
        }
    };

    bugs.init();
</script>