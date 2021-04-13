<section id="sideNav" class="aa_side_nav">
	<nav class="aa_side_nav_menu">
		<h2 class="side_nav_title">Main Menu</h2>
		<?php
			$menuArgs = array(
				'menu'			      => 'Side Nav',
				'theme_location'  => 'menu-2',
				'container'       => false,
				'echo'            => false,
				'items_wrap'      => '%3$s',
				'depth'           => 0,
			);
			echo strip_tags(wp_nav_menu( $menuArgs ), '<a>' );
		?>
	</nav>
</section>
