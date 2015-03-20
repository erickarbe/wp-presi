<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'baseline_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function baseline_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	//add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'baseline' ),
	) );
	
	 /**
	 * Enable shortcodes
	 */
	 add_action( 'init', 'register_shortcodes');
	 
	

	/**
	 * Enable support for Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

}
endif; // baseline_setup
add_action( 'after_setup_theme', 'baseline_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function baseline_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'baseline' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'baseline_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function baseline_scripts() {
	
	/* CSS */
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800,600' );
	wp_enqueue_style( 'baseline-style', get_stylesheet_uri() );
	

  
  /* JS */
	//wp_enqueue_script( 'plugins', get_template_directory_uri() . '/library/js/plugins.js', array('jquery'), '1', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/library/js/app.js', array('jquery'), '1', true );

}
add_action( 'wp_enqueue_scripts', 'baseline_scripts' );



#-----------------------------------------------------------------#
# Fix shortcode filtering
#-----------------------------------------------------------------#
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'shortcode_empty_paragraph_fix');

#-----------------------------------------------------------------#
# 'Row' Shortcode
#-----------------------------------------------------------------#

// Add Shortcode
function section_row_function( $atts , $content = null ) {
  
  // Attributes
	extract( shortcode_atts(
		array(
			'class' => '',
		), $atts )
	);
	
	// Code
	return '<div class="row ' . $class . '">' . do_shortcode($content) . '</div>';

}

#-----------------------------------------------------------------#
# One Half
#-----------------------------------------------------------------#
function one_half_function( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
    $column_classes = null;
    $box_border = null;
    if($boxed == 'true')  { $column_classes .= ' boxed'; $box_border = '<span class="bottom-line"></span>'; }
    if($centered_text == 'true') $column_classes .= ' centered-text';
    
    return '<div class="col span-6' . $column_classes . '">'. $box_border . do_shortcode($content) . '</div>';
}

#-----------------------------------------------------------------#
# Register the Shortcodes
#-----------------------------------------------------------------#

function register_shortcodes(){
   add_shortcode('row', 'section_row_function');
   add_shortcode('one_half', 'one_half_function' );
}