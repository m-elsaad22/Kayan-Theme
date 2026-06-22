<!-- ═══════════════ Loader ═══════════════ -->
<div id="loader">
  <div class="ld-logo">{{brand_first}} <span>{{brand_second}}</span></div>
  <div class="ld-bar"><i></i></div>
</div>

<!-- ═══════════════ Header ═══════════════ -->
<!-- kayan-section:header -->
<header id="hdr">
  <div class="wrap nav">
    {{header_logo_html}}
    <nav class="menu">
      {{header_nav_html}}
    </nav>
    <div class="nav-cta">
      {{locale_switcher_html}}
      <a href="{{whatsapp_url}}" class="btn btn-wa"><i class="fab fa-whatsapp"></i> {{ui_btn_whatsapp}}</a>
      <button class="ham" onclick="toggleMob(true)" aria-label="القائمة"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
<!-- /kayan-section -->

<!-- Mobile menu -->
<div class="mob" id="mob">
  <button class="mob-close" onclick="toggleMob(false)" aria-label="إغلاق"><i class="fas fa-xmark"></i></button>
  {{header_mobile_nav_html}}
</div>

<!-- ═══════════════ Hero ═══════════════ -->
<!-- kayan-section:hero -->
<section class="hero" id="home">
  <div class="hero-grid-bg"></div>
  <div id="particles"></div>
  <div class="wrap">
    <div class="hero-copy">
      <h1>{{hero_title_html}}</h1>
      <p class="sub">{{hero_subtitle}}</p>
      <div class="hero-ctas">
        <a href="{{whatsapp_url}}" class="btn btn-wa"><i class="fab fa-whatsapp"></i> {{ui_btn_whatsapp_full}}</a>
        <a href="{{tel_url}}" class="btn btn-call"><i class="fas fa-phone"></i> {{ui_btn_call}}</a>
        <a href="#contact" class="btn btn-quote"><i class="fas fa-file-invoice-dollar"></i> {{ui_btn_quote}}</a>
      </div>
      <div class="hero-proof">
        <span class="chip"><i class="fas fa-star star"></i> 4.9/5 (1,247+ تقييم Google)</span>
        <span class="chip"><i class="fas fa-users"></i> 15,000+ عميل راضٍ</span>
        <span class="chip"><i class="fas fa-award"></i> 12+ سنة خبرة</span>
        <span class="chip"><i class="fas fa-shield-halved"></i> ضمان 10 سنوات مكتوب</span>
        <span class="chip"><i class="fas fa-headset"></i> طوارئ 24/7</span>
        <span class="chip"><i class="fas fa-map-location-dot"></i> {{all_regions}}</span>
      </div>
    </div>

    <!-- Interactive dashboard -->
    <div class="dash rv-l">
      <div class="dash-top">
        <span class="ttl"><i class="fas fa-chart-line" style="color:var(--aqua)"></i> {{dashboard_title}}</span>
        <span class="live"><b></b> مباشر</span>
      </div>
      <div class="dash-mini">
        <div class="mini"><i class="fas fa-droplet"></i><span>كشف تسربات</span></div>
        <div class="mini"><i class="fas fa-layer-group"></i><span>عزل أسطح</span></div>
        <div class="mini"><i class="fas fa-snowflake"></i><span>صيانة تكييف</span></div>
        <div class="mini"><i class="fas fa-spray-can-sparkles"></i><span>تنظيف وتعقيم</span></div>
        <div class="mini"><i class="fas fa-wrench"></i><span>سباكة</span></div>
        <div class="mini"><i class="fas fa-bug-slash"></i><span>مكافحة حشرات</span></div>
      </div>
      <div class="dash-stats">
        <div class="dstat"><b data-count="15000" data-suffix="+">0</b><small>عميل</small></div>
        <div class="dstat"><b data-count="30000" data-suffix="+">0</b><small>خدمة</small></div>
        <div class="dstat"><b data-count="4.9" data-dec="1">0</b><small>تقييم</small></div>
      </div>
      <div class="warranty">
        <i class="fas fa-shield-halved"></i>
        <div><b>ضمان مكتوب يصل إلى 10 سنوات</b><small>على أعمال العزل المائي والحراري</small></div>
      </div>
      <div class="dash-trust">
        <span class="dt"><i class="fas fa-circle-check"></i> معتمد من بلدية دبي</span>
        <span class="dt"><i class="fas fa-circle-check"></i> فنيون معتمدون</span>
      </div>
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Trust bar ═══════════════ -->
<!-- kayan-section:trust -->
<div class="wrap trustbar">
  <div class="inner rv">
    <div class="tb"><i class="fas fa-shield-halved"></i> ضمان مكتوب حتى 10 سنوات</div>
    <div class="tb"><i class="fas fa-clock"></i> خدمة طوارئ 24 ساعة</div>
    <div class="tb"><i class="fas fa-map-location-dot"></i> {{all_regions}}</div>
    <div class="tb"><i class="fas fa-user-shield"></i> فنيون معتمدون ومرخصون</div>
    <div class="tb"><i class="fas fa-microchip"></i> أحدث الأجهزة والتقنيات</div>
    <div class="tb"><i class="fas fa-bolt"></i> استجابة خلال ساعة واحدة</div>
  </div>
