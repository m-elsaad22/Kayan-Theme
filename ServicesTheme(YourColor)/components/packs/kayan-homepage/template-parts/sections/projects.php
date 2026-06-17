<?php
/** Section: Projects — من CPT works */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v      = isset( $vars ) && is_array( $vars ) ? $vars : array();
$posts  = function_exists( 'kayan_home_get_works_posts' ) ? kayan_home_get_works_posts( $v ) : array();
$filters = function_exists( 'kayan_home_get_works_filter_terms' ) ? kayan_home_get_works_filter_terms( $v ) : array();
?>
<section class="sec" id="projects">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'أعمالنا', 'مشاريعنا <span>المنجزة</span>', 'نماذج من مئات المشاريع التي نفذناها بنجاح في جميع الإمارات.' ); ?>
    <?php if ( ! empty( $filters ) ) : ?>
    <div class="filters rv">
      <button class="active" data-f="all">الكل</button>
      <?php foreach ( $filters as $ft ) : ?>
        <button data-f="<?php echo esc_attr( sanitize_title( $ft->slug ) ); ?>"><?php echo esc_html( $ft->name ); ?></button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="proj-grid">
      <?php foreach ( $posts as $post ) :
        $thumb = function_exists( 'kayan_home_post_thumb_url' ) ? kayan_home_post_thumb_url( $post->ID ) : '';
        $cat_slug = function_exists( 'kayan_home_work_category_slug' ) ? kayan_home_work_category_slug( $post->ID ) : 'all';
        $cat_label = get_post_meta( $post->ID, 'services__type', true );
        $terms = get_the_terms( $post->ID, 'category' );
        if ( is_array( $terms ) && ! empty( $terms ) ) {
          $cat_label = $terms[0]->name;
        }
        $result = get_post_meta( $post->ID, 'client__name', true );
        ?>
        <div class="proj rv" data-cat="<?php echo esc_attr( $cat_slug ); ?>">
          <div class="proj-img"<?php echo $thumb ? ' style="background-image:url(' . esc_url( $thumb ) . ');background-size:cover;background-position:center"' : ''; ?>>
            <?php if ( ! $thumb ) : ?><i class="fas fa-layer-group"></i><?php endif; ?>
            <?php if ( $cat_label ) : ?><span class="cat"><?php echo esc_html( $cat_label ); ?></span><?php endif; ?>
          </div>
          <div class="proj-body">
            <h3><?php echo esc_html( get_the_title( $post ) ); ?></h3>
            <div class="proj-meta">
              <?php if ( $result ) : ?><span><i class="fas fa-user"></i> <?php echo esc_html( $result ); ?></span><?php endif; ?>
            </div>
            <div class="proj-res"><i class="fas fa-circle-check"></i> <?php echo esc_html( wp_trim_words( $post->post_content, 12 ) ); ?></div>
            <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="btn btn-soft">التفاصيل</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
