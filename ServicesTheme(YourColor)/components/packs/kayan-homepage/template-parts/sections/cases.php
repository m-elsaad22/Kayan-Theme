<?php
/** Case studies */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$source = isset( $v['cases_source'] ) ? $v['cases_source'] : 'manual';
$cases  = array();
if ( $source === 'works' && function_exists( 'kayan_home_get_works_posts' ) ) {
	foreach ( kayan_home_get_works_posts( $v ) as $post ) {
		$cases[] = array(
			'title'    => get_the_title( $post ),
			'subtitle' => get_post_meta( $post->ID, 'client__name', true ),
			'problem'  => wp_trim_words( $post->post_content, 25 ),
			'result'   => get_post_meta( $post->ID, 'services__type', true ),
			'url'      => get_permalink( $post ),
			'icon'     => 'fas fa-briefcase',
		);
	}
} else {
	$cases = kayan_home_sorted_group( $v, 'case_studies' );
}
?>
<section class="sec" id="cases">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'قصص النجاح', 'قصص نجاح حقيقية من <span>مشاريعنا</span>', 'تعرف على كيفية حل المشكلات وتحقيق نتائج مميزة.' ); ?>
    <div class="cs-grid">
      <?php foreach ( $cases as $cs ) :
        $style = ! empty( $cs['header_style'] ) ? ' style="' . esc_attr( $cs['header_style'] ) . '"' : '';
        $url   = ! empty( $cs['url'] ) ? $cs['url'] : '#contact';
        ?>
      <div class="cs rv">
        <div class="cs-top"<?php echo $style; ?>><i class="<?php echo esc_attr( isset( $cs['icon'] ) ? $cs['icon'] : 'fas fa-star' ); ?>"></i><div><b><?php echo esc_html( $cs['title'] ); ?></b><small><?php echo esc_html( isset( $cs['subtitle'] ) ? $cs['subtitle'] : '' ); ?></small></div></div>
        <div class="cs-body">
          <?php if ( ! empty( $cs['problem'] ) ) : ?><div class="cs-block"><div class="k"><i class="fas fa-triangle-exclamation"></i> المشكلة</div><p><?php echo esc_html( $cs['problem'] ); ?></p></div><?php endif; ?>
          <?php if ( ! empty( $cs['diagnosis'] ) ) : ?><div class="cs-block"><div class="k"><i class="fas fa-magnifying-glass"></i> التشخيص</div><p><?php echo esc_html( $cs['diagnosis'] ); ?></p></div><?php endif; ?>
          <?php if ( ! empty( $cs['solution'] ) ) : ?><div class="cs-block"><div class="k"><i class="fas fa-screwdriver-wrench"></i> الحل</div><p><?php echo esc_html( $cs['solution'] ); ?></p></div><?php endif; ?>
          <?php if ( ! empty( $cs['result'] ) ) : ?><div class="cs-result"><i class="fas fa-circle-check"></i> <?php echo esc_html( $cs['result'] ); ?></div><?php endif; ?>
          <div class="cs-meta">
            <?php if ( ! empty( $cs['location'] ) ) : ?><span><i class="fas fa-location-dot"></i> <?php echo esc_html( $cs['location'] ); ?></span><?php endif; ?>
            <?php if ( ! empty( $cs['service'] ) ) : ?><span><i class="fas fa-screwdriver-wrench"></i> <?php echo esc_html( $cs['service'] ); ?></span><?php endif; ?>
            <?php if ( ! empty( $cs['duration'] ) ) : ?><span><i class="fas fa-clock"></i> <?php echo esc_html( $cs['duration'] ); ?></span><?php endif; ?>
            <?php if ( ! empty( $cs['date'] ) ) : ?><span><i class="fas fa-calendar-check"></i> <?php echo esc_html( $cs['date'] ); ?></span><?php endif; ?>
          </div>
          <a href="<?php echo esc_url( $url ); ?>" class="btn btn-soft">عرض القصة كاملة</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
