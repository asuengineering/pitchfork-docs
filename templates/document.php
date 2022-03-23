<?php
/**
 * The template for displaying all single posts.
 *
 * This template includes an intrinsic Bootstrap container to make the process of
 * content creation easier for the post author. To escape from the original container
 * and layout other parts of the page, consider inserting a custom HTML block to deliver the closing <div>'s.
 *
 * @package pitchfork-blocks
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="skip-to-content">

	<?php

	while ( have_posts() ) {

		the_post();

		?>
		<div class="container document-container">
		<div class="row">
		<div class="col-md-9">

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<header class="entry-header">

					<?php
						$crumbs = array(
							'list_tag'      => 'ul',
							'item_tag'      => 'li',
							'list_class'    => 'breadcrumb',
							'item_class'    => 'breadcrumb-item',
							'title_class'   => 'd-none',
							'post_taxonomy' => array(
								'pitchfork-docs' => 'pitchfork-docs-category',
							),
						);
						Hybrid\Breadcrumbs\Trail::display( $crumbs );

						the_title( '<h1 class="article entry-title">', '</h1>' );
						echo '<p class="lead">' . wp_kses_post( get_the_excerpt() ) . '</p>';
						?>

				</header><!-- .entry-header -->

				<?php

				echo '<div class="entry-content">';

					the_content();

				echo '</div>';

				// Display the edit post button to logged in users.
				echo '<footer class="entry-footer">';
				edit_post_link( __( 'Edit', 'pitchfork-docs' ), '<span class="edit-link">', '</span>' );
				echo '</footer><!-- end .entry-footer -->';

				?>

			</article>
		</div><!-- end .col -->

		<aside class="col-md-3">
			<div class="toc-spacer"></div>
			<div class="toc-wrapper">
				<h3>Contents</h3>
				<div class="toc render-toc "></div>
			</div>
		</aside>

		</div><!-- end .row -->
		</div><!-- end .container -->
	<?php }  // End loop ?>

	</main><!-- #main -->

<?php
get_footer();
