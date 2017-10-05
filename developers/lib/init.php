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
 * Initialize theme's constants
 *
 * @since 1.0.0
 *
 * @return void
 */
function initialize_contants() {

	$child_theme = wp_get_theme();

	//* Child theme (do not remove)
	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
	
} 

init_constants();