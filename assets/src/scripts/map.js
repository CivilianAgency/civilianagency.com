// map styling from https://snazzymaps.com/style/102/clean-grey
var map_styles = [
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 33
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2e5d4"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#c5dac6"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#c5c6c6"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e4d7c6"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#fbfaf7"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#acbcc9"
            }
        ]
    }
];

var client_location = new google.maps.LatLng(41.8906110, -87.6247160);

var map = new google.maps.Map(document.getElementById("google-map"), {
  center: {
    lat: 41.8925,
    lng: -87.6247160
  },
  zoom: 16,
  styles: map_styles,
  disableDefaultUI: true,
  disableDoubleClickZoom: true,
  draggable: false,
  keyboardShortcuts: false,
  scrollwheel: false
});

var marker_image = {
  url: 'assets/images/map_marker.png',
  scaledSize: new google.maps.Size(30, 30)
};

var marker = new google.maps.Marker({
  position: client_location,
  map: map,
  icon: marker_image
});

var infoWindow = new google.maps.InfoWindow({
  content: '<div style="text-align:left; line-height: 20px;">' +
    '<span style="font-weight:bold;">Civilian</span><br>' +
    '444 North Michigan Avenue <br>' +
    '33rd Floor Chicago, IL 60611 <br>' +
    '312.822.1100' +
    '</div>'
});

google.maps.event.addListener(marker, 'mouseover', function() {
  infoWindow.open(map, marker);
});

google.maps.event.addListener(marker, 'mouseout', function() {
  infoWindow.close();
});
