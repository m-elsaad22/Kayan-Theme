<?php
/** Section: Blog — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ Blog ═══════════════ -->
<section class="sec" id="blog" style="background:var(--white)">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">المدونة</span>
      <h2>مقالات ونصائح <span>مفيدة</span></h2>
      <p>محتوى متخصص يساعدك على العناية بمنزلك واتخاذ القرار الصحيح.</p>
    </div>
    <div class="blog-grid">
      <article class="post rv">
        <div class="post-img" style="background:linear-gradient(135deg,var(--blue),var(--navy2))"><i class="fas fa-droplet"></i></div>
        <div class="post-body">
          <span class="post-cat">كشف تسربات</span><span class="post-date">15 يونيو 2026</span>
          <h3>دليلك الشامل لكشف تسربات المياه في الإمارات</h3>
          <p>تعرّف على أحدث تقنيات الكشف بدون تكسير وكيفية اكتشاف التسرب مبكراً.</p>
          <a class="read" href="#blog">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
        </div>
      </article>
      <article class="post rv">
        <div class="post-img" style="background:linear-gradient(135deg,var(--turq),var(--aqua))"><i class="fas fa-layer-group"></i></div>
        <div class="post-body">
          <span class="post-cat">عزل</span><span class="post-date">10 يونيو 2026</span>
          <h3>أفضل أنواع عزل الأسطح لمناخ الإمارات الحار</h3>
          <p>مقارنة بين الفوم والأغشية البيتومينية لاختيار الأنسب لمنزلك.</p>
          <a class="read" href="#blog">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
        </div>
      </article>
      <article class="post rv">
        <div class="post-img" style="background:linear-gradient(135deg,var(--gold),#ffce6b);color:#3a2600"><i class="fas fa-snowflake"></i></div>
        <div class="post-body">
          <span class="post-cat">تكييف</span><span class="post-date">2 يونيو 2026</span>
          <h3>كيف تحافظ على تكييفك طوال فصل الصيف</h3>
          <p>نصائح عملية للصيانة الدورية تطيل عمر مكيفك وتوفر فاتورة الكهرباء.</p>
          <a class="read" href="#blog">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
        </div>
      </article>
    </div>
  </div>
</section>
