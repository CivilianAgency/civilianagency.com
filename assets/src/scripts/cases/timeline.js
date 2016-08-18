var caseWaypoints = [];

jQuery(document).ready(function($) {

  $('.timeline-point').each(function() {
    $(this).waypoint(function(direction) {
      if (direction == 'down') {
        $(this.element).addClass('active');
        console.log($(this));
      }
    }, { offset: '80%' });
  });

});
