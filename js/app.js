jQuery(document).ready( function() {

  var $nav_toggle = jQuery('#menu_toggle');
  var $sidenav = jQuery('#sideNav');

  $nav_toggle.on('click', function() {
    jQuery(this).toggleClass('hamburger-x');
    $sidenav.toggleClass('sidenav-open');
    jQuery('#page').toggleClass('sidenav-open');
  });

});