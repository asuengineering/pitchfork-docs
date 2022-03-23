<?php
/**
 * Paged build class.
 *
 * Builds out breadcrumbs based on whether we're currently viewing a "paged"
 * page. This handles archive-type pagination, single-post pagination via
 * `<!--nextpage-->`, and comments pagination.
 *
 * @package   HybridBreadcrumbs
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018, Justin Tadlock
 * @link      https://github.com/justintadlock/hybrid-breadcrumbs
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Breadcrumbs\Build;

/**
 * Paged build sub-class.
 *
 * @since  1.0.0
 * @access public
 */
class Paged extends Base {

	/**
	 * Post object.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    \WP_Post
	 */
	protected $post;

	/**
	 * Builds the breadcrumbs.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function make() {

		// If viewing a paged archive-type page.
		if ( is_paged() ) {

			$this->breadcrumbs->crumb( 'Paged' );

		// If viewing a paged singular post.
		} elseif ( is_singular() && 1 < get_query_var( 'page' ) ) {

			$this->breadcrumbs->crumb( 'PagedSingular' );

		// If viewing a singular post with paged comments.
		} elseif ( is_singular() && get_option( 'page_comments' ) && 1 < get_query_var( 'cpage' ) ) {

			$this->breadcrumbs->crumb( 'PagedComments' );
		}
	}
}
