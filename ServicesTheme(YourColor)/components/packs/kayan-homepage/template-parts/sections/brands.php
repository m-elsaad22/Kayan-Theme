<?php
/** Brands */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$brands = kayan_home_sorted_group( $v, 'brand_items' );
?>
<section class="sec brands">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'شركاؤنا', 'شركاؤنا في <span>التميز</span>', '' ); ?>
  </div>
  <div class="logo-cloud">
    <div class="logo-track">
      <?php foreach ( array_merge( $brands, $brands ) as $brand ) : ?>
      <span class="brand">
        <?php if ( ! empty( $brand['image'] ) ) : ?><img src="<?php echo esc_url( $brand['image'] ); ?>" alt="<?php echo esc_attr( $brand['title'] ); ?>" loading="lazy" /><?php elseif ( ! empty( $brand['icon'] ) ) : ?><i class="<?php echo esc_attr( $brand['icon'] ); ?>"></i><?php endif; ?>
        <?php echo esc_html( $brand['title'] ); ?>
      </span>
      <?php endforeach; ?>
    </div>
  </div>
</section>
