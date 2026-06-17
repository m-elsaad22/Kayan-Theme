<?/**
 * Homepage 2026 — الخدمات (تصنيفات)
 */
class kayan_home_services extends Kayan_Home_Section_Widget {

	protected $section_slug = 'services';
	protected $widget_title = 'شبكة الخدمات';
	protected $widget_description = 'تصنيفات الخدمات من لوحة التحكم مع صور التصنيف';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'خدماتنا', 'خدماتنا المنزلية <span>المتكاملة</span>', 'حلول احترافية شاملة تغطي كل احتياجات منزلك أو منشأتك.' );
		return array_merge( $fields, kayan_home_category_query_fields() );
	}
}
(new kayan_home_services)->Setup();
