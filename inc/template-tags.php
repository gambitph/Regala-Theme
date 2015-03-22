<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package regala
 */

if ( ! function_exists( 'regala_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
 function regala_paging_nav(){
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
 		'base' => $pagenum_link,
 		'format' => $format,
 		'total' => $GLOBALS['wp_query']->max_num_pages,
 		'current' => $paged,
 		'mid_size' => 2,
 		'add_args' => array_map( 'urlencode', $query_args ),
 		'prev_text' => __( 'Previous', 'regala' ),
 		'next_text' => __( 'Next', 'regala' ),
		'type' => 'list',
 	) );

 	if ( $links ) :

 	?>
 	<nav class="navigation paging-navigation" role="navigation">
 		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'regala' ); ?></h1>
 			<?php echo $links; ?>
 	</nav><!-- .navigation -->
 	<?php
 	endif;
 }
endif;



if ( ! function_exists( 'regala_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function regala_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
        <div class="post-nav-box clear">
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'regala' ); ?></h1>
            <div class="nav-links">
                <?php
				previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post', 'Previous post', 'regala' ) . '</div><h3>%link</h3></div>', '%title' );
                next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post', 'Next post', 'regala' ) . '</div><h3>%link</h3></div>', '%title' );
                ?>
            </div><!-- .nav-links -->
        </div><!-- .post-nav-box -->
    </nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'regala_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function regala_posted_on() {
	$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'regala' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	// $byline = sprintf(
	// 	_x( 'by %s', 'post author', 'regala' ),
	// 	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	// );

	// echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';
	echo $posted_on;

}
endif;


if ( ! function_exists( 'regala_entry_category' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function regala_entry_category() {
	// Hide category and tag text for pages.
	// if ( 'post' == get_post_type() ) {
		
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ', ' );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . __( '%1$s', 'regala' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		// $tags_list = get_the_tag_list( '', __( ', ', 'regala' ) );
		// if ( $tags_list ) {
		// 	printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'regala' ) . '</span>', $tags_list );
		// }
	// }
	//
	// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link">';
	// 	comments_popup_link( __( 'Leave a comment', 'regala' ), __( '1 Comment', 'regala' ), __( '% Comments', 'regala' ) );
	// 	echo '</span>';
	// }
	//
	// edit_post_link( __( 'Edit', 'regala' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'regala_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function regala_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		// $categories_list = get_the_category_list( __( ', ', 'regala' ) );
		// if ( $categories_list && regala_categorized_blog() ) {
		// 	printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'regala' ) . '</span>', $categories_list );
		// }

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' ', 'regala' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'regala' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'regala' ), __( '1 Comment', 'regala' ), __( '% Comments', 'regala' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'regala' ), '<span class="edit-link">', '</span>' );
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
		$title = sprintf( __( 'Category: %s', 'regala' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'regala' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'regala' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'regala' ), get_the_date( _x( 'Y', 'yearly archives date format', 'regala' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'regala' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'regala' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'regala' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'regala' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'regala' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'regala' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'regala' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'regala' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'regala' );
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
function regala_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'regala_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'regala_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so regala_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so regala_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in regala_categorized_blog.
 */
function regala_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'regala_categories' );
}
add_action( 'edit_category', 'regala_category_transient_flusher' );
add_action( 'save_post',     'regala_category_transient_flusher' );