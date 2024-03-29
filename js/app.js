jQuery(document).ready( function() {

  var $nav_toggle = jQuery('#menu_toggle');
  var $sidenav = jQuery('#sideNav');
  var $parent_menu_item = jQuery('.sidenav-menu li.menu-item-has-children > a');
  var $current_menu_item = jQuery('.sidenav-menu li.current-menu-parent');

  $nav_toggle.on('click', function() {
    jQuery(this).toggleClass('hamburger-x');
    $sidenav.toggleClass('sidenav-open');
    jQuery('#page').toggleClass('sidenav-open');
  });


  $current_menu_item.addClass('nav-open');
  $current_menu_item.find('> .sub-menu').slideToggle();


  $parent_menu_item.on('click', function(e) {
    e.preventDefault();
    jQuery(this).closest('.menu-item-has-children').toggleClass('nav-open');
    jQuery(this).closest('.menu-item-has-children').find('> .sub-menu').slideToggle();
  });

});