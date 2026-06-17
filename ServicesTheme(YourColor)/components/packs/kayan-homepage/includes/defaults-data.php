<?
/**
 * محتوى افتراضي لأقسام الرئيسية — مستخرج من index.html (تصميم ركن التطور 2026).
 */

if ( ! function_exists( 'kayan_home_seed_manifest' ) ) {
	function kayan_home_seed_manifest() {
		return array(
			'kayan_home_loader'      => 'loader',
			'kayan_home_hero'        => 'hero',
			'kayan_home_trustbar'    => 'trustbar',
			'kayan_home_atb'         => 'atb',
			'kayan_home_finder'      => 'finder',
			'kayan_home_services'    => 'services',
			'kayan_home_why'         => 'why',
			'kayan_home_team'        => 'team',
			'kayan_home_stats'       => 'stats',
			'kayan_home_compare'     => 'compare',
			'kayan_home_areas'       => 'areas',
			'kayan_home_ba'          => 'ba',
			'kayan_home_cases'       => 'cases',
			'kayan_home_projects'    => 'projects',
			'kayan_home_certs'       => 'certs',
			'kayan_home_pricing'     => 'pricing',
			'kayan_home_reviews'     => 'reviews',
			'kayan_home_brands'      => 'brands',
			'kayan_home_seo_hub'     => 'seo-hub',
			'kayan_home_blog'        => 'blog',
			'kayan_home_faq'         => 'faq',
			'kayan_home_cta'         => 'cta',
		);
	}
}

if ( ! function_exists( 'kayan_home_slug_from_widget_id' ) ) {
	function kayan_home_slug_from_widget_id( $widget_id ) {
		$manifest = kayan_home_seed_manifest();
		return isset( $manifest[ $widget_id ] ) ? $manifest[ $widget_id ] : '';
	}
}

if ( ! function_exists( 'kayan_home_load_default_html' ) ) {
	function kayan_home_load_default_html( $slug ) {
		$file = __DIR__ . '/defaults-html/' . $slug . '.html';
		if ( ! file_exists( $file ) ) {
			return '';
		}
		return (string) file_get_contents( $file );
	}
}

if ( ! function_exists( 'kayan_home_structured_defaults' ) ) {
	function kayan_home_structured_defaults( $slug ) {
		$map = array(
			'hero' => array(
				'section_title'    => 'ركن التطور — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في الإمارات',
				'section_subtitle' => 'من عزل الأسطح وكشف التسربات إلى صيانة التكييف والتنظيف الاحترافي — فريق معتمد، أجهزة حديثة، وضمان مكتوب يصل إلى 10 سنوات.',
				'dash_title'       => 'لوحة خدمات ركن التطور',
			),
			'finder'   => array( 'section_tag' => 'ابدأ الآن', 'section_title' => 'ما الخدمة التي <span>تحتاجها؟</span>', 'section_subtitle' => 'اختر الخدمة والإمارة واحصل على عرض سعر فوري مع تقدير لوقت الاستجابة وحالة التوفر.' ),
			'services' => array( 'section_tag' => 'خدماتنا', 'section_title' => 'خدماتنا المنزلية <span>المتكاملة</span>', 'section_subtitle' => 'حلول احترافية شاملة تغطي كل احتياجات منزلك أو منشأتك بأعلى معايير الجودة والضمان.' ),
			'why'      => array( 'section_tag' => 'لماذا نحن', 'section_title' => 'لماذا يختار الآلاف <span>ركن التطور؟</span>', 'section_subtitle' => 'نجمع بين التقنية المتطورة والخبرة العميقة والضمان الحقيقي لنمنحك راحة بال كاملة.' ),
			'team'     => array( 'section_tag' => 'فريقنا', 'section_title' => 'خبراؤنا في <span>خدمتكم</span>', 'section_subtitle' => 'فريق معتمد من المتخصصين بخبرة عملية طويلة في السوق الإماراتي.' ),
			'stats'    => array( 'section_tag' => 'أرقامنا', 'section_title' => 'أرقام تتحدث عن جودتنا', 'section_subtitle' => 'ثقة الآلاف من العملاء في جميع أنحاء الإمارات.' ),
			'compare'  => array( 'section_tag' => 'مقارنة', 'section_title' => 'لماذا يختار العملاء <span>ركن التطور؟</span>', 'section_subtitle' => 'مقارنة واضحة بين خدماتنا والخدمات التقليدية.' ),
			'areas'    => array( 'section_tag' => 'مناطق الخدمة', 'section_title' => 'خدماتنا في جميع <span>إمارات الدولة</span>', 'section_subtitle' => 'أينما كنت في الإمارات، فريق ركن التطور قريب منك وجاهز للخدمة.' ),
			'ba'       => array( 'section_tag' => 'قبل وبعد', 'section_title' => 'قبل وبعد — <span>نتائج حقيقية</span> لأعمالنا', 'section_subtitle' => 'اسحب المقبض لرؤية الفرق الذي يصنعه فريقنا.' ),
			'cases'    => array( 'section_tag' => 'قصص النجاح', 'section_title' => 'قصص نجاح حقيقية من <span>مشاريعنا</span>', 'section_subtitle' => 'تعرف على كيفية حل المشكلات المعقدة وتحقيق نتائج مميزة لعملائنا في مختلف إمارات الإمارات.' ),
			'projects' => array( 'section_tag' => 'أعمالنا', 'section_title' => 'مشاريعنا <span>المنجزة</span>', 'section_subtitle' => 'نماذج من مئات المشاريع التي نفذناها بنجاح في جميع الإمارات.' ),
			'certs'    => array( 'section_tag' => 'الموثوقية', 'section_title' => 'التراخيص والشهادات <span>والاعتمادات</span>', 'section_subtitle' => 'نعمل بشفافية كاملة وفق التراخيص والمعايير المعتمدة في دولة الإمارات.' ),
			'pricing'  => array( 'section_tag' => 'الأسعار', 'section_title' => 'أدلة الأسعار <span>والتكاليف</span>', 'section_subtitle' => 'تقديرات شفافة تساعدك على معرفة التكلفة قبل اتخاذ القرار.' ),
			'reviews'  => array( 'section_tag' => 'آراء العملاء', 'section_title' => 'آراء عملائنا — <span>تقييم 4.9 من 5</span>', 'section_subtitle' => 'تقييمات حقيقية موثقة من عملاء Google.' ),
			'brands'   => array( 'section_tag' => 'شركاؤنا', 'section_title' => 'شركاؤنا في <span>التميز</span>' ),
			'seo-hub'  => array( 'section_tag' => 'مركز المعرفة', 'section_title' => 'دليل الخدمات <span>المنزلية</span>', 'section_subtitle' => 'محتوى متخصص ومنظم يساعدك على فهم خدماتنا واتخاذ القرار الصحيح.' ),
			'blog'     => array( 'section_tag' => 'المدونة', 'section_title' => 'مقالات ونصائح <span>مفيدة</span>', 'section_subtitle' => 'محتوى متخصص يساعدك على العناية بمنزلك واتخاذ القرار الصحيح.' ),
			'faq'      => array( 'section_tag' => 'الأسئلة الشائعة', 'section_title' => 'الأسئلة <span>الشائعة</span>', 'section_subtitle' => 'إجابات واضحة لأكثر ما يسأل عنه عملاؤنا.' ),
			'cta'      => array( 'section_title' => 'جاهزون لخدمتك في أي وقت — 24/7', 'section_subtitle' => 'تواصل معنا الآن واحصل على معاينة مجانية وعرض سعر شفاف.' ),
		);
		return isset( $map[ $slug ] ) ? $map[ $slug ] : array();
	}
}

