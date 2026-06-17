<?php
/** Trust bar */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$items = kayan_home_sorted_group( $v, 'trust_items' );
?>
<div class="wrap trustbar">
  <div class="inner rv">
    <?php foreach ( $items as $item ) : ?>
    <div class="tb"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i> <?php echo esc_html( $item['title'] ); ?></div>
    <?php endforeach; ?>
  </div>
</div>
