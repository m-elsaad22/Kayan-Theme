<?/**
 * Homepage 2026 — لماذا نحن
 */
class kayan_home_why extends Kayan_Home_Section_Widget {

	protected $section_slug = 'why';
	protected $widget_title = 'لماذا نحن';
	protected $widget_description = 'خطوات الرحلة + بطاقات المميزات';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'لماذا نحن', 'لماذا يختار الآلاف <span>ركن التطور؟</span>', '' );
		return array_merge( $fields, kayan_home_why_fields() );
	}
}
(new kayan_home_why)->Setup();
