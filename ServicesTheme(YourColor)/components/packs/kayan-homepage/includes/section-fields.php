<?
/**
 * حقول إعدادات مخصصة لكل قسم تسويقي (غير مربوط مباشرة بـ CPT).
 */

if ( ! function_exists( 'kayan_home_icon_field' ) ) {
	function kayan_home_icon_field() {
		return array(
			'id'    => 'icon',
			'type'  => 'Text',
			'title' => 'أيقونة Font Awesome',
			'disc'  => 'مثال: fas fa-star',
		);
	}
}

if ( ! function_exists( 'kayan_home_hero_fields' ) ) {
	function kayan_home_hero_fields() {
		return array(
			array( 'type' => 'Title', 'title' => 'أزرار الهيرو' ),
			array( 'id' => 'whatsapp_url', 'type' => 'Text', 'title' => 'رابط واتساب', 'value' => 'https://wa.me/971586634710' ),
			array( 'id' => 'phone_url', 'type' => 'Text', 'title' => 'رابط الاتصال', 'value' => 'tel:+971586634710' ),
			array( 'id' => 'quote_anchor', 'type' => 'Text', 'title' => 'رابط طلب عرض سعر', 'value' => '#contact' ),
			kayan_home_items_group_field(
				'hero_chips',
				'شارات الثقة (تحت الأزرار)',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'النص' ),
				)
			),
			array( 'type' => 'Title', 'title' => 'لوحة الإحصائيات (جانب الهيرو)' ),
			array( 'id' => 'dash_title', 'type' => 'Text', 'title' => 'عنوان اللوحة', 'value' => 'لوحة خدمات ركن التطور' ),
			kayan_home_items_group_field(
				'dash_mini',
				'اختصارات الخدمات في اللوحة',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'التسمية' ),
				)
			),
			kayan_home_items_group_field(
				'dash_stats',
				'أرقام اللوحة',
				array(
					array( 'id' => 'value', 'type' => 'Text', 'title' => 'الرقم (أو نص مثل 24/7)' ),
					array( 'id' => 'suffix', 'type' => 'Text', 'title' => 'لاحقة (+ أو %)' ),
					array( 'id' => 'decimals', 'type' => 'Text', 'title' => 'منازل عشرية (للعداد)' ),
					array( 'id' => 'label', 'type' => 'Text', 'title' => 'التسمية' ),
				)
			),
			array( 'id' => 'warranty_title', 'type' => 'Text', 'title' => 'عنوان الضمان في اللوحة' ),
			array( 'id' => 'warranty_sub', 'type' => 'Text', 'title' => 'وصف الضمان في اللوحة' ),
			kayan_home_items_group_field(
				'dash_trust',
				'شارات اعتماد اللوحة',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'النص' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_loader_fields' ) ) {
	function kayan_home_loader_fields() {
		return array(
			array( 'id' => 'loader_title', 'type' => 'Text', 'title' => 'نص الشعار', 'value' => 'ركن' ),
			array( 'id' => 'loader_highlight', 'type' => 'Text', 'title' => 'الكلمة المميزة', 'value' => 'التطور' ),
		);
	}
}

