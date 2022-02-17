<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package al-anon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- sidenav -->
<?php include('side-nav.php'); ?>
  <!-- end sidenav -->

  <!--All page content gets displayed below-->
<div id="page" class="site aa-page-container">

	<!-- HEADER -->
	<header id="aa_header" class="site-header">
		<div class="top-header">
			<div class="header-logo">
				<?php the_custom_logo(); ?>
			</div>
			<div class="header-btns">
				<!-- <div class="search-btn"></div> -->
				<div class="menu-btn" id="menu_toggle">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>
		</div>
		<div class="bottom-header">
			<nav id="aa_main_nav">
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
	</header>
	<!-- END HEADER -->