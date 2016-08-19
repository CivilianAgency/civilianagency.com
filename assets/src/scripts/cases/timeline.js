var caseWaypoints = [];

jQuery(document).ready(function($) {

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

});
