<?php

if (!function_exists('mopedgp_setup')) :
    function mopedgp_setup()
    {
        //Enable Wordpress Features
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size( 'sponsor-thumb', 250 , 250, true );
        if (!isset($content_width)) {
            $content_width = 1000;
        }
    //HTML 5 Support
        $args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            );
        add_theme_support('html5', $args);

    //Menus
        register_nav_menus(array(
            'offcanvas' => __('Off Canvas Menu', 'mopedgp'),
            ));

    //Widgetized Areas
        function mopedgp_register_widgets()
        {
            register_sidebar(array(
                'name' => 'Sidebar',
                'id' => 'sidebar',
                'class' => 'widgetized-area',
                'before_widget' => '<aside class="sidebar widget">',
                'after_widget' => '</aside>',
                'before_title' => '<h2>',
                'after_title' => '</h2>',
                ));
            register_sidebar(array(
                    'name' => 'Frontpage 1',
                    'id' => 'frontpage1',
                    'class' => 'widgetized-area',
                    'before_widget' => '<aside class="frontpage-widget widget">',
                    'after_widget' => '</aside>',
                    'before_title' => '<h2>',
                    'after_title' => '</h2>',
                    ));
            register_sidebar(array(
                        'name' => 'Frontpage 2',
                        'id' => 'frontpage2',
                        'class' => 'widgetized-area',
                        'before_widget' => '<aside class="frontpage-widget widget">',
                        'after_widget' => '</aside>',
                        'before_title' => '<h2>',
                        'after_title' => '</h2>',
                        ));
            register_sidebar(array(
                            'name' => 'Frontpage 3',
                            'id' => 'frontpage3',
                            'class' => 'widgetized-area',
                            'before_widget' => '<aside class="frontpage-widget widget">',
                            'after_widget' => '</aside>',
                            'before_title' => '<h2>',
                            'after_title' => '</h2>',
                            ));
        }
    }
    endif;
    add_action('after_setup_theme', 'mopedgp_setup');
    add_action('widgets_init', 'mopedgp_register_widgets');

/*
 * Enqueue scripts and styles.
 */
if (!function_exists('mopedgp_scripts')) :
    function mopedgp_scripts()
    {
        wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400italic,300,700,400');
        wp_enqueue_style('mopedgp-mainstyle', get_stylesheet_directory_uri().'/scss/main.min.css');
        wp_enqueue_script('mopedgpjs', get_stylesheet_directory_uri().'/js/mopedgp.js', array('jquery'), '1.0', true);
        wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/js/owl.carousel.min.js', array('jquery'), '1.0', true);
    }
    endif;
    add_action('wp_enqueue_scripts', 'mopedgp_scripts');

/**
 * Helper Functions.
 */

//Retrieve Tag IDs
function get_tag_id_by_name($tag_name)
{
    global $wpdb;
    $tag_ID = $wpdb->get_var('SELECT * FROM '.$wpdb->terms." WHERE  `slug` =  '".$tag_name."'");

    return $tag_ID;
}

//Retrieve Category IDs
function get_cat_id_by_name($cat_name)
{
    global $wpdb;
    $cat_ID = $wpdb->get_var('SELECT * FROM '.$wpdb->terms." WHERE  `slug` =  '".$cat_name."'");

    return $cat_ID;
}

/**
 * Better Excerpt.
 */
function new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function better_excerpt($length = 300)
{
    $excerpt = get_the_excerpt();
    // If the text is already shorter than the max length, then just return unedited text.
    if (strlen($excerpt) <= $length) {
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
/**
* Oembed Container
**/
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="oembed-outerwrap"><div class="oembed-innerwrap">' . $html . '</div></div>';
}

/**
 * Advanced Custom Fields.
 */
include get_template_directory().'/components/customfields.php';

/**
 * Extend Wordpress Nav Walker to include depth in sub-menus.
 **/
include get_template_directory().'/components/menu-walker.php';
