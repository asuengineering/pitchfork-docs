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
                        the_title( '<h1 class="article entry-title">', '</h1>' );
                        $crumbs = array(
                            'list_tag' => 'ul',
                            'item_tag' => 'li',
                            'list_class' => 'breadcrumb',
                            'item_class' => 'breadcrumb-item',
                            'title_class' => 'd-none'
                        );
                        Hybrid\Breadcrumbs\Trail::display($crumbs);
                    ?>

                </header><!-- .entry-header -->

                <?php 

                echo '<div class="entry-content">';

                    the_content(); 

                echo '</div>';

                // Display the edit post button to logged in users.
                echo '<footer class="entry-footer">';
                edit_post_link( __( 'Edit', 'uds-wordpress-theme' ), '<span class="edit-link">', '</span>' );
                echo '</footer><!-- end .entry-footer -->';

                ?>

            </article>
        </div><!-- end .col -->

        <aside class="col-md-3">
            <div class="toc-wrapper sticky-top" style="top:10rem;">
                <h3>This is where the TOC would live once the integration is complete.</h3>
                <div class="render-toc "></div>
            </div>
        </aside>

        </div><!-- end .row -->
        </div><!-- end .container -->
            
    <?php 
    }  // End loop
    ?>
    
	</main><!-- #main -->

<?php
get_footer();
