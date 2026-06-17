<?php
/** Section: Projects — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ Projects ═══════════════ -->
<section class="sec" id="projects">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">أعمالنا</span>
      <h2>مشاريعنا <span>المنجزة</span></h2>
      <p>نماذج من مئات المشاريع التي نفذناها بنجاح في جميع الإمارات.</p>
    </div>
    <div class="filters rv">
      <button class="active" data-f="all">الكل</button>
      <button data-f="insul">عزل</button>
      <button data-f="leak">كشف تسربات</button>
      <button data-f="ac">صيانة</button>
      <button data-f="clean">تنظيف</button>
    </div>
    <div class="proj-grid">
      <div class="proj rv" data-cat="insul"><div class="proj-img" style="background:linear-gradient(135deg,var(--turq),var(--blue))"><i class="fas fa-layer-group"></i><span class="cat">عزل</span></div><div class="proj-body"><h3>عزل سطح فيلا</h3><div class="proj-meta"><span><i class="fas fa-location-dot"></i> دبي مارينا</span><span><i class="fas fa-clock"></i> 3 أيام</span></div><div class="proj-res"><i class="fas fa-circle-check"></i> خفض حرارة السطح بنسبة 40%</div></div></div>
      <div class="proj rv" data-cat="leak"><div class="proj-img" style="background:linear-gradient(135deg,var(--blue),var(--navy2))"><i class="fas fa-droplet"></i><span class="cat">كشف تسربات</span></div><div class="proj-body"><h3>كشف تسربات</h3><div class="proj-meta"><span><i class="fas fa-location-dot"></i> البرشاء</span><span><i class="fas fa-clock"></i> يوم واحد</span></div><div class="proj-res"><i class="fas fa-circle-check"></i> إصلاح بدون تكسير الجدران</div></div></div>
      <div class="proj rv" data-cat="ac"><div class="proj-img" style="background:linear-gradient(135deg,var(--aqua),var(--turq))"><i class="fas fa-snowflake"></i><span class="cat">صيانة</span></div><div class="proj-body"><h3>صيانة تكييف شامل</h3><div class="proj-meta"><span><i class="fas fa-location-dot"></i> الشارقة</span><span><i class="fas fa-clock"></i> يومان</span></div><div class="proj-res"><i class="fas fa-circle-check"></i> تحسين كفاءة التبريد</div></div></div>
      <div class="proj rv" data-cat="clean"><div class="proj-img" style="background:linear-gradient(135deg,var(--success),var(--turq))"><i class="fas fa-spray-can-sparkles"></i><span class="cat">تنظيف</span></div><div class="proj-body"><h3>تنظيف وتعقيم فيلا</h3><div class="proj-meta"><span><i class="fas fa-location-dot"></i> أبوظبي</span><span><i class="fas fa-clock"></i> يوم واحد</span></div><div class="proj-res"><i class="fas fa-circle-check"></i> تعقيم كامل بالبخار</div></div></div>
      <div class="proj rv" data-cat="insul"><div class="proj-img" style="background:linear-gradient(135deg,var(--gold),#ffce6b)"><i class="fas fa-water"></i><span class="cat">عزل</span></div><div class="proj-body"><h3>عزل خزانات</h3><div class="proj-meta"><span><i class="fas fa-location-dot"></i> عجمان</span><span><i class="fas fa-clock"></i> يومان</span></div><div class="proj-res"><i class="fas fa-circle-check"></i> مياه نظيفة وآمنة</div></div></div>
      <div class="proj rv" data-cat="clean"><div class="proj-img" style="background:linear-gradient(135deg,var(--navy2),var(--blue))"><i class="fas fa-bug-slash"></i><span class="cat">تنظيف</span></div><div class="proj-body"><h3>مكافحة حشرات</h3><div class="proj-meta"><span><i class="fas fa-location-dot"></i> رأس الخيمة</span><span><i class="fas fa-clock"></i> يوم واحد</span></div><div class="proj-res"><i class="fas fa-circle-check"></i> ضمان عدم العودة</div></div></div>
    </div>
  </div>
</section>
