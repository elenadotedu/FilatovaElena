@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Zlyne
    @parent
@stop
<style>

</style>


{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Zlyne</h1>
    </div>

    <p>Zlyne provides a low cost and simple solution to marine terminal congestion.
    </p>

    <h2>Project Description</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <p>The Zlyne team (Elena Filatova, Eduardo Aceituno and Varun Chopra in collaboration with Dr. Mehrdad Aliasgari, Dr. Burkhard Englert and Dr. Shadnaz Asgari from CSULB) was responsible for
                creating a web application and an Adroid application to help manage the terminal congestions.
                The system works as following: the trucking company drivers install Zlyne Android application on their devices and complete registration process to
                allow their location to be communicated to Zlyne servers.
                As soon as the driver is assigned to an active trip to deliver or pickup a container, Zlyne system begins to transmit
                location data to the Zlyne servers.
            </p>
        </div>
    </div>

    <div class="row">
        {!! ViewHelper::bug('bug13') !!}
    </div>

    <h2>Main Features</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <ul>
                <li>Database Record Viewer.</li>
                <li>Role Based Permissions.</li>
                <li>Dynamic Google Map.</li>
                <li>Dynamic Charts.</li>
            </ul>
        </div>
    </div>

    <h2>Details</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="https://zlyne.com/"><img src="{{asset('assets/images/screenshots/zlyne.jpg')}}" /></a>
        </div>
    </div>

    <div class="row">
        {!! ViewHelper::bug('bug14') !!}
        {!! ViewHelper::bug('bug15') !!}
    </div>

@section('body_bottom')
@stop
@stop