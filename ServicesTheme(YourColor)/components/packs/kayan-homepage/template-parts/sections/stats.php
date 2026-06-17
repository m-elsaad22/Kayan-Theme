<?php
/** Section: Stats */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$items = kayan_home_sorted_group( $v, 'stat_items' );
?>
<section class="sec stats">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'أرقامنا', 'أرقام تتحدث عن جودتنا', 'ثقة الآلاف من العملاء في جميع أنحاء الإمارات.' ); ?>
    <div class="stats-grid">
      <?php foreach ( $items as $item ) :
        $attr = kayan_home_render_counter_attr( $item );
        $display = ( $attr !== '' ) ? '0' : esc_html( $item['value'] );
        ?>
      <div class="stat rv"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i><div class="num"<?php echo $attr; // phpcs:ignore ?>><?php echo $display; ?></div><div class="lbl"><?php echo esc_html( $item['label'] ); ?></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
