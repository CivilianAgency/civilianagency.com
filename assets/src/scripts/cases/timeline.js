var caseWaypoints = [];

jQuery(document).ready(function($) {

  $('.title-boxed-wrap, .timeline-point, .timeline-circle, .timeline-point-highlight').each(function() {
    $(this).waypoint(function(direction) {
      if (direction == 'down') {
        $(this.element).addClass('active');
      }
    }, { offset: '80%' });
  });

});
