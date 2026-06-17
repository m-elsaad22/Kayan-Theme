<?php
/**
 * Section: Hero
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$v        = isset( $vars ) && is_array( $vars ) ? $vars : array();
$h1       = kayan_home_h( $v, 'section_title', 'ركن التطور — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في الإمارات' );
$sub      = kayan_home_h( $v, 'section_subtitle', '' );
$dash_ttl = kayan_home_h( $v, 'dash_title', 'لوحة خدمات ركن التطور' );
$chips    = kayan_home_sorted_group( $v, 'hero_chips' );
$minis    = kayan_home_sorted_group( $v, 'dash_mini' );
$dstats   = kayan_home_sorted_group( $v, 'dash_stats' );
$dtrust   = kayan_home_sorted_group( $v, 'dash_trust' );
$wa       = kayan_home_h( $v, 'whatsapp_url', 'https://wa.me/971586634710' );
$tel      = kayan_home_h( $v, 'phone_url', 'tel:+971586634710' );
$quote    = kayan_home_h( $v, 'quote_anchor', '#contact' );
?>
<section class="hero" id="home">
  <div class="hero-grid-bg"></div>
  <div id="particles"></div>
  <div class="wrap">
    <div class="hero-copy">
      <h1><?php echo wp_kses_post( $h1 ); ?></h1>
      <?php if ( $sub ) : ?><p class="sub"><?php echo esc_html( $sub ); ?></p><?php endif; ?>
      <div class="hero-ctas">
        <a href="<?php echo esc_url( $wa ); ?>" class="btn btn-wa"><i class="fab fa-whatsapp"></i> تواصل عبر واتساب</a>
        <a href="<?php echo esc_attr( $tel ); ?>" class="btn btn-call"><i class="fas fa-phone"></i> اتصل الآن</a>
        <a href="<?php echo esc_attr( $quote ); ?>" class="btn btn-quote"><i class="fas fa-file-invoice-dollar"></i> طلب عرض سعر</a>
      </div>
      <div class="hero-proof">
        <?php foreach ( $chips as $chip ) :
          if ( empty( $chip['title'] ) ) { continue; }
          ?>
        <span class="chip"><i class="<?php echo esc_attr( $chip['icon'] ); ?>"></i> <?php echo esc_html( $chip['title'] ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="dash rv-l">
      <div class="dash-top">
        <span class="ttl"><i class="fas fa-chart-line" style="color:var(--aqua)"></i> <?php echo esc_html( $dash_ttl ); ?></span>
        <span class="live"><b></b> مباشر</span>
      </div>
      <div class="dash-mini">
        <?php foreach ( $minis as $m ) : ?><div class="mini"><i class="<?php echo esc_attr( $m['icon'] ); ?>"></i><span><?php echo esc_html( $m['title'] ); ?></span></div><?php endforeach; ?>
      </div>
      <div class="dash-stats">
        <?php foreach ( $dstats as $ds ) :
          $attr = kayan_home_render_counter_attr( $ds );
          $display = ( $attr !== '' ) ? '0' : esc_html( $ds['value'] );
          ?>
        <div class="dstat"><b<?php echo $attr; // phpcs:ignore ?>><?php echo $display; ?></b><small><?php echo esc_html( $ds['label'] ); ?></small></div>
        <?php endforeach; ?>
      </div>
      <?php if ( kayan_home_h( $v, 'warranty_title', '' ) ) : ?>
      <div class="warranty">
        <i class="fas fa-shield-halved"></i>
        <div><b><?php echo esc_html( kayan_home_h( $v, 'warranty_title', '' ) ); ?></b><small><?php echo esc_html( kayan_home_h( $v, 'warranty_sub', '' ) ); ?></small></div>
      </div>
      <?php endif; ?>
      <div class="dash-trust">
        <?php foreach ( $dtrust as $dt ) : ?><span class="dt"><i class="<?php echo esc_attr( $dt['icon'] ); ?>"></i> <?php echo esc_html( $dt['title'] ); ?></span><?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
