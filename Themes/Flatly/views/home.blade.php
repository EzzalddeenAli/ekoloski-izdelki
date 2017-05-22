@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
    <div class="row">
        <h1>{{ $page->title }}</h1>
        {!! $page->body !!}
    </div>

    <div class="row">

        <?php /*
        <h1 class="text-center">Ostanite informirani</h1>
        <div class="form-group has-success col-sm-6 col-sm-offset-3">
            <form action="/en/newsletter/confirm" method="post">
                {{ csrf_field() }}

                <label class="control-label" for="inputSuccess">elektronski naslov</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="email">

                    <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Potrdi</button>
                    </span>
                </div>

            </form>
        </div>
        */ ?>
    </div>
@stop
