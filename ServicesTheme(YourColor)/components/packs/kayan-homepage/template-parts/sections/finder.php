<?php
/** Section: Smart Service Finder — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ Smart Service Finder ═══════════════ -->
<section class="sec finder-sec" id="finder">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">ابدأ الآن</span>
      <h2>ما الخدمة التي <span>تحتاجها؟</span></h2>
      <p>اختر الخدمة والإمارة واحصل على عرض سعر فوري مع تقدير لوقت الاستجابة وحالة التوفر.</p>
    </div>
    <div class="finder rv">
      <div class="finder-step">
        <label><span class="snum">1</span> اختر الخدمة</label>
        <div class="sel"><i class="fas fa-screwdriver-wrench"></i>
          <select id="fnSvc" aria-label="اختر الخدمة">
            <option value="كشف تسربات المياه">كشف تسربات المياه</option>
            <option value="عزل الأسطح">عزل الأسطح</option>
            <option value="عزل الخزانات">عزل الخزانات</option>
            <option value="تنظيف الخزانات">تنظيف الخزانات</option>
            <option value="مكافحة الحشرات">مكافحة الحشرات</option>
            <option value="صيانة عامة">صيانة عامة</option>
            <option value="سباكة">سباكة</option>
            <option value="كهرباء">كهرباء</option>
          </select>
        </div>
      </div>
      <div class="finder-step">
        <label><span class="snum">2</span> اختر الإمارة</label>
        <div class="sel"><i class="fas fa-location-dot"></i>
          <select id="fnCity" aria-label="اختر الإمارة">
            <option value="دبي">دبي</option>
            <option value="أبوظبي">أبوظبي</option>
            <option value="الشارقة">الشارقة</option>
            <option value="عجمان">عجمان</option>
            <option value="رأس الخيمة">رأس الخيمة</option>
            <option value="الفجيرة">الفجيرة</option>
            <option value="أم القيوين">أم القيوين</option>
          </select>
        </div>
      </div>
      <div class="finder-step finder-go">
        <button class="btn btn-quote" id="fnBtn"><i class="fas fa-bolt"></i> احصل على عرض سعر فوري</button>
      </div>
    </div>
    <div class="finder-result" id="fnResult" hidden>
      <div class="fr-lead">
        <b id="frTitle"></b>
        <small id="frSub"></small>
      </div>
      <div class="fr-stat"><i class="fas fa-clock"></i><b id="frTime"></b><small>وقت الاستجابة</small></div>
      <div class="fr-stat"><i class="fas fa-circle-check"></i><b class="fr-ok">متوفرة الآن</b><small>حالة الخدمة</small></div>
      <div class="fr-stat"><i class="fas fa-headset"></i><b class="fr-ok">مفعّل 24/7</b><small>دعم الطوارئ</small></div>
    </div>
    <div style="text-align:center;margin-top:18px" class="rv">
      <a href="https://wa.me/971586634710" class="btn btn-wa"><i class="fab fa-whatsapp"></i> أكمل الطلب عبر واتساب</a>
    </div>
  </div>
</section>
