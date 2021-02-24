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