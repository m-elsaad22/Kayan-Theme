<?php
/** Loader */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$title = kayan_home_h( $v, 'loader_title', 'ركن' );
$hi    = kayan_home_h( $v, 'loader_highlight', 'التطور' );
?>
<div id="loader">
  <div class="ld-logo"><?php echo esc_html( $title ); ?> <span><?php echo esc_html( $hi ); ?></span></div>
  <div class="ld-bar"><i></i></div>
</div>
