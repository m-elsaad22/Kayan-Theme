<?
$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title'  => 'HOME OPTIONS',
	'icon'    => '<i class="fa-solid fa-house-chimney"></i>',
	'number'=>4,
	'disc'=>'اعدادات شكل الصفحة الرئيسية ',
	'fields'  => array(
		array(
			'title'  => 'تفعيل الصفحة الرئيسية الجديدة (تصميم 2026)',
			'en_title' => 'Homepage v3',
			'type'   => 'SwitchBox',
			'id'     => 'kayan_homepage_v3',
			'disc'   => 'يعرض تصميم KAYAN Homepage الجديد بدلاً من Intro والودجات القديمة. يستخدم اسم الموقع وأرقام التواصل من إعدادات القالب.',
		),
		array(
			'id'=>'HomeIntro',
			'type'=>'Widget-Selector',
			'ModelCenter'=>'intro-models',
			'create_fields'=>true,
			'select_field'=>array(
				'type'=>'Select',
				'id' => 'SelectedModel',
				'parent_id'=>'HomeIntro',
				'title' =>'إعدادات Intro',
				'selected_shows'=>true,
			)
		),

		array(
			'id'=>'widgets_home__meta',
			'type'=>'Widgets',
			'title'=>'محتوي الصفحة الرئيسية ',
			'ModelCenter'=>'Standard',
			'update__type'=>'option',
		)
	)
);