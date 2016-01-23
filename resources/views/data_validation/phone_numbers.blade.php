@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Data Validation - Phone Numbers ::
    @parent
@stop

{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h3>Phone Numbers
        </h3>
    </div>
    <div class="row">
        <p>Split a phone number into 3 parts, so that it can be formatted easier.</p>
    </div>
@stop