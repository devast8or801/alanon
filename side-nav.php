<section id="sideNav" class="aa_side_nav">
	<nav class="aa_side_nav_menu">
	<?php
      $menu2_location = 'menu-2';
      $theme_locations = get_nav_menu_locations();
      if ( has_nav_menu( $menu2_location ) ) :
        $menu2_obj = get_term( $theme_locations[$menu2_location], 'nav_menu' );
        $menu2_name = $menu2_obj->name;

            // echo '<h3>'. $menu2_name .'</h3><hr class="left">';
            wp_nav_menu( array(
              'theme_location'    => $menu2_location,
              'menu_class'        => 'sidenav-menu',
              'container'         => false,
              'link_before'       => '<span>',
              'link_after'        => '</span>',
              'items_wrap'        => '<ul id="%1$s" class="%2$s" rel="top">%3$s</ul>'
            ));
        endif;
    ?>
	</nav>
</section>
