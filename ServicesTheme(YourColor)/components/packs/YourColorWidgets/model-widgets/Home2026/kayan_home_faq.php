<?/**
 * Homepage 2026 — FAQ
 */
class kayan_home_faq extends Kayan_Home_Section_Widget {

	protected $section_slug = 'faq';
	protected $widget_title = 'الأسئلة الشائعة';
	protected $widget_description = 'من CPT FAQ أو قائمة يدوية';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'الأسئلة الشائعة', 'الأسئلة <span>الشائعة</span>', 'إجابات واضحة لأكثر ما يسأل عنه عملاؤنا.' );
		return array_merge( $fields, kayan_home_faq_fields() );
	}
}
(new kayan_home_faq)->Setup();
