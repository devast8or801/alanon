<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package al-anon
 */

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
			</header>
		<?php else: ?>
			<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
		<?php endif; ?>
	<?php endif; ?>
	<!-- END PAGE HEADER -->
	<!-- MAIN CONTENT AREA -->
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'al-anon' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'al-anon' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main>
	<!-- END MAIN CONTENT AREA -->
	<?php if ( is_front_page() ) : ?>
	<?php else : ?>
	<!-- CTA -->
	<?php include get_theme_file_path('inc/cta.php'); ?>
	<!-- END CTA -->
	<?php endif; ?>

<?php
// get_sidebar();
get_footer();
