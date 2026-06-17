<?
$metaboxes['works__metabox'] = array(
	'title'    => 'مميزات الخطة ',
	'fields' => array(
        array(
            'id'=> 'client__name',
            'type'=>'Text',
            'title'=>'اسم العميل',
        ),
        array(
            'id'=> 'services__type',
            'type'=>'Text',
            'title'=>'تحديد نوع الخدمة',
        ),

        array(
            'id'=> 'services__rate',
            'type'=>'Number',
            'title'=>'تقييم الخدمة',
        ),
        array(
            'id'=> 'works_gallery',
            'type'=>'File',
            'title'=>'البوم الصور',
            'multiple'=>true,
        ),
        array(
            'id'=> 'before_image',
            'type'=>'File',
            'title'=>'صورة قبل',
        ),
        array(
            'id'=> 'after_image',
            'type'=>'File',
            'title'=>'صورة بعد',
        ),
	)
);