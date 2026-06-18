# Phase 1.5 — REAL WORLD VALIDATION REPORT

**الموقع المُختبَر:** https://www.rukn-eltatawer.com/  
**التاريخ:** 2026-06-18  
**الفرع:** `cursor/phase1-5-validation-cda3`  
**أدوات:** Lighthouse 12.6 (mobile simulated), curl/TTFB, HTML head analyzer, Browser mobile 390×844, PageSpeed Insights API (محاولة)

---

## تنبيه حاسم قبل Phase 2

**الإنتاج الحالي لا يعكس Phase 1 (PR #11) بعد.**

| الدليل | ما يظهر على الإنتاج |
|--------|---------------------|
| HTML للرئيسية | `intro-model-slider_intro_v1` + Owl Carousel — **ليس** Homepage v3 (`kayan-home.js`) |
| JavaScript | `jquery-3.4.1` + `owl.carousel` + `setup.js` كامل (~60KB) |
| SEO | ازدواجية Rank Math + KAYAN (meta/canonical/OG مكررة) |
| Phase 1 fixes | غير مدمجة في الثيم المنشور على السيرفر |

**التوصية:** دمج PR #11 على staging، إعادة تشغيل هذا التقرير، ثم المقارنة قبل/بعد.

---

## 1. قياس الأداء الفعلي (Lighthouse Mobile)

| الصفحة | Perf | SEO | LCP | CLS | TBT | TTFB | DOM | Unused CSS | Unused JS |
|--------|------|-----|-----|-----|-----|------|-----|------------|-----------|
| **الرئيسية** `/` | **79** | 92 | **4.4s** | **0** | 0ms | **660ms** | 1,149 | 121 KiB | 118 KiB |
| **خدمات** `/services/` | **82** | 100 | **3.5s** | **0** | 0ms | **740ms** | 552 | 183 KiB | 118 KiB |
| **مقال** `/pest-control-khor-fakkan/` | **78** | 100 | **3.9s** | **0** | 40ms | **720ms** | 1,030 | 171 KiB | 117 KiB |

**ملفات المصدر:** `docs/validation-artifacts/lighthouse-summary.json`

### curl TTFB (شبكة مباشرة)

| URL | TTFB | الحجم |
|-----|------|-------|
| `/` | **1.01s** | 339 KB HTML |
| `/services/` | **0.70s** | 332 KB HTML |

### PageSpeed Insights API

- **فشل:** `429 Quota exceeded` — لا يمكن جمع PSI اليوم من بيئة الـ Cloud Agent.
- **بديل مستخدم:** Lighthouse CLI (نتائج أعلاه).

### INP

- Lighthouse simulated **لم يُرجع INP** في هذه الجلسة (`null`).
- **بديل:** `max-potential-fid` على الرئيسية = **50ms** (جيد).
- INP الحقيقي يتطلب CrUX field data من Search Console أو PSI عند توفر الحصة.

### أسباب الاختناق (مُحدَّدة)

| المشكلة | السبب على الإنتاج | Phase 1 يعالجها؟ |
|---------|-------------------|------------------|
| LCP 4.4s | Slider hero + صورة خلفية + TTFB ~660ms + FCP 2.7s | جزئياً (v3 + preload + loader) — **بعد النشر** |
| TTFB مرتفع | LiteSpeed cache + استضافة + HTML 339KB | جزئياً (تقليل DOM/JS) |
| Unused JS 118KiB | `setup.js` + jQuery + Owl على كل الصفحات | **نعم** (تقسيم + تخطي v3) |
| Unused CSS 121–183KiB | Alexandria متعدد الأوزان + main/hover/responsive مضمّنة | **نعم** على v3 |
| DOM 1,149 | قالب legacy + widgets + slider | **نعم** على v3 (~552 على services) |
| CLS = 0 | لا تحركات layout كبيرة مكتشفة | ✅ جيد حالياً |

---

## 2. التحقق من SEO (HTML فعلي)

أداة: `docs/validation-scripts/analyze-head-seo.php`

### الرئيسية `/`

| العنصر | المتوقع | الفعلي | الحالة |
|--------|---------|--------|--------|
| `<title>` | 1 | **1** | ✅ |
| meta description | 1 | **2** | ❌ |
| canonical | 1 | **2** | ❌ |
| og:title | 1 | **2** | ❌ |
| og:description | 1 | **2** | ❌ |
| twitter:card | 1 | **2** | ❌ |
| hreflang | 0 أو ≥2 | **0** | ✅ (لا hreflang وهمي) |
| JSON-LD blocks | 1 graph | **3** | ❌ |
| Rank Math | — | **مكتشف** | ⚠️ تعارض |

### صفحة خدمات `/services/`

- meta description: **2** ❌  
- canonical: **2** ❌  
- OG مكرر ❌  
- Breadcrumb microdata + JSON-LD ❌  

### مقال `/pest-control-khor-fakkan/`

- meta description: **3** ❌  
- canonical: **2** ❌  
- OG: **3** ❌  
- JSON-LD: **10** كتل ❌  
- Breadcrumb microdata + JSON-LD ❌  

**الخلاصة:** ازدواجية SEO **مؤكدة على الإنتاج** — تطابق تماماً المشاكل التي عالجها Phase 1. **يجب إعادة الاختبار بعد نشر PR #11.**

---

## 3. التحقق من Schema

### الأنواع المكتشفة (مقال)

| النوع | الحالة | ملاحظة |
|-------|--------|--------|
| LocalBusiness | ✅ موجود | من legacy + Rank Math |
| Organization | ✅ | مكرر عبر عدة كتل |
| WebSite | ✅ | مكرر |
| Article / BlogPosting | ✅ | **3 مصادر** (legacy + Rank Math + KAYAN partial) |
| FAQPage | ✅ | مكرر مرتين |
| Person | ✅ | مؤلف |
| BreadcrumbList | ⚠️ | **4–5 مرات** + microdata HTML |
| Service | ✅ | مكرر |
| Review | ❌ | **غير موجود** على الإنتاج |
| AggregateRating | ❌ | **غير موجود** |

### Rich Results / Schema validation

- **لم يُنفَّذ اختبار Google Rich Results Test آلياً** (يتطلب واجهة Google أو API).
- **تحليل ثابت:** تعدد graphs يُنتج تحذيرات "duplicate field" و breadcrumb مزدوج — **يفشل معايير Phase 1**.

### بعد نشر Phase 1 (متوقع)

- graph واحد من `kayan-seo/schema-output.php`
- Review + AggregateRating على الرئيسية
- Breadcrumb JSON-LD فقط (بدون microdata)

---

## 4. التحقق من Tracking

### ما على الإنتاج الآن

| الميزة | الحالة | التفاصيل |
|--------|--------|----------|
| WhatsApp click | ✅ | `kt_track_click` + `rukn_track_click` عبر admin-ajax |
| Call click | ✅ | نفس الآلية |
| Form submit | ✅ | `kt_track_click` type=form |
| Sessions | ✅ جزئياً | `kt_register_visit` + `kt_session_end` (beacon) |
| Heatmaps | ❌ معطّل | `KTC.hm=false` في السكربت المضمّن |
| DNI | ❌ | غير موجود |
| Report sharing | ❌ | غير موجود |
| REST `/kayan/v1/track` | ❌ | **KAYAN Track Module (PR #10) غير منشور** |

### KAYAN Track الكامل (فرع `cursor/kayan-track-cda3`)

- 8 جداول DB، REST API، لوحة admin SPA، heatmaps، DNI — **غير قابل للتحقق على الإنتاج**.
- **تتبع مزدوج:** 3 أنظمة متوازية (`kayan-tracking-js` + `rukn_track_*` + `_rsa_sid` pageview) — خطر تضخم بيانات وازدواجية.

### التحقق من كتابة DB

- **محجوب:** لا وصول إلى phpMyAdmin / Query Monitor على الإنتاج.
- **مطلوب منك:** تثبيت Query Monitor على staging، النقر على wa.me/tel، التحقق من جداول `kt_*` أو `wp_kayan_track_*`.

---

## 5. التحقق من قاعدة البيانات

| الفحص | الحالة |
|-------|--------|
| Slow queries | ⏸️ يتطلب Query Monitor على السيرفر |
| Repeated queries | ⏸️ يتطلب Query Monitor |
| Memory / CPU | ⏸️ يتطلب hosting panel |
| Option caching (`yc_get_option`) | ✅ **في الكود** (Phase 1) — **غير منشور** على الإنتاج |

**ملاحظة:** LiteSpeed Cache 7.8.1 نشط — الصفحات مُخزَّنة (قد تُخفي تغييرات الثيم حتى purge).

---

## 6. التحقق من Mobile

**Viewport:** 390×844 (iPhone-like)

### لقطات

- `docs/validation-artifacts/mobile-home-390px.webp`
- `docs/validation-artifacts/mobile-services-390px.webp`

### النتائج

| العنصر | الحالة | ملاحظة |
|--------|--------|--------|
| Homepage | ⚠️ **Legacy slider** | ليس v3 في HTML المُحمَّل |
| Header | ✅ | شعار، بحث، سويتشر GEO، قائمة همبرغر |
| Bottom navigation | — | **غير موجود** (تصميم ويب تقليدي) |
| Floating call/WhatsApp | ✅ | أزرار عائمة يمين الشاشة |
| Forms | ⏸️ | لم يُختبر إرسال فعلي |
| RTL | ✅ | محاذاة عربية صحيحة |
| Tablet | ⏸️ | لم يُختبر 768px في هذه الجلسة |

### تحذيرات Console (من الفحص البصري)

- `link preload` لصور غير مستخدمة فوراً — يؤثر على LCP/ bandwidth.

---

## 7. مقارنة: تقدير Phase 1 vs واقع الإنتاج

| المقياس | تقدير Phase 1 | **الإنتاج الفعلي** |
|---------|---------------|---------------------|
| LCP | 2.0–2.8s | **4.4s** (رئيسية) |
| CLS | 0.05–0.10 | **0** ✅ |
| Perf Score | 75–88 | **79** (قريب من الحد الأدنى للتقدير) |
| SEO duplicates | 0 | **2–3 لكل حقل** ❌ |
| Schema graphs | 1 | **3–10** ❌ |

---

## 8. المخاطر قبل Phase 2 (CRM / AI / Service×City)

| # | الخطر | الخطورة |
|---|-------|---------|
| 1 | **Phase 1 غير منشور** — أي Phase 2 يُبنى على أساس معطوب | 🔴 عالية |
| 2 | SEO مزدوج يُربك Google ويُضعف CTR | 🔴 عالية |
| 3 | Schema مكرر → Rich Results penalties | 🟠 متوسطة |
| 4 | 3 أنظمة tracking متوازية | 🟠 متوسطة |
| 5 | TTFB ~660–740ms يحدّ من أي تحسين frontend | 🟠 متوسطة |
| 6 | Homepage v3 غير مفعّل على الإنتاج رغم وجوده في الكود | 🟡 متوسطة |
| 7 | KAYAN Track (PR #10) غير مدمج — لا DNI/heatmaps/report | 🟡 متوسطة |
| 8 | LiteSpeed cache قد يُخفي التحديثات | 🟡 منخفضة |

---

## 9. قائمة إجراءات إلزامية قبل Phase 2

1. ✅ دمج **PR #11** (Phase 1) على staging  
2. 🔄 Purge LiteSpeed + اختبار staging  
3. 🔄 إعادة تشغيل `analyze-head-seo.php` + Lighthouse — يجب: title=1, description=1, canonical=1  
4. 🔄 Rich Results Test يدوياً على الرئيسية + مقال  
5. 🔄 Query Monitor: تأكيد لا `get_posts(-1)` في frontend  
6. ⚖️ قرار: دمج KAYAN Track (PR #10) أو توحيد التتبع الحالي قبل CRM  
7. 🔄 تفعيل Homepage v3 على الإنتاج والتحقق من عدم تحميل jQuery/Owl  

---

## 10. سكربتات إعادة التشغيل

```bash
# SEO head audit
php docs/validation-scripts/analyze-head-seo.php path/to/saved.html

# Lighthouse mobile
npx lighthouse@12.6.0 "https://yoursite.com/" --form-factor=mobile \
  --output=json --output-path=docs/validation-artifacts/lighthouse-home-mobile.json

# تجميع المقاييس
php docs/validation-scripts/collect-lighthouse-metrics.php docs/validation-artifacts/
```

---

## الخلاصة

Phase 1.5 **أكمل التحقق على الإنتاج الحقيقي** وكشف أن:

- **الأداء:** CLS ممتاز (0)، LCP ضعيف (3.5–4.4s)، TTFB مرتفع (~660–740ms).
- **SEO/Schema:** ازدواجية **مؤكدة** — الإنتاج لم يُحدَّث بـ Phase 1 بعد.
- **Tracking:** تتبع أساسي يعمل عبر admin-ajax؛ **KAYAN Track الكامل غير منشور**؛ heatmaps/DNI/report غير متاحة.
- **Mobile:** RTL والأزرار العائمة سليمة؛ الرئيسية **legacy** وليست v3.

**لا يُنصح بالانتقال إلى CRM أو AI أو Service×City قبل نشر Phase 1 وإعادة هذا التقرير على staging.**

---

*Artifacts: `docs/validation-artifacts/` — JSON + screenshots*
