@extends('layouts/default')

{{-- Page title --}}
@section('title')
    JS Validators - Name
    @parent
@stop

{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Name Validator
        </h1>
    </div>
    <div class="row">
        <p>Split the name string into First Name, Last Name, Title etc. using this JavaScript library.</p>
    </div>

    <h2>Validate</h2>
    <p>Enter the name string to convert it into separate name fields.</p>
    <div class="panel panel-default">
        <div class="panel-body">

            {!! Form::open(['class' => 'form-horizontal', 'id' => 'jug_solver']) !!}

            <!-- Name String -->
            <div class="form-group">
                {!! Form::label('name_string', 'Name String:', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('name_string', $value = "Sir Issac Newton", ['class' => 'form-control', 'id' => 'js_validators_name_string', 'maxlength' => '100']) !!}
                </div>
            </div>

            {!! Form::close() !!}

            <div class="row">
                <div class="col-lg-8"><button class="btn btn-small btn-info" id="js_validators_name_button">Validate</button></div>
            </div>
        </div>

        <div class="panel-footer">
            <strong>Result:</strong>
            <p id="js_validators_name_result"></p>
        </div>

    </div>
    <div class="row">
        {!! ViewHelper::bug('bug4') !!}
        {!! ViewHelper::bug('bug5') !!}
    </div>
@stop
@section('body_bottom')
    <!-- Link the name validator library -->
    <script src="{{URL:: asset('assets/js/js_validators/validator_name.js')}}"></script>
    <script type="text/javascript">
        var validatorForm = new function ()
        {
            var that = this;

            var name_string_elt = $("#js_validators_name_string");
            var validate_button_elt = $("#js_validators_name_button");
            var result_elt = $("#js_validators_name_result");

            this.init = function () {
                validate_button_elt.click(function () {
                    that.validate();
                });
            }

            this.validate = function () {
                var name_str = name_string_elt.val();
                var name_obj = new nameObj(name_str);

                var result_str = "<i>Salutation: </i>" + name_obj.salutation + "<br />" +
                                "<i>First Name: </i>" + name_obj.firstname + "<br />" +
                                "<i>Middle Name: </i>" + name_obj.middlename + "<br />" +
                                "<i>Last Name: </i>" + name_obj.lastname + "<br />" +
                                "<i>Title: </i>" + name_obj.title + "<br />";
                // write result
                result_elt.html(result_str);
            }
        }
        jQuery( document ).ready (function () {
           validatorForm.init();
        });
    </script>
@stop