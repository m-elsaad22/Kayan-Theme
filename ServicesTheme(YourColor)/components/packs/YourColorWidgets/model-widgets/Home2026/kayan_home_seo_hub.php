<?/**
 * Homepage 2026 — مركز المعرفة SEO
 */
class kayan_home_seo_hub extends Kayan_Home_Section_Widget {

	protected $section_slug = 'seo-hub';
	protected $widget_title = 'محتوى SEO';
	protected $widget_description = 'أعمدة روابط أو تصنيفات خدمات';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'مركز المعرفة', 'دليل الخدمات <span>المنزلية</span>', '' );
		return array_merge( $fields, kayan_home_seo_hub_fields() );
	}
}
(new kayan_home_seo_hub)->Setup();