</div>
<!-- /kayan-section -->

<!-- ═══════════════ Advanced Trust Bar (animated counters) ═══════════════ -->
<div class="wrap atb-wrap">
  <div class="atb rv">
    <div class="atb-item"><i class="fas fa-briefcase"></i><div><b data-count="30000" data-suffix="+">0</b><small>خدمة منجزة</small></div></div>
    <div class="atb-item"><i class="fas fa-users"></i><div><b data-count="15000" data-suffix="+">0</b><small>عميل سعيد</small></div></div>
    <div class="atb-item"><i class="fas fa-star"></i><div><b data-count="4.9" data-dec="1">0</b><small>تقييم Google</small></div></div>
    <div class="atb-item"><i class="fas fa-award"></i><div><b data-count="12" data-suffix="+">0</b><small>سنة خبرة</small></div></div>
    <div class="atb-item"><i class="fas fa-map-location-dot"></i><div><b>كل الإمارات</b><small>تغطية شاملة</small></div></div>
    <div class="atb-item"><i class="fas fa-headset"></i><div><b>24/7</b><small>دعم الطوارئ</small></div></div>
  </div>
</div>

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
      <a href="{{whatsapp_url}}" class="btn btn-wa"><i class="fab fa-whatsapp"></i> {{ui_btn_whatsapp_full}}</a>
    </div>
  </div>
</section>

