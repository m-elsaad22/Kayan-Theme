<?
$metaboxes['citiesOptions'] = array(
	'title'    => 'إعدادات التصنيف',
	'number'=>1,
	'fields'  => array(
		array(
			'title'  => ' ايقونةالمدينة',
			'type'  => 'TextArea_Code',
			'id'    => 'icon',
		),
		array(
			'title'  => 'صورة المدينة',
			'en_title' => 'City image',
			'type'  => 'File',
			'id'    => 'image_blog_id',
		),
		array(
			'title'  => 'وصف SEO (Meta Description)',
			'en_title' => 'SEO Meta Description',
			'type'  => 'TextArea',
			'id'    => 'kayan_meta_description',
			'disc'  => 'وصف مخصص لصفحة المدينة في محركات البحث (150–160 حرفاً).',
		),
	),
);