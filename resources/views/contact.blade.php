@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Contact
    @parent
@stop
<style>

</style>


{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Contact</h1>
    </div>
    <p>Contact Elena Filatova for web developement or software work, to report a bug or to suggest an idea.</p>
    <div class="row">
        {!! ViewHelper::bug('bug8') !!}
        {!! ViewHelper::bug('bug9') !!}
        {!! ViewHelper::bug('bug10') !!}
    </div>
    <h2>Details</h2>
    <p>How to contact.</p>
    <div class="panel panel-default">
        <div class="panel-body">
            <p><strong>Email:</strong> developer@filatovaelena.com</p>
            <p><strong>LinkedIn:</strong>  <a href="https://www.linkedin.com/in/filatovaelena">https://www.linkedin.com/in/filatovaelena</a></p>
            <p><strong>Google+:</strong> <a href="https://plus.google.com/+ElenaFilatova3">https://plus.google.com/+ElenaFilatova3</a></p>
            <p><strong>Location: </strong>Long Beach, CA</p>
        </div>
    </div>

@section('body_bottom')

@stop
@stop