<!-- ═══════════════ Services ═══════════════ -->
<!-- kayan-section:services -->
<section class="sec" id="services">
  <div class="wrap">
    {{services_head_html}}
    <div class="services-grid">
      {{services_grid_html}}
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Why choose us ═══════════════ -->
<!-- kayan-section:why -->
<section class="sec" id="why" style="background:var(--white)">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">لماذا نحن</span>
      <h2>{{why_heading_html}}</h2>
      <p>نجمع بين التقنية المتطورة والخبرة العميقة والضمان الحقيقي لنمنحك راحة بال كاملة.</p>
    </div>
    <div class="why">
      <div class="why-time rv">
        <div class="inner">
          <h2>رحلتك معنا بسيطة وواضحة</h2>
          <p>من أول اتصال إلى تسليم العمل بضمان مكتوب.</p>
          <div class="tline">
            <div class="tl"><span class="dot">1</span><div><b>تواصل ومعاينة مجانية</b><small>نصل إليك ونعاين الموقع بدون أي رسوم.</small></div></div>
            <div class="tl"><span class="dot">2</span><div><b>عرض سعر شفاف</b><small>تكلفة واضحة بدون رسوم خفية.</small></div></div>
            <div class="tl"><span class="dot">3</span><div><b>تنفيذ احترافي</b><small>فريق معتمد بأحدث الأجهزة.</small></div></div>
            <div class="tl"><span class="dot">4</span><div><b>ضمان مكتوب ومتابعة</b><small>ضمان موثق ودعم مستمر بعد الخدمة.</small></div></div>
          </div>
        </div>
      </div>
      <div class="why-cards">
        <div class="feat rv"><div class="fic"><i class="fas fa-microchip"></i></div><h3>تقنية متطورة</h3><p>أجهزة الكشف الحراري والصوتي الأحدث في السوق.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-user-shield"></i></div><h3>فريق معتمد</h3><p>جميع فنيينا حاصلون على شهادات اعتماد دولية.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-bolt"></i></div><h3>استجابة سريعة</h3><p>نصل إليك خلال ساعة في حالات الطوارئ.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-file-contract"></i></div><h3>ضمان حقيقي</h3><p>ضمان مكتوب وموثّق لجميع الأعمال.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-tags"></i></div><h3>أسعار تنافسية</h3><p>أفضل جودة بأفضل سعر وبدون رسوم خفية.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-map-location-dot"></i></div><h3>تغطية شاملة</h3><p>جميع إمارات الدولة السبع بلا استثناء.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-award"></i></div><h3>خبرة 12 عاماً</h3><p>سجل حافل في السوق الإماراتي.</p></div>
        <div class="feat rv"><div class="fic"><i class="fas fa-headset"></i></div><h3>دعم مستمر</h3><p>خدمة عملاء على مدار الساعة 24/7.</p></div>
      </div>
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Expert Team ═══════════════ -->
<!-- kayan-section:team -->
<section class="sec" id="team" style="background:var(--bg)">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">فريقنا</span>
      <h2>خبراؤنا في <span>خدمتكم</span></h2>
      <p>فريق معتمد من المتخصصين بخبرة عملية طويلة في السوق الإماراتي.</p>
    </div>
    <div class="team-grid">
      <div class="tcard rv">
        <div class="tav">أ.م</div>
        <h3>أحمد المنصوري</h3>
        <div class="role">مدير العمليات</div>
        <p class="spec">قيادة الفرق وضمان جودة التنفيذ في كل المشاريع.</p>
        <div class="tbadges"><span class="tbadge"><i class="fas fa-award"></i> 15+ سنة</span><span class="tbadge"><i class="fas fa-circle-check"></i> خبير معتمد</span></div>
      </div>
      <div class="tcard rv">
        <div class="tav">س.ع</div>
        <h3>سعيد العامري</h3>
        <div class="role">خبير كشف التسربات</div>
        <p class="spec">كشف دقيق بالكاميرا الحرارية بدون أي تكسير.</p>
        <div class="tbadges"><span class="tbadge"><i class="fas fa-award"></i> 12+ سنة</span><span class="tbadge"><i class="fas fa-certificate"></i> شهادة معتمدة</span></div>
      </div>
      <div class="tcard rv">
        <div class="tav">خ.ب</div>
        <h3>خالد البلوشي</h3>
        <div class="role">مشرف العزل</div>
        <p class="spec">عزل حراري ومائي بأحدث المواد العالمية.</p>
        <div class="tbadges"><span class="tbadge"><i class="fas fa-award"></i> 10+ سنوات</span><span class="tbadge"><i class="fas fa-circle-check"></i> خبير معتمد</span></div>
      </div>
      <div class="tcard rv">
        <div class="tav">م.ش</div>
        <h3>محمد الشحي</h3>
        <div class="role">مشرف الصيانة</div>
        <p class="spec">صيانة شاملة للتكييف والسباكة والكهرباء.</p>
        <div class="tbadges"><span class="tbadge"><i class="fas fa-award"></i> 11+ سنة</span><span class="tbadge"><i class="fas fa-certificate"></i> شهادة معتمدة</span></div>
      </div>
      <div class="tcard rv">
        <div class="tav">ع.ك</div>
        <h3>عبدالله الكعبي</h3>
        <div class="role">خبير الخزانات</div>
        <p class="spec">عزل وتنظيف الخزانات بمعايير صحية آمنة.</p>
        <div class="tbadges"><span class="tbadge"><i class="fas fa-award"></i> 9+ سنوات</span><span class="tbadge"><i class="fas fa-circle-check"></i> خبير معتمد</span></div>
      </div>
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Stats ═══════════════ -->
<!-- kayan-section:stats -->
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
<!-- /kayan-section -->

<!-- ═══════════════ Service Comparison ═══════════════ -->
<!-- kayan-section:compare -->
<section class="sec" id="compare" style="background:var(--white)">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">مقارنة</span>
      <h2>{{compare_heading_html}}</h2>
      <p>مقارنة واضحة بين خدماتنا والخدمات التقليدية.</p>
    </div>
    <div class="cmp rv">
      <div class="cmp-row cmp-head">
        <div class="ch">المعيار</div>
        <div class="ch rk">{{company_name}}</div>
        <div class="ch">شركات أخرى</div>
      </div>
      <div class="cmp-row"><div class="cc lbl">ضمان مكتوب</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">كشف بدون تكسير</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">دعم 24/7</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">فنيون معتمدون</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">أجهزة متطورة</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">استجابة سريعة</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">تغطية جميع الإمارات</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">أسعار شفافة</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">دعم ما بعد الخدمة</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
      <div class="cmp-row"><div class="cc lbl">خدمة الطوارئ</div><div class="cc val rk"><i class="fas fa-circle-check"></i></div><div class="cc val ot"><i class="fas fa-circle-xmark"></i></div></div>
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Service areas ═══════════════ -->
<!-- kayan-section:areas -->
<section class="sec" id="areas">
  <div class="wrap">
    {{areas_head_html}}
    <div class="areas">
      <div class="area-map rv-l">
        <div><h3>{{all_regions}}</h3><p>{{areas_intro}}</p></div>
        <div class="mp">
          <svg class="uae-svg" viewBox="0 0 300 220" aria-hidden="true">
            <path d="M40,70 L90,40 L150,30 L210,45 L260,55 L270,90 L250,130 L235,175 L180,195 L120,185 L70,160 L45,120 Z"/>
          </svg>
        </div>
      </div>
      <div class="area-cards">
        {{area_cards_html}}
      </div>
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Before / After ═══════════════ -->
<!-- kayan-section:ba -->
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
<!-- /kayan-section -->

