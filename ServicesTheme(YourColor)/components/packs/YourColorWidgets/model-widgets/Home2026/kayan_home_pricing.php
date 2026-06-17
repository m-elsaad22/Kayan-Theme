<?/**
 * Homepage 2026 — الأسعار
 */
class kayan_home_pricing extends Kayan_Home_Section_Widget {

	protected $section_slug = 'pricing';
	protected $widget_title = 'دليل الأسعار';
	protected $widget_description = 'خطط الأسعار من CPT price';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'الأسعار', 'أدلة الأسعار <span>والتكاليف</span>', 'تقديرات شفافة قبل اتخاذ القرار.' );
		return array_merge( $fields, kayan_home_pricing_fields() );
	}
}
(new kayan_home_pricing)->Setup();
