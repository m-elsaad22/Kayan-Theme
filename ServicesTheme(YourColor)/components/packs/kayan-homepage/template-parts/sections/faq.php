<?php
/** Section: FAQ */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$items = function_exists( 'kayan_home_get_faq_items' ) ? kayan_home_get_faq_items( $v ) : array();
?>
<section class="sec" id="faq">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'الأسئلة الشائعة', 'الأسئلة <span>الشائعة</span>', 'إجابات واضحة لأكثر ما يسأل عنه عملاؤنا.' ); ?>
    <div class="faq-wrap">
      <?php foreach ( $items as $item ) :
        if ( empty( $item['question'] ) ) {
          continue;
        }
        ?>
        <div class="faq-item rv">
          <div class="faq-q" onclick="faqT(this)">
            <span><?php echo esc_html( $item['question'] ); ?></span>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-a"><p><?php echo wp_kses_post( $item['answer'] ); ?></p></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
