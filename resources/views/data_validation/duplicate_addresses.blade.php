@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Data Validation - Duplicate Addresses ::
    @parent
@stop

{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h3>Duplicate Addresses
        </h3>
    </div>
    <div class="row">
        <p>Compare two addresses to check if they are duplicates. Ignore small misspellings and some missing fields.</p>
    </div>
@stop