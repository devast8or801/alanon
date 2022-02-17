<?php
$passed_district = $atts['district'];
$passed_day = $atts['day'];

$args = array(
  'post_type'  => 'meetings',
  'post_status' => 'publish',
  'posts_per_page' => 12,
  'tax_query' => array(
    array(
    'taxonomy' => 'district',
    'field' => 'slug',
    'terms' => array( $passed_district ),
    'operator'  => 'IN'
    )
  ),
  'meta_query' => array(
    array(
       'key'     => 'meeting_day',
       'value'   => $passed_day,
    )
  ),
);

$meetings_query = new WP_Query($args);

// echo '<script>var uuPostLoopJs = ' . json_encode($meetings_query) . '</script>';

?>

<?php if ($meetings_query->have_posts()) : ?>
  <div class="meeting-card-container">
  <div id="card-container">
  <?php while ($meetings_query->have_posts()) :?>

      <?php

      $meetings_query->the_post();
        
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
      $suspended = rwmb_meta( 'meeting_suspended' );

      ?>

      <!-- CARD -->
      <div class="meeting-card <?php if ( $suspended == 1 ) : ?>meeting-suspended<?php endif; ?>">
        <div class="meeting-card-header">
          <?php the_title(); ?>
        </div>
        <?php if ( $suspended == 1 ) : ?>
        <div class="meeting-suspended-bar">Suspended</div>  
        <?php endif; ?>
        <div class="meeting-card-details">
          <?php if ( !empty($location) ) : ?>
          <b><?php echo( $location ); ?></b><br>
          <?php endif; ?>
          <?php if ( !empty($address) ) : ?>
          <?php echo( $address ); ?><br>
          <?php endif; ?>
          <?php if ( !empty($day) ) : ?>
          <?php echo(  '<span class="meeting-card-dow">' . $day . 's - </span>' ); ?><?php echo( $startTime ); ?> to <?php echo( $endTime ); ?>
          <?php endif; ?>
          <div class="meeting-card-host-details">
            <?php if ( !empty($shortDesc) ) : ?>  
            <div class="meeting-card-short-desc"><?php echo $shortDesc; ?></div>
            <?php endif; ?>
            <?php if ( !empty($host) ) : ?>
            Contact: <?php echo( $host ); ?><br>
            <?php endif; ?>
            <?php if ( !empty($hostPhone) ) : ?>
              Contact Phone: <a href="tel:<?php echo( $hostPhoneStripped ); ?>"><?php echo( $hostPhone ); ?></a><br>
            <?php endif; ?>
            <?php if ( !empty($hostEmail) ) : ?>
              Contact Email: <a href="mailto:<?php echo( $hostEmail ); ?>"><?php echo( $hostEmail ); ?></a>
            <?php endif; ?>
          </div>
          <?php if ( !empty($zoomId) ) : ?>
          <div class="meeting-card-zoom-details">
            
              Zoom ID: <a href="https://us02web.zoom.us/j/<?php echo($zoomIdStripped); ?>" target="_blank"><?php echo($zoomId); ?></a><br>
              Meeting Password: <?php echo( $zoomPass ); ?>
          </div>
          <?php endif; ?>
          <a href="<?php the_permalink(); ?>" class="aa-link">Meeting Details</a>
        </div>
      </div>
      <!-- END CARD -->

  <?php endwhile; ?>
  </div>
  </div>
  <?php else: echo('No meetings scheduled.'); ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>