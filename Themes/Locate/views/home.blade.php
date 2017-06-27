@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
    <style>
    </style>


<div id="app">

    <div class="container-fluid">


        <div class="row landing">
            <div class="col-md-6">

                <transition name="slide-fade">
                    <div class="bubble-border pull-right" v-if="show">
                        <div class="text-center bubble" @click="a">
                            <a href="/en/item/near">
                            <i class="glyphicon glyphicon-map-marker" style="color: #FFF"></i> {{ trans('find.local.item') }}
                            </a>
                        </div>
                    </div>
                </transition>

            </div>

            <div class="col-md-6">
                <div class="bubble-border">
                    <div class="bubble text-center" @click="a">
                        <a href="/en/backend">
                            <i class="fa fa-user" style="color: #FFF"></i> {{ trans('publish.item') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


   <div class="container">
       <div class="row">
           <div>
               <input type="hidden" id="fingerprint" v-model="fingerprint">
               @include('newsletter.partials.registration')
           </div>
       </div>
   </div>


</div>
@stop


@section('scripts')
<script>


    var data = {
        show: false,
        fingerprint: ''

        /*
         checked: false,
         checkedNames: [],
         radioPicks: '',
         selected: '',
         options: [
         {text: 'One', value:'A'},
         {text: 'Two', value:'B'},
         {text: 'Three', value:'C'}
         ],
         selectedOpt: '',
         counter: 0
         */
    }






    var app = new Vue({
        el: '#app',
        data: data,
        methods: {
            //greet: function (event) {
                // `this` inside methods points to the Vue instance

                // alert('Hello ' + this.name + '!')
                // `event` is the native DOM event
                //if (event) {
                //    alert(event.target.tagName)

                //}

                // console.log(this.fingerprint);
            //},
            a: function (event) {
                // alert(this)
                if(event.target.children[0] && event.target.children[0].tagName == 'A')
                    window.location = event.target.children[0].getAttribute('href')
            }
        }

    });


    // show animation after 3s
    setTimeout(function() {
        data.show = true;
    }, 1000);

</script>
@stop

