<?
if ( ! function_exists( 'kayan_home_widget_visibility_fields' ) ) {
	function kayan_home_widget_visibility_fields() {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'إظهار القسم',
			),
			array(
				'id'    => 'hide_section__switch',
				'type'  => 'SwitchBox',
				'title' => 'إخفاء على الكمبيوتر',
			),
			array(
				'id'    => 'mobile_hide_section__switch',
				'type'  => 'SwitchBox',
				'title' => 'إخفاء على الجوال',
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_section_header_fields' ) ) {
	function kayan_home_section_header_fields( $tag_default = '', $title_default = '', $subtitle_default = '' ) {
		return array(
			array(
				'type'  => 'Title',
				'title' => 'عنوان القسم',
			),
			array(
				'id'    => 'section_tag',
				'type'  => 'Text',
				'title' => 'الوسم (tag)',
				'value' => $tag_default,
			),
			array(
				'id'    => 'section_title',
				'type'  => 'TextArea',
				'title' => 'العنوان الرئيسي',
				'value' => $title_default,
			),
			array(
				'id'    => 'section_subtitle',
				'type'  => 'TextArea',
				'title' => 'النص الفرعي',
				'value' => $subtitle_default,
			),
		);
	}
}

if ( ! function_exists( 'kayan_home_items_group_field' ) ) {
	function kayan_home_items_group_field( $id, $title, $sub_fields ) {
		return array(
			'id'         => $id,
			'type'       => 'GroupsField',
			'title'      => $title,
			'sortable'   => true,
			'add_more'   => true,
			'fields'     => $sub_fields,
		);
	}
}