<!-- ═══════════════ Case Studies / Success Stories ═══════════════ -->
<section class="sec" id="cases">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">قصص النجاح</span>
      <h2>قصص نجاح حقيقية من <span>مشاريعنا</span></h2>
      <p>تعرف على كيفية حل المشكلات المعقدة وتحقيق نتائج مميزة لعملائنا في مختلف إمارات الإمارات.</p>
    </div>
    <div class="cs-grid">
      <div class="cs rv">
        <div class="cs-top"><i class="fas fa-droplet"></i><div><b>تسرب مياه خفي</b><small>فيلا — دبي مارينا</small></div></div>
        <div class="cs-body">
          <div class="cs-block"><div class="k"><i class="fas fa-triangle-exclamation"></i> المشكلة</div><p>تسرب مياه مستمر تسبب في رطوبة وتلف الجدران دون مصدر ظاهر.</p></div>
          <div class="cs-block"><div class="k"><i class="fas fa-magnifying-glass"></i> التشخيص</div><p>فحص بالكاميرا الحرارية وأجهزة الكشف الصوتي لتحديد موقع التسرب بدقة.</p></div>
          <div class="cs-block"><div class="k"><i class="fas fa-screwdriver-wrench"></i> الحل</div><p>إصلاح الموقع المحدد فقط بدون تكسير وإعادة العزل الموضعي.</p></div>
          <div class="cs-result"><i class="fas fa-circle-check"></i> حل التسرب بنسبة 100%</div>
          <div class="cs-meta"><span><i class="fas fa-location-dot"></i> دبي مارينا</span><span><i class="fas fa-screwdriver-wrench"></i> كشف تسربات</span><span><i class="fas fa-clock"></i> يوم واحد</span><span><i class="fas fa-calendar-check"></i> مايو 2026</span></div>
          <a href="#contact" class="btn btn-soft">عرض القصة كاملة</a>
        </div>
      </div>
      <div class="cs rv">
        <div class="cs-top" style="background:linear-gradient(135deg,var(--gold),#d98b15)"><i class="fas fa-layer-group"></i><div><b>فشل عزل السطح</b><small>فيلا — البرشاء</small></div></div>
        <div class="cs-body">
          <div class="cs-block"><div class="k"><i class="fas fa-triangle-exclamation"></i> المشكلة</div><p>ارتفاع حرارة المنزل وفواتير كهرباء مرتفعة بسبب عزل قديم متضرر.</p></div>
          <div class="cs-block"><div class="k"><i class="fas fa-magnifying-glass"></i> التشخيص</div><p>قياس انتقال الحرارة على السطح وكشف نقاط ضعف العزل القديم.</p></div>
          <div class="cs-block"><div class="k"><i class="fas fa-screwdriver-wrench"></i> الحل</div><p>تركيب عزل فوم بولي يوريثان وطلاء عاكس للحرارة بضمان 10 سنوات.</p></div>
          <div class="cs-result"><i class="fas fa-circle-check"></i> خفض انتقال الحرارة 40%</div>
          <div class="cs-meta"><span><i class="fas fa-location-dot"></i> البرشاء</span><span><i class="fas fa-screwdriver-wrench"></i> عزل أسطح</span><span><i class="fas fa-clock"></i> 3 أيام</span><span><i class="fas fa-calendar-check"></i> أبريل 2026</span></div>
          <a href="#contact" class="btn btn-soft">عرض القصة كاملة</a>
        </div>
      </div>
      <div class="cs rv">
        <div class="cs-top" style="background:linear-gradient(135deg,var(--turq),var(--aqua))"><i class="fas fa-water"></i><div><b>تلوث خزان المياه</b><small>مبنى — الشارقة</small></div></div>
        <div class="cs-body">
          <div class="cs-block"><div class="k"><i class="fas fa-triangle-exclamation"></i> المشكلة</div><p>تغير لون المياه وروائح بسبب ترسبات وتلوث داخل الخزان.</p></div>
          <div class="cs-block"><div class="k"><i class="fas fa-magnifying-glass"></i> التشخيص</div><p>فحص داخلي للخزان وتحديد مصادر الترسبات والتسرب الجانبي.</p></div>
          <div class="cs-block"><div class="k"><i class="fas fa-screwdriver-wrench"></i> الحل</div><p>تنظيف وتعقيم كامل وإعادة عزل الخزان بمواد صحية معتمدة.</p></div>
          <div class="cs-result"><i class="fas fa-circle-check"></i> تقليل فقد المياه وتحسين الجودة</div>
          <div class="cs-meta"><span><i class="fas fa-location-dot"></i> الشارقة</span><span><i class="fas fa-screwdriver-wrench"></i> خزانات</span><span><i class="fas fa-clock"></i> يومان</span><span><i class="fas fa-calendar-check"></i> مارس 2026</span></div>
          <a href="#contact" class="btn btn-soft">عرض القصة كاملة</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════ Projects ═══════════════ -->
