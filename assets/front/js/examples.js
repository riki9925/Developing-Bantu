/* Examples */
(function($) {
 
  $('.second.circle').circleProgress({
    value: 0.9
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(90 * progress) + '<i>%</i>');
  });

})(jQuery);
