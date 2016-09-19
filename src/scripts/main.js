var caseWaypoints = [];

jQuery(document).ready(function($) {

  if ($('body').hasClass('home')) {
    var map = new google.maps.Map(document.getElementById('google-map'), {
      center: {
        lat: 41.890672,
        lng: -87.624769
      },
      scrollwheel: false,
      zoom: 16,
      disableDefaultUI: true,
      mapTypeId: google.maps.MapTypeId.HYBRID
    });

    if (pointsOI.length >= 1) {
      for (i = 0; i < pointsOI.length; i++) {
        var thisLatLng = new google.maps.LatLng(pointsOI[i][2], pointsOI[i][3]);
        marker = new google.maps.Marker({
          position: thisLatLng,
          map: map
        });
        poiClick(marker, i, map);
      }
    }
  }

  if ($('body').hasClass('single-case')) {
    $('.title-boxed-wrap, .timeline-point, .timeline-circle, .timeline-point-highlight').each(function() {
      $(this).waypoint(function(direction) {
        if (direction == 'down') {
          $(this.element).addClass('active');
          if ($(this.element).hasClass('timeline-point-highlight')) {
            var thisEl = $(this.element);
            var tempTimeout = setTimeout(function() {
              thisEl.addClass('color-fade');
            }, 600);
          }
        }
      }, { offset: '80%' });
    });
  }

});

function poiClick(marker, i, map) {
  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      map.panTo(marker.getPosition());
      infowindow.setContent('<div class="map-infowindow"><a href="' + locations[i].path + '">' + locations[i].name +'</a></div>');
      infowindow.open(map, this);
    };
  })(marker, i));
}
