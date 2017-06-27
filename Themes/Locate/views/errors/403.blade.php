@extends('layouts.master')

@section('title')
    Forbiden | @parent
@stop

@section('content')
    <div class="row">
        <div class="alert alert-warning text-center">
            <p>403: Forbiden</p>
        </div>
    </div>
@stop