if ( ! function_exists( 'kayan_home_get_widget_defaults' ) ) {
	function kayan_home_get_widget_defaults( $widget_id ) {
		$slug = kayan_home_slug_from_widget_id( $widget_id );
		if ( $slug === '' ) {
			return array();
		}
		if ( function_exists( 'kayan_home_data_driven_slugs' ) && in_array( $slug, kayan_home_data_driven_slugs(), true ) ) {
			$meta = array( 'data_source' => 'wordpress' );
			$structured = kayan_home_structured_defaults( $slug );
			if ( ! empty( $structured ) ) {
				$meta = array_merge( $meta, $structured );
			}
			return $meta;
		}
		if ( function_exists( 'kayan_home_structured_section_slugs' ) && in_array( $slug, kayan_home_structured_section_slugs(), true ) ) {
			$meta = function_exists( 'kayan_home_get_structured_defaults' ) ? kayan_home_get_structured_defaults( $slug ) : array();
			$headers = kayan_home_structured_defaults( $slug );
			if ( ! empty( $headers ) ) {
				$meta = array_merge( $headers, $meta );
			}
			return $meta;
		}
		$html = kayan_home_load_default_html( $slug );
		$meta = array(
			'content_html' => $html,
		);
		$structured = kayan_home_structured_defaults( $slug );
		if ( ! empty( $structured ) ) {
			$meta = array_merge( $meta, $structured );
		}
		return $meta;
	}
}

if ( ! function_exists( 'kayan_home_get_section_defaults' ) ) {
	function kayan_home_get_section_defaults( $slug ) {
		$manifest = kayan_home_seed_manifest();
		foreach ( $manifest as $widget_id => $section_slug ) {
			if ( $section_slug === $slug ) {
				return kayan_home_get_widget_defaults( $widget_id );
			}
		}
		return array();
	}
}

if ( ! function_exists( 'kayan_home_merge_section_vars' ) ) {
	function kayan_home_merge_section_vars( $slug, $vars ) {
		$defaults = kayan_home_get_section_defaults( $slug );
		$vars     = is_array( $vars ) ? $vars : array();
		if ( empty( $defaults ) ) {
			return $vars;
		}
		return array_replace_recursive( $defaults, $vars );
	}
}

if ( ! function_exists( 'kayan_home_echo_section_html' ) ) {
	function kayan_home_echo_section_html( $html ) {
		$year = gmdate( 'Y' );
		$html = str_replace( '© 2026 ركن التطور', '© ' . $year . ' ركن التطور', $html );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted theme HTML from defaults/admin.
		echo $html;
	}
}
