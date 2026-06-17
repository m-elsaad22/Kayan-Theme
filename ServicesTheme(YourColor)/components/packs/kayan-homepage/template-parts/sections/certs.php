<?php
/** Certs */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$items = kayan_home_sorted_group( $v, 'cert_items' );
?>
<section class="sec" id="certs" style="background:var(--white)">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'الموثوقية', 'التراخيص والشهادات <span>والاعتمادات</span>', 'نعمل بشفافية كاملة وفق التراخيص المعتمدة.' ); ?>
    <div class="cert-grid">
      <?php foreach ( $items as $item ) : ?>
      <div class="cert rv">
        <div class="cert-ic">
          <?php if ( ! empty( $item['image'] ) ) : ?><img src="<?php echo esc_url( $item['image'] ); ?>" alt="" loading="lazy" /><?php elseif ( ! empty( $item['icon'] ) ) : ?><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i><?php endif; ?>
        </div>
        <h3><?php echo esc_html( $item['title'] ); ?></h3>
        <p><?php echo esc_html( $item['content'] ); ?></p>
        <?php if ( ! empty( $item['badge'] ) ) : ?><span class="vbadge"><i class="fas fa-circle-check"></i> <?php echo esc_html( $item['badge'] ); ?></span><?php endif; ?>
        <?php if ( ! empty( $item['doc_label'] ) ) : ?>
        <div class="doc"><?php if ( ! empty( $item['doc_url'] ) ) : ?><a href="<?php echo esc_url( $item['doc_url'] ); ?>"><?php endif; ?><i class="fas fa-file-pdf"></i> <?php echo esc_html( $item['doc_label'] ); ?><?php if ( ! empty( $item['doc_url'] ) ) : ?></a><?php endif; ?></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
