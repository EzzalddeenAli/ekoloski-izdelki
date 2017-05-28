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
        <div class="alert alert-danger text-center">
            {{ trans('billing::newsletter.subscribe.token-not-found') }}
        </div>

        {{--
        <p>{{ trans('billing::newsletter.subscribe.generate new subscription')  }}</p>
        --}}

        @include('newsletter.partials.registration')
    </div>

    <div class="row">

    </div>

@stop
