<?php
/** ATB counters */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$items = kayan_home_sorted_group( $v, 'counter_items' );
?>
<div class="wrap atb-wrap">
  <div class="atb rv">
    <?php foreach ( $items as $item ) :
      $attr = kayan_home_render_counter_attr( $item );
      $display = ( $attr !== '' ) ? '0' : esc_html( $item['value'] );
      ?>
    <div class="atb-item"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i><div><b<?php echo $attr; // phpcs:ignore ?>><?php echo $display; ?></b><small><?php echo esc_html( $item['label'] ); ?></small></div></div>
    <?php endforeach; ?>
  </div>
</div>
