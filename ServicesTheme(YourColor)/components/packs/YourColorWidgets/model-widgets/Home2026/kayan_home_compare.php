<?/**
 * Homepage 2026 — المقارنة
 */
class kayan_home_compare extends Kayan_Home_Section_Widget {

	protected $section_slug = 'compare';
	protected $widget_title = 'مقارنة الخدمات';
	protected $widget_description = 'جدول مقارنة مع المنافسين';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'مقارنة', 'لماذا يختار العملاء <span>ركن التطور؟</span>', '' );
		return array_merge( $fields, kayan_home_compare_fields() );
	}
}
(new kayan_home_compare)->Setup();
