<?php
/**
 * Section: Hero — fields from widget admin override defaults.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$vars = isset( $vars ) && is_array( $vars ) ? $vars : array();
$h1       = kayan_home_h( $vars, 'section_title', 'ركن التطور — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في الإمارات' );
$sub      = kayan_home_h( $vars, 'section_subtitle', 'من عزل الأسطح وكشف التسربات إلى صيانة التكييف والتنظيف الاحترافي — فريق معتمد، أجهزة حديثة، وضمان مكتوب يصل إلى 10 سنوات.' );
$dash_ttl = kayan_home_h( $vars, 'dash_title', 'لوحة خدمات ركن التطور' );
$chips    = array();
if ( ! empty( $vars['items'] ) && is_array( $vars['items'] ) ) {
	$chips = $vars['items'];
}
if ( empty( $chips ) ) {
	$chips = array(
		array( 'icon' => 'fas fa-star star', 'title' => '4.9/5 (1,247+ تقييم Google)' ),
		array( 'icon' => 'fas fa-users', 'title' => '15,000+ عميل راضٍ' ),
		array( 'icon' => 'fas fa-award', 'title' => '12+ سنة خبرة' ),
		array( 'icon' => 'fas fa-shield-halved', 'title' => 'ضمان 10 سنوات مكتوب' ),
		array( 'icon' => 'fas fa-headset', 'title' => 'طوارئ 24/7' ),
		array( 'icon' => 'fas fa-map-location-dot', 'title' => 'جميع الإمارات' ),
	);
}
$wa  = 'https://wa.me/971586634710';
$tel = 'tel:+971586634710';
?>
<section class="hero" id="home">
  <div class="hero-grid-bg"></div>
  <div id="particles"></div>
  <div class="wrap">
    <div class="hero-copy">
      <h1><?php echo wp_kses_post( $h1 ); ?></h1>
      <p class="sub"><?php echo esc_html( $sub ); ?></p>
      <div class="hero-ctas">
        <a href="<?php echo esc_url( $wa ); ?>" class="btn btn-wa"><i class="fab fa-whatsapp"></i> تواصل عبر واتساب</a>
        <a href="<?php echo esc_attr( $tel ); ?>" class="btn btn-call"><i class="fas fa-phone"></i> اتصل الآن</a>
        <a href="#contact" class="btn btn-quote"><i class="fas fa-file-invoice-dollar"></i> طلب عرض سعر</a>
      </div>
      <div class="hero-proof">
        <?php foreach ( $chips as $chip ) :
			$icon = isset( $chip['icon'] ) ? $chip['icon'] : 'fas fa-circle-check';
			$text = isset( $chip['title'] ) ? $chip['title'] : '';
			if ( $text === '' ) {
				continue;
			}
			?>
        <span class="chip"><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $text ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="dash rv-l">
      <div class="dash-top">
        <span class="ttl"><i class="fas fa-chart-line" style="color:var(--aqua)"></i> <?php echo esc_html( $dash_ttl ); ?></span>
        <span class="live"><b></b> مباشر</span>
      </div>
      <div class="dash-mini">
        <div class="mini"><i class="fas fa-droplet"></i><span>كشف تسربات</span></div>
        <div class="mini"><i class="fas fa-layer-group"></i><span>عزل أسطح</span></div>
        <div class="mini"><i class="fas fa-snowflake"></i><span>صيانة تكييف</span></div>
        <div class="mini"><i class="fas fa-spray-can-sparkles"></i><span>تنظيف وتعقيم</span></div>
        <div class="mini"><i class="fas fa-wrench"></i><span>سباكة</span></div>
        <div class="mini"><i class="fas fa-bug-slash"></i><span>مكافحة حشرات</span></div>
      </div>
      <div class="dash-stats">
        <div class="dstat"><b data-count="15000" data-suffix="+">0</b><small>عميل</small></div>
        <div class="dstat"><b data-count="30000" data-suffix="+">0</b><small>خدمة</small></div>
        <div class="dstat"><b data-count="4.9" data-dec="1">0</b><small>تقييم</small></div>
      </div>
      <div class="warranty">
        <i class="fas fa-shield-halved"></i>
        <div><b>ضمان مكتوب يصل إلى 10 سنوات</b><small>على أعمال العزل المائي والحراري</small></div>
      </div>
      <div class="dash-trust">
        <span class="dt"><i class="fas fa-circle-check"></i> معتمد من بلدية دبي</span>
        <span class="dt"><i class="fas fa-circle-check"></i> فنيون معتمدون</span>
      </div>
    </div>
  </div>
</section>