if ( ! function_exists( 'kayan_home_trustbar_fields' ) ) {
	function kayan_home_trustbar_fields() {
		return array(
			kayan_home_items_group_field(
				'trust_items',
				'عناصر شريط الثقة',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'النص' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_atb_fields' ) ) {
	function kayan_home_atb_fields() {
		return array(
			kayan_home_items_group_field(
				'counter_items',
				'عدادات الشريط المتحرك',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'value', 'type' => 'Text', 'title' => 'القيمة (رقم أو نص)' ),
					array( 'id' => 'suffix', 'type' => 'Text', 'title' => 'لاحقة' ),
					array( 'id' => 'decimals', 'type' => 'Text', 'title' => 'منازل عشرية' ),
					array( 'id' => 'label', 'type' => 'Text', 'title' => 'التسمية' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_finder_fields' ) ) {
	function kayan_home_finder_fields() {
		return array(
			array( 'type' => 'Title', 'title' => 'قائمة الخدمات في المحدد' ),
			array(
				'id'      => 'finder_services_source',
				'type'    => 'Select',
				'title'   => 'مصدر الخدمات',
				'options' => array(
					'category' => 'تصنيفات الخدمات (category)',
					'manual'   => 'قائمة يدوية',
				),
				'value'   => 'category',
			),
			array(
				'type'          => 'Taxonomy-CheckBox',
				'id'            => 'finder_categories',
				'title'         => 'تصنيفات الخدمات',
				'taxonomy_name' => 'category',
				'pre'           => 30,
			),
			kayan_home_items_group_field(
				'finder_services_manual',
				'خدمات يدوية (عند اختيار قائمة يدوية)',
				array(
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'اسم الخدمة' ),
				)
			),
			array( 'type' => 'Title', 'title' => 'قائمة الإمارات' ),
			array(
				'type'          => 'Taxonomy-CheckBox',
				'id'            => 'finder_cities',
				'title'         => 'مدن / إمارات',
				'taxonomy_name' => 'city',
				'pre'           => 20,
			),
			array( 'id' => 'finder_btn_text', 'type' => 'Text', 'title' => 'نص زر العرض', 'value' => 'احصل على عرض سعر فوري' ),
			array( 'id' => 'finder_wa_url', 'type' => 'Text', 'title' => 'رابط واتساب', 'value' => 'https://wa.me/971586634710' ),
		);
	}
}

if ( ! function_exists( 'kayan_home_why_fields' ) ) {
	function kayan_home_why_fields() {
		return array(
			array( 'type' => 'Title', 'title' => 'خطوات الرحلة (العمود الأيسر)' ),
			array( 'id' => 'journey_title', 'type' => 'Text', 'title' => 'عنوان الرحلة', 'value' => 'رحلتك معنا بسيطة وواضحة' ),
			array( 'id' => 'journey_subtitle', 'type' => 'TextArea', 'title' => 'وصف الرحلة' ),
			kayan_home_items_group_field(
				'timeline_steps',
				'خطوات الرحلة',
				array(
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'عنوان الخطوة' ),
					array( 'id' => 'content', 'type' => 'Text', 'title' => 'وصف مختصر' ),
					array( 'id' => 'number', 'type' => 'Text', 'title' => 'ترتيب' ),
				)
			),
			array( 'type' => 'Title', 'title' => 'بطاقات المميزات' ),
			kayan_home_items_group_field(
				'feature_cards',
				'بطاقات لماذا نحن',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'العنوان' ),
					array( 'id' => 'content', 'type' => 'TextArea', 'title' => 'الوصف' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_stats_fields' ) ) {
	function kayan_home_stats_fields() {
		return array(
			kayan_home_items_group_field(
				'stat_items',
				'الإحصائيات',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'value', 'type' => 'Text', 'title' => 'الرقم أو النص' ),
					array( 'id' => 'suffix', 'type' => 'Text', 'title' => 'لاحقة (+ %)' ),
					array( 'id' => 'decimals', 'type' => 'Text', 'title' => 'منازل عشرية للعداد' ),
					array( 'id' => 'label', 'type' => 'Text', 'title' => 'التسمية' ),
					array( 'id' => 'use_counter', 'type' => 'SwitchBox', 'title' => 'تفعيل عداد متحرك' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_compare_fields' ) ) {
	function kayan_home_compare_fields() {
		return array(
			array( 'id' => 'compare_col_us', 'type' => 'Text', 'title' => 'عمودنا', 'value' => 'ركن التطور' ),
			array( 'id' => 'compare_col_other', 'type' => 'Text', 'title' => 'عمود المقارنة', 'value' => 'شركات أخرى' ),
			kayan_home_items_group_field(
				'compare_rows',
				'صفوف المقارنة',
				array(
					array( 'id' => 'label', 'type' => 'Text', 'title' => 'المعيار' ),
					array( 'id' => 'us_has', 'type' => 'SwitchBox', 'title' => 'متوفر لدينا' ),
					array( 'id' => 'other_has', 'type' => 'SwitchBox', 'title' => 'متوفر عند الآخرين' ),
					array( 'id' => 'number', 'type' => 'Text', 'title' => 'ترتيب' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_certs_fields' ) ) {
	function kayan_home_certs_fields() {
		return array(
			kayan_home_items_group_field(
				'cert_items',
				'الشهادات والتراخيص',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'image', 'type' => 'File', 'title' => 'صورة / شعار (اختياري)' ),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'العنوان' ),
					array( 'id' => 'content', 'type' => 'TextArea', 'title' => 'الوصف' ),
					array( 'id' => 'badge', 'type' => 'Text', 'title' => 'نص الشارة (موثّق…)' ),
					array( 'id' => 'doc_label', 'type' => 'Text', 'title' => 'نص المستند' ),
					array( 'id' => 'doc_url', 'type' => 'Text', 'title' => 'رابط المستند (PDF)' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_reviews_fields' ) ) {
	function kayan_home_reviews_fields() {
		return array(
			array( 'id' => 'reviews_rating_text', 'type' => 'Text', 'title' => 'نص التقييم في العنوان', 'value' => 'تقييم 4.9 من 5' ),
			kayan_home_items_group_field(
				'review_cards',
				'بطاقات التقييم',
				array(
					array( 'id' => 'content', 'type' => 'TextArea', 'title' => 'نص التقييم' ),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'اسم العميل' ),
					array( 'id' => 'subtitle', 'type' => 'Text', 'title' => 'المنطقة' ),
					array( 'id' => 'initial', 'type' => 'Text', 'title' => 'حرف الأفاتار' ),
					array( 'id' => 'stars', 'type' => 'Select', 'title' => 'النجوم', 'options' => array( '5' => '5', '4' => '4', '3' => '3' ) ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_brands_fields' ) ) {
	function kayan_home_brands_fields() {
		return array(
			kayan_home_items_group_field(
				'brand_items',
				'شعارات الشركاء',
				array(
					array( 'id' => 'image', 'type' => 'File', 'title' => 'الشعار' ),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'اسم الشريك (بدون صورة)' ),
					kayan_home_icon_field(),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_cases_fields' ) ) {
	function kayan_home_cases_fields() {
		return array(
			array(
				'id'      => 'cases_source',
				'type'    => 'Select',
				'title'   => 'مصدر القصص',
				'options' => array(
					'manual' => 'قصص يدوية',
					'works'  => 'من مشاريع works (عنوان + مقتطف)',
				),
				'value'   => 'manual',
			),
			kayan_home_posts_per_page_field( 3, 'عدد القصص (عند works)' ),
			kayan_home_items_group_field(
				'case_studies',
				'قصص النجاح اليدوية',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'عنوان القصة' ),
					array( 'id' => 'subtitle', 'type' => 'Text', 'title' => 'الموقع / النوع' ),
					array( 'id' => 'problem', 'type' => 'TextArea', 'title' => 'المشكلة' ),
					array( 'id' => 'diagnosis', 'type' => 'TextArea', 'title' => 'التشخيص' ),
					array( 'id' => 'solution', 'type' => 'TextArea', 'title' => 'الحل' ),
					array( 'id' => 'result', 'type' => 'Text', 'title' => 'النتيجة' ),
					array( 'id' => 'location', 'type' => 'Text', 'title' => 'الموقع' ),
					array( 'id' => 'service', 'type' => 'Text', 'title' => 'نوع الخدمة' ),
					array( 'id' => 'duration', 'type' => 'Text', 'title' => 'المدة' ),
					array( 'id' => 'date', 'type' => 'Text', 'title' => 'التاريخ' ),
					array( 'id' => 'url', 'type' => 'Text', 'title' => 'رابط التفاصيل' ),
					array( 'id' => 'header_style', 'type' => 'Text', 'title' => 'لون رأس البطاقة (CSS)' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_cta_fields' ) ) {
	function kayan_home_cta_fields() {
		return array(
			array( 'id' => 'cta_title', 'type' => 'Text', 'title' => 'العنوان', 'value' => 'جاهزون لخدمتك في أي وقت — 24/7' ),
			array( 'id' => 'cta_subtitle', 'type' => 'TextArea', 'title' => 'النص الفرعي' ),
			array( 'id' => 'cta_wa_url', 'type' => 'Text', 'title' => 'واتساب', 'value' => 'https://wa.me/971586634710' ),
			array( 'id' => 'cta_phone_url', 'type' => 'Text', 'title' => 'اتصال', 'value' => 'tel:+971586634710' ),
			array( 'id' => 'cta_quote_url', 'type' => 'Text', 'title' => 'عرض سعر', 'value' => 'https://wa.me/971586634710' ),
			kayan_home_items_group_field(
				'cta_trust',
				'شارات الثقة أسفل الأزرار',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'النص' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_seo_hub_fields' ) ) {
	function kayan_home_seo_hub_fields() {
		return array(
			array(
				'id'      => 'hub_source',
				'type'    => 'Select',
				'title'   => 'مصدر الأعمدة',
				'options' => array(
					'manual'   => 'أعمدة يدوية',
					'category' => 'تصنيفات الخدمات',
				),
				'value'   => 'manual',
			),
			array(
				'type'          => 'Taxonomy-CheckBox',
				'id'            => 'hub_categories',
				'title'         => 'تصنيفات (عند الربط بالتصنيفات)',
				'taxonomy_name' => 'category',
				'pre'           => 10,
			),
			kayan_home_items_group_field(
				'hub_columns',
				'أعمدة مركز المعرفة',
				array(
					kayan_home_icon_field(),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'عنوان العمود' ),
					array( 'id' => 'featured_label', 'type' => 'Text', 'title' => 'الدليل المميز' ),
					array( 'id' => 'featured_url', 'type' => 'Text', 'title' => 'رابط الدليل المميز' ),
					array( 'id' => 'links', 'type' => 'TextArea', 'title' => 'روابط إضافية', 'disc' => 'كل سطر: عنوان الرابط|الرابط' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_structured_section_slugs' ) ) {
	function kayan_home_structured_section_slugs() {
		return array(
			'loader', 'hero', 'trustbar', 'atb', 'finder', 'why', 'stats', 'compare',
			'certs', 'reviews', 'brands', 'cases', 'cta', 'seo-hub',
		);
	}
}
