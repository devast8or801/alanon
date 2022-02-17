<?php

?>
  <!-- CARD -->
  <div class="news-card">
    <div class="news-card-img" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>');"></div>
    <div class="news-card-details">
      <h4><?php the_title(); ?></h4>
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>" class="aa-link">Read More</a>
    </div>
  </div>
  <!-- END CARD -->

