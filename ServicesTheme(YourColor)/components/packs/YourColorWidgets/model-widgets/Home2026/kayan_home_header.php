<?/**
 * الهيدر يُدار من إعدادات القالب → إعدادات الهيدر (لا يظهر في أقسام الرئيسية).
 */
class kayan_home_header extends Kayan_Home_Section_Widget {

	protected $section_slug = 'header';
	protected $layout_widget = true;

	protected function section_fields() {
		return array();
	}
}
(new kayan_home_header)->Setup();
