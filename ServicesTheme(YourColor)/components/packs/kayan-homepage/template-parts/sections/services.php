<?php
/** Section: Services — من تصنيفات category */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$terms = function_exists( 'kayan_home_get_taxonomy_terms' ) ? kayan_home_get_taxonomy_terms( $v, 'category', 6 ) : array();
$btn   = kayan_home_h( $v, 'but_text', 'طلب الخدمة' );
?>
<section class="sec" id="services">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'خدماتنا', 'خدماتنا المنزلية <span>المتكاملة</span>', 'حلول احترافية شاملة تغطي كل احتياجات منزلك أو منشأتك بأعلى معايير الجودة والضمان.' ); ?>
    <div class="services-grid">
      <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
        <?php foreach ( $terms as $term ) :
          $url   = get_term_link( $term );
          $img   = function_exists( 'kayan_home_term_image_url' ) ? kayan_home_term_image_url( $term->term_id ) : '';
          $icon  = get_term_meta( $term->term_id, 'icon', true );
          ?>
          <div class="svc rv">
            <div class="svc-ic">
              <?php if ( $img ) : ?>
                <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" loading="lazy" />
              <?php elseif ( $icon ) : ?>
                <?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              <?php else : ?>
                <i class="fas fa-broom"></i>
              <?php endif; ?>
            </div>
            <h3><?php echo esc_html( $term->name ); ?></h3>
            <p class="desc"><?php echo esc_html( wp_trim_words( $term->description, 18 ) ); ?></p>
            <a href="<?php echo esc_url( $url ); ?>" class="svc-cta"><?php echo esc_html( $btn ); ?> <i class="fas fa-arrow-left"></i></a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
