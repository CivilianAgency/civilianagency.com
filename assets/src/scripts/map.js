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
                "visibility": "simplified"
            },
            {
                "lightness": "1"
            },
            {
                "gamma": "1"
            },
            {
                "saturation": "0"
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
        "featureType": "poi",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#c8c8c8"
            },
            {
                "lightness": "-15"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
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
                "lightness": "75"
            },
            {
                "gamma": "1"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "labels",
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
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#c8c8c8"
            },
            {
                "lightness": "-5"
            },
            {
                "gamma": "1.00"
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
        "featureType": "road.highway.controlled_access",
        "elementType": "labels.text",
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
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "lightness": "50"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#58afc2"
            },
            {
                "lightness": "50"
            },
            {
                "gamma": "1.00"
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
  scaledSize: new google.maps.Size(35, 35)
};

var marker = new google.maps.Marker({
  position: client_location,
  map: map,
  icon: marker_image
});

google.maps.event.addListener(marker, 'click', function () {
  window.location.href = 'https://www.google.com/maps/place/444+N+Michigan+Ave,+Chicago,+IL+60611/data=!4m2!3m1!1s0x880e2cac24f11229:0x2afc2357830fea2d?sa=X&ei=M3jiVNO9NczjsATa1ILQBg&ved=0CCQQ8gEwAQ';
  window.open('https://www.google.com/maps/place/444+N+Michigan+Ave,+Chicago,+IL+60611/data=!4m2!3m1!1s0x880e2cac24f11229:0x2afc2357830fea2d?sa=X&ei=M3jiVNO9NczjsATa1ILQBg&ved=0CCQQ8gEwAQ', '_blank');
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


