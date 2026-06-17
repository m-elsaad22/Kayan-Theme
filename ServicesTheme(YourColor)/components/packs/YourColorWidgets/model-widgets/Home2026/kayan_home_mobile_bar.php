<?/**
 * شريط الجوال / الاتصال العائم — من إعدادات الفوتر واتصال القالب.
 */
class kayan_home_mobile_bar extends Kayan_Home_Section_Widget {

	protected $section_slug = 'mobile-bar';
	protected $layout_widget = true;

	protected function section_fields() {
		return array();
	}
}
(new kayan_home_mobile_bar)->Setup();
