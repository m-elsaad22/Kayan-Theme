<?
/**
 * قيم افتراضية منظمة لكل قسم — تُزرع مع الودجات وتُعرض في القوالب.
 */

if ( ! function_exists( 'kayan_home_get_structured_defaults' ) ) {
	function kayan_home_get_structured_defaults( $slug ) {
		$fn = 'kayan_home_defaults_' . str_replace( '-', '_', $slug );
		if ( function_exists( $fn ) ) {
			return $fn();
		}
		return array();
	}
}

if ( ! function_exists( 'kayan_home_defaults_loader' ) ) {
	function kayan_home_defaults_loader() {
		return array(
			'loader_title'     => 'ركن',
			'loader_highlight' => 'التطور',
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_hero' ) ) {
	function kayan_home_defaults_hero() {
		return array(
			'section_title'    => 'ركن التطور — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في الإمارات',
			'section_subtitle' => 'من عزل الأسطح وكشف التسربات إلى صيانة التكييف والتنظيف الاحترافي — فريق معتمد، أجهزة حديثة، وضمان مكتوب يصل إلى 10 سنوات.',
			'dash_title'       => 'لوحة خدمات ركن التطور',
			'whatsapp_url'     => 'https://wa.me/971586634710',
			'phone_url'        => 'tel:+971586634710',
			'quote_anchor'     => '#contact',
			'warranty_title'   => 'ضمان مكتوب يصل إلى 10 سنوات',
			'warranty_sub'     => 'على أعمال العزل المائي والحراري',
			'hero_chips'       => array(
				array( 'icon' => 'fas fa-star star', 'title' => '4.9/5 (1,247+ تقييم Google)' ),
				array( 'icon' => 'fas fa-users', 'title' => '15,000+ عميل راضٍ' ),
				array( 'icon' => 'fas fa-award', 'title' => '12+ سنة خبرة' ),
				array( 'icon' => 'fas fa-shield-halved', 'title' => 'ضمان 10 سنوات مكتوب' ),
				array( 'icon' => 'fas fa-headset', 'title' => 'طوارئ 24/7' ),
				array( 'icon' => 'fas fa-map-location-dot', 'title' => 'جميع الإمارات' ),
			),
			'dash_mini'        => array(
				array( 'icon' => 'fas fa-droplet', 'title' => 'كشف تسربات' ),
				array( 'icon' => 'fas fa-layer-group', 'title' => 'عزل أسطح' ),
				array( 'icon' => 'fas fa-snowflake', 'title' => 'صيانة تكييف' ),
				array( 'icon' => 'fas fa-spray-can-sparkles', 'title' => 'تنظيف وتعقيم' ),
				array( 'icon' => 'fas fa-wrench', 'title' => 'سباكة' ),
				array( 'icon' => 'fas fa-bug-slash', 'title' => 'مكافحة حشرات' ),
			),
			'dash_stats'       => array(
				array( 'value' => '15000', 'suffix' => '+', 'label' => 'عميل' ),
				array( 'value' => '30000', 'suffix' => '+', 'label' => 'خدمة' ),
				array( 'value' => '4.9', 'decimals' => '1', 'label' => 'تقييم' ),
			),
			'dash_trust'       => array(
				array( 'icon' => 'fas fa-circle-check', 'title' => 'معتمد من بلدية دبي' ),
				array( 'icon' => 'fas fa-circle-check', 'title' => 'فنيون معتمدون' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_trustbar' ) ) {
	function kayan_home_defaults_trustbar() {
		return array(
			'trust_items' => array(
				array( 'icon' => 'fas fa-shield-halved', 'title' => 'ضمان مكتوب حتى 10 سنوات' ),
				array( 'icon' => 'fas fa-clock', 'title' => 'خدمة طوارئ 24 ساعة' ),
				array( 'icon' => 'fas fa-map-location-dot', 'title' => 'تغطية جميع الإمارات' ),
				array( 'icon' => 'fas fa-user-shield', 'title' => 'فنيون معتمدون ومرخصون' ),
				array( 'icon' => 'fas fa-microchip', 'title' => 'أحدث الأجهزة والتقنيات' ),
				array( 'icon' => 'fas fa-bolt', 'title' => 'استجابة خلال ساعة واحدة' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_atb' ) ) {
	function kayan_home_defaults_atb() {
		return array(
			'counter_items' => array(
				array( 'icon' => 'fas fa-briefcase', 'value' => '30000', 'suffix' => '+', 'label' => 'خدمة منجزة' ),
				array( 'icon' => 'fas fa-users', 'value' => '15000', 'suffix' => '+', 'label' => 'عميل سعيد' ),
				array( 'icon' => 'fas fa-star', 'value' => '4.9', 'decimals' => '1', 'label' => 'تقييم Google' ),
				array( 'icon' => 'fas fa-award', 'value' => '12', 'suffix' => '+', 'label' => 'سنة خبرة' ),
				array( 'icon' => 'fas fa-map-location-dot', 'value' => 'كل الإمارات', 'label' => 'تغطية شاملة' ),
				array( 'icon' => 'fas fa-headset', 'value' => '24/7', 'label' => 'دعم الطوارئ' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_finder' ) ) {
	function kayan_home_defaults_finder() {
		return array(
			'section_tag'            => 'ابدأ الآن',
			'section_title'          => 'ما الخدمة التي <span>تحتاجها؟</span>',
			'section_subtitle'       => 'اختر الخدمة والإمارة واحصل على عرض سعر فوري.',
			'finder_services_source' => 'manual',
			'finder_services_manual' => array(
				array( 'title' => 'كشف تسربات المياه' ),
				array( 'title' => 'عزل الأسطح' ),
				array( 'title' => 'صيانة التكييف' ),
				array( 'title' => 'التنظيف والتعقيم' ),
			),
			'finder_btn_text'        => 'احصل على عرض سعر فوري',
			'finder_wa_url'          => 'https://wa.me/971586634710',
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_why' ) ) {
	function kayan_home_defaults_why() {
		return array(
			'section_tag'      => 'لماذا نحن',
			'section_title'    => 'لماذا يختار الآلاف <span>ركن التطور؟</span>',
			'section_subtitle' => 'نجمع بين التقنية المتطورة والخبرة العميقة والضمان الحقيقي.',
			'journey_title'    => 'رحلتك معنا بسيطة وواضحة',
			'journey_subtitle' => 'من أول اتصال إلى تسليم العمل بضمان مكتوب.',
			'timeline_steps'   => array(
				array( 'number' => '1', 'title' => 'تواصل ومعاينة مجانية', 'content' => 'نصل إليك ونعاين الموقع بدون أي رسوم.' ),
				array( 'number' => '2', 'title' => 'عرض سعر شفاف', 'content' => 'تكلفة واضحة بدون رسوم خفية.' ),
				array( 'number' => '3', 'title' => 'تنفيذ احترافي', 'content' => 'فريق معتمد بأحدث الأجهزة.' ),
				array( 'number' => '4', 'title' => 'ضمان مكتوب ومتابعة', 'content' => 'ضمان موثق ودعم مستمر بعد الخدمة.' ),
			),
			'feature_cards'    => array(
				array( 'icon' => 'fas fa-microchip', 'title' => 'تقنية متطورة', 'content' => 'أجهزة الكشف الحراري والصوتي الأحدث.' ),
				array( 'icon' => 'fas fa-user-shield', 'title' => 'فريق معتمد', 'content' => 'شهادات اعتماد دولية.' ),
				array( 'icon' => 'fas fa-bolt', 'title' => 'استجابة سريعة', 'content' => 'نصل خلال ساعة في الطوارئ.' ),
				array( 'icon' => 'fas fa-file-contract', 'title' => 'ضمان حقيقي', 'content' => 'ضمان مكتوب لجميع الأعمال.' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_stats' ) ) {
	function kayan_home_defaults_stats() {
		return array(
			'section_tag'      => 'أرقامنا',
			'section_title'    => 'أرقام تتحدث عن جودتنا',
			'section_subtitle' => 'ثقة الآلاف من العملاء في جميع أنحاء الإمارات.',
			'stat_items'       => array(
				array( 'icon' => 'fas fa-users', 'value' => '15000', 'suffix' => '+', 'label' => 'عميل راضٍ', 'use_counter' => 'on' ),
				array( 'icon' => 'fas fa-briefcase', 'value' => '30000', 'suffix' => '+', 'label' => 'خدمة منجزة', 'use_counter' => 'on' ),
				array( 'icon' => 'fas fa-award', 'value' => '12', 'suffix' => '+', 'label' => 'سنة خبرة', 'use_counter' => 'on' ),
				array( 'icon' => 'fas fa-headset', 'value' => '24/7', 'label' => 'دعم فوري', 'use_counter' => '' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_compare' ) ) {
	function kayan_home_defaults_compare() {
		return array(
			'section_tag'       => 'مقارنة',
			'section_title'     => 'لماذا يختار العملاء <span>ركن التطور؟</span>',
			'section_subtitle'  => 'مقارنة واضحة بين خدماتنا والخدمات التقليدية.',
			'compare_col_us'    => 'ركن التطور',
			'compare_col_other' => 'شركات أخرى',
			'compare_rows'      => array(
				array( 'label' => 'ضمان مكتوب', 'us_has' => 'on', 'other_has' => '' ),
				array( 'label' => 'كشف بدون تكسير', 'us_has' => 'on', 'other_has' => '' ),
				array( 'label' => 'دعم 24/7', 'us_has' => 'on', 'other_has' => '' ),
				array( 'label' => 'فنيون معتمدون', 'us_has' => 'on', 'other_has' => '' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_cta' ) ) {
	function kayan_home_defaults_cta() {
		return array(
			'cta_title'    => 'جاهزون لخدمتك في أي وقت — 24/7',
			'cta_subtitle' => 'تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر شفاف.',
			'cta_wa_url'   => 'https://wa.me/971586634710',
			'cta_phone_url'=> 'tel:+971586634710',
			'cta_quote_url'=> 'https://wa.me/971586634710',
			'cta_trust'    => array(
				array( 'icon' => 'fas fa-shield-halved', 'title' => 'ضمان 10 سنوات' ),
				array( 'icon' => 'fas fa-magnifying-glass', 'title' => 'معاينة مجانية' ),
				array( 'icon' => 'fas fa-headset', 'title' => 'خدمة طوارئ' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_certs' ) ) {
	function kayan_home_defaults_certs() {
		return array(
			'section_tag'      => 'الموثوقية',
			'section_title'    => 'التراخيص والشهادات <span>والاعتمادات</span>',
			'section_subtitle' => 'نعمل بشفافية كاملة وفق التراخيص والمعايير المعتمدة في دولة الإمارات.',
			'cert_items'       => array(
				array( 'icon' => 'fas fa-file-signature', 'title' => 'رخصة تجارية', 'content' => 'رخصة سارية لمزاولة نشاط الخدمات المنزلية.', 'badge' => 'موثّق', 'doc_label' => 'مستند الرخصة' ),
				array( 'icon' => 'fas fa-building-columns', 'title' => 'سجل تجاري', 'content' => 'سجل تجاري معتمد لدى الجهات الرسمية.', 'badge' => 'موثّق', 'doc_label' => 'مستند السجل' ),
				array( 'icon' => 'fas fa-receipt', 'title' => 'تسجيل ضريبي', 'content' => 'رقم تسجيل ضريبي (VAT) رسمي وفواتير نظامية.', 'badge' => 'موثّق', 'doc_label' => 'شهادة الضريبة' ),
				array( 'icon' => 'fas fa-medal', 'title' => 'شهادة جودة', 'content' => 'التزام بمعايير الجودة في جميع مراحل العمل.', 'badge' => 'معتمد', 'doc_label' => 'شهادة الجودة' ),
				array( 'icon' => 'fas fa-helmet-safety', 'title' => 'شهادة السلامة', 'content' => 'اعتماد إجراءات السلامة المهنية للفرق.', 'badge' => 'معتمد', 'doc_label' => 'شهادة السلامة' ),
				array( 'icon' => 'fas fa-shield-halved', 'title' => 'برنامج الضمان', 'content' => 'ضمان مكتوب وموثق يصل إلى 10 سنوات.', 'badge' => 'مضمون', 'doc_label' => 'وثيقة الضمان' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_reviews' ) ) {
	function kayan_home_defaults_reviews() {
		return array(
			'section_tag'          => 'آراء العملاء',
			'section_title'        => 'آراء عملائنا — <span>تقييم 4.9 من 5</span>',
			'section_subtitle'     => 'تقييمات حقيقية موثقة من عملاء Google.',
			'reviews_rating_text'  => 'تقييم 4.9 من 5',
			'review_cards'         => array(
				array( 'content' => 'خدمة ممتازة جداً! الفريق جاء في الموعد تماماً وحدّد مكان التسرب بدقة بدون أي تكسير. احترافية عالية وأسعار عادلة.', 'title' => 'محمد الشمري', 'subtitle' => 'دبي مارينا', 'initial' => 'م', 'stars' => '5' ),
				array( 'content' => 'عزلنا السطح معهم منذ 3 سنوات ولم نواجه أي مشكلة حتى الآن رغم حرارة الصيف. ضمان حقيقي وعمل متقن.', 'title' => 'سارة البلوشي', 'subtitle' => 'البرشاء', 'initial' => 'س', 'stars' => '5' ),
				array( 'content' => 'اتصلت بهم مساءً بسبب تسرب طارئ ووصلوا خلال أقل من ساعة. سرعة استجابة مذهلة وخدمة 24 ساعة فعلاً.', 'title' => 'عبدالله الكعبي', 'subtitle' => 'جميرا', 'initial' => 'ع', 'stars' => '5' ),
				array( 'content' => 'صيانة التكييف كانت دقيقة جداً وأصبح المنزل أبرد بكثير. فريق مؤدب ونظيف في عمله. أنصح بهم بشدة.', 'title' => 'فاطمة المنصوري', 'subtitle' => 'أبوظبي', 'initial' => 'ف', 'stars' => '5' ),
				array( 'content' => 'أفضل شركة تعاملت معها للتنظيف والتعقيم. النتيجة فاقت التوقعات والمواد آمنة على الأطفال.', 'title' => 'خالد النعيمي', 'subtitle' => 'الشارقة', 'initial' => 'خ', 'stars' => '5' ),
				array( 'content' => 'تعامل راقٍ من أول مكالمة. عرض السعر كان شفافاً بدون أي مفاجآت، والعمل سُلّم في الوقت المحدد.', 'title' => 'ريم الحمادي', 'subtitle' => 'عجمان', 'initial' => 'ر', 'stars' => '5' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_brands' ) ) {
	function kayan_home_defaults_brands() {
		return array(
			'section_tag'    => 'شركاؤنا',
			'section_title'=> 'شركاؤنا في <span>التميز</span>',
			'brand_items'  => array(
				array( 'icon' => 'fas fa-cube', 'title' => 'Sika' ),
				array( 'icon' => 'fas fa-cube', 'title' => 'Fosroc' ),
				array( 'icon' => 'fas fa-cube', 'title' => 'Jotun' ),
				array( 'icon' => 'fas fa-cube', 'title' => 'Mapei' ),
				array( 'icon' => 'fas fa-cube', 'title' => 'National Paints' ),
				array( 'icon' => 'fas fa-cube', 'title' => 'Weber' ),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_cases' ) ) {
	function kayan_home_defaults_cases() {
		return array(
			'section_tag'      => 'قصص النجاح',
			'section_title'    => 'قصص نجاح حقيقية من <span>مشاريعنا</span>',
			'section_subtitle' => 'تعرف على كيفية حل المشكلات المعقدة وتحقيق نتائج مميزة لعملائنا في مختلف إمارات الإمارات.',
			'cases_source'     => 'manual',
			'case_studies'     => array(
				array(
					'icon'         => 'fas fa-droplet',
					'title'        => 'تسرب مياه خفي',
					'subtitle'     => 'فيلا — دبي مارينا',
					'problem'      => 'تسرب مياه مستمر تسبب في رطوبة وتلف الجدران دون مصدر ظاهر.',
					'diagnosis'    => 'فحص بالكاميرا الحرارية وأجهزة الكشف الصوتي لتحديد موقع التسرب بدقة.',
					'solution'     => 'إصلاح الموقع المحدد فقط بدون تكسير وإعادة العزل الموضعي.',
					'result'       => 'حل التسرب بنسبة 100%',
					'location'     => 'دبي مارينا',
					'service'      => 'كشف تسربات',
					'duration'     => 'يوم واحد',
					'date'         => 'مايو 2026',
					'url'          => '#contact',
				),
				array(
					'icon'         => 'fas fa-layer-group',
					'title'        => 'فشل عزل السطح',
					'subtitle'     => 'فيلا — البرشاء',
					'problem'      => 'ارتفاع حرارة المنزل وفواتير كهرباء مرتفعة بسبب عزل قديم متضرر.',
					'diagnosis'    => 'قياس انتقال الحرارة على السطح وكشف نقاط ضعف العزل القديم.',
					'solution'     => 'تركيب عزل فوم بولي يوريثان وطلاء عاكس للحرارة بضمان 10 سنوات.',
					'result'       => 'خفض انتقال الحرارة 40%',
					'location'     => 'البرشاء',
					'service'      => 'عزل أسطح',
					'duration'     => '3 أيام',
					'date'         => 'أبريل 2026',
					'url'          => '#contact',
					'header_style' => 'background:linear-gradient(135deg,var(--gold),#d98b15)',
				),
				array(
					'icon'         => 'fas fa-water',
					'title'        => 'تلوث خزان المياه',
					'subtitle'     => 'مبنى — الشارقة',
					'problem'      => 'تغير لون المياه وروائح بسبب ترسبات وتلوث داخل الخزان.',
					'diagnosis'    => 'فحص داخلي للخزان وتحديد مصادر الترسبات والتسرب الجانبي.',
					'solution'     => 'تنظيف وتعقيم كامل وإعادة عزل الخزان بمواد صحية معتمدة.',
					'result'       => 'تقليل فقد المياه وتحسين الجودة',
					'location'     => 'الشارقة',
					'service'      => 'خزانات',
					'duration'     => 'يومان',
					'date'         => 'مارس 2026',
					'url'          => '#contact',
					'header_style' => 'background:linear-gradient(135deg,var(--turq),var(--aqua))',
				),
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_defaults_seo_hub' ) ) {
	function kayan_home_defaults_seo_hub() {
		return array(
			'section_tag'      => 'مركز المعرفة',
			'section_title'    => 'دليل الخدمات <span>المنزلية</span>',
			'section_subtitle' => 'محتوى متخصص ومنظم يساعدك على فهم خدماتنا واتخاذ القرار الصحيح.',
			'hub_source'       => 'manual',
			'hub_columns'      => array(
				array(
					'icon'           => 'fas fa-droplet',
					'title'          => 'كشف التسربات',
					'featured_label' => 'الدليل الشامل لكشف التسربات',
					'featured_url'   => '#blog',
					'links'          => "علامات تسرب المياه المبكرة|#blog\nالكشف بدون تكسير|#blog\nتكلفة كشف التسربات|#pricing",
				),
				array(
					'icon'           => 'fas fa-layer-group',
					'title'          => 'العزل',
					'featured_label' => 'أنواع عزل الأسطح',
					'featured_url'   => '#blog',
					'links'          => "عزل الفوم مقابل البيتومين|#blog\nالعزل الحراري والمائي|#services\nتكلفة عزل الأسطح|#pricing",
				),
				array(
					'icon'           => 'fas fa-water',
					'title'          => 'الخزانات',
					'featured_label' => 'العناية بخزانات المياه',
					'featured_url'   => '#blog',
					'links'          => "أهمية تنظيف الخزانات|#blog\nعزل الخزانات الصحي|#services\nتكلفة تنظيف الخزانات|#pricing",
				),
				array(
					'icon'           => 'fas fa-snowflake',
					'title'          => 'الصيانة',
					'featured_label' => 'صيانة التكييف الموسمية',
					'featured_url'   => '#blog',
					'links'          => "صيانة المكيف في الصيف|#blog\nالسباكة والكهرباء|#services\nتكلفة الصيانة المنزلية|#pricing",
				),
				array(
					'icon'           => 'fas fa-bug-slash',
					'title'          => 'مكافحة الحشرات',
					'featured_label' => 'دليل مكافحة الحشرات الآمنة',
					'featured_url'   => '#blog',
					'links'          => "مواد آمنة للأطفال|#blog\nضمان عدم العودة|#services\nتكلفة مكافحة الحشرات|#pricing",
				),
			),
		);
	}
}