<!-- kayan-section:projects -->
<section class="sec" id="projects">
  <div class="wrap">
    {{projects_head_html}}
    <div class="proj-grid">
      {{projects_grid_html}}
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Certifications & Licenses ═══════════════ -->
<section class="sec" id="certs" style="background:var(--white)">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">الموثوقية</span>
      <h2>التراخيص والشهادات <span>والاعتمادات</span></h2>
      <p>نعمل بشفافية كاملة وفق التراخيص والمعايير المعتمدة في دولة الإمارات.</p>
    </div>
    <div class="cert-grid">
      <div class="cert rv"><div class="cert-ic"><i class="fas fa-file-signature"></i></div><h3>رخصة تجارية</h3><p>رخصة سارية لمزاولة نشاط الخدمات المنزلية.</p><span class="vbadge"><i class="fas fa-circle-check"></i> موثّق</span><div class="doc"><i class="fas fa-file-pdf"></i> مستند الرخصة</div></div>
      <div class="cert rv"><div class="cert-ic"><i class="fas fa-building-columns"></i></div><h3>سجل تجاري</h3><p>سجل تجاري معتمد لدى الجهات الرسمية.</p><span class="vbadge"><i class="fas fa-circle-check"></i> موثّق</span><div class="doc"><i class="fas fa-file-pdf"></i> مستند السجل</div></div>
      <div class="cert rv"><div class="cert-ic"><i class="fas fa-receipt"></i></div><h3>تسجيل ضريبي</h3><p>رقم تسجيل ضريبي (VAT) رسمي وفواتير نظامية.</p><span class="vbadge"><i class="fas fa-circle-check"></i> موثّق</span><div class="doc"><i class="fas fa-file-pdf"></i> شهادة الضريبة</div></div>
      <div class="cert rv"><div class="cert-ic"><i class="fas fa-medal"></i></div><h3>شهادة جودة</h3><p>التزام بمعايير الجودة في جميع مراحل العمل.</p><span class="vbadge"><i class="fas fa-circle-check"></i> معتمد</span><div class="doc"><i class="fas fa-file-pdf"></i> شهادة الجودة</div></div>
      <div class="cert rv"><div class="cert-ic"><i class="fas fa-helmet-safety"></i></div><h3>شهادة السلامة</h3><p>اعتماد إجراءات السلامة المهنية للفرق.</p><span class="vbadge"><i class="fas fa-circle-check"></i> معتمد</span><div class="doc"><i class="fas fa-file-pdf"></i> شهادة السلامة</div></div>
      <div class="cert rv"><div class="cert-ic"><i class="fas fa-shield-halved"></i></div><h3>برنامج الضمان</h3><p>ضمان مكتوب وموثق يصل إلى 10 سنوات.</p><span class="vbadge"><i class="fas fa-circle-check"></i> مضمون</span><div class="doc"><i class="fas fa-file-pdf"></i> وثيقة الضمان</div></div>
    </div>
  </div>
</section>

