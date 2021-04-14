<?php
/**
 * al-anon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package al-anon
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'al_anon_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function al_anon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on al-anon, use a find and replace
		 * to change 'al-anon' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'al-anon', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'al-anon' ),
				'menu-2' => esc_html__( 'SideNav', 'al-anon' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'al_anon_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'al_anon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function al_anon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'al_anon_content_width', 640 );
}
add_action( 'after_setup_theme', 'al_anon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function al_anon_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'al-anon' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'al-anon' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'al_anon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function al_anon_scripts() {
	wp_enqueue_style( 'umctheme3-custom', get_template_directory_uri() . '/css/main.css', array(), time(), 'all' );
	wp_enqueue_style( 'umctheme3-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'al-anon-style', 'rtl', 'replace' );

	wp_enqueue_script( 'al-anon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'al-anon-custom', get_template_directory_uri() . '/js/app.min.js', array('jquery'), time(), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'al_anon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Metaboxes
 */
 require get_template_directory() . '/inc/metabox.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}


/**
 * Custom post types
 */
 function al_anon_create_posttype() { 
		// Meetings
		register_post_type(
				'meetings',
				array(
					'labels' => array(
							'name'                  => __('Meetings'),
							'singular_name'         => __('Meeting'),
							'add_new'               => __('Add New Meeting'),
							'add_new_item'          => __('Add New Meeting'),
							'edit_item'             => __('Edit Meeting'),
							'new_item'              => __('New Meeting'),
							'all_items'             => __('All Meetings'),
							'view_item'             => __('View Meetings'),
							'search_items'          => __('Search Meetings'),
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'meetings'),
					'supports' => array( 'title', 'editor'),
					'menu_position' => 3,
					'menu_icon' => 'dashicons-calendar-alt',
					'taxonomies'	=> array('district'),
				)
		);
 }
 add_action('init', 'al_anon_create_posttype');
 
 /**
	* Custom Taxonomies
	*/
 add_action('init', 'al_anon_create_custom_taxonomy', 0);
 
 function al_anon_create_custom_taxonomy() {
		 $labels = array(
		 'name'                  => _x('Districts', 'taxonomy general name'),
		 'singular_name'         => _x('District', 'taxonomy singular name'),
		 'search_items'          =>  __('Search Districts'),
		 'all_items'             => __('All Districts'),
		 'parent_item'           => __('Parent Districts'),
		 'parent_item_colon'     => __('Parent District:'),
		 'edit_item'             => __('Edit District'),
		 'update_item'           => __('Update District'),
		 'add_new_item'          => __('Add New District'),
		 'new_item_name'         => __('New District Name'),
		 'menu_name'             => __('Districts'),
	 );
 
		 register_taxonomy('district', array('meetings'), array(
		 'hierarchical'          => true,
		 'labels'                => $labels,
		 'show_ui'               => true,
		 'show_admin_column'     => true,
		 'query_var'             => true
	 ));
 }