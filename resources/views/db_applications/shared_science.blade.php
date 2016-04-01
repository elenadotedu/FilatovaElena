@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Shared Science
    @parent
@stop
<style>

</style>


{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Shared Science</h1>
    </div>

    <p>Shared Science is an organization, which was formed for the purpose of creating and delivering physical science and engineering learning opportunities to school-aged children (K-12), within Southern California, and initially within the City of Long Beach.
        <a href="http://sharedsciencefun.org">More Info.</a>
    </p>

    <h2>Project Description</h2>
    <div class="row">
        {!! ViewHelper::bug('bug11') !!}
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <p>The Shared Science team (Elena Filatova, Jonathan Tzeng, Tri Vu, David Juarez, and Ray Lopez) was responsible
                for developing a database web application for Shared Science to help them manage their data. One of their most important concerns was
                the ability to easily generate and customize reports based on student participation in Shared Science programs.
            </p>
        </div>
    </div>

    <h2>Main Features</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <ul>
                <li>Database Record Viewer.</li>
                <li>CSV Import.</li>
                <li>Report Query Generator.</li>
                <li>Report Template Editor.</li>
            </ul>
        </div>
    </div>

    <h2>Details</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="http://sharedscience.filatovaelena.com/"><img src="{{asset('assets/images/screenshots/shared_science.jpg')}}" /></a>
        </div>
    </div>

    <div class="row">
        {!! ViewHelper::bug('bug12') !!}
    </div>

@section('body_bottom')
@stop
@stop