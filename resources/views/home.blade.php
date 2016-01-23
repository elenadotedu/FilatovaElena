@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Welcome ::
    @parent
@stop

<style type="text/css">
    .welcome {
        width:100%;
        text-align:center;
        margin-top:80px;
    }
    .welcome h1 {
        text-transform: uppercase;
    }
</style>

{{-- Page content --}}
@section('content')
    <div class="welcome">
        <h1>Welcome!</h1>
        <div class="binaryGrass"><img src="{{asset('assets/images/binaryGrass.png')}}" /></div>
        <p>Select your path on the left.</p>
    </div>
@stop