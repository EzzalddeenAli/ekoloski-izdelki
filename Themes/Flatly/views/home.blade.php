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
        .parallax {
            /* The image used */
            background-image: url("/themes/flatly/css/home2.JPG");

            /* Set a specific height */
            height: 600px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <!-- Container element
    <div class="parallax"></div>
-->
<div id="app">


    <div class="container-fluid">

        <div class="row parallax">

            <div class="col-md-6">

                <div class="pull-right text-center">
                    <br>
                    <div class="text-center" @click="a"
                    style="
                        background: #1a242f;
                        color: #F6FFAD;
                        border-radius: 50%;
                        width: 150px;
                        height: 150px;
                        margin: 0 auto;
                        line-height: 150px;
                        cursor: pointer; opacity: 0.9">
                    <a href="/en/item/near">
                        <!--<i class="glyphicon glyphicon-map-marker"></i> -->
                        Find local products
                    </a>
                </div>
            </div>

            <div class="col-md-6">
            </div>



            <div class="col-md-6">
            </div>

            <div class="col-md-6">

                <br>
                <div class="text-center pull-left" @click="a"
                style="
                    background: #1a242f;
                    color: #F6FFAD;
                    border-radius: 50%;
                    width: 150px;
                    height: 150px;
                    line-height: 150px;
                    cursor: pointer; opacity: 0.9
                ">
                <a href="/en/auth/register">
                    <!--<i class="fa fa-user" style="font-size: 50px;"></i>-->
                    Publish product
                </a>
            </div>

            </div>





        </div>

    </div>

   <div class="container">
       <div class="row">
           <div>
               <input type="hidden" id="fingerprint" v-model="fingerprint">

               {{--
               <input type="checkbox" v-model="checked">
               <p>@{{ checked }}</p>
               --}}

               {{--
               <input type="checkbox" value="Mike" v-model="checkedNames">
               <label >Mike</label>
               <input type="checkbox" value="Mike1" v-model="checkedNames">
               <label >Mike1</label>
               <input type="checkbox" value="Mike2" v-model="checkedNames">
               <label >Mike2</label>
               <p>@{{checkedNames}}</p>
               --}}

               {{--
               <input type="radio" value="Mike" v-model="radioPicks">
               <label >Mike</label>
               <input type="radio" value="Mike1" v-model="radioPicks">
               <label >Mike1</label>
               <input type="radio" value="Mike2" v-model="radioPicks">
               <label >Mike2</label>
               <p>@{{radioPicks}}</p>
               --}}

               {{--
               <div class="row">
                   <div class="col-md-4 text-center" style="padding-top: 2em;">
                       <i class="fa fa-share-alt" aria-hidden="true" style="font-size: 7em;"></i>
                   </div>
                   <div class="col-md-8">
                       <h2> Od kmeta do zlice. </h2>
                       <p>
                           S pomocjo novih tehnologij, lahko omogocimo a je pot hrane do potrosnika vedno krajsa in cenejsa.

                           <ul>
                               <li>informacije - uporabniska iskusnja = enostavnost uporabe (profil, sms, mail, push notification, apps, ..)</li>
                               <li>elektricni avtomobili, drone, solarni hladilnik</li>
                               <li>prosti trg - vsak lahko uporablja storitev tako za pridobivanje informacij in izdelkov kot tudi objavljanje in prodajo izdelkov</li>
                           </ul>


                       </p>
                       <p> Ljudje se vse bol zavedajo da je pomembno kar dajemo v usta. </p>
                   </div>
               </div>

               <div class="row">

                   <div class="col-md-8">
                       <strong>Ekolosko</strong>

                   </div>

                   <div class="col-md-4 text-center" style="padding-top: 2em;">
                       EKO
                   </div>
               </div>
               --}}


               {{--
               <select multiple v-model="selectedOpt">
                   <option v-for="option in options" v-bind:value="option.value">
                       @{{option.text}}
                   </option>
               </select>
               @{{selectedOpt}}
               --}}


               {{--
               <button v-on:click="greet">Greet</button>
               --}}


               {{--
               <div v-for="(annt, index) in anns">
                   <button v-on:click="edit(index)">edit</button>
                   <p>state: @{{ annt.state }}</p>
               </div>
               --}}

               @include('newsletter.partials.registration')

           </div>
       </div>
   </div>
</div>

@stop


@section('scripts')
<script>




    var app = new Vue({
        el: '#app',
        data: {
            /*
            msg: 'test',
            */
            fingerprint: 'test',

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
        },
        methods: {
            greet: function (event) {
                // `this` inside methods points to the Vue instance

                // alert('Hello ' + this.name + '!')
                // `event` is the native DOM event
                //if (event) {
                //    alert(event.target.tagName)

                //}

                // console.log(this.fingerprint);
            },
            a: function (event) {
                // alert(this)
                if(event.target.children[0] && event.target.children[0].tagName == 'A')
                    window.location = event.target.children[0].getAttribute('href')
            }
        }

    });




</script>
@stop