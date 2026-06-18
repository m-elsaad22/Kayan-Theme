<?php
/** Section: Areas — من تصنيف city */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$terms = function_exists( 'kayan_home_get_taxonomy_terms' ) ? kayan_home_get_taxonomy_terms( $v, 'city', 7 ) : array();
?>
<section class="sec" id="areas">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'مناطق الخدمة', 'خدماتنا في جميع <span>إمارات الدولة</span>', 'أينما كنت في الإمارات، فريق ركن التطور قريب منك وجاهز للخدمة.' ); ?>
    <div class="areas-grid">
      <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
        <?php foreach ( $terms as $term ) :
          $url  = get_term_link( $term );
          $img  = function_exists( 'kayan_home_term_image_url' ) ? kayan_home_term_image_url( $term->term_id, 'image_blog_id' ) : '';
          if ( empty( $img ) ) {
            $img = function_exists( 'kayan_home_term_image_url' ) ? kayan_home_term_image_url( $term->term_id, 'Image-Icon' ) : '';
          }
          $icon = get_term_meta( $term->term_id, 'icon', true );
          ?>
          <a href="<?php echo esc_url( $url ); ?>" class="area rv">
            <div class="area-img">
              <?php if ( $img ) : ?>
                <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" loading="lazy" />
              <?php elseif ( $icon ) : ?>
                <?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              <?php else : ?>
                <i class="fas fa-map-location-dot"></i>
              <?php endif; ?>
            </div>
            <h3><?php echo esc_html( $term->name ); ?></h3>
            <p><?php echo esc_html( wp_trim_words( $term->description, 12 ) ); ?></p>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
