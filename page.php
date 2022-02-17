<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package al-anon
 */

 //  VARS
$subhead = rwmb_meta( 'page_subhead' );

get_header();

?>
	<!-- PAGE HEADER -->
	<?php if ( is_front_page() ) : ?>
	<!-- ALERT BAR -->
	<?php include get_theme_file_path('inc/alert-bar.php'); ?>
	<!-- END ALERT BAR -->
	<?php else : ?>
	<!-- ALERT BAR -->
	<?php include get_theme_file_path('inc/alert-bar.php'); ?>
	<!-- END ALERT BAR -->
		<?php if ( has_post_thumbnail() ) : ?>
			<header class="entry-header featured-img-header" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>');">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( !empty($subhead) ) : ?><div class="subhead"><?php echo($subhead); ?></div><?php endif; ?>
			</header>
		<?php else: ?>
			<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( !empty($subhead) ) : ?><div class="subhead"><?php echo($subhead); ?></div><?php endif; ?>
			</header>
		<?php endif; ?>
	<?php endif; ?>
	<!-- END PAGE HEADER -->
	<!-- MAIN CONTENT AREA -->
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main>
	<!-- END MAIN CONTENt AREA -->
	<?php if ( is_front_page() ) : ?>
	<?php else : ?>
	<!-- CTA -->
	<?php include get_theme_file_path('inc/cta.php'); ?>
	<!-- END CTA -->
	<?php endif; ?>

<?php
// get_sidebar();
get_footer();