<!-- ═══════════════ Pricing Guides Hub ═══════════════ -->
<section class="sec" id="pricing">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">الأسعار</span>
      <h2>أدلة الأسعار <span>والتكاليف</span></h2>
      <p>تقديرات شفافة تساعدك على معرفة التكلفة قبل اتخاذ القرار.</p>
    </div>
    <div class="price-grid">
      <div class="pcard rv"><div class="pic"><i class="fas fa-droplet"></i></div><h3>تكلفة كشف التسربات</h3><p>كشف دقيق بدون تكسير مع تقرير مصور.</p><div class="range"><b>250 – 800</b><small>درهم تقريباً</small></div><a class="read" href="#contact">اقرأ الدليل <i class="fas fa-arrow-left"></i></a></div>
      <div class="pcard rv"><div class="pic"><i class="fas fa-layer-group"></i></div><h3>تكلفة عزل الأسطح</h3><p>حسب المساحة ونوع العزل المستخدم.</p><div class="range"><b>15 – 35</b><small>درهم / قدم²</small></div><a class="read" href="#contact">اقرأ الدليل <i class="fas fa-arrow-left"></i></a></div>
      <div class="pcard rv"><div class="pic"><i class="fas fa-water"></i></div><h3>تكلفة عزل الخزانات</h3><p>عزل صحي آمن يطيل عمر الخزان.</p><div class="range"><b>400 – 1200</b><small>درهم تقريباً</small></div><a class="read" href="#contact">اقرأ الدليل <i class="fas fa-arrow-left"></i></a></div>
      <div class="pcard rv"><div class="pic"><i class="fas fa-spray-can-sparkles"></i></div><h3>تكلفة تنظيف الخزانات</h3><p>تنظيف وتعقيم كامل بمواد معتمدة.</p><div class="range"><b>150 – 500</b><small>درهم تقريباً</small></div><a class="read" href="#contact">اقرأ الدليل <i class="fas fa-arrow-left"></i></a></div>
      <div class="pcard rv"><div class="pic"><i class="fas fa-bug-slash"></i></div><h3>تكلفة مكافحة الحشرات</h3><p>مواد آمنة مع ضمان عدم العودة.</p><div class="range"><b>120 – 450</b><small>درهم تقريباً</small></div><a class="read" href="#contact">اقرأ الدليل <i class="fas fa-arrow-left"></i></a></div>
      <div class="pcard rv"><div class="pic"><i class="fas fa-house-chimney"></i></div><h3>تكلفة الصيانة المنزلية</h3><p>صيانة شاملة للتكييف والسباكة والكهرباء.</p><div class="range"><b>100 – 600</b><small>درهم تقريباً</small></div><a class="read" href="#contact">اقرأ الدليل <i class="fas fa-arrow-left"></i></a></div>
    </div>
  </div>
</section>

