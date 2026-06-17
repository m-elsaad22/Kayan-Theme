<?php
/** Section: Why */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$steps = kayan_home_sorted_group( $v, 'timeline_steps' );
$cards = kayan_home_sorted_group( $v, 'feature_cards' );
?>
<section class="sec" id="why" style="background:var(--white)">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'لماذا نحن', 'لماذا يختار الآلاف <span>ركن التطور؟</span>', 'نجمع بين التقنية المتطورة والخبرة العميقة والضمان الحقيقي.' ); ?>
    <div class="why">
      <div class="why-time rv">
        <div class="inner">
          <h2><?php echo esc_html( kayan_home_h( $v, 'journey_title', 'رحلتك معنا بسيطة وواضحة' ) ); ?></h2>
          <p><?php echo esc_html( kayan_home_h( $v, 'journey_subtitle', '' ) ); ?></p>
          <div class="tline">
            <?php $i = 0; foreach ( $steps as $step ) : $i++; ?>
            <div class="tl"><span class="dot"><?php echo esc_html( ! empty( $step['number'] ) ? $step['number'] : $i ); ?></span><div><b><?php echo esc_html( $step['title'] ); ?></b><small><?php echo esc_html( $step['content'] ); ?></small></div></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="why-cards">
        <?php foreach ( $cards as $card ) : ?>
        <div class="feat rv"><div class="fic"><i class="<?php echo esc_attr( $card['icon'] ); ?>"></i></div><h3><?php echo esc_html( $card['title'] ); ?></h3><p><?php echo esc_html( $card['content'] ); ?></p></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
