@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Jug Solver
    @parent
@stop
<style>

</style>


{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Jug Solver</h1>
    </div>

    <p>The water pouring problem involving a number (usually 3) of jugs is well known in mathematics.
        <a href="https://en.wikipedia.org/wiki/Liquid_water_pouring_puzzles">More info.</a>
    </p>

    <h2>Solver</h2>
    <p>A C++ program, which uses A* search algorithm to solve the jugs problem. <strong>Note: </strong> The goal will always appear in the largest jug.</p>
    <div class="panel panel-default">
        <div class="panel-body">

            {!! Form::open(['class' => 'form-horizontal', 'id' => 'jug_solver', 'method' => 'POST', 'route' => ['jug_solver.exe']]) !!}

                    <!-- Number of Jugs -->
            <div class="form-group">
                {!! Form::label('num_jugs', 'Number of Jugs:', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('num_jugs', [
                        "2" => "2",
                        "3" => "3",
                        "4" => "4",
                        "5" => "5",
                        "6" => "6"
                    ], null, ['class' => 'form-control', 'id' => 'jug_solver_num_jugs']) !!}
                </div>
            </div>

            <!-- Capacities -->
            <div class="form-group" id="jug_solver_capacities">
                {!! Form::label('capacities', 'Capacities:', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-1">
                    {!! Form::text('capacities[0]', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'capacity_0', 'maxlength' => '3']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::text('capacities[1]', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'capacity_1', 'maxlength' => '3']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::text('capacities[2]', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'capacity_2', 'maxlength' => '3']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::text('capacities[3]', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'capacity_3', 'maxlength' => '3']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::text('capacities[4]', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'capacity_4', 'maxlength' => '3']) !!}
                </div>
                <div class="col-lg-1">
                    {!! Form::text('capacities[5]', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'capacity_5', 'maxlength' => '3']) !!}
                </div>
            </div>

            <!-- Goal -->
            <div class="form-group">
                {!! Form::label('goal', 'Goal:', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('goal', $value = "0", ['class' => 'form-control numbers-only', 'id' => 'jug_solver_goal', 'maxlength' => '3']) !!}
                </div>
            </div>
            {!! Form::close() !!}

            <div class="row">
                <div class="col-lg-8"><button class="btn btn-small btn-info" id="jug_solver_button">Solve</button></div>
            </div>
        </div>

        <div class="panel-footer">
            <strong>Result (jugs are numbered starting from 1):</strong>
            <p id="jug_solver_result"></p>
        </div>

    </div>

    <h2>Description</h2>
    <p>What the problem is all about.</p>
    <div class="panel panel-default">
        <div class="panel-body">
            <p><strong>The idea:</strong> you have a number of jugs with given capacities.
                You must measure a given water amount exactly by combining the jugs in some way.
            </p>
            <p>
                <strong>The rules:</strong>
            <ol>
                <li>You can fill the jugs from the fountain as many times as you want.</li>
                <li>You can empty the jugs into the fountain as many times as you want.</li>
                <li>You can pour from one jug into another.</li>
                <li>You must pour to either fill a jug to the top or to empty the jug completely. No partial pouring.</li>
            </ol>
            <div class="row">
                {!! ViewHelper::bug('bug3') !!}
            </div>
        </div>
        <div class="panel-footer">
            <p><strong>Example: </strong> Measure exactly 4 gallons of water using 2 jugs of capacities 3 gallons and 5 gallons.
            </p>
        </div>
    </div>

    <h2>Additional</h2>
    <p>This might be interesting.</p>
    <div class="panel panel-default">
        <div class="panel-body">
            <p><a href="http://www.coolmath4kids.com/math_puzzles/Logic-waterjars/index.html">Play with the puzzle at CoolMath4Kids.</a></p>
            <p>Jugs puzzle in Die Hard 3:</p>
            <p><iframe class="youtube" width="560" height="315" src="https://www.youtube.com/embed/BVtQNK_ZUJg" frameborder="0" allowfullscreen></iframe></p>
        </div>
    </div>

@section('body_bottom')
    <script type="text/javascript">
        var JugSolver = new function () {
            var that = this;

            var url = "{{route('jug_solver.exe')}}";
            var num_jugs_elt = $("#jug_solver_num_jugs");
            var capacities_elts = $("#jug_solver_capacities input");
            var goal_elt = $("#jug_solver_goal");
            var solve_button_elt = $("#jug_solver_button");
            var result_elt = $("#jug_solver_result");

            this.init = function () {
                num_jugs_elt.change(function () {
                    that.update();
                });

                solve_button_elt.click(function () {
                   that.solve();
                });

                that.update();

            };

            this.update = function () {

                if (num_jugs_elt && capacities_elts && goal_elt)
                {
                    // get the number of jugs
                    var num_jugs = Number(num_jugs_elt.val());

                    // hide all capacity indexes greater than num jugs
                    for (var i = 0; i < capacities_elts.length; i++)
                    {
                        if (i < num_jugs)
                        {
                            // remove any display type styles
                            capacities_elts[i].style.display = "";
                        }
                        else
                        {
                            // hide element
                            capacities_elts[i].style.display = "none";
                        }
                    }
                }

            };

            this.solve = function () {

                var data = $('form').serializeArray().reduce(function(obj, item) {
                    var arr_patt = /\[(\d+)\]/;
                    if (item.name.match(arr_patt)) {
                        var index = item.name.match(arr_patt)[1];
                        item.name = item.name.replace(arr_patt, '');

                        if (!obj[item.name])
                            obj[item.name] = [];

                        obj[item.name][index] = item.value;
                    }
                    else {
                        obj[item.name] = item.value;
                    }
                    return obj;
                }, {});

                jQuery.ajax({
                            url: url,
                            type: "POST",
                            data: data
                        })
                        .done(function (data) {
                            var output = data["output"];

                            // build result string
                            var result_str = "";
                            if (typeof output == "object")
                            {
                                result_str = "<ol>";
                                for (var i = 0; i < output.length; i++)
                                {
                                    result_str += "<li>" + output[i] + "</li>"
                                }
                                result_str += "</ol>"
                            }
                            else
                            {
                                result_str = output;
                            }

                            // write result
                            result_elt.html(result_str);
                        })
                        .error (function (jqXHR, textStatus, errorThrown) {
                            alert("Error getting response. " + textStatus + " " + errorThrown);
                        });
            }
        }

        jQuery( document ).ready (function () {
            JugSolver.init();
        });
    </script>
@stop
@stop