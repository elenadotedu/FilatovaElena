@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Welcome ::
    @parent
@stop
<style>

</style>


{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>Why so green?</h1>
    </div>

    <p>My first idea was to make this website gray. I thought it would be a perfect color since
    this is a simple personal site, I'm not trying to sell anything or make any statements. However, after some
    thought I decided on this green. Mainly because I can, but also for the following reasons: </p>

    <h2>1. It is the color of nature.</h2>
    <div class="row">
        <img class="img-responsive" src="{{ asset('assets/images/forest.jpg') }}"/>
    </div>
@section('body_bottom')

@stop
@stop
