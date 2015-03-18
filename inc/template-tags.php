<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package theme1
 */

if ( ! function_exists( 'theme1_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
 function theme1_paging_nav(){
 	// Don't print empty markup if there's only one page.
 	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
 		return;
 	}

 	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
 	$pagenum_link = html_entity_decode( get_pagenum_link() );
 	$query_args   = array();
 	$url_parts    = explode( '?', $pagenum_link );

 	if ( isset( $url_parts[1] ) ) {
 		wp_parse_str( $url_parts[1], $query_args );
 	}

 	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
 	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

 	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
 	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

 	// Set up paginated links.
 	$links = paginate_links( array(
 		'base'     => $pagenum_link,
 		'format'   => $format,
 		'total'    => $GLOBALS['wp_query']->max_num_pages,
 		'current'  => $paged,
 		'mid_size' => 2,
 		'add_args' => array_map( 'urlencode', $query_args ),
 		'prev_text' => __( '← Previous', 'theme1' ),
 		'next_text' => __( 'Next →', 'my-simone' ),
         'type'      => 'list',
 	) );

 	if ( $links ) :

 	?>
 	<nav class="navigation paging-navigation" role="navigation">
 		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'theme1' ); ?></h1>
 			<?php echo $links; ?>
 	</nav><!-- .navigation -->
 	<?php
 	endif;
 }
endif;

if ( ! function_exists( 'theme1_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function theme1_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
        <div class="post-nav-box clear">
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'theme1' ); ?></h1>
            <div class="nav-links">
                <?php
                previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', 'theme1' ) . '</div><h1>%link</h1></div>', '%title' );
                next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post:', 'Next post', 'theme1' ) . '</div><h1>%link</h1></div>', '%title' );
                ?>
            </div><!-- .nav-links -->
        </div><!-- .post-nav-box -->
    </nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'theme1_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function theme1_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Written by %s', 'post date', 'theme1' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'theme1' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'theme1_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function theme1_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'theme1' ) );
		if ( $categories_list && theme1_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'theme1' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'theme1' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'theme1' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'theme1' ), __( '1 Comment', 'theme1' ), __( '% Comments', 'theme1' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'theme1' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'theme1' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'theme1' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'theme1' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'theme1' ), get_the_date( _x( 'Y', 'yearly archives date format', 'theme1' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'theme1' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'theme1' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'theme1' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'theme1' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'theme1' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'theme1' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'theme1' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'theme1' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'theme1' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function theme1_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'theme1_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'theme1_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so theme1_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so theme1_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in theme1_categorized_blog.
 */
function theme1_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'theme1_categories' );
}
add_action( 'edit_category', 'theme1_category_transient_flusher' );
add_action( 'save_post',     'theme1_category_transient_flusher' );