<!-- ═══════════════ Reviews ═══════════════ -->
<!-- kayan-section:reviews -->
<section class="sec reviews">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">آراء العملاء</span>
      <h2>آراء عملائنا — <span>تقييم 4.9 من 5</span></h2>
      <p>تقييمات حقيقية موثقة من عملاء Google.</p>
    </div>
    <div class="rv-slider rv">
      <div class="rv-track" id="rvTrack">
        <div class="rcard"><div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars">★★★★★</span></div><p class="txt">"خدمة ممتازة جداً! الفريق جاء في الموعد تماماً وحدّد مكان التسرب بدقة بدون أي تكسير. احترافية عالية وأسعار عادلة."</p><div class="rclient"><span class="rav">م</span><div><b>محمد الشمري</b><small>دبي مارينا</small></div></div></div>
        <div class="rcard"><div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars">★★★★★</span></div><p class="txt">"عزلنا السطح معهم منذ 3 سنوات ولم نواجه أي مشكلة حتى الآن رغم حرارة الصيف. ضمان حقيقي وعمل متقن."</p><div class="rclient"><span class="rav">س</span><div><b>سارة البلوشي</b><small>البرشاء</small></div></div></div>
        <div class="rcard"><div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars">★★★★★</span></div><p class="txt">"اتصلت بهم مساءً بسبب تسرب طارئ ووصلوا خلال أقل من ساعة. سرعة استجابة مذهلة وخدمة 24 ساعة فعلاً."</p><div class="rclient"><span class="rav">ع</span><div><b>عبدالله الكعبي</b><small>جميرا</small></div></div></div>
        <div class="rcard"><div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars">★★★★★</span></div><p class="txt">"صيانة التكييف كانت دقيقة جداً وأصبح المنزل أبرد بكثير. فريق مؤدب ونظيف في عمله. أنصح بهم بشدة."</p><div class="rclient"><span class="rav">ف</span><div><b>فاطمة المنصوري</b><small>أبوظبي</small></div></div></div>
        <div class="rcard"><div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars">★★★★★</span></div><p class="txt">"أفضل شركة تعاملت معها للتنظيف والتعقيم. النتيجة فاقت التوقعات والمواد آمنة على الأطفال."</p><div class="rclient"><span class="rav">خ</span><div><b>خالد النعيمي</b><small>الشارقة</small></div></div></div>
        <div class="rcard"><div class="gtop"><span class="gver"><i class="fab fa-google"></i> موثّق عبر Google</span><span class="rstars">★★★★★</span></div><p class="txt">"تعامل راقٍ من أول مكالمة. عرض السعر كان شفافاً بدون أي مفاجآت، والعمل سُلّم في الوقت المحدد."</p><div class="rclient"><span class="rav">ر</span><div><b>ريم الحمادي</b><small>عجمان</small></div></div></div>
      </div>
    </div>
    <div class="rv-nav">
      <button onclick="rvMove(-1)" aria-label="السابق"><i class="fas fa-chevron-right"></i></button>
      <button onclick="rvMove(1)" aria-label="التالي"><i class="fas fa-chevron-left"></i></button>
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- ═══════════════ Brands ═══════════════ -->
<section class="sec brands">
  <div class="wrap">
    <div class="shead rv" style="margin-bottom:40px">
      <span class="tag">شركاؤنا</span>
      <h2>شركاؤنا في <span>التميز</span></h2>
    </div>
  </div>
  <div class="logo-cloud">
    <div class="logo-track">
      <span class="brand"><i class="fas fa-cube"></i> Sika</span>
      <span class="brand"><i class="fas fa-cube"></i> Fosroc</span>
      <span class="brand"><i class="fas fa-cube"></i> Jotun</span>
      <span class="brand"><i class="fas fa-cube"></i> Mapei</span>
      <span class="brand"><i class="fas fa-cube"></i> National Paints</span>
      <span class="brand"><i class="fas fa-cube"></i> Weber</span>
      <span class="brand"><i class="fas fa-cube"></i> Sika</span>
      <span class="brand"><i class="fas fa-cube"></i> Fosroc</span>
      <span class="brand"><i class="fas fa-cube"></i> Jotun</span>
      <span class="brand"><i class="fas fa-cube"></i> Mapei</span>
      <span class="brand"><i class="fas fa-cube"></i> National Paints</span>
      <span class="brand"><i class="fas fa-cube"></i> Weber</span>
    </div>
  </div>
</section>

