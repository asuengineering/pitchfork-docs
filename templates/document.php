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

	<main id="skip-to-content" <?php post_class(); ?>>

        <h1>Steve still rules</h1>

		<?php

		while ( have_posts() ) {

			the_post();

			get_template_part( 'templates-global/global-banner' );

			the_content();

			// Display the edit post button to logged in users.
			echo '<footer class="entry-footer"><div class="container"><div class="row"><div class="col-md-12">';
			edit_post_link( __( 'Edit', 'uds-wordpress-theme' ), '<span class="edit-link">', '</span>' );
			echo '</div></div></div></footer><!-- end .entry-footer -->';
		}

		?>

	</main><!-- #main -->

<?php
get_footer();
