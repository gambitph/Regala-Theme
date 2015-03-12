<?php
/**
 * @package theme1
 */
?>


	    <header class="entry-header">
    		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    		<div class="entry-meta">
    		    <?php
                    /* translators: used between list items, there is a space after the comma */
                    $category_list = get_the_category_list( __( ', ', 'theme1' ) );

                    if ( theme1_categorized_blog() ) {
                        echo '<div class="category-list">' . $category_list . '</div>';
                    }
                ?>
        
    			<?php theme1_posted_on(); ?>
    			<?php 
                    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
                        echo '<span class="comments-link">';
                        comments_popup_link( __( 'Leave a comment', 'my-simone' ), __( '1 Comment', 'my-simone' ), __( '% Comments', 'my-simone' ) );
                        echo '</span>';
                    }
                ?>
    		</div><!-- .entry-meta -->
    	</header><!-- .entry-header -->
    
    	<div class="entry-content">
    		<?php the_content(); ?>
    		<?php
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . __( 'Pages:', 'theme1' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->

    	<footer class="entry-footer">
    	    <?php
                echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );
            ?>
    		<?php theme1_entry_footer(); ?>
    	</footer><!-- .entry-footer -->
