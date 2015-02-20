/*
*   Background picture
*/

jQuery(document).ready(function($) {
  $('.hentry').height($(window).height());
  $(window).resize(function() {
    $('.hentry').height($(window).height());
  });
});

jQuery(document).ready(function($) {
  $('.hentry').width($(window).width());
  $(window).resize(function() {
    $('.hentry').width($(window).width());
  });
});
