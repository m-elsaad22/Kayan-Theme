<?php
/** Section: Stats — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ Stats ═══════════════ -->
<section class="sec stats">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">أرقامنا</span>
      <h2>أرقام تتحدث عن جودتنا</h2>
      <p>ثقة الآلاف من العملاء في جميع أنحاء الإمارات.</p>
    </div>
    <div class="stats-grid">
      <div class="stat rv"><i class="fas fa-users"></i><div class="num" data-count="15000" data-suffix="+">0</div><div class="lbl">عميل راضٍ</div></div>
      <div class="stat rv"><i class="fas fa-briefcase"></i><div class="num" data-count="30000" data-suffix="+">0</div><div class="lbl">خدمة منجزة</div></div>
      <div class="stat rv"><i class="fas fa-award"></i><div class="num" data-count="12" data-suffix="+">0</div><div class="lbl">سنة خبرة</div></div>
      <div class="stat rv"><i class="fas fa-user-gear"></i><div class="num" data-count="50" data-suffix="+">0</div><div class="lbl">فني معتمد</div></div>
      <div class="stat rv"><i class="fas fa-face-smile"></i><div class="num" data-count="98" data-suffix="%">0</div><div class="lbl">رضا العملاء</div></div>
      <div class="stat rv"><i class="fas fa-headset"></i><div class="num">24/7</div><div class="lbl">دعم فوري</div></div>
    </div>
  </div>
</section>
