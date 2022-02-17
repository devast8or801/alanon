<?php
/**
 * al-anon Theme Customizer
 *
 * @package al-anon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function al_anon_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'al_anon_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'al_anon_customize_partial_blogdescription',
			)
		);
	}

	// ADD ALERT BAR SETTINGS
	$wp_customize->add_section(
		'alert-bar',
		array(
			'title' => __( 'Alert Bar', 'al-anon' ),
			'priority' => 30,
			'description' => __( 'Alert Bar', 'al-anon' )
		)
	);

	// ENABLE ALERT BAR
	$wp_customize->add_setting('alert_bar_enable', array( 'default' => false ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'alert_bar_enable', array( 'label' => __( 'Enable Alert Bar', 'al-anon' ), 'type' => 'checkbox', 'section' => 'alert-bar', 'settings' => 'alert_bar_enable', ) ) );
	// ALERT BAR MESSAGE
	$wp_customize->add_setting('alert_bar_message', array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'alert_bar_message', array( 'label' => __( 'Alert Bar Message', 'al-anon' ), 'type' => 'textarea', 'section' => 'alert-bar', 'settings' => 'alert_bar_message', ) ) );
	// ALERT BAR URL
	$wp_customize->add_setting('alert_bar_url', array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'alert_bar_url', array( 'label' => __( 'Alert Bar URL', 'al-anon' ), 'type' => 'url', 'section' => 'alert-bar', 'settings' => 'alert_bar_url', ) ) );


	// ADD CTA SETTINGS
	$wp_customize->add_section(
		'call-to-action',
		array(
			'title' => __( 'Call to Action Section', 'al-anon' ),
			'priority' => 30,
			'description' => __( 'Call to Action Section', 'al-anon' )
		)
	);

	// CTA MESSAGE
	$wp_customize->add_setting('call_to_action_message', array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'call_to_action_message', array( 'label' => __( 'Call to Action Message', 'al-anon' ), 'type' => 'textarea', 'section' => 'call-to-action', 'settings' => 'call_to_action_message', ) ) );
	// OFFICE HOURS MESSAGE
	$wp_customize->add_setting('office_hours_message', array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'office_hours_message', array( 'label' => __( 'Office Hours Message', 'al-anon' ), 'type' => 'textarea', 'section' => 'call-to-action', 'settings' => 'office_hours_message', ) ) );
	// PHONE NUMBER
	$wp_customize->add_setting('phone_number', array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number', array( 'label' => __( 'Phone Number', 'al-anon' ), 'type' => 'text', 'section' => 'call-to-action', 'settings' => 'phone_number', ) ) );


}
add_action( 'customize_register', 'al_anon_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function al_anon_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function al_anon_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function al_anon_customize_preview_js() {
	wp_enqueue_script( 'al-anon-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'al_anon_customize_preview_js' );
