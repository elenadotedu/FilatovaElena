@extends('layouts/default')

{{-- Page title --}}
@section('title')
JS Validators - Other
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
    <h1>Other Validators
    </h1>
</div>
<div class="row">
    <p>Validate various fields using regular expressions.</p>
</div>

<h2>Phone Number</h2>
<p>Enter a US or Canadian phone number (format doens't matter) to validate and convert it to a standard format (000-000-0000 x000... in this case).</p>
<p><strong>Regular Expression (without extension):</strong> /^\d?[\D]{0,}(\d{3})[\D]{0,}(\d{3})[\D]{0,}(\d{4})[\D]{0,}$/i</p>
<p><strong>Regular Expression (with extension):</strong> /^\d?[\D]{0,}(\d{3})[\D]{0,}(\d{3})[\D]{0,}(\d{4})[^\dx]{0,}(x)[\D]{0,}(\d{1,5})[\D]{0,}$/i</p>
<div class="panel panel-default">
    <div class="panel-body">

        {!! Form::open(['class' => 'form-horizontal', 'id' => 'jug_solver']) !!}

                <!-- Name String -->
        <div class="form-group">
            {!! Form::label('phone_string', 'Phone:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('phone_string', $value = "1(457) 8798798 ext 4556", ['class' => 'form-control', 'id' => 'js_validators_phone_string', 'maxlength' => '100']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-8"><button class="btn btn-small btn-info" id="js_validators_phone_button">Validate</button></div>
        </div>
    </div>

    <div class="panel-footer">
        <strong>Result:</strong>
        <p id="js_validators_phone_result"></p>
    </div>

</div>

<h2>Email</h2>
<p>Enter an email address.</p>
<p><strong>Regular Expression:</strong> /^[\w-_\.]+@[\w-_\.]+\.\w+$/</p>
<div class="panel panel-default">
    <div class="panel-body">

        {!! Form::open(['class' => 'form-horizontal', 'id' => 'jug_solver']) !!}

                <!-- Name String -->
        <div class="form-group">
            {!! Form::label('email_string', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('email_string', $value = "elena@subtest.test.com", ['class' => 'form-control', 'id' => 'js_validators_email_string', 'maxlength' => '100']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-8"><button class="btn btn-small btn-info" id="js_validators_email_button">Validate</button></div>
        </div>
    </div>

    <div class="panel-footer">
        <strong>Result:</strong>
        <p id="js_validators_email_result"></p>
    </div>
</div>

<h2>Website</h2>
<p>Enter a web address.</p>
<p><strong>Regular Expression:</strong> /^https?:\/\/www\.[\w-_\.\/]+$/</p>
<div class="panel panel-default">
    <div class="panel-body">

        {!! Form::open(['class' => 'form-horizontal', 'id' => 'jug_solver']) !!}

                <!-- Name String -->
        <div class="form-group">
            {!! Form::label('website_string', 'Website:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-6">
                {!! Form::text('website_string', $value = "https://www.google.com", ['class' => 'form-control', 'id' => 'js_validators_website_string', 'maxlength' => '100']) !!}
            </div>
        </div>

        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-8"><button class="btn btn-small btn-info" id="js_validators_website_button">Validate</button></div>
        </div>
    </div>

    <div class="panel-footer">
        <strong>Result:</strong>
        <p id="js_validators_website_result"></p>
    </div>
</div>

<div class="row">
    {!! ViewHelper::bug('bug6') !!}
    {!! ViewHelper::bug('bug7') !!}
</div>

@stop
@section('body_bottom')
<!-- Link the name validator library -->
<script src="{{URL:: asset('assets/js/js_validators/validator_other.js')}}"></script>
<script type="text/javascript">
    function validatorForm (field, button, result, validator_function)
    {
        var that = this;

        var string_elt = $("#" + field);
        var button_elt = $("#" + button);
        var result_elt = $("#" + result);

        this.init = function () {
            button_elt.click(function () {
                that.validate();
            });
        }

        this.validate = function () {
            var raw_value_string = string_elt.val();

            var result_str = validator_function(raw_value_string);

            if (!result_str)
                result_str = "Invalid";

            // write result
            result_elt.html(result_str);
        }
    }
    jQuery( document ).ready (function () {
        var phoneValidatorForm = new validatorForm("js_validators_phone_string", "js_validators_phone_button", "js_validators_phone_result",
        function (raw_string) {
            return Validator.phoneIsValid(raw_string);
        });
        phoneValidatorForm.init();

        var emailValidatorForm = new validatorForm("js_validators_email_string", "js_validators_email_button", "js_validators_email_result",
                function (raw_string) {
                    return Validator.emailIsValid(raw_string);
                });
        emailValidatorForm.init();

        var websiteValidatorForm = new validatorForm("js_validators_website_string", "js_validators_website_button", "js_validators_website_result",
                function (raw_string) {
                    return Validator.websiteIsValid(raw_string);
                });
        websiteValidatorForm.init();
    });
</script>
@stop