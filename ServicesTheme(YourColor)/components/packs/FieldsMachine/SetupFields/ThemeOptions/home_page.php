<?
$HomeIntro__value = yc_get_option('HomeIntro');
$HomeIntro__value = ( is_array( $HomeIntro__value ) ) ? $HomeIntro__value : array();

$widgets_home__value = yc_get_option('widgets_home__meta');
$widgets_home__value = ( is_array( $widgets_home__value ) ) ? $widgets_home__value : array();

$metaboxes = array(
	'title'    => ' الرئيسية ',
	'en_title'  => 'HOME OPTIONS',
	'icon'    => '<i class="fa-regular fa-house-chimney"></i>',
	'number'=>4,
	'disc'=>'اعدادات شكل الصفحة الرئيسية ',
	'fields'  => array(
		array(
			'id'=>'HomeIntro',
			'type'=>'Widget-Selector',
			'ModelCenter'=>'intro-models',
			'create_fields'=>true,
			'important_value'=>true,
			'value'=>$HomeIntro__value,
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
			'important_value'=>true,
			'value'=>$widgets_home__value,
		)
	)
);
