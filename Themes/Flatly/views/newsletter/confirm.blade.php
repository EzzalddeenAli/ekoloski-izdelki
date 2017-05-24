@extends('layouts.master')

@section('title')
    Confirm Newsletter Registration | @parent
@stop
@section('meta')
    <meta name="title" content=""/>
    <meta name="description" content=""/>
@stop

@section('content')

    <div class="row">

        <h1>Za dokoncanje prijave potreben se en korak</h1>

        <div class="alert alert-success">
            Da potrdite registracijo sledite povezavi ki smo vam jo poslali na vas elektronski naslov. {{--<strong>{!! "tes@test" !!}</strong>--}}
        </div>

    </div>
@stop
