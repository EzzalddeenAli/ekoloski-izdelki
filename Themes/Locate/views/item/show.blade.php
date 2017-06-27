@extends('layouts.master')

@if($item)
    @section('title')

        {{ $item->title  }} | @parent

    @stop
    @section('meta')
        <meta name="title" content="{{ $item->name}}" />
        <meta name="description" content="{{ $item->description }}" />
    @stop

    @section('content')
        <div class="container">
            <div class="row">
                <h1>{{ $item->name }}</h1>
                {!! $item->description !!}

                <form action="{{ route('store.pay') }}" method="post">
                    {{ csrf_field() }}

                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}"
                            data-amount="10"
                            data-name="Stripe.com"
                            data-description="Widget"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-zip-code="true">
                    </script>

                </form>

            </div>
        </div>
    @stop

@else

    @section('title')

        {!! "Not found 404" !!} | @parent

    @stop
    @section('meta')
        <meta name="title" content="404" />
        <meta name="description" content="Item not found" />
    @stop

    @section('content')
        <div class="row">
            <h1>{!! "Item not found" !!}</h1>
        </div>
    @stop

@endif