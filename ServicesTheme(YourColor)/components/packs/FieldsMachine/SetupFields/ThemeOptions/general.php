<?
$metaboxes = array(
	'title'    => 'الإعدادات العامة',
	'en_title'  => 'General settings',
	'icon'    => '<i class="fal fa-sliders-h"></i>',
	'number'=>1,
	'disc'  => 'لون الموقع (#1AB8B8 تركواز) يُطبَّق على الأزرار والروابط. الفوتر بلون أزرق داكن متناسق مع التصميم.',
	'fields'  => array(
		array(
			'type'  => 'Title',
			'title' => 'ألوان الموقع الموحّدة',
			'disc'  => '«لون الموقع» يتحكم في الأزرار والهيدر والفوتر والأقسام. «لون الكتابة» للنصوص الرئيسية. يُفضّل اختيار لون قريب من تركواز/أزرق ركن التطور.',
		),
		array(
			'title'  => 'لون الموقع (الأساسي)',
			'en_title'=> 'Choose your own color',
			'type'  => 'Color',
			'id'    => 'site_color',
			'value' => '#1AB8B8',
			'desc'=>'اللون الأساسي للأزرار والروابط والهيدر. الافتراضي: تركواز ركن التطور #1AB8B8. الفوتر يستخدم الأزرق الداكن تلقائياً.'
		),	
		array(
			'title'  => 'تحديد لون الكتابة ',
			'en_title'=> 'Choose your text color',
			'type'  => 'Color',
			'id'    => 'text_Color',
			'desc'=>'إمكانية تحديد لون الكتابة '
		),
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