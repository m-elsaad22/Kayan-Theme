<?/**
 * Homepage 2026 — شاشة التحميل
 */
class kayan_home_loader extends Kayan_Home_Section_Widget {

	protected $section_slug = 'loader';
	protected $widget_title = 'شاشة التحميل';
	protected $widget_description = 'شعار التحميل عند فتح الصفحة';
	protected $structured_section = true;

	protected function section_fields() {
		return kayan_home_loader_fields();
	}
}
(new kayan_home_loader)->Setup();
