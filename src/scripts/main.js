var caseWaypoints = [];
var map, infoBubble;
var mapCenter = new google.maps.LatLng(41.890687, -87.624778);
var slideSpeed = 200;
var transitionSpeed = 600;
var maxMobileSize = 767;
var mapStyle = [{
	"featureType": "landscape",
	"elementType": "all",
	"stylers": [{
		"hue": "#ffbb00"
	}, {
		"saturation": 43.40
	}, {
		"lightness": 37.60
	}, {
		"gamma": 1
	}]
}, {
	"featureType": "landscape",
	"elementType": "geometry.fill",
	"stylers": [{
		"saturation": "10"
	}]
}, {
	"featureType": "landscape.natural.terrain",
	"elementType": "all",
	"stylers": [{
		"color": "#000000"
	}]
}, {
	"featureType": "poi",
	"elementType": "all",
	"stylers": [{
		"hue": "#00FF6A"
	}, {
		"saturation": -1.0989
	}, {
		"lightness": 11.20
	}, {
		"gamma": 1
	}]
}, {
	"featureType": "poi.park",
	"elementType": "geometry",
	"stylers": [{
		"color": "#46b978"
	}, {
		"saturation": "-0"
	}, {
		"lightness": "60"
	}]
}, {
	"featureType": "road.highway",
	"elementType": "all",
	"stylers": [{
		"hue": "#FFC200"
	}, {
		"saturation": -61.8
	}, {
		"lightness": 45.60
	}, {
		"gamma": 1
	}]
}, {
	"featureType": "road.arterial",
	"elementType": "all",
	"stylers": [{
		"hue": "#FF0300"
	}, {
		"saturation": -100
	}, {
		"lightness": 51.20
	}, {
		"gamma": 1
	}]
}, {
	"featureType": "road.local",
	"elementType": "all",
	"stylers": [{
		"hue": "#FF0300"
	}, {
		"saturation": -100
	}, {
		"lightness": 52
	}, {
		"gamma": 1
	}]
}, {
	"featureType": "water",
	"elementType": "all",
	"stylers": [{
		"hue": "#0078FF"
	}, {
		"saturation": -13.20
	}, {
		"lightness": 2.40
	}, {
		"gamma": 1
	}]
}, {
	"featureType": "water",
	"elementType": "geometry",
	"stylers": [{
		"color": "#20a8b6"
	}, {
		"lightness": "0"
	}, {
		"gamma": "3"
	}]
}];

jQuery(document).ready(function($) {

  if ($('body').hasClass('home')) {

    if ($(window).width() <= maxMobileSize) {
      var poster = $('.home-header video').attr('poster');
      $('.home-header').prepend('<div class="video-replacement" style="background-image: url(\'' + poster + '\');"></div>');
      $('.home-header video').remove();
    }

    map = new google.maps.Map(document.getElementById('google-map'), {
      center: mapCenter,
      scrollwheel: false,
      zoom: 16,
      disableDefaultUI: true,
      styles: mapStyle
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
    thisItem.siblings('.snacks-item').each(function() {
      if ($(window).width() <= maxMobileSize) {
        $(this).attr('style', '').removeClass('active');
      } else {
        $(this).fadeOut(transitionSpeed / 2, function() {
          $(this).removeClass('active');
        });
      }
    });
    $(this).addClass('active');
    if ($(window).width() <= maxMobileSize) {
      thisItem.addClass('active');
    } else {
      thisItem.fadeIn(transitionSpeed / 2, function() {
        $(this).addClass('active');
      });
    }
  });

  $.fn.random = function() {
    return this.eq(Math.floor(Math.random() * this.length));
  };

  function instaFlipSetup() {
    var windowWidth = $(window).width();
    if (windowWidth >= 1585) {
      var gridImageCount = Math.ceil(windowWidth / 396);
      $('.insta-item img').each(function(i) {
        if (i > gridImageCount) {
          $('.insta-extra-wrap').append('<img src="' + $(this).attr('src') + '">');
          $(this).parents('.insta-item').remove();
        }
      });
    } else {
      $('.insta-item img').each(function(i) {
        var partialSquares = [0, 7, 8, 15];
        if ((windowWidth >= 768 && windowWidth < 1050) || (windowWidth >= 500 && windowWidth < 768) || windowWidth < 400) { // 6 full squares wide + 1 half on each side (7 total wide)
          partialSquares.push(1, 6, 9, 14);
        }
        if (partialSquares.indexOf(i) > -1) {
          $('.insta-extra-wrap').append('<img src="' + $(this).attr('src') + '">');
          $(this).parents('.insta-item').empty().addClass('insta-extra extra-' + i);
        }
      });
    }
    instaFlip();
  }

  function instaFlip() {
    var newImg = '<img src="' + $('.insta-extra-wrap img').first().attr('src') + '">';
    $('.insta-extra-wrap img').first().remove();
    var gridItemToBeFlipped = $('.instagram-grid .insta-item:not(.insta-extra)').random();
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
    instaFlipSetup();
  }

  $('.colorbox').colorbox({
    iframe: true,
    innerWidth: 800,
    innerHeight: 450,
    maxWidth: '90%',
    maxHeight: '60%',
    className: 'colorbox-window',
    close: '&times;'
  });

  $('.capabilities-guy svg .rollover-block').click(function() {
    var thisSlug = $(this).data('rollover-slug');
    $('.capabilities-guy svg .rollover-block').not($(this)).removeClass('active');
    var thisBox = $('.capabilities-wrap [data-box-slug="' + thisSlug + '"]');
    $('.capabilities-wrap .capabilities-box').not(thisBox).removeClass('active');
    $(this).addClass('active');
    thisBox.addClass('active');
  });

  $('.rollover-wrap').click(function() {
    $(this).toggleClass('active');
  });

  if ($('body').hasClass('page-template-expertise')) {
    $('.expertise-capabilities').waypoint(function(direction) {
      if (direction == 'down') {
        $('.capabilities-wrap').addClass('active');
      }
    }, { offset: '50%' });
  }

});

function poiClick(marker, i, map, content) {
  google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
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
