var map;
var lastOpenedInfowindow = null;
var itemsBefore = 0; // only refresh list if number of items changed

var markers = [];

var list; // vue app
// image should be taken from same domain else is not shown
// var image = '/static/images/pin-small.png';

var data = {
    items: [
        /*
        {   id: 0,
            text: 'Loading example',
            title: 'Use Search or Move zoom, scroll to location',
            latitude: 11.1,
            longitude: 11.1
        },
        */
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

/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// vue


Vue.component('list-item', {
    props: ['id', 'name', 'latitude', 'longitude'],
    template: "#list-item",
    data: function() {
         return {
             show: true
         };
    },
    methods: {
        details: function() {
            // console.log('item', item)
            // console.log($this.item)
            // alert(this.name)

            // get item detail and display it
            axios.post('/en/item/get', map.getBounds())
                .then(function(response) {

                });

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



////////////////////////////////////////////////////////////////////////////////
// get map bounds
var bounds = map.getBounds()




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




// console.log('bounds', bounds)

// https://developers.google.com/maps/documentation/javascript/events
map.addListener('idle', function() {

    axios.post('/en/item/bounds', map.getBounds())
        .then(function(response) {

            // console.log('was idle post', map.getBounds());
            // console.log(response)
            // console.log(response.data.length)


            dataItems = data.items.length;

            // console.log('itemsBefore', dataItems)
            // console.log('itemsAfter', response.data.length)


            if(response.data.length > 0 && response.data.length != itemsBefore) {

                clearMarkers()

                data.items = []

                for(var i = 0; i < response.data.length; i++) {
                    response.data[i] = addMarker(response.data[i])
                    // console.log(response.data[i])
                    data.items.push(
                        response.data[i]
                    )

                    // console.log('', data.items);

                }


                // show markers
                setMapOnAll(map)
            }


        })
        .catch(function(error) {
            console.log(error)
        })

});
