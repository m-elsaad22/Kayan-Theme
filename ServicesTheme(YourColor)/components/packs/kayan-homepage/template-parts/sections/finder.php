<?php
/** Finder */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
$services = function_exists( 'kayan_home_get_finder_services' ) ? kayan_home_get_finder_services( $v ) : array();
$cities   = function_exists( 'kayan_home_get_finder_cities' ) ? kayan_home_get_finder_cities( $v ) : array();
$wa       = kayan_home_h( $v, 'finder_wa_url', 'https://wa.me/971586634710' );
$btn      = kayan_home_h( $v, 'finder_btn_text', 'احصل على عرض سعر فوري' );
?>
<section class="sec finder-sec" id="finder">
  <div class="wrap">
    <?php kayan_home_render_shead( $v, 'ابدأ الآن', 'ما الخدمة التي <span>تحتاجها؟</span>', 'اختر الخدمة والإمارة واحصل على عرض سعر فوري.' ); ?>
    <div class="finder rv">
      <div class="finder-step">
        <label><span class="snum">1</span> اختر الخدمة</label>
        <div class="sel"><i class="fas fa-screwdriver-wrench"></i>
          <select id="fnSvc" aria-label="اختر الخدمة">
            <?php foreach ( $services as $svc ) : ?><option value="<?php echo esc_attr( $svc ); ?>"><?php echo esc_html( $svc ); ?></option><?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="finder-step">
        <label><span class="snum">2</span> اختر الإمارة</label>
        <div class="sel"><i class="fas fa-location-dot"></i>
          <select id="fnCity" aria-label="اختر الإمارة">
            <?php foreach ( $cities as $city ) : ?><option value="<?php echo esc_attr( $city ); ?>"><?php echo esc_html( $city ); ?></option><?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="finder-step finder-go">
        <button class="btn btn-quote" id="fnBtn" type="button"><i class="fas fa-bolt"></i> <?php echo esc_html( $btn ); ?></button>
      </div>
    </div>
    <div class="finder-result" id="fnResult" hidden>
      <div class="fr-lead"><b id="frTitle"></b><small id="frSub"></small></div>
      <div class="fr-stat"><i class="fas fa-clock"></i><b id="frTime"></b><small>وقت الاستجابة</small></div>
      <div class="fr-stat"><i class="fas fa-circle-check"></i><b class="fr-ok">متوفرة الآن</b><small>حالة الخدمة</small></div>
    </div>
    <div style="text-align:center;margin-top:18px" class="rv">
      <a href="<?php echo esc_url( $wa ); ?>" class="btn btn-wa"><i class="fab fa-whatsapp"></i> أكمل الطلب عبر واتساب</a>
    </div>
  </div>
</section>
