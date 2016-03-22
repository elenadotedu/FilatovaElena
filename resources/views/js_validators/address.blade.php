@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Data Validation - Names ::
    @parent
@stop

{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Address Validator
        </h1>
    </div>
    <div class="row">
        <p>Check if two addresses are duplicates based on whether some of the fields match. Account for missing fields and some misspellings.</p>
    </div>

    <h2>Validate</h2>
    <p>See if two addresses are duplicates.</p>
    <div class="panel panel-default">
        <div class="panel-body">

            {!! Form::open(['class' => 'form-horizontal', 'id' => 'jug_solver']) !!}

            <!-- Address 1 -->
            <div class="col-lg-6">

                <h3 style="text-align: center">Address 1</h3>
                <!-- Street -->
                <div class="form-group">
                    {!! Form::label('a1_street', 'Street Address:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('a1_street', $value = "123 Main Street", ['class' => 'form-control', 'id' => 'js_validators_a1_address1', 'maxlength' => '100']) !!}
                    </div>
                </div>

                <!-- City -->
                <div class="form-group">
                    {!! Form::label('a1_city', 'City:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('a1_city', $value = "New York", ['class' => 'form-control', 'id' => 'js_validators_a1_city', 'maxlength' => '100']) !!}
                    </div>
                </div>

                <!-- State -->
                <div class="form-group">
                    {!! Form::label('a1_state', 'State:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('a1_state', [
                        'AL' => 'Alabama',
                        'AK' => 'Alaska',
                        'AZ' => 'Arizona',
                        'AR' => 'Arkansas',
                        'CA' => 'California',
                        'CO' => 'Colorado',
                        'CT' => 'Connecticut',
                        'DE' => 'Delaware',
                        'FL' => 'Florida',
                        'GA' => 'Georgia',
                        'HI' => 'Hawaii',
                        'ID' => 'Idaho',
                        'IL' => 'Illinois',
                        'IN' => 'Indiana',
                        'IA' => 'Iowa',
                        'KS' => 'Kansas',
                        'KY' => 'Kentucky',
                        'LA' => 'Louisiana',
                        'ME' => 'Maine',
                        'MD' => 'Maryland',
                        'MA' => 'Massachusetts',
                        'MI' => 'Michigan',
                        'MN' => 'Minnesota',
                        'MS' => 'Mississippi',
                        'MO' => 'Missouri',
                        'MT' => 'Montana',
                        'NE' => 'Nebraska',
                        'NV' => 'Nevada',
                        'NH' => 'New Hampshire',
                        'NJ' => 'New Jersey',
                        'NM' => 'New Mexico',
                        'NY' => 'New York',
                        'NC' => 'North Carolina',
                        'ND' => 'North Dakota',
                        'OH' => 'Ohio',
                        'OK' => 'Oklahoma',
                        'OR' => 'Oregon',
                        'PA' => 'Pennsylvania',
                        'RI' => 'Rhode Island',
                        'SC' => 'South Carolina',
                        'SD' => 'South Dakota',
                        'TN' => 'Tennessee',
                        'TX' => 'Texas',
                        'UT' => 'Utah',
                        'VE' => 'Vermont',
                        'VA' => 'Virginia',
                        'WA' => 'Washington',
                        'WV' => 'West Virginia',
                        'WI' => 'Wisconsin',
                        'WY' => 'Wyoming'], 'NY', ['class' => 'form-control', 'id' => 'js_validators_a1_state'])!!}
                    </div>
                </div>

                <!-- Zip Code -->
                <div class="form-group">
                    {!! Form::label('a1_zip', 'Zip:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('a1_zip', $value = "10001", ['class' => 'form-control', 'id' => 'js_validators_a1_zip', 'maxlength' => '10']) !!}
                    </div>
                </div>

                <!-- Country -->
                <div class="form-group">
                    {!! Form::label('a1_country', 'Country:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('a1_country', [
                         ' ' => ' ',
                         'US' => 'United States'
                         ], 'US', ['class' => 'form-control', 'id' => 'js_validators_a1_country'])!!}
                    </div>
                </div>


            </div>

            <!-- Address 2 -->
            <div class="col-lg-6">

            <h3 style="text-align: center">Address 2</h3>
                <!-- Street -->
                <div class="form-group">
                    {!! Form::label('a2_street', 'Street Address:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('a2_street', $value = "123 Main Street", ['class' => 'form-control', 'id' => 'js_validators_a2_address1', 'maxlength' => '100']) !!}
                    </div>
                </div>

                <!-- City -->
                <div class="form-group">
                    {!! Form::label('a2_city', 'City:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('a2_city', $value = "New York", ['class' => 'form-control', 'id' => 'js_validators_a2_city', 'maxlength' => '100']) !!}
                    </div>
                </div>

                <!-- State -->
                <div class="form-group">
                    {!! Form::label('a2_state', 'State:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('a2_state', [
                        'AL' => 'Alabama',
                        'AK' => 'Alaska',
                        'AZ' => 'Arizona',
                        'AR' => 'Arkansas',
                        'CA' => 'California',
                        'CO' => 'Colorado',
                        'CT' => 'Connecticut',
                        'DE' => 'Delaware',
                        'FL' => 'Florida',
                        'GA' => 'Georgia',
                        'HI' => 'Hawaii',
                        'ID' => 'Idaho',
                        'IL' => 'Illinois',
                        'IN' => 'Indiana',
                        'IA' => 'Iowa',
                        'KS' => 'Kansas',
                        'KY' => 'Kentucky',
                        'LA' => 'Louisiana',
                        'ME' => 'Maine',
                        'MD' => 'Maryland',
                        'MA' => 'Massachusetts',
                        'MI' => 'Michigan',
                        'MN' => 'Minnesota',
                        'MS' => 'Mississippi',
                        'MO' => 'Missouri',
                        'MT' => 'Montana',
                        'NE' => 'Nebraska',
                        'NV' => 'Nevada',
                        'NH' => 'New Hampshire',
                        'NJ' => 'New Jersey',
                        'NM' => 'New Mexico',
                        'NY' => 'New York',
                        'NC' => 'North Carolina',
                        'ND' => 'North Dakota',
                        'OH' => 'Ohio',
                        'OK' => 'Oklahoma',
                        'OR' => 'Oregon',
                        'PA' => 'Pennsylvania',
                        'RI' => 'Rhode Island',
                        'SC' => 'South Carolina',
                        'SD' => 'South Dakota',
                        'TN' => 'Tennessee',
                        'TX' => 'Texas',
                        'UT' => 'Utah',
                        'VE' => 'Vermont',
                        'VA' => 'Virginia',
                        'WA' => 'Washington',
                        'WV' => 'West Virginia',
                        'WI' => 'Wisconsin',
                        'WY' => 'Wyoming'], 'NY', ['class' => 'form-control', 'id' => 'js_validators_a2_state'])!!}
                    </div>
                </div>

                <!-- Zip Code -->
                <div class="form-group">
                    {!! Form::label('a2_zip', 'Zip:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('a2_zip', $value = "10001", ['class' => 'form-control', 'id' => 'js_validators_a2_zip', 'maxlength' => '10']) !!}
                    </div>
                </div>

                <!-- Country -->
                <div class="form-group">
                    {!! Form::label('a2_country', 'Country:', ['class' => 'col-lg-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::select('a2_country', [
                         ' ' => ' ',
                         'US' => 'United States'
                         ], 'US', ['class' => 'form-control', 'id' => 'js_validators_a2_country'])!!}
                    </div>
                </div>

            </div>

            {!! Form::close() !!}

            <div class="row">
                <div class="col-lg-8"><button class="btn btn-small btn-info" id="js_validators_address_button">Validate</button></div>
            </div>
        </div>

        <div class="panel-footer">
            <strong>Result:</strong>
            <p id="js_validators_address_result"></p>
        </div>

    </div>

    <div class="row">
        {!! ViewHelper::bug('bug16') !!}
        {!! ViewHelper::bug('bug17') !!}
        {!! ViewHelper::bug('bug18') !!}
    </div>

    @stop
    @section('body_bottom')
            <!-- Link the name validator library -->
    <script src="{{URL:: asset('assets/js/js_validators/validator_address.js')}}"></script>
    <script type="text/javascript">
        var validatorForm = new function ()
        {
            var that = this;

            var a1_address1_elt = $("#js_validators_a1_address1");
            var a1_city_elt = $("#js_validators_a1_city");
            var a1_state_elt = $("#js_validators_a1_state");
            var a1_zip_elt = $("#js_validators_a1_zip");
            var a1_country_elt = $("#js_validators_a1_country");

            var a2_address1_elt = $("#js_validators_a2_address1");
            var a2_city_elt = $("#js_validators_a2_city");
            var a2_state_elt = $("#js_validators_a2_state");
            var a2_zip_elt = $("#js_validators_a2_zip");
            var a2_country_elt = $("#js_validators_a2_country");

            var validate_button_elt = $("#js_validators_address_button");
            var result_elt = $("#js_validators_address_result");

            this.init = function () {
                validate_button_elt.click(function () {
                    that.validate();
                });
            }

            this.validate = function () {
                var address1 = {
                    addr1: a1_address1_elt.val(),
                    city: a1_city_elt.val(),
                    state: a1_state_elt.val(),
                    zip: a1_zip_elt.val(),
                    country: a1_country_elt.val()
                }

                var address2 = {
                    addr1: a2_address1_elt.val(),
                    city: a2_city_elt.val(),
                    state: a2_state_elt.val(),
                    zip: a2_zip_elt.val(),
                    country: a2_country_elt.val()
                }
                var result = addressValidator.addressesAreDuplicates(address1, address2);
                var result_str = "";

                if(result)
                    result_str = "Addresses are duplicates.";
                else
                    result_str = "Addresses are not duplicates."

                // write result
                result_elt.html(result_str);
            }
        }
        jQuery( document ).ready (function () {
            validatorForm.init();
        });
    </script>
@stop