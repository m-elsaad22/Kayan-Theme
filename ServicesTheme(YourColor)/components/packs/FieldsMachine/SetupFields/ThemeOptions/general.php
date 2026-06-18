<?
$metaboxes = array(
	'title'    => 'الإعدادات العامة',
	'en_title'  => 'General settings',
	'icon'    => '<i class="fal fa-sliders-h"></i>',
	'number'=>1,
	'fields'  => array(
		array(
			'title'  => 'إسم الموقع',
			'en_title'=> 'Sitename',
			'type'  => 'Text',
			'id'    => 'sitename',
		),
		array(
			'title'  => 'صورة lazy load',
			'en_title'=> 'lazy load photo',
			'type'  => 'File',
			'id'    => 'lazyload',
			'desc'=>'امكانية وضع صورة قبل التحميل '
		),
		
	)
);