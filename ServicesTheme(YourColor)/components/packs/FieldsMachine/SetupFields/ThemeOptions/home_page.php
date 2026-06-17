<?
$import_url = function_exists( 'kayan_home_import_defaults_url' ) ? kayan_home_import_defaults_url() : '';

$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title'  => 'HOME OPTIONS',
	'icon'    => '<i class="fa-solid fa-house-chimney"></i>',
	'number'=>4,
	'disc'=>'تحكم في أقسام الصفحة الرئيسية 2026. الهيدر والفوتر من تبويباتهما. كل قسم له إعداداته الخاصة.',
	'fields'  => array(
		array(
			'type'  => 'Title',
			'title' => '① البدء السريع',
			'disc'  => 'يُستورد المحتوى تلقائياً عند أول تثبيت. لإعادة التعبئة من التصميم الافتراضي: <a href="' . esc_url( $import_url ) . '" class="button button-secondary" onclick="return confirm(\'سيتم حذف أقسام الرئيسية الحالية واستبدالها بالإعدادات الافتراضية. متابعة؟\');">استيراد / إعادة تعبئة</a>',
		),
		array(
			'type'  => 'Title',
			'title' => '② أقسام الصفحة',
			'disc'  => 'اسحب لترتيب الأقسام. اضغط على أي قسم لتعديل إعداداته. الخدمات والمدونة والمشاريع والمناطق والفريق مربوطة بلوحة ووردبريس.',
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
