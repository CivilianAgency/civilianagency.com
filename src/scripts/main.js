var caseWaypoints = [];
var map, infoBubble;
var mapCenter = new google.maps.LatLng(41.890687, -87.624778);
var slideSpeed = 200;
var transitionSpeed = 600;

jQuery(document).ready(function($) {

  if ($('body').hasClass('home')) {
    map = new google.maps.Map(document.getElementById('google-map'), {
      center: mapCenter,
      scrollwheel: false,
      zoom: 16,
      disableDefaultUI: true,
      mapTypeId: google.maps.MapTypeId.HYBRID
    });

    var cvlnMarker = new google.maps.Marker({
      position: mapCenter,
      map: map,
      icon: {
        url: themePath + 'dist/images/civilian-man-circle.png',
        size: new google.maps.Size(50, 50),
        scaledSize: new google.maps.Size(50, 50),
        anchor: new google.maps.Point(25, 25)
      }
    });

    if (pointsOI.length >= 1) {
      for (i = 0; i < pointsOI.length; i++) {
        var thisLatLng = new google.maps.LatLng(pointsOI[i][2], pointsOI[i][3]);
        marker = new google.maps.Marker({
          position: thisLatLng,
          map: map,
          icon: {
            path: 'M512,138.3C512,61.9,450.1,0,373.7,0C323.9,0,280.3,26.5,256,66.1C231.7,26.5,188.1,0,138.2,0 C61.9,0,0,61.9,0,138.3c0,41.6,18.4,78.8,47.5,104.1l195.9,195.9c3.3,3.3,7.9,5.2,12.6,5.2c4.7,0,9.3-1.9,12.6-5.2l195.9-195.9 C493.6,217,512,179.8,512,138.3z',
            fillColor: '#e94d3a',
            fillOpacity: 1,
            strokeColor: '#fff',
            strokeWeight: 2,
            scale: 0.05,
            anchor: new google.maps.Point(200, 200)
          }
        });
        var content = '<div class="point-title">' + pointsOI[i][0] + '</div>';
        if (pointsOI[i][2]) {
          content += '<div class="point-description">' + pointsOI[i][1] + '</div>';
        }
        poiClick(marker, i, map, content);
      }
      infoBubble = new InfoBubble({
        map: map,
        hideCloseButton: true,
        arrowPosition: 30,
        arrowSize: 0,
        padding: 0,
        minHeight: 10,
        maxHeight: 400,
        minWidth: 10,
        maxWidth: 200,
        borderRadius: 0,
        borderColor: '#e94d3a',
        borderWidth: 2
      });
    }
  }

  $('.title-boxed-wrap-line').each(function() {
    $(this).waypoint(function(direction) {
      $(this.element).addClass('active');
    }, { offset: '65%' });
  });

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

  if ($('body').hasClass('page-template-culture')) {
    $('.culture-local').waypoint(function(direction) {
      if (direction == 'down') {
        $('.st3-chicagoflag').addClass('moved');
        $('.star-title-1').addClass('active');
        setTimeout(function() {
          $('.st4-chicagoflag').addClass('moved');
          $('.star-title-2').addClass('active');
          setTimeout(function() {
            $('.st5-chicagoflag').addClass('moved');
            $('.star-title-3').addClass('active');
            setTimeout(function() {
              $('.st6-chicagoflag').addClass('moved');
              $('.star-title-4').addClass('active');
            }, transitionSpeed);
          }, transitionSpeed);
        }, transitionSpeed);
      }
    }, { offset: '50%' });
  }

  $('.main-menu-toggle').click(function() {
    if ($(this).hasClass('open')) {
      $('.nav-main-menu').slideUp(slideSpeed);
      $(this).removeClass('open');
      $('.close-main-menu').removeClass('open');
    } else {
      $('.nav-main-menu').slideDown(slideSpeed);
      $(this).addClass('open');
      $('.close-main-menu').addClass('open');
    }
  });

  $('.close-main-menu').click(function() {
    $('.nav-main-menu').slideUp(slideSpeed);
    $('.main-menu-toggle').removeClass('open');
    $(this).removeClass('open');
  });

  $('#mobile-map-launch').click(function() {
    $('.google-map-wrap').addClass('open');
    google.maps.event.trigger(map, 'resize');
    setTimeout(function() {
      map.panTo(mapCenter);
    }, slideSpeed);
  });

  $('#google-map-close').click(function() {
    $('.google-map-wrap').removeClass('open');
  });

  $('.snacks #snacks-next').click(function() {
    var thisIndex = $('.snacks-nav .snacks-point').index($('.snacks-nav .snacks-point.active'));
    if (thisIndex >= ($('.snacks-nav .snacks-point').length - 1)) {
      $('.snacks-nav .snacks-point').eq(0).trigger('click');
    } else {
      $('.snacks-nav .snacks-point').eq(thisIndex + 1).trigger('click');
    }
  });

  $('.snacks .snacks-point').click(function() {
    var thisIndex = $('.snacks-nav .snacks-point').index($(this));
    var thisItem = $('.snacks .snacks-item').eq(thisIndex);
    $(this).siblings().removeClass('active');
    thisItem.siblings().removeClass('active');
    $(this).addClass('active');
    thisItem.addClass('active');
  });

  $.fn.random = function() {
    return this.eq(Math.floor(Math.random() * this.length));
  };

  function instaFlip() {
    var newImg = '<img src="' + $('.insta-extra-wrap img').first().attr('src') + '">';
    $('.insta-extra-wrap img').first().remove();
    var gridItemToBeFlipped = $('.instagram-grid .insta-item').random();
    var flipSideChangeTo = '.back';
    var flipSideChangeFrom = '.front';
    var oldImageSrc, isFiller;
    if (gridItemToBeFlipped.hasClass('flipped')) {
      flipSideChangeTo = '.front';
      flipSideChangeFrom = '.back';
    }
    gridItemToBeFlipped.find(flipSideChangeTo).html(newImg);
    if (gridItemToBeFlipped.hasClass('item-filler')) {
      isFiller = true;
      gridItemToBeFlipped.removeClass('item-filler');
    } else {
      oldImageSrc = gridItemToBeFlipped.find(flipSideChangeFrom).find('img').attr('src');
    }
    gridItemToBeFlipped.find(flipSideChangeFrom).html();
    setTimeout(function() {
      gridItemToBeFlipped.toggleClass('flipped');
      if (!isFiller) {
        $('.insta-extra-wrap').append('<img src="' + oldImageSrc + '">');
      }
      instaFlip();
    }, 3000);
  }

  if ($('body').hasClass('page-template-culture')) {
    instaFlip();
  }

});

function poiClick(marker, i, map, content) {
  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      map.panTo(marker.getPosition());
      infoBubble.setContent('<div class="map-infobubble">' + content + '</div>');
      infoBubble.open(map, this);
      google.maps.event.addListener(infoBubble, 'domready', function() {
        jQuery('.map-infobubble').parent().parent().css('width', 'auto').css('height', 'auto');
      });
    };
  })(marker, i));
}
