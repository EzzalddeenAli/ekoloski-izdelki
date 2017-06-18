@extends('layouts.master')


@section('title')

    {{ "title"  }} | @parent

@stop

@section('meta')
    <meta name="title" content="{{ "title" }}"/>
    <meta name="description" content="{{ "title" }}"/>
@stop

@section('content')

    <style>
        .list-group {
            max-height: 550px;
            overflow-y: scroll;
        }
    </style>
    <div id="app">


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <div id="list">

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            <input class="form-control" type="text">
                        </div>
                    </div>

                    <div class="bs-component">
                        <div class="list-group">
                            <list-item
                                    v-for="item in items"
                                    :key="item.id"
                                    :id="item.id"
                                    :name="item.name"
                                    :latitude="item.latitude"
                                    :longitude="item.longitude"
                            >
                            </list-item>
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-md-8">
                <div id="map" style="min-height: 607px; width: 100%"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                Loading...
            </div>
        </div>


        <template id="list-item">
            <div class="list-item" v-show="show">
                <a href="#" class="list-group-item" @click="details">
                    <span @click="show = false">★</span>@{{ name }}
                </a>
            </div>
        </template>



        {{--
        <template id="item-list-template">
            <div class="list-group" style="height: 550px; overflow-y: scroll">
                <a href="#"
                   class="list-group-item"
                   v-on:click="details"
                   v-for="item in items"
                >
                    <h4 class="list-group-item-heading">@{{ item.name }}</h4>
                    <p class="list-group-item-text">@{{ item.name }}</p>
                    <p class="list-group-item-text">@{{ item.latitude }} @{{ item.longitude }}</p>
                </a>
            </div>

        </template>
        --}}

    </div>

</div>


@stop

@section('scripts')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgfF2N2CYEbRfUYf4-YuIxx8g00ehWBWk"></script>

    {!! Theme::script('js/near.js') !!}

@stop

