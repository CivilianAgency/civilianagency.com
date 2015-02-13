// map styling from https://snazzymaps.com/style/102/clean-grey
var map_styles = [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "50"
            },
            {
                "gamma": "1.00"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "gamma": 0.26
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": -50
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "labels.text",
        "stylers": [
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "lightness": "90"
            },
            {
                "gamma": "1"
            }
        ]
    },
    {
        "featureType": "poi.government",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 50
            },
            {
                "hue": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "lightness": "50"
            }
        ]
    }
];

var client_location = new google.maps.LatLng(41.8906110, -87.6247160);

var map = new google.maps.Map(document.getElementById("google-map"), {
  center: {
    lat: 41.890716,
    lng: -87.624351
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
