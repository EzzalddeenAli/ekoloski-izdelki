@extends('layouts.master')


@section('title')

    {{ "title"  }} | @parent

@stop

@section('meta')
    <meta name="title" content="{{ "title" }}"/>
    <meta name="description" content="{{ "title" }}"/>
@stop

@section('content')
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
                        <list-items list="items"></list-items>
                    </div>

                </div>


            </div>
            <div class="col-md-8">
                <div id="map" style="min-height: 607px; width: 100%"></div>
            </div>
        </div>


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

    </div>

</div>


@stop

@section('scripts')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgfF2N2CYEbRfUYf4-YuIxx8g00ehWBWk"></script>
    <script>

        var map;
        var lastOpenedInfowindow = null;
        var markers = [];
        var list; // vue app
        // image should be taken from same domain else is not shown
        // var image = '/static/images/pin-small.png';

        var data = {
            items: [
                { id: 0, text: 'Loading example', title: 'Use Search or Move zoom, scroll to location' },
            ]
        };

        var KC = {
            lat: 50.232934,
            lng: 11.333616
        };

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: KC,
            styles: [{
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [{"visibility": "on"}, {"color": "#e0efef"}]
            }, {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{"visibility": "on"}, {"hue": "#1900ff"}, {"color": "#c0e8e8"}]
            }, {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{"lightness": 100}, {"visibility": "simplified"}]
            }, {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{"visibility": "off"}]
            }, {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [{"visibility": "on"}, {"lightness": 700}]
            }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#7dcdcd"}]}]
        });


        /**
         * Get location from browser location.
         */
        function geoFindMe() {

            if (!navigator.geolocation) {
                console.log("Geolocation is not supported by your browser");
                return;
            }

            function success(position) {
                /*
                getItems({
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude
                });
                */
            }

            function error() {
                console.log("Unable to retrieve your location");
            }

            navigator.geolocation.getCurrentPosition(success, error);
        }


        /**
         * @param data
         */
        function getItems(data) {

            var userLocation = {
                latitude: 11.11,
                longitude: 12.11
            }

        }

        /**
         * Find from search input google results
         * @param array
         * @param type
         */
        function findInGoogleResult(array, type) {
            return _.find(array, function (element) {
                return _.indexOf(element.types, type) != -1;
            });
        }

        // add marker to object item
        function addMarker(item) {

            var position = {
                lat: parseFloat(item.latitude),
                lng: parseFloat(item.longitude)
            };

            var marker = new google.maps.Marker({
                position: position,
                // animation: google.maps.Animation.DROP,
                // icon: image,
                map: null
            });

            item['marker'] = marker;

            return item;
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {

            // console.log(map)
            // console.log(data.items)

            for (var i = 0; i < data.items.length; i++) {
                data.items[i]['marker'].setMap(map);
            }

        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        function closeLastOpenedInfowindow() {
            if (lastOpenedInfowindow)
                lastOpenedInfowindow.close();
        }

        // Set bounds of map so that all markers are visible.
        function setBounds() {
            var bounds = new google.maps.LatLngBounds();

            for (var i = 0; i < items.length; i++) {
                bounds.extend(items[i]['marker'].getPosition());
            }

            map.fitBounds(bounds);
        }


        Vue.component('list-item', {
            props: ['items'],
            template: "#item-list-template",
            // data: function() {
            //     return item
            // },
            methods: {
                details: function() {
                    // console.log('item', item)
                    // console.log($this.item)
                    // alert(item.name)
                }
            }

        })


        list = new Vue({
            el: '#list',
            data: data,
            /*
            methods: {
                details: function() {
                    // console.log('item', item)
                    // console.log($this.item)
                    // alert('here')

                }
            }
            */

        });

        // get map bounds
        var bounds = map.getBounds()


        // console.log('bounds', bounds)

        // https://developers.google.com/maps/documentation/javascript/events
        map.addListener('idle', function() {

            axios.post('/en/item/bounds', map.getBounds())
                .then(function(response) {

                    // console.log(response)
                    // console.log(response.data.length)

                    data.items = []

                    for(var i = 0; i < response.data.length; i++) {
                        response.data[i] = addMarker(response.data[i])
                        // console.log(response.data[i])

                        clearMarkers()

                        data.items.push(
                            response.data[i]
                        )

                        // show markers
                        setMapOnAll(map)

                    }

                })
                .catch(function(error) {
                    console.log(error)
                })

        });


    </script>


@stop
