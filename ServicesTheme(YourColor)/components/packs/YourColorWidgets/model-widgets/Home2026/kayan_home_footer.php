<?/**
 * الفوتر يُدار من إعدادات القالب → إعدادات الفوتر.
 */
class kayan_home_footer extends Kayan_Home_Section_Widget {

	protected $section_slug = 'footer';
	protected $layout_widget = true;

	protected function section_fields() {
		return array();
	}
}
(new kayan_home_footer)->Setup();
