<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package regala
 */
?>

<section class="no-results not-found">

    <span class="genericon genericon-close"></span>
	
	    <h3 class="page-title"><?php _e( 'Nothing Found', 'regala' ); ?></h3>
		
		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

    		<?php elseif ( is_search() ) : ?>

    			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'regala' ); ?></p>
    			<?php get_search_form(); ?>

    		<?php else : ?>

    			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'regala' ); ?></p>
    			<?php get_search_form(); ?>

    		<?php endif; ?>
    	</div><!-- .page-content -->
    	
    </span>
</section><!-- .no-results -->
