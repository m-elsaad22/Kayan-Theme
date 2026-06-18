<?
/**
 * حقول مخصصة لودجات Home2026 — كل قسم بإعداداته (مثل النظام القديم Standard).
 */

if ( ! function_exists( 'kayan_home_data_source_fields' ) ) {
	function kayan_home_data_source_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'مصدر المحتوى',
				'disc'  => 'الافتراضي: جلب البيانات من لوحة تحكم ووردبريس (مقالات، تصنيفات، مشاريع…).',
			),
			array(
				'id'      => 'data_source',
				'type'    => 'Select',
				'title'   => 'طريقة العرض',
				'options' => array(
					'wordpress'   => 'من الموقع (مقالات / تصنيفات / CPT)',
					'manual_html' => 'HTML يدوي كامل (متقدم)',
				),
				'value'   => 'wordpress',
			),
			array(
				'id'    => 'content_html',
				'type'  => 'TextArea',
				'title' => 'HTML يدوي',
				'disc'  => 'يُستخدم فقط عند اختيار «HTML يدوي».',
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_posts_per_page_field' ) ) {
	function kayan_home_posts_per_page_field( $default = 6, $title = 'عدد العناصر' ) {
		return array(
			'type'  => 'Number',
			'id'    => 'posts_per_page',
			'title' => $title,
			'value' => (string) $default,
		);
	}
}

if ( ! function_exists( 'kayan_home_blog_query_fields' ) ) {
	function kayan_home_blog_query_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'إعدادات المدونة',
			),
			kayan_home_posts_per_page_field( 3, 'عدد المقالات' ),
			array(
				'type'          => 'Taxonomy-Select',
				'id'            => 'category',
				'taxonomy_name' => 'category',
				'parent'        => 0,
				'per'           => 100,
				'title'         => 'تصنيف محدد (اختياري)',
			),
			array(
				'type'    => 'Select',
				'id'      => 'Filter',
				'title'   => 'ترتيب / فلترة',
				'options' => array(
					'latest'     => 'الأحدث',
					'most_views' => 'الأكثر مشاهدة',
					'most_rate'  => 'الأكثر تقييماً',
					'pin'        => 'المثبت',
				),
				'value'   => 'latest',
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_category_query_fields' ) ) {
	function kayan_home_category_query_fields( $title = 'إعدادات الخدمات (تصنيفات)' ) {
		return array(
			array(
				'type'  => 'Title',
				'title' => $title,
			),
			array(
				'type'  => 'Number',
				'id'    => 'number',
				'title' => 'عدد التصنيفات',
				'value' => '6',
			),
			array(
				'type'          => 'Taxonomy-CheckBox',
				'id'            => 'taxonomy_option',
				'title'         => 'اختر التصنيفات (اتركه فارغاً للكل)',
				'taxonomy_name' => 'category',
				'pre'           => 30,
			),
			array(
				'type'  => 'Text',
				'id'    => 'but_text',
				'title' => 'نص زر التصنيف',
				'value' => 'طلب الخدمة',
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_city_query_fields' ) ) {
	function kayan_home_city_query_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'إعدادات المناطق (مدن)',
			),
			array(
				'type'  => 'Number',
				'id'    => 'number',
				'title' => 'عدد المدن',
				'value' => '7',
			),
			array(
				'type'          => 'Taxonomy-CheckBox',
				'id'            => 'taxonomy_option',
				'title'         => 'اختر المدن (اتركه فارغاً للكل)',
				'taxonomy_name' => 'city',
				'pre'           => 30,
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_works_query_fields' ) ) {
	function kayan_home_works_query_fields( $title = 'إعدادات المشاريع / الأعمال' ) {
		return array(
			array(
				'type'  => 'Title',
				'title' => $title,
			),
			kayan_home_posts_per_page_field( 6, 'عدد المشاريع' ),
			array(
				'type'          => 'Taxonomy-Select',
				'id'            => 'types',
				'taxonomy_name' => 'category',
				'parent'        => 0,
				'per'           => 100,
				'title'         => 'تصنيف افتراضي (اختياري)',
			),
			array(
				'type'          => 'Taxonomy-CheckBox',
				'id'            => 'items__in__filter',
				'taxonomy_name' => 'category',
				'title'         => 'أزرار الفلترة (تصنيفات)',
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_team_query_fields' ) ) {
	function kayan_home_team_query_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'إعدادات الفريق / الفنيين',
				'disc'  => 'يُدار الفريق من نوع المحتوى «الفريق» في لوحة التحكم مع صورة لكل عضو.',
			),
			kayan_home_posts_per_page_field( 5, 'عدد الأعضاء' ),
			kayan_home_items_group_field(
				'team_members',
				'أعضاء محددون (اختياري — وإلا يُعرض كل الفريق)',
				array(
					array(
						'id'             => 'member_id',
						'type'           => 'Compo-Select-Field',
						'title'          => 'عضو الفريق',
						'post_type_name' => 'team',
					),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_faq_fields' ) ) {
	function kayan_home_faq_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'إعدادات الأسئلة الشائعة',
			),
			array(
				'id'      => 'faq_source',
				'type'    => 'Select',
				'title'   => 'مصدر الأسئلة',
				'options' => array(
					'cpt'      => 'من نوع المحتوى FAQ',
					'manual'   => 'قائمة يدوية',
				),
				'value'   => 'cpt',
			),
			kayan_home_posts_per_page_field( 8, 'عدد الأسئلة (عند استخدام CPT)' ),
			kayan_home_items_group_field(
				'Faqs__List',
				'أسئلة يدوية (عند اختيار قائمة يدوية)',
				array(
					array( 'id' => 'question', 'type' => 'Text', 'title' => 'السؤال' ),
					array( 'id' => 'answer', 'type' => 'TextArea', 'title' => 'الإجابة' ),
					array( 'id' => 'number', 'type' => 'Text', 'title' => 'ترتيب' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_pricing_fields' ) ) {
	function kayan_home_pricing_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'إعدادات الأسعار',
				'disc'  => 'اختر خطط الأسعار من نوع المحتوى «خطط الأسعار».',
			),
			kayan_home_items_group_field(
				'Price__List',
				'خطط العرض',
				array(
					array(
						'id'              => 'Plane__ID',
						'type'            => 'Compo-Select-Field',
						'title'           => 'خطة الأسعار',
						'post_type_name'  => 'price',
					),
					array( 'id' => 'Title', 'type' => 'Text', 'title' => 'عنوان مخصص (اختياري)' ),
					array( 'id' => 'number', 'type' => 'Text', 'title' => 'ترتيب' ),
					array( 'id' => 'ActivePlan', 'type' => 'SwitchBox', 'title' => 'الخطة المميزة' ),
				)
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_manual_items_fields' ) ) {
	function kayan_home_manual_items_fields( $title, $with_image = true ) {
		$sub = array(
			array( 'id' => 'title', 'type' => 'Text', 'title' => 'العنوان' ),
			array( 'id' => 'content', 'type' => 'TextArea', 'title' => 'الوصف' ),
			array( 'id' => 'url', 'type' => 'Text', 'title' => 'الرابط' ),
		);
		if ( $with_image ) {
			array_unshift(
				$sub,
				array( 'id' => 'image', 'type' => 'File', 'title' => 'الصورة' )
			);
		} else {
			array_unshift(
				$sub,
				array( 'id' => 'icon', 'type' => 'Text', 'title' => 'أيقونة FA (اختياري)' )
			);
		}
		return array(
			kayan_home_items_group_field( 'items', $title, $sub ),
		);
	}
}
