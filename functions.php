<?php
if ( ! function_exists( 'mopedgp_setup' ) ) :
	function mopedgp_setup() {
	//Enable Wordpress Features
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		if ( ! isset( $content_width ) ) {
			$content_width = 625;
		}
	//HTML 5 Support
		$args = array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
			);
		add_theme_support( 'html5', $args );

	//Menus
		register_nav_menus( array(
			'offcanvas' => __( 'Off Canvas Menu', 'mopedgp' ),
			) );

	//Widgetized Areas
		function mopedgp_register_widgets() {
			register_sidebar( array(
				'name'          => 'Sidebar',
				'id'            => 'sidebar',
				'class'			=> 'widgetized-area',
				'before_widget' => '<aside class="sidebar widget">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
				) );
		}
	}
	endif;
	add_action( 'after_setup_theme', 'mopedgp_setup' );
	add_action( 'widgets_init', 'mopedgp_register_widgets' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'mopedgp_scripts' ) ) :
	function mopedgp_scripts() {
		wp_enqueue_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400italic,300,700,400' );
		wp_enqueue_style( 'mopedgp-mainstyle', get_stylesheet_directory_uri() . '/scss/main.min.css' );
		wp_enqueue_script( 'modernizrjs', get_stylesheet_directory_uri() . '/js/modernizr.min.js','','2.83',true );
		wp_enqueue_script( 'mopedgpjs', get_stylesheet_directory_uri() . '/js/mopedgp.js',array( 'jquery' ),'1.1',true );
	}
	endif;
	add_action( 'wp_enqueue_scripts', 'mopedgp_scripts' );

/**
* Helper Functions
*/
//Retrieve Tag IDs
function get_tag_id_by_name( $tag_name )
{
	global $wpdb;
	$tag_ID = $wpdb->get_var("SELECT * FROM " . $wpdb->terms . " WHERE  `slug` =  '" . $tag_name . "'" );

	return $tag_ID;
}
//Retrieve Category IDs
function get_cat_id_by_name( $cat_name )
{
	global $wpdb;
	$cat_ID = $wpdb->get_var( "SELECT * FROM " . $wpdb->terms . " WHERE  `slug` =  '" . $cat_name . "'" );

	return $cat_ID;
}
//Better Excerpt
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function better_excerpt( $length = 300 ) {
	$excerpt = get_the_excerpt();
    // If the text is already shorter than the max length, then just return unedited text.
	if ( strlen( $excerpt ) <= $length) {
		return $excerpt;
	}
    // Find the last space (between words we're assuming) after the max length.
	$last_space = strrpos(substr($excerpt, 0, $length), ' ');
    // Trim
	$trimmed_text = substr($excerpt, 0, $last_space);
    // Add ellipsis.
	$trimmed_text .= '...';

	return $trimmed_text;
}