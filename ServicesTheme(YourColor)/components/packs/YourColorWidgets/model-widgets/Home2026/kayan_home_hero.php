<?/**
 * Homepage 2026 — قسم الهيرو
 */
class kayan_home_hero extends Kayan_Home_Section_Widget {

	protected $section_slug = 'hero';
	protected $widget_title = 'قسم الهيرو';
	protected $widget_description = 'العنوان، الأزرار، الشارات، لوحة الإحصائيات';

	protected function section_fields() {
		$fields = kayan_home_section_header_fields(
			'',
			'ركن التطور — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في الإمارات',
			'من عزل الأسطح وكشف التسربات إلى صيانة التكييف والتنظيف الاحترافي — فريق معتمد، أجهزة حديثة، وضمان مكتوب.'
		);
		$fields[] = array(
			'id'    => 'dash_title',
			'type'  => 'Text',
			'title' => 'عنوان لوحة الإحصائيات',
			'value' => 'لوحة خدمات ركن التطور',
		);
		return $fields;
	}
}
(new kayan_home_hero)->Setup();
