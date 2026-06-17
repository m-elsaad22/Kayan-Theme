<?/**
 * Homepage 2026 — شريط الثقة
 */
class kayan_home_trustbar extends Kayan_Home_Section_Widget {

	protected $section_slug = 'trustbar';
	protected $widget_title = 'شريط الثقة';
	protected $widget_description = 'نقاط ثقة سريعة تحت الهيرو';
	protected $structured_section = true;

	protected function section_fields() {
		return kayan_home_trustbar_fields();
	}
}
(new kayan_home_trustbar)->Setup();
