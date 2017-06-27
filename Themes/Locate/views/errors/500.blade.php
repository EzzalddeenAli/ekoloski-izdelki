@extends('layouts.master')

@section('title')
    Internal Server Error | @parent
@stop

@section('content')
    <div class="row">
        <div class="alert alert-warning text-center">
            <p>500: Internal Server Error</p>
        </div>
    </div>
@stop
