<?php

/*
*   The footer sidebar
*/

if ( ! is_active_sidebar( 'main-menu' ) ) {
	return;
}
?>
<div class='menu-widgets'>
	<?php dynamic_sidebar( 'main-menu' ); ?>
</div>