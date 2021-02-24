<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package al-anon
 */

  // VARS
  $inPerson = rwmb_meta( 'meeting_in_person' );
  $day = rwmb_meta( 'meeting_day' );
  $startTime = rwmb_meta( 'meeting_start_time' );
  $endTime = rwmb_meta( 'meeting_end_time' );
  $location = rwmb_meta( 'meeting_location' );
  $address = rwmb_meta( 'meeting_address' );
  $host = rwmb_meta( 'meeting_host' );
  $hostPhone = rwmb_meta( 'meeting_host_phone' );
  $hostPhoneStripped = preg_replace('/\D+/', '', $hostPhone);
  $hostEmail = rwmb_meta( 'meeting_host_email' );
  $zoomId = rwmb_meta( 'meeting_zoom_id' );
  $zoomIdStripped = preg_replace('/\D+/', '',  $zoomId);
  $zoomPass = rwmb_meta( 'meeting_zoom_pass' );
  $shortDesc = rwmb_meta( 'meeting_short_desc' );
  $notice = rwmb_meta( 'meeting_notice' );

get_header();
?>
	<!-- MAIN CONTENt AREA -->
	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : ?>
      
      <?php the_post(); ?>
      <h1><?php the_title(); ?></h1>

      <?php if ( !empty($notice) ) : ?>
        <!-- NOTICE -->
        <div class="notice"><?php echo($notice); ?></div>
        <!-- END NOTICE -->
      <?php endif; ?>
      
      <?php if ( !empty($shortDesc) ) : ?>
        <!-- SHORT DESCRIPTION -->
        <p><?php echo($shortDesc); ?></p>
        <!-- END SHORT DESCRIPTION -->
      <?php endif; ?>

      <div class="meeting-card">
        <div class="meeting-card-header">
          Meeting Details
        </div>
        <div class="meeting-card-details">
          <b><?php echo( $location ); ?></b><br>
          <?php echo( $address ); ?><br>
          <?php echo(  '<span class="meeting-card-dow">' . $day . 's - </span>' ); ?><?php echo( $startTime ); ?> to <?php echo( $endTime ); ?>
          <div class="meeting-card-host-details">
            Contact: <?php echo( $host ); ?><br>
            <?php if ( !empty($hostPhone) ) : ?>
              Contact Phone: <a href="tel:<?php echo( $hostPhoneStripped ); ?>"><?php echo( $hostPhone ); ?></a><br>
            <?php endif; ?>
            <?php if ( !empty($hostEmail) ) : ?>
              Contact Email: <a href="mailto:<?php echo( $hostEmail ); ?>"><?php echo( $hostEmail ); ?></a>
            <?php endif; ?>
          </div>
          <div class="meeting-card-zoom-details">
            <?php if ( !empty($zoomId) ) : ?>
              Zoom ID: <a href="https://us02web.zoom.us/j/<?php echo($zoomIdStripped); ?>" target="_blank"><?php echo($zoomId); ?></a><br>
              Meeting Password: <?php echo( $zoomPass ); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
    <?php endwhile; ?>

	</main>
	<!-- END MAIN CONTENt AREA -->

<?php
// get_sidebar();
get_footer();
