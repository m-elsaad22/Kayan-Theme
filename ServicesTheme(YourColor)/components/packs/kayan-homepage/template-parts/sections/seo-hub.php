<?php
/** SEO hub */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$source = isset( $v['hub_source'] ) ? $v['hub_source'] : 'manual';
$cols   = array();
if ( $source === 'category' && ! empty( $v['hub_categories'] ) ) {
	foreach ( $v['hub_categories'] as $tid ) {
		$term = get_term_by( 'id', (int) $tid, 'category' );
		if ( ! $term || is_wp_error( $term ) ) {
			continue;
		}
		$cols[] = array(
			'icon'           => get_term_meta( $term->term_id, 'icon', true ) ?: 'fas fa-folder',
			'title'          => $term->name,
			'featured_label' => 'دليل ' . $term->name,
			'featured_url'   => get_term_link( $term ),
			'links'          => '',
		);
	}
} else {
	$cols = kayan_home_sorted_group( $v, 'hub_columns' );
}
?>
<section class="sec" id="hub">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'مركز المعرفة', 'دليل الخدمات <span>المنزلية</span>', 'محتوى متخصص يساعدك على فهم خدماتنا.' ); ?>
    <div class="hub-grid">
      <?php foreach ( $cols as $col ) :
        $links = ! empty( $col['links'] ) ? kayan_home_parse_link_lines( $col['links'] ) : array();
        ?>
      <div class="hub rv">
        <div class="hub-ic"><i class="<?php echo esc_attr( $col['icon'] ); ?>"></i></div>
        <h3><?php echo esc_html( $col['title'] ); ?></h3>
        <?php if ( ! empty( $col['featured_label'] ) ) : ?>
        <a class="feat-guide" href="<?php echo esc_url( ! empty( $col['featured_url'] ) ? $col['featured_url'] : '#blog' ); ?>"><i class="fas fa-star" style="color:var(--gold)"></i> <?php echo esc_html( $col['featured_label'] ); ?></a>
        <?php endif; ?>
        <?php if ( ! empty( $links ) ) : ?>
        <ul>
          <?php foreach ( $links as $lnk ) : ?>
          <li><a href="<?php echo esc_url( $lnk['url'] ); ?>"><i class="fas fa-chevron-left"></i> <?php echo esc_html( $lnk['title'] ); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
