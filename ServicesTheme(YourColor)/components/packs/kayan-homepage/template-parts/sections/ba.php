<?php
/** Section: Before / After — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ Before / After ═══════════════ -->
<section class="sec" id="results" style="background:var(--white)">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">قبل وبعد</span>
      <h2>قبل وبعد — <span>نتائج حقيقية</span> لأعمالنا</h2>
      <p>اسحب المقبض لرؤية الفرق الذي يصنعه فريقنا.</p>
    </div>
    <div class="ba-wrap">
      <div class="ba rv">
        <div class="ba-stage" data-ba>
          <div class="ba-img ba-after"><span><i class="fas fa-droplet"></i> بعد المعالجة</span></div>
          <div class="ba-img ba-before"><span><i class="fas fa-triangle-exclamation"></i> قبل المعالجة</span></div>
          <span class="ba-label b">قبل</span>
          <span class="ba-label a">بعد</span>
          <div class="ba-handle"><span class="grip"><i class="fas fa-arrows-left-right"></i></span></div>
        </div>
        <div class="ba-info">
          <div><b>كشف تسربات — دبي مارينا</b><br><small>تحديد دقيق وإصلاح بدون تكسير</small></div>
          <a href="#projects" class="btn btn-soft">شاهد التفاصيل</a>
        </div>
      </div>
      <div class="ba rv">
        <div class="ba-stage" data-ba>
          <div class="ba-img ba-after" style="background:linear-gradient(135deg,var(--gold),#ffce6b);color:#3a2600"><span><i class="fas fa-layer-group"></i> بعد العزل</span></div>
          <div class="ba-img ba-before"><span><i class="fas fa-sun"></i> قبل العزل</span></div>
          <span class="ba-label b">قبل</span>
          <span class="ba-label a">بعد</span>
          <div class="ba-handle"><span class="grip"><i class="fas fa-arrows-left-right"></i></span></div>
        </div>
        <div class="ba-info">
          <div><b>عزل فوم — البرشاء</b><br><small>عزل حراري ومائي بضمان 10 سنوات</small></div>
          <a href="#projects" class="btn btn-soft">شاهد التفاصيل</a>
        </div>
      </div>
    </div>
  </div>
</section>
