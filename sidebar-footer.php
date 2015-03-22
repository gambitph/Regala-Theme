<?php

/*
*   The footer sidebar
*/

if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-3' ) ) {
	return;
}

$activeSidebars = 0;
$activeSidebars += is_active_sidebar( 'footer-1' ) ? 1 : 0;
$activeSidebars += is_active_sidebar( 'footer-3' ) ? 1 : 0;
?>

<div class="footer-widgets active-footers-<?php echo $activeSidebars ?>">

<?php
if ( is_active_sidebar( 'footer-1' ) ) {
	?>
	<div id="footer-left" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div><?php
}
if ( is_active_sidebar( 'footer-3' ) ) {
	?><div id="footer-right" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer-3' ); ?>
	</div><!-- #footer-right -->
	<?php
}
?>

</div>