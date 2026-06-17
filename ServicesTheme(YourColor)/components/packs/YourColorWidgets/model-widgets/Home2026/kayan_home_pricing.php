<?/**
 * Homepage 2026 — دليل الأسعار
 */
class kayan_home_pricing extends Kayan_Home_Section_Widget {

	protected $section_slug = 'pricing';
	protected $widget_title = 'دليل الأسعار';
	protected $widget_description = 'بطاقات الأسعار';

	protected function section_fields() {
		$fields = array(
			array(
				'type'  => 'Title',
				'title' => 'محتوى القسم',
				'disc'  => 'اترك الحقول فارغة لاستخدام التصميم الافتراضي لركن التطور. التعديلات المتقدمة لكل حقل ستُضاف تدريجياً — يمكنك إخفاء القسم أو إعادة ترتيبه من تبويب الرئيسية ونظام التصميم.',
			),
		);
		if ( function_exists( 'kayan_home_section_header_fields' ) && ! in_array( 'pricing', array( 'loader', 'header', 'footer', 'mobile-bar', 'trustbar', 'atb' ), true ) ) {
			$fields = array_merge( $fields, kayan_home_section_header_fields() );
		}
		if ( function_exists( 'kayan_home_items_group_field' ) ) {
			$fields[] = kayan_home_items_group_field(
				'items',
				'عناصر القسم (اختياري)',
				array(
					array( 'id' => 'icon', 'type' => 'Text', 'title' => 'أيقونة FA', 'disc' => 'مثال: fas fa-star' ),
					array( 'id' => 'title', 'type' => 'Text', 'title' => 'العنوان' ),
					array( 'id' => 'content', 'type' => 'TextArea', 'title' => 'النص / الوصف' ),
					array( 'id' => 'url', 'type' => 'Text', 'title' => 'الرابط' ),
				)
			);
		}
		return $fields;
	}
}
(new kayan_home_pricing)->Setup();
