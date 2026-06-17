<?php
/** Section: Pricing — من CPT price */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$plans = function_exists( 'kayan_home_get_price_plans' ) ? kayan_home_get_price_plans( $v ) : array();
?>
<section class="sec" id="pricing">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'الأسعار', 'أدلة الأسعار <span>والتكاليف</span>', 'تقديرات شفافة تساعدك على معرفة التكلفة قبل اتخاذ القرار.' ); ?>
    <div class="price-grid">
      <?php foreach ( $plans as $row ) :
        if ( empty( $row['Plane__ID'] ) ) {
          continue;
        }
        $post = get_post( (int) $row['Plane__ID'] );
        if ( ! $post ) {
          continue;
        }
        $title = ! empty( $row['Title'] ) ? $row['Title'] : get_the_title( $post );
        $thumb = function_exists( 'kayan_home_post_thumb_url' ) ? kayan_home_post_thumb_url( $post->ID ) : '';
        $price_text = get_post_meta( $post->ID, 'price_text', true );
        if ( empty( $price_text ) ) {
          $price_text = wp_trim_words( strip_tags( $post->post_content ), 8 );
        }
        ?>
        <div class="pcard rv<?php echo ( ! empty( $row['ActivePlan'] ) && $row['ActivePlan'] === 'on' ) ? ' featured' : ''; ?>">
          <div class="pic">
            <?php if ( $thumb ) : ?>
              <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy" />
            <?php else : ?>
              <i class="fas fa-file-invoice-dollar"></i>
            <?php endif; ?>
          </div>
          <h3><?php echo esc_html( $title ); ?></h3>
          <p><?php echo esc_html( wp_trim_words( $post->post_excerpt ? $post->post_excerpt : $post->post_content, 16 ) ); ?></p>
          <?php if ( $price_text ) : ?>
          <div class="range"><b><?php echo esc_html( $price_text ); ?></b></div>
          <?php endif; ?>
          <a class="read" href="<?php echo esc_url( get_permalink( $post ) ); ?>">اقرأ الدليل <i class="fas fa-arrow-left"></i></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
