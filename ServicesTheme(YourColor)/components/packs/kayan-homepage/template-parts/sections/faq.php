<?php
/** Section: FAQ — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ FAQ ═══════════════ -->
<section class="sec" id="faq">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">الأسئلة الشائعة</span>
      <h2>الأسئلة <span>الشائعة</span></h2>
      <p>إجابات واضحة لأكثر ما يسأل عنه عملاؤنا.</p>
    </div>
    <div class="faq-wrap">
      <div class="faq-cats rv">
        <button class="active" data-fc="all">الكل</button>
        <button data-fc="leak">كشف التسربات</button>
        <button data-fc="insul">العزل</button>
        <button data-fc="maint">الصيانة</button>
      </div>
      <div class="faq-item rv" data-cat="leak"><div class="faq-q" onclick="faqT(this)"><span>ما تكلفة كشف تسربات المياه في الإمارات؟</span><i class="fas fa-chevron-down"></i></div><div class="faq-a"><p>نقدم معاينة مجانية وعرض سعر شفاف قبل البدء. تختلف التكلفة حسب نوع التسرب والمساحة والإمارة، مع أسعار تنافسية وبدون رسوم خفية.</p></div></div>
      <div class="faq-item rv" data-cat="leak"><div class="faq-q" onclick="faqT(this)"><span>هل كشف التسربات يحتاج تكسير الجدران؟</span><i class="fas fa-chevron-down"></i></div><div class="faq-a"><p>لا. نعتمد على الكاميرات الحرارية وأجهزة الكشف الصوتي لتحديد مكان التسرب بدقة بدون تكسير، ثم نصلح الموقع المحدد فقط.</p></div></div>
      <div class="faq-item rv" data-cat="maint"><div class="faq-q" onclick="faqT(this)"><span>هل تقدمون خدمة طوارئ على مدار الساعة؟</span><i class="fas fa-chevron-down"></i></div><div class="faq-a"><p>نعم، فريقنا متاح 24/7 في جميع أيام الأسبوع، ونصل إليك خلال ساعة في حالات الطوارئ داخل المدن الرئيسية.</p></div></div>
      <div class="faq-item rv" data-cat="insul"><div class="faq-q" onclick="faqT(this)"><span>ما هو الضمان على أعمال العزل؟</span><i class="fas fa-chevron-down"></i></div><div class="faq-a"><p>نقدم ضماناً مكتوباً وموثقاً يصل إلى 10 سنوات على أعمال العزل المائي والحراري.</p></div></div>
      <div class="faq-item rv" data-cat="maint"><div class="faq-q" onclick="faqT(this)"><span>هل تعملون في جميع إمارات الدولة؟</span><i class="fas fa-chevron-down"></i></div><div class="faq-a"><p>نعم، نغطي جميع إمارات الدولة السبع: دبي، أبوظبي، الشارقة، عجمان، رأس الخيمة، الفجيرة، وأم القيوين.</p></div></div>
      <div class="faq-item rv" data-cat="insul"><div class="faq-q" onclick="faqT(this)"><span>كم يستغرق تنفيذ عزل السطح؟</span><i class="fas fa-chevron-down"></i></div><div class="faq-a"><p>يعتمد على مساحة السطح ونوع العزل، لكن غالبية المشاريع السكنية تُنجز خلال يوم إلى ثلاثة أيام عمل.</p></div></div>
    </div>
  </div>
</section>
