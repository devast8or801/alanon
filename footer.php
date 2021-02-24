<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package al-anon
 */

?>
	<!-- FOOTER -->
	<footer id="aa_footer" class="site-footer">
		<div class="footer_logo">
			<?php the_custom_logo(); ?>
			<p class="small">© utah-alanon.org. All rights reserved. <a href="<?php echo get_site_url(); ?>/privacy-policy">Privacy Policy</a></p>
		</div>
		<div class="footer-menu">
			<h6>Quick Links</h6>
			<nav id="aa_footer_nav">
				<?php
					$menuArgs = array(
						'menu'			      => 'Main Menu',
						'theme_location'  => 'menu-1',
						'container'       => false,
						'echo'            => false,
						'items_wrap'      => '%3$s',
						'depth'           => 0,
					);
					echo strip_tags(wp_nav_menu( $menuArgs ), '<a>' );
				?>
			</nav>
		</div>
		<div class="footer-social">
			<h6>Social Links</h6>
			[INSERT SOCIAL LOGOS]
		</div>
	</footer>
	<!-- END FOOTER -->
</div>
<!-- END PAGE -->

<?php wp_footer(); ?>

</body>
</html>
