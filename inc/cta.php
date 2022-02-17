<?php

// VARS
$cta_message = get_theme_mod( 'call_to_action_message' );
$office_hours_message = get_theme_mod( 'office_hours_message' );
$phone_number = get_theme_mod( 'phone_number' );

?>
<style>
    .aa-cta-container {
        display: flex;
        flex-flow: column wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        box-sizing: border-box;
    }
    .aa-cta-inner-container {
        display: flex;
        flex-flow: row wrap;
        width: 100%;
        max-width: 1100px;
        box-sizing: border-box;
    }
    .aa-cta-top {
        flex: 1 1 auto;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-flow: row nowrap;
        background-image: url('https://i0.wp.com/dev.utah-alanon.org/wp-content/uploads/2021/08/cta-help-bg.jpg?fit=1280%2C375&ssl=1');
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        box-sizing: border-box;
        text-align: right;
    }
    .aa-cta-message {
        flex: 1 1 auto;
        justify-self: flex-end;
        width: 100%;
        max-width: 450px;
        padding: 90px 30px;
        box-sizing: border-box;
    }
    .aa-cta-bottom {
        flex: 1 1 auto;
        width: 100%;
        display: flex;
        flex-flow: column wrap;
        justify-content: center;
        align-items: center;
        background: #dcfcd8;
        padding: 30px;
        box-sizing: border-box;
    }
    .aa-cta-bottom-message {
        flex: 1 1 auto;
        margin-bottom: 15px;
    }
    .aa-cta-bottom-btn {
        flex: 1 0 250px;
    }
    .aa-cta-bottom-btn a {
        display: block;
        -ms-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        width: 100%;
        max-width: 100%;
        font-family: Montserrat;
        font-weight: 700;
        font-size: 1.3em;
        padding: 1em 2em;
        background: transparent;
        border: 2px solid #304d6d;
        color: #304d6d !important;
        -webkit-border-radius: 0.25em;
        -moz-border-radius: 0.25em;
        border-radius: 0.25em;
        text-shadow: 0 1px 0 rgb(0 0 0 / 5%);
        text-align: center;
    }
</style>
<div class="aa-cta-container">
    <div class="aa-cta-top">
        <div class="aa-cta-inner-container">
            <div class="aa-cta-message">
                <?php echo( $cta_message ); ?>
            </div>
        </div>
    </div>
    <div class="aa-cta-bottom">
        <div class="aa-cta-inner-container">
            <div class="aa-cta-bottom-message">
                <h2>In A Crisis Give Us A Call</h2>
                <?php echo( $office_hours_message ); ?>
            </div>
            <div class="aa-cta-bottom-btn">
                <a href="mailto:<?php echo( $phone_number ); ?>"><?php echo( $phone_number ); ?></a>
            </div>
        </div>
    </div>
</div>