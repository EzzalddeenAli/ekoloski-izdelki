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
            @if(!empty($msg))
                <div class="alert alert-danger">
                    {{ $msg }}
                </div>
            @endif

            <h1 class="text-center">Odjava od elektronskih novic</h1>

            <div class="form-group has-success col-sm-6 col-sm-offset-3">
                <form action="/en/newsletter/unsubscribe" method="post">
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

        </div>
    </div>
@stop
