<?php
/**
 * @package theme1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    	<div class="entry-content">
    		<?php 
			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'theme1' ),
				'after'  => '</div>',
			) );
    		?>
    	</div><!-- .entry-content -->

    	<div class="entry-footer">
    		<?php regala_entry_footer(); ?>
    	</div><!-- .entry-footer -->

</article>