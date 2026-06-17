<?
$import_url = function_exists( 'kayan_home_import_defaults_url' ) ? kayan_home_import_defaults_url() : '';

$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title'  => 'HOME OPTIONS',
	'icon'    => '<i class="fa-solid fa-house-chimney"></i>',
	'number'=>4,
	'disc'=>'تحكم في أقسام الصفحة الرئيسية 2026. الهيدر والفوتر من تبويباتهما المستقلة. الأقسام المربوطة بالموقع تُجلب من المقالات والتصنيفات والمشاريع تلقائياً.',
	'fields'  => array(
		array(
			'type'  => 'Title',
			'title' => 'استيراد محتوى التصميم',
			'disc'  => 'يُستورد المحتوى تلقائياً. الهيدر والفوتر من «إعدادات الهيدر» و«إعدادات الفوتر». لإعادة الاستيراد: <a href="' . esc_url( $import_url ) . '" class="button button-secondary" onclick="return confirm(\'سيتم حذف أقسام الرئيسية الحالية واستبدالها بالإعدادات الافتراضية. متابعة؟\');">استيراد / إعادة تعبئة</a>',
		),
		array(
			'type'  => 'Title',
			'title' => 'أقسام تصميم 2026',
			'disc'  => 'كل قسم له إعداداته الخاصة. الخدمات والمدونة والمشاريع والمناطق والفريق والأسعار والFAQ مربوطة بلوحة تحكم ووردبريس.',
		),
		array(
			'id'           => 'widgets_home__meta',
			'type'         => 'Widgets',
			'title'        => 'أقسام الصفحة الرئيسية',
			'ModelCenter'  => 'Home2026',
			'update__type' => 'option',
		),
	)
);
