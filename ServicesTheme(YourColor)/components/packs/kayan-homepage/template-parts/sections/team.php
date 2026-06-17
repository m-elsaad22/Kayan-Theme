<?php
/** Section: Team — من CPT team */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v     = isset( $vars ) && is_array( $vars ) ? $vars : array();
$posts = function_exists( 'kayan_home_get_posts_query' ) ? kayan_home_get_posts_query( $v, 'team', 5 ) : array();
?>
<section class="sec" id="team" style="background:var(--bg)">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'فريقنا', 'خبراؤنا في <span>خدمتكم</span>', 'فريق معتمد من المتخصصين بخبرة عملية طويلة في السوق الإماراتي.' ); ?>
    <div class="team-grid">
      <?php foreach ( $posts as $post ) :
        $thumb = function_exists( 'kayan_home_post_thumb_url' ) ? kayan_home_post_thumb_url( $post->ID, 'medium' ) : '';
        $role  = get_post_meta( $post->ID, 'team_role', true );
        $exp   = get_post_meta( $post->ID, 'team_experience', true );
        $b1    = get_post_meta( $post->ID, 'team_badge_1', true );
        $b2    = get_post_meta( $post->ID, 'team_badge_2', true );
        $initials = mb_substr( get_the_title( $post ), 0, 3 );
        ?>
        <div class="tcard rv">
          <div class="tav">
            <?php if ( $thumb ) : ?>
              <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $post ) ); ?>" loading="lazy" />
            <?php else : ?>
              <?php echo esc_html( $initials ); ?>
            <?php endif; ?>
          </div>
          <h3><?php echo esc_html( get_the_title( $post ) ); ?></h3>
          <?php if ( $role ) : ?><div class="role"><?php echo esc_html( $role ); ?></div><?php endif; ?>
          <p class="spec"><?php echo esc_html( wp_trim_words( $post->post_content, 15 ) ); ?></p>
          <div class="tbadges">
            <?php if ( $exp ) : ?><span class="tbadge"><i class="fas fa-award"></i> <?php echo esc_html( $exp ); ?></span><?php endif; ?>
            <?php if ( $b1 ) : ?><span class="tbadge"><i class="fas fa-circle-check"></i> <?php echo esc_html( $b1 ); ?></span><?php endif; ?>
            <?php if ( $b2 ) : ?><span class="tbadge"><i class="fas fa-certificate"></i> <?php echo esc_html( $b2 ); ?></span><?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
