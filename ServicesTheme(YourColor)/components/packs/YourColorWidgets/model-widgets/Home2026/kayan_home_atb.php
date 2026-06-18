<?/**
 * Homepage 2026 — عدادات الثقة
 */
class kayan_home_atb extends Kayan_Home_Section_Widget {

	protected $section_slug = 'atb';
	protected $widget_title = 'عدادات الثقة';
	protected $widget_description = 'أرقام متحركة مختصرة';
	protected $structured_section = true;

	protected function section_fields() {
		return kayan_home_atb_fields();
	}
}
(new kayan_home_atb)->Setup();
