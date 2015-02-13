// map styling from https://snazzymaps.com/style/102/clean-grey
var map_styles = [
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
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#ffffff"
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
        "featureType": "road.highway",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
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
