/*
*   Background picture
*/

jQuery(document).ready(function($) {
  $('.hentry').height($(window).height());
  $('.hentry').width($(window).width());
  $(window).resize(function() {
    $('.hentry').height($(window).height());
    $('.hentry').width($(window).width());
  });
});
