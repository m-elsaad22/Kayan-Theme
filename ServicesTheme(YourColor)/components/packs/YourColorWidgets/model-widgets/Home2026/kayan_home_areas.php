<?/**
 * Homepage 2026 — المناطق
 */
class kayan_home_areas extends Kayan_Home_Section_Widget {

	protected $section_slug = 'areas';
	protected $widget_title = 'مناطق الخدمة';
	protected $widget_description = 'مدن الخدمة من تصنيف city مع الصور';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'مناطق الخدمة', 'خدماتنا في جميع <span>إمارات الدولة</span>', 'أينما كنت في الإمارات، فريقنا قريب منك.' );
		return array_merge( $fields, kayan_home_city_query_fields() );
	}
}
(new kayan_home_areas)->Setup();
