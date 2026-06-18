<?php
/** CTA */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$trust = kayan_home_sorted_group( $v, 'cta_trust' );
?>
<section class="sec fcta" id="contact">
  <div class="wrap">
    <h2 class="rv"><?php echo esc_html( kayan_home_h( $v, 'cta_title', 'جاهزون لخدمتك في أي وقت — 24/7' ) ); ?></h2>
    <p class="rv"><?php echo esc_html( kayan_home_h( $v, 'cta_subtitle', '' ) ); ?></p>
    <div class="fcta-btns rv">
      <a href="<?php echo esc_url( kayan_home_h( $v, 'cta_wa_url', '#' ) ); ?>" class="btn btn-wa"><i class="fab fa-whatsapp"></i> تواصل عبر واتساب</a>
      <a href="<?php echo esc_attr( kayan_home_h( $v, 'cta_phone_url', '#' ) ); ?>" class="btn btn-call"><i class="fas fa-phone"></i> اتصل الآن</a>
      <a href="<?php echo esc_url( kayan_home_h( $v, 'cta_quote_url', '#' ) ); ?>" class="btn btn-quote"><i class="fas fa-file-invoice-dollar"></i> طلب عرض سعر</a>
    </div>
    <div class="fcta-trust rv">
      <?php foreach ( $trust as $t ) : ?><span><i class="<?php echo esc_attr( $t['icon'] ); ?>"></i> <?php echo esc_html( $t['title'] ); ?></span><?php endforeach; ?>
    </div>
  </div>
</section>
