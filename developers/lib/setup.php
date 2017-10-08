<?php
/**
 * Description
 *
 * @package     OnceCoupled\Developers
 * @since       1.0.0
 * @author      Doug OC
 * @link        https://www.oncecoupled.com/
 * @license     GNU General Public License 2.0+
 */
namespace OnceCoupled\Developers;



/**
 * Setup Child Theme
 *
 * @since 1.0.0
 *
 * @return void
 */
add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15);
function setup_child_theme() {

	//* Set Localization (do not remove)
	load_child_theme_textdomain( 'CHILD_TEXT_DOMAIN', apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', 'CHILD_TEXT_DOMAIN' ) );
	
	adds_theme_supports();
	adds_new_image_sizes();
}


/**
 * Adds theme supports to the site
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_theme_supports() {

	$config = array(
	
		'html5' => array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ),
		'genesis-accessibility' => array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ),
		'genesis-responsive-viewport' => null,
		
		'custom-header' => array(
		'width'           => 600,
		'height'          => 160,
		'header-selector' => '.site-title a',
		'header-text'     => false,
		'flex-height'     => true,
		),
		'custom-background' => '',
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets' => 3,
		'genesis-menus' => array( 'primary' => __( 'After Header Menu', 'CHILD_TEXT_DOMAIN' ), 'secondary' => __( 'Footer Menu', 'CHILD_TEXT_DOMAIN' ) ),
	)

}
	
foreach( $config as $feature => $args ) {
	
	add_theme_support( $feature, $args);
	
}



/**
 * Adds theme supports to the site
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_new_image_sizes() {

	$config = array(
		'featured-image' => array(
			'width' => 720,
			'height' => 400,
			'crop' => true,
		),
	);
	
	foreach ( $config as $name => $args ) {
		
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;
		add_image_size( $name, $args['width'], $args['height'], true );
		
	}

}















add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\setting_theme_settings_defaults' );
/**
 * Se theme setttings defaults
 *
 * @since 1.0.0
 *
 * @return void
 */
function set_theme_settings_defaults( array $defaults ) {

	$config = get_theme_settings_defaults();
	$defaults = wp_parse_args( $config, $defaults );
	
	return $defaults;
	
}


add_action( 'after_switch_theme', __NAMESPACE__ . '\set_theme_setting_defaults' );
/**
 * This sets the theme settings defaults
 *
 * @since 1.0.0
 *
 * @return void
 */
 
function update_theme_settings_defaults(){

	$config = get_theme_settings_defaults();
	
	
	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( $config );
		
	} 

	update_option( 'posts_per_page', $config['blog_cat_num'] );

}





/**
 * Get Theme setting default
 *
 * @since 1.0.0
 *
 * @return void
 */

function get_theme_settings_defaults() {


	return array(
			'blog_cat_num'              => 6,	
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		);


}


