<?php
/** Section: Before / After — من مشاريع works */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$posts = function_exists( 'kayan_home_get_works_posts' ) ? kayan_home_get_works_posts( $v ) : array();
?>
<section class="sec" id="results" style="background:var(--white)">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'قبل وبعد', 'قبل وبعد — <span>نتائج حقيقية</span> لأعمالنا', 'اسحب المقبض لرؤية الفرق الذي يصنعه فريقنا.' ); ?>
    <div class="ba-wrap">
      <?php foreach ( $posts as $post ) :
        $pair = function_exists( 'kayan_home_works_ba_pair' ) ? kayan_home_works_ba_pair( $post->ID ) : array();
        if ( empty( $pair['before'] ) || empty( $pair['after'] ) ) {
          continue;
        }
        ?>
        <div class="ba rv">
          <div class="ba-stage" data-ba>
            <div class="ba-img ba-after" style="background-image:url(<?php echo esc_url( $pair['after'] ); ?>);background-size:cover;background-position:center"><span>بعد</span></div>
            <div class="ba-img ba-before" style="background-image:url(<?php echo esc_url( $pair['before'] ); ?>);background-size:cover;background-position:center"><span>قبل</span></div>
            <span class="ba-label b">قبل</span>
            <span class="ba-label a">بعد</span>
            <div class="ba-handle"><span class="grip"><i class="fas fa-arrows-left-right"></i></span></div>
          </div>
          <div class="ba-info">
            <div><b><?php echo esc_html( get_the_title( $post ) ); ?></b><br><small><?php echo esc_html( wp_trim_words( $post->post_content, 12 ) ); ?></small></div>
            <a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="btn btn-soft">شاهد التفاصيل</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
