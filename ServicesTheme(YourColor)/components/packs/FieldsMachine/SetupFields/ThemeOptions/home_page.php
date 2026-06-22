<?
$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title' => 'HOME OPTIONS',
	'icon'     => '<i class="fa-solid fa-house-chimney"></i>',
	'number'   => 4,
	'disc'     => 'التحكم العام في الصفحة الرئيسية. لكل قسم صفحة مخصصة في إعدادات القالب (الرئيسية — …). الشعار والهيدر من «إعدادات الهيدر»، الفوتر والخريطة من «إعدادات الفوتر» و«إعدادات الاتصال».',
	'fields'   => array(
		array(
			'type'  => 'Title',
			'title' => 'وضع العرض',
		),
		array(
			'title'    => 'تعطيل تصميم الرئيسية 2026',
			'en_title' => 'Disable homepage v3',
			'type'     => 'SwitchBox',
			'id'       => 'kayan_homepage_v3_disable',
			'desc'     => 'عند التفعيل: العودة للقالب القديم (Intro + الودجات أدناه)',
		),
		array(
			'type'  => 'Title',
			'title' => 'القالب القديم (عند تعطيل تصميم 2026)',
			'disc'  => 'يُستخدم فقط عند تعطيل تصميم 2026 أعلاه.',
		),
		array(
			'id'             => 'HomeIntro',
			'type'           => 'Widget-Selector',
			'ModelCenter'    => 'intro-models',
			'create_fields'  => true,
			'select_field'   => array(
				'type'           => 'Select',
				'id'             => 'SelectedModel',
				'parent_id'      => 'HomeIntro',
				'title'          => 'إعدادات Intro',
				'selected_shows' => true,
			),
		),
		array(
			'id'           => 'widgets_home__meta',
			'type'         => 'Widgets',
			'title'        => 'محتوى الصفحة الرئيسية (ودجات)',
			'ModelCenter'  => 'Standard',
			'update__type' => 'option',
		),
		array(
			'type'  => 'Title',
			'title' => 'أقسام التصميم الجديد',
			'disc'  => 'صفحات التحكم: الرئيسية — الهيدر، البطل، الخدمات، المناطق، الفوتر، وأقسام أخرى.',
		),
	),
);
