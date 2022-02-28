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

        <div class="container">
            <div class="row">
                <article <?php post_class('col'); ?>>

                    <h1>Steve still rules</h1>

                    <?php

                    while ( have_posts() ) {

                        the_post();

                        Hybrid\Breadcrumbs\Trail::display();

                        the_content();

                        // Display the edit post button to logged in users.
                        echo '<footer class="entry-footer"><div class="container"><div class="row"><div class="col-md-12">';
                        edit_post_link( __( 'Edit', 'uds-wordpress-theme' ), '<span class="edit-link">', '</span>' );
                        echo '</div></div></div></footer><!-- end .entry-footer -->';
                    }

                    ?>

                </article>

                <nav class="col-md-3">
                    <h3>This is where the TOC would live once the integration is complete.</h3>
                </nav>

            </div>
        </div>
            

	</main><!-- #main -->

<?php
get_footer();
