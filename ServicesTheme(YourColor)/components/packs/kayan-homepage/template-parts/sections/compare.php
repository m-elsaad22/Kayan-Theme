<?php
/** Section: Compare */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$rows = kayan_home_sorted_group( $v, 'compare_rows' );
$col_us = kayan_home_h( $v, 'compare_col_us', 'ركن التطور' );
$col_ot = kayan_home_h( $v, 'compare_col_other', 'شركات أخرى' );
?>
<section class="sec" id="compare" style="background:var(--white)">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'مقارنة', 'لماذا يختار العملاء <span>ركن التطور؟</span>', 'مقارنة واضحة بين خدماتنا والخدمات التقليدية.' ); ?>
    <div class="cmp rv">
      <div class="cmp-row cmp-head"><div class="ch">المعيار</div><div class="ch rk"><?php echo esc_html( $col_us ); ?></div><div class="ch"><?php echo esc_html( $col_ot ); ?></div></div>
      <?php foreach ( $rows as $row ) : ?>
      <div class="cmp-row">
        <div class="cc lbl"><?php echo esc_html( $row['label'] ); ?></div>
        <div class="cc val rk"><i class="fas fa-circle-<?php echo kayan_home_switch_on( isset( $row['us_has'] ) ? $row['us_has'] : '' ) ? 'check' : 'xmark'; ?>"></i></div>
        <div class="cc val ot"><i class="fas fa-circle-<?php echo kayan_home_switch_on( isset( $row['other_has'] ) ? $row['other_has'] : '' ) ? 'check' : 'xmark'; ?>"></i></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
