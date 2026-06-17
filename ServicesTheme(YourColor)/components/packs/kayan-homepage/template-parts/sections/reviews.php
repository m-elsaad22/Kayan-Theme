<?php
/** Reviews */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$cards = kayan_home_sorted_group( $v, 'review_cards' );
$title = kayan_home_h( $v, 'section_title', 'آراء عملائنا — <span>تقييم 4.9 من 5</span>' );
?>
<section class="sec reviews">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'آراء العملاء', $title, 'تقييمات حقيقية موثقة من عملاء Google.' ); ?>
    <div class="rv-slider rv">
      <div class="rv-track" id="rvTrack">
        <?php foreach ( $cards as $card ) :
          $stars = isset( $card['stars'] ) ? (int) $card['stars'] : 5;
          $stars_str = str_repeat( '★', $stars ) . str_repeat( '☆', 5 - $stars );
          $initial = ! empty( $card['initial'] ) ? $card['initial'] : mb_substr( $card['title'], 0, 1 );
          ?>
        <div class="rcard">
          <div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars"><?php echo esc_html( $stars_str ); ?></span></div>
          <p class="txt">"<?php echo esc_html( $card['content'] ); ?>"</p>
          <div class="rclient"><span class="rav"><?php echo esc_html( $initial ); ?></span><div><b><?php echo esc_html( $card['title'] ); ?></b><small><?php echo esc_html( isset( $card['subtitle'] ) ? $card['subtitle'] : '' ); ?></small></div></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="rv-nav">
      <button type="button" onclick="rvMove(-1)" aria-label="السابق"><i class="fas fa-chevron-right"></i></button>
      <button type="button" onclick="rvMove(1)" aria-label="التالي"><i class="fas fa-chevron-left"></i></button>
    </div>
  </div>
</section>
