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

	//* Add Image Sizes
	add_image_size( 'featured-image', 720, 400, TRUE );

}