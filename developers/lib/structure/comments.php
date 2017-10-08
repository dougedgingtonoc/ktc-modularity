<?php
/**
 * Comments Structure handling
 *
 * @package     OnceCoupled\Developers
 * @since       1.0.0
 * @author      Doug OC
 * @link        https://www.oncecoupled.com/
 * @license     GNU General Public License 2.0+
 */
namespace OnceCoupled\Developers;



add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return mixed
 */
function setup_comments_gravatar( array $args ) {

	$args['avatar_size'] = 60;

	return $args;

}


