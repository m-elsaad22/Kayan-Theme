<?php
/** Section: Blog — من مقالات post */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$posts = function_exists( 'kayan_home_get_posts_query' ) ? kayan_home_get_posts_query( $v, 'post', 3 ) : array();
?>
<section class="sec" id="blog" style="background:var(--white)">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'المدونة', 'مقالات ونصائح <span>مفيدة</span>', 'محتوى متخصص يساعدك على العناية بمنزلك واتخاذ القرار الصحيح.' ); ?>
    <div class="blog-grid">
      <?php foreach ( $posts as $post ) :
        $thumb = function_exists( 'kayan_home_post_thumb_url' ) ? kayan_home_post_thumb_url( $post->ID ) : '';
        $cats  = get_the_category( $post->ID );
        $cat   = ! empty( $cats ) ? $cats[0]->name : '';
        ?>
        <article class="post rv">
          <div class="post-img"<?php echo $thumb ? ' style="background-image:url(' . esc_url( $thumb ) . ');background-size:cover;background-position:center"' : ' style="background:linear-gradient(135deg,var(--blue),var(--navy2))"'; ?>>
            <?php if ( ! $thumb ) : ?><i class="fas fa-newspaper"></i><?php endif; ?>
          </div>
          <div class="post-body">
            <?php if ( $cat ) : ?><span class="post-cat"><?php echo esc_html( $cat ); ?></span><?php endif; ?>
            <span class="post-date"><?php echo esc_html( get_the_date( '', $post ) ); ?></span>
            <h3><?php echo esc_html( get_the_title( $post ) ); ?></h3>
            <p><?php echo esc_html( wp_trim_words( $post->post_excerpt ? $post->post_excerpt : $post->post_content, 20 ) ); ?></p>
            <a class="read" href="<?php echo esc_url( get_permalink( $post ) ); ?>">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
