@extends('layouts.master')

@section('title')
    Not found | @parent
@stop

@section('content')
    <div class="row">
        <div class="alert alert-warning text-center">
            <p>400: Bad Request</p>
        </div>
    </div>
@stop
