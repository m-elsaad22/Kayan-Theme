<?/**
 * Homepage 2026 — العلامات التجارية
 */
class kayan_home_brands extends Kayan_Home_Section_Widget {

	protected $section_slug = 'brands';
	protected $widget_title = 'العلامات التجارية';
	protected $widget_description = 'شعارات الشركاء';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'شركاؤنا', 'شركاؤنا في <span>التميز</span>', '' );
		return array_merge( $fields, kayan_home_brands_fields() );
	}
}
(new kayan_home_brands)->Setup();
