<?php

/*
*   The footer sidebar
*/

if ( ! is_active_sidebar( 'main-menu' ) ) {
	return;
}
?>
	<?php dynamic_sidebar( 'main-menu' ); ?>