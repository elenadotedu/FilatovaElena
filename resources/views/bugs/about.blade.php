@extends('layouts/default')

{{-- Page title --}}
@section('title')
    About Bugs
    @parent
@stop
<style>

</style>


{{-- Page content --}}
@section('content')
    <div class="page-header">
        <h1>About Bugs</h1>
    </div>

    <p>It feels good to find and destroy software bugs. So I created a few easy to spot, easy to kill ones. They are hiding all around the site. See two below (unless you killed them already).
    </p>

    <p><strong>Note: </strong> If you examine the JavaScript, you might be able to find a hack on how to easily kill all the bugs at once. I don't mind, do it.
    </p>

    <div class="row">
        {!! ViewHelper::bug('bug1') !!}
        {!! ViewHelper::bug('bug2') !!}
    </div>

@section('body_bottom')
@stop
@stop