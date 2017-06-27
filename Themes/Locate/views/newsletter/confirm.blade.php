@extends('layouts.master')

@section('title')
    Confirm Newsletter Registration | @parent
@stop
@section('meta')
    <meta name="title" content=""/>
    <meta name="description" content=""/>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="alert alert-warning text-center">
                {{ trans('billing::newsletter.confirm.confirmation email sent') }} <br>
            </div>

        </div>
    </div>
@stop
