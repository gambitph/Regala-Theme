<?php
/**
 * @package theme1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    	<div class="entry-content">
    		<?php the_content(); ?>
    		<?php
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . __( 'Pages:', 'theme1' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->

    	<div class="entry-footer">
    	    <?php
                echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );
            ?>
    		<?php theme1_entry_footer(); ?>
    	</div><!-- .entry-footer -->
