<?
$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title'  => 'HOME OPTIONS',
	'icon'    => '<i class="fa-solid fa-house-chimney"></i>',
	'number'=>4,
	'disc'=>'محتوى الصفحة الرئيسية (تصميم 2026). اسم الشركة يُقرأ من «إسم الموقع» في الإعدادات العامة أو SEO. استخدم {{company_name}} و {{year}} داخل الحقول النصية.',
	'fields'  => array(
		array(
			'type'  => 'Title',
			'title' => 'الهوية والعلامة',
			'disc'  => 'اترك حقول الشعار فارغة لتقسيم اسم الشركة تلقائياً (مثال: ركن + التطور).',
		),
		array(
			'title'   => 'جزء الشعار الأول',
			'en_title'=> 'Brand first part',
			'type'    => 'Text',
			'id'      => 'kayan_homepage_brand_first',
			'desc'    => 'اختياري — يُستمد من اسم الشركة إن تُرك فارغاً',
		),
		array(
			'title'   => 'جزء الشعار الثاني',
			'en_title'=> 'Brand second part',
			'type'    => 'Text',
			'id'      => 'kayan_homepage_brand_second',
			'desc'    => 'اختياري — يُستمد من اسم الشركة إن تُرك فارغاً',
		),
		array(
			'type'  => 'Title',
			'title' => 'قسم البطل (Hero)',
		),
		array(
			'title'   => 'عنوان البطل',
			'en_title'=> 'Hero title',
			'type'    => 'TextArea',
			'id'      => 'kayan_homepage_hero_title',
			'desc'    => 'افتراضي: {{company_name}} — منصة الخدمات المنزلية… — يُسمح بوسم &lt;em&gt;',
		),
		array(
			'title'   => 'وصف البطل',
			'en_title'=> 'Hero subtitle',
			'type'    => 'TextArea',
			'id'      => 'kayan_homepage_hero_subtitle',
		),
		array(
			'title'   => 'عنوان لوحة الخدمات',
			'en_title'=> 'Dashboard title',
			'type'    => 'Text',
			'id'      => 'kayan_homepage_dashboard_title',
			'desc'    => 'افتراضي: لوحة خدمات {{company_name}}',
		),
		array(
			'type'  => 'Title',
			'title' => 'أقسام أخرى',
		),
		array(
			'title'   => 'عنوان «لماذا نحن»',
			'en_title'=> 'Why us heading',
			'type'    => 'TextArea',
			'id'      => 'kayan_homepage_why_heading',
			'desc'    => 'افتراضي: لماذا يختار الآلاف {{company_name}}؟ — يُسمح بوسم &lt;span&gt;',
		),
		array(
			'title'   => 'عنوان المقارنة',
			'en_title'=> 'Compare heading',
			'type'    => 'TextArea',
			'id'      => 'kayan_homepage_compare_heading',
		),
		array(
			'title'   => 'نص مناطق الخدمة',
			'en_title'=> 'Areas intro',
			'type'    => 'TextArea',
			'id'      => 'kayan_homepage_areas_intro',
		),
		array(
			'type'  => 'Title',
			'title' => 'التذييل والمدونة',
		),
		array(
			'title'   => 'وصف التذييل',
			'en_title'=> 'Footer tagline',
			'type'    => 'TextArea',
			'id'      => 'kayan_homepage_footer_tagline',
		),
		array(
			'title'   => 'نص حقوق النشر',
			'en_title'=> 'Copyright line',
			'type'    => 'Text',
			'id'      => 'kayan_homepage_copyright',
			'desc'    => 'افتراضي: © {{year}} {{company_name}} للخدمات المنزلية…',
		),
		array(
			'title'   => 'عدد مقالات المدونة',
			'en_title'=> 'Blog posts count',
			'type'    => 'Number',
			'id'      => 'kayan_homepage_blog_count',
			'desc'    => 'من 1 إلى 6 — يُعرض آخر المقالات المنشورة أو المحتوى الافتراضي إن لم توجد مقالات',
		),
		array(
			'type'  => 'Title',
			'title' => 'تعطيل التصميم',
		),
		array(
			'title'   => 'تعطيل تصميم الرئيسية 2026',
			'en_title'=> 'Disable homepage v3',
			'type'    => 'SwitchBox',
			'id'      => 'kayan_homepage_v3_disable',
			'desc'    => 'للعودة للقالب القديم على الصفحة الرئيسية فقط',
		),
	)
);
