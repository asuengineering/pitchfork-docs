<?php
/**
 * The template for displaying the archive page for Pitchfork Docs
 *
 * @package pitchfork-docs
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<main id="skip-to-content">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					$crumbs = array(
						'list_tag'    => 'ul',
						'item_tag'    => 'li',
						'list_class'  => 'breadcrumb',
						'item_class'  => 'breadcrumb-item',
						'title_class' => 'd-none',
					);
					Hybrid\Breadcrumbs\Trail::display( $crumbs );
					?>
				<?php the_archive_title( '<h3 class="page-title mb-6">Document Category: <span class="highlight-black">', '</span></h3>' ); ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col document-container">

				<?php
				if ( have_posts() ) {
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<header class="entry-header">

								<?php
								the_title(
									sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
									'</a></h3>'
								);
								?>

							</header><!-- .entry-header -->

							<div class="entry-content">

								<p class="lead"><?php the_excerpt(); ?></p>
								<p class="modified">
								<?php
								printf(
									__( 'Last updated: %1$s at  %2$s', 'pitchfork-docs' ),
									get_the_modified_date( 'F j, Y' ),
									get_the_modified_date( 'g:i a' )
								);
								?>
								</p>

							</div><!-- .entry-content -->

						</article><!-- #post-## -->

						<?php
					}
				} else {
					echo '<p class="lead">There are no documents available.</p>';
				}

				pitchfork_pagination();

				?>
			</div>

			<div id="category-sidebar" class="d-none d-lg-block col-md-4">
				<h4>All Document Categories</h4>

				<?php
				$doc_categories = get_terms(
					array(
						'taxonomy'   => 'pitchfork-docs-category',
						'hide_empty' => true,
						'orderby'    => 'menu_order',
					)
				);

				if ( ! empty( $doc_categories ) ) {
					?>
					<div class="sidebar-toggler" data-toggle="collapse" data-target="#doc-category-list" aria-expanded="false" aria-controls="doc-category-left">
						<p>Select Category</p>
						<span class="fas fa-chevron-up"></span>
					</div>
					<nav id="doc-category-list" class="sidebar collapse" aria-label="Select Category">

					<?php
					foreach ( $doc_categories as $doc_category ) {
						echo '<div class="nav-link-container">';

						if ( get_queried_object_id() === $doc_category->term_id ) {
							$isactive = ' is-active';
						} else {
							$isactive = '';
						}

						echo '<a class="nav-link' . wp_kses_post( $isactive ) . '" href="' . wp_kses_post( get_term_link( $doc_category ) ) . '">' . wp_kses_post( $doc_category->name ) . '</a>';
						echo '</div>';
					}
					echo '</nav>';
				}
				?>

			</div>


		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
