@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Data Validation - Names ::
    @parent
@stop

{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h3>Names
        </h3>
    </div>
    <div class="row">
        <p>You can split a name into meaningful parts, such as First Name, Last Name, Title etc. using this JavaScript library.</p>
    </div>
@stop