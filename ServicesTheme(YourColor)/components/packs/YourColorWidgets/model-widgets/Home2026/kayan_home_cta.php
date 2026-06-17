<?/**
 * Homepage 2026 — CTA
 */
class kayan_home_cta extends Kayan_Home_Section_Widget {

	protected $section_slug = 'cta';
	protected $widget_title = 'دعوة للإجراء النهائية';
	protected $widget_description = 'أزرار التواصل وشارات الثقة';
	protected $structured_section = true;

	protected function section_fields() {
		return kayan_home_cta_fields();
	}
}
(new kayan_home_cta)->Setup();
