<?/**
 * Homepage 2026 — الهيرو
 */
class kayan_home_hero extends Kayan_Home_Section_Widget {

	protected $section_slug = 'hero';
	protected $widget_title = 'قسم الهيرو';
	protected $widget_description = 'العنوان، الأزرار، الشارات، لوحة الإحصائيات';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields(
			'',
			'ركن التطور — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في الإمارات',
			'من عزل الأسطح وكشف التسربات إلى صيانة التكييف والتنظيف الاحترافي.'
		);
		return array_merge( $fields, kayan_home_hero_fields() );
	}
}
(new kayan_home_hero)->Setup();
