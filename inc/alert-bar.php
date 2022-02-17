<?php

// VARS

$alert_active = get_theme_mod( 'alert_bar_enable' );
$alert_message = get_theme_mod( 'alert_bar_message' );
$alert_url = get_theme_mod( 'alert_bar_url' );

?>
<?php if( $alert_active == true ) : ?>
<div class="al-anon-alert-bar" id="alert_bar">
    <?php if ( !empty($alert_url) ) : ?>
    <a href=" <?php echo $alert_url; ?>">
        <?php echo $alert_message; ?>
    </a>
    <?php else: ?>
    <?php echo $alert_message; ?>
    <?php endif; ?>
</div>
<?php endif; ?>
