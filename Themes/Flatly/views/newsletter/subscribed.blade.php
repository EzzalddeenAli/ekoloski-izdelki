@extends('layouts.master')

@section('title')
    Newsletter Subscribed | @parent
@stop
@section('meta')
    <meta name="title" content=""/>
    <meta name="description" content=""/>
@stop

@section('content')
    <div class="row">
    </div>

    <div class="row">
        <h1 class="text-center">{{ trans('billing::newsletter.confirm.success') }}</h1>
    </div>

@stop
