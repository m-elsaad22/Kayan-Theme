<?/**
 * Homepage 2026 — محدد الخدمة
 */
class kayan_home_finder extends Kayan_Home_Section_Widget {

	protected $section_slug = 'finder';
	protected $widget_title = 'محدد الخدمة الذكي';
	protected $widget_description = 'اختيار الخدمة والإمارة من التصنيفات أو يدوياً';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'ابدأ الآن', 'ما الخدمة التي <span>تحتاجها؟</span>', 'اختر الخدمة والإمارة واحصل على عرض سعر فوري.' );
		return array_merge( $fields, kayan_home_finder_fields() );
	}
}
(new kayan_home_finder)->Setup();
