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

<main id="skip-to-content" <?php post_class(); ?>>
	<div class="container py-6">
        <h1>Pitchfork Docs Archive</h1>
		<?php the_archive_title( '<h2 class="page-title mb-6">', '</h2>' ); ?>
		<div class="row">
			<?php 
			if ( have_posts() ) {
				// Start the loop.
				while ( have_posts() ) {
					the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'templates-loop/content', 'card' );
				}
			} else {
				get_template_part( 'templates-loop/content', 'none' );
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<!-- The pagination component -->
			<?php uds_wp_pagination(); ?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();