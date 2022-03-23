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
						'list_tag' => 'ul',
						'item_tag' => 'li',
						'list_class' => 'breadcrumb',
						'item_class' => 'breadcrumb-item',
						'title_class' => 'd-none',
					);
					Hybrid\Breadcrumbs\Trail::display($crumbs);
				?>
				<?php the_archive_title( '<h3 class="page-title mb-6"><span class="highlight-black"> All ', '</span></h3>' ); ?>

			</div>
		</div>
	</div>
	
	<div class="container document-container">
	
		<?php 
		
		// Gather data for all document categories, loop for individual document links.
		$doc_categories = get_terms( 
			array(
				'taxonomy' => 'pitchfork-docs-category',
				// 'taxonomy' => 'post_tag',
				'hide_empty' => true,
			)
		);

		if ( count($doc_categories) > 1) {

			// As long as there are at least two document categories, use the grouped card layout.
			// If there are zero or one categories assigned, just use cards.
			echo '<div class="row row-cols-1 row-cols-md-3">';

			foreach ($doc_categories as $doc_category) {

				// Get total number of posts per category
				$doc_total = $doc_category->count;

				$args = array(
					'post_type' => 'pitchfork-docs',
					'posts_per_page' => 5,
					'orderby' => 'menu_order',
					'tax_query' => array(
						array(
							'taxonomy' => 'pitchfork-docs-category',
							'field'    => 'slug',
							'terms'    => $doc_category->slug,
						),
					),
				);
				$documents = new WP_Query($args);

				// Loop through the current query, building an array of all mentor IDs
				if (!empty( $documents->posts )){
					echo '<div class="col">';
					echo '<div class="document-card card">';
					echo '<h3 class="category">' . $doc_category->name . '</h3>';
					echo '<p class="description">' . $doc_category->description .  '</p>';
					

					echo '<ul class="doclist">';

					foreach ($documents->posts as $document){
						// do_action('qm/debug', $document);
						echo '<li><a href="' . $document->guid . '" title="' . $document->post_title . '">' . $document->post_title . '</a></li>';
					}

					echo '</ul>';
					echo '<p class="count"><a class="btn btn-md btn-gray" href="' . get_term_link($doc_category) . '">View all ' . $doc_total . ' documents</a></p>';
					echo '</div><!-- end .card -->';
					echo '</div><!-- end .col -->';
				}
			}

		} else {

			// No categories? OK, skip the special query above and just use the normal query.
			// Loop through the individual documents and display as uds-cards.

			if ( have_posts() ) {
				// Start the loop.
				?>
				<div class="row">

				<?php
				while ( have_posts() ) {
					the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'templates-loop/content', 'card' );
				}
				?>
				</div><!-- end .row -->
				<div class="row">
					<div class="col">
						<!-- The pagination component -->
						<?php uds_wp_pagination(); ?>
					</div>
				</div>
				<?php 
			} else {
				?>
				<p class="lead">There are no documents available.</p>
				<?php
			}
		}
		
		?>

	</div>
</main><!-- #main -->

<?php
get_footer();