<!-- ═══════════════ SEO Content Hub ═══════════════ -->
<section class="sec" id="hub">
  <div class="wrap">
    <div class="shead rv">
      <span class="tag">مركز المعرفة</span>
      <h2>دليل الخدمات <span>المنزلية</span></h2>
      <p>محتوى متخصص ومنظم يساعدك على فهم خدماتنا واتخاذ القرار الصحيح.</p>
    </div>
    <div class="hub-grid">
      <div class="hub rv">
        <div class="hub-ic"><i class="fas fa-droplet"></i></div>
        <h3>كشف التسربات</h3>
        <a class="feat-guide" href="#blog"><i class="fas fa-star" style="color:var(--gold)"></i> الدليل الشامل لكشف التسربات</a>
        <ul>
          <li><a href="#blog"><i class="fas fa-chevron-left"></i> علامات تسرب المياه المبكرة</a></li>
          <li><a href="#blog"><i class="fas fa-chevron-left"></i> الكشف بدون تكسير</a></li>
          <li><a href="#pricing"><i class="fas fa-chevron-left"></i> تكلفة كشف التسربات</a></li>
        </ul>
      </div>
      <div class="hub rv">
        <div class="hub-ic"><i class="fas fa-layer-group"></i></div>
        <h3>العزل</h3>
        <a class="feat-guide" href="#blog"><i class="fas fa-star" style="color:var(--gold)"></i> أنواع عزل الأسطح</a>
        <ul>
          <li><a href="#blog"><i class="fas fa-chevron-left"></i> عزل الفوم مقابل البيتومين</a></li>
          <li><a href="#services"><i class="fas fa-chevron-left"></i> العزل الحراري والمائي</a></li>
          <li><a href="#pricing"><i class="fas fa-chevron-left"></i> تكلفة عزل الأسطح</a></li>
        </ul>
      </div>
      <div class="hub rv">
        <div class="hub-ic"><i class="fas fa-water"></i></div>
        <h3>الخزانات</h3>
        <a class="feat-guide" href="#blog"><i class="fas fa-star" style="color:var(--gold)"></i> العناية بخزانات المياه</a>
        <ul>
          <li><a href="#blog"><i class="fas fa-chevron-left"></i> أهمية تنظيف الخزانات</a></li>
          <li><a href="#services"><i class="fas fa-chevron-left"></i> عزل الخزانات الصحي</a></li>
          <li><a href="#pricing"><i class="fas fa-chevron-left"></i> تكلفة تنظيف الخزانات</a></li>
        </ul>
      </div>
      <div class="hub rv">
        <div class="hub-ic"><i class="fas fa-snowflake"></i></div>
        <h3>الصيانة</h3>
        <a class="feat-guide" href="#blog"><i class="fas fa-star" style="color:var(--gold)"></i> صيانة التكييف الموسمية</a>
        <ul>
          <li><a href="#blog"><i class="fas fa-chevron-left"></i> صيانة المكيف في الصيف</a></li>
          <li><a href="#services"><i class="fas fa-chevron-left"></i> السباكة والكهرباء</a></li>
          <li><a href="#pricing"><i class="fas fa-chevron-left"></i> تكلفة الصيانة المنزلية</a></li>
        </ul>
      </div>
      <div class="hub rv">
        <div class="hub-ic"><i class="fas fa-bug-slash"></i></div>
        <h3>مكافحة الحشرات</h3>
        <a class="feat-guide" href="#blog"><i class="fas fa-star" style="color:var(--gold)"></i> دليل مكافحة الحشرات الآمنة</a>
        <ul>
          <li><a href="#blog"><i class="fas fa-chevron-left"></i> مواد آمنة للأطفال</a></li>
          <li><a href="#services"><i class="fas fa-chevron-left"></i> ضمان عدم العودة</a></li>
          <li><a href="#pricing"><i class="fas fa-chevron-left"></i> تكلفة مكافحة الحشرات</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- kayan-section:blog -->
<section class="sec" id="blog" style="background:var(--white)">
  <div class="wrap">
    {{blog_head_html}}
    <div class="blog-grid">
      {{blog_posts_html}}
    </div>
  </div>
</section>
<!-- /kayan-section -->

<!-- kayan-section:faq -->
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
<!-- /kayan-section:faq -->

<!-- kayan-section:cta -->
<section class="sec fcta" id="contact">
  <div class="wrap">
    <h2 class="rv">جاهزون لخدمتك في أي وقت — 24/7</h2>
    <p class="rv">تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر شفاف.</p>
    <div class="fcta-btns rv">
      <a href="{{whatsapp_url}}" class="btn btn-wa"><i class="fab fa-whatsapp"></i> {{ui_btn_whatsapp_full}}</a>
      <a href="{{tel_url}}" class="btn btn-call"><i class="fas fa-phone"></i> {{ui_btn_call}}</a>
      <a href="{{whatsapp_url}}" class="btn btn-quote"><i class="fas fa-file-invoice-dollar"></i> {{ui_btn_quote}}</a>
    </div>
    <div class="fcta-trust rv">
      <span><i class="fas fa-shield-halved"></i> ضمان 10 سنوات</span>
      <span><i class="fas fa-magnifying-glass"></i> معاينة مجانية</span>
      <span><i class="fas fa-headset"></i> خدمة طوارئ</span>
    </div>
  </div>
</section>
<!-- /kayan-section:cta -->

<!-- ═══════════════ Footer ═══════════════ -->
<!-- kayan-section:footer -->
{{footer_html}}
<!-- /kayan-section -->

<!-- ═══════════════ Mobile sticky bar + FAB ═══════════════ -->
<nav class="mbar">
  <a href="{{whatsapp_url}}" class="m-wa"><i class="fab fa-whatsapp"></i> {{ui_btn_whatsapp}}</a>
  <a href="{{tel_url}}" class="m-call"><i class="fas fa-phone"></i> {{ui_btn_call_short}}</a>
  <a href="#contact" class="m-quote"><i class="fas fa-file-invoice-dollar"></i> {{ui_btn_service}}</a>
</nav>
<a href="{{whatsapp_url}}" class="fab" id="fab" aria-label="{{ui_btn_whatsapp}}"><i class="fab fa-whatsapp"></i></a>