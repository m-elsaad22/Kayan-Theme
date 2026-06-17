<?
$import_url = function_exists( 'kayan_home_import_defaults_url' ) ? kayan_home_import_defaults_url() : '';

$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title'  => 'HOME OPTIONS',
	'icon'    => '<i class="fa-solid fa-house-chimney"></i>',
	'number'=>4,
	'disc'=>'تحكم كامل في أقسام الصفحة الرئيسية — تصميم ركن التطور 2026. عند فتح هذا التبويب لأول مرة (أو بعد التحديث) تُضاف الأقسام الـ25 بمحتوى index.html تلقائياً.',
	'fields'  => array(
		array(
			'type'  => 'Title',
			'title' => 'استيراد محتوى التصميم',
			'disc'  => 'عند أول تفعيل للقالب تُضاف كل الأقسام الـ25 بمحتوى index.html تلقائياً. لإعادة الاستيراد (يستبدل الأقسام الحالية): <a href="' . esc_url( $import_url ) . '" class="button button-secondary" onclick="return confirm(\'سيتم حذف أقسام الرئيسية الحالية واستبدالها بمحتوى التصميم. متابعة؟\');">استيراد / إعادة تعبئة من التصميم</a>',
		),
		array(
			'type'  => 'Title',
			'title' => 'أقسام تصميم 2026',
			'disc'  => 'كل قسم يحتوي HTML كامل من التصميم + حقول قابلة للتعديل. يمكنك إخفاء أو إعادة ترتيب الأقسام من نظام التصميم.',
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
