<?php
/**
 * The template for displaying all single posts.
 *
 * @package theme1
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php 
                if (has_post_thumbnail()) {
                    echo '<div class="single-post-thumbnail clear">';
                    echo '<div class="image-shifter">';
                    echo the_post_thumbnail('large-thumb');
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            <div class="with-sidebar">
                <div class="padding">
			        <?php get_template_part( 'content', 'single' ); ?>
			    
            <div class="padding-nav">
    			<?php theme1_post_nav(); ?>

    			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
		    ?>
        </div>
        	</div><?php get_sidebar(); ?></div>		
            </article><!-- #post-## -->
        			
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
