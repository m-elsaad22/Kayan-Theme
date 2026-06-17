<?/**
 * Homepage 2026 — الشهادات
 */
class kayan_home_certs extends Kayan_Home_Section_Widget {

	protected $section_slug = 'certs';
	protected $widget_title = 'الشهادات والتراخيص';
	protected $widget_description = 'تراخيص مع صور ومستندات';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'الموثوقية', 'التراخيص والشهادات <span>والاعتمادات</span>', '' );
		return array_merge( $fields, kayan_home_certs_fields() );
	}
}
(new kayan_home_certs)->Setup();
