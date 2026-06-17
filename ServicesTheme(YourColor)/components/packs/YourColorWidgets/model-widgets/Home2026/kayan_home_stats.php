<?/**
 * Homepage 2026 — الإحصائيات
 */
class kayan_home_stats extends Kayan_Home_Section_Widget {

	protected $section_slug = 'stats';
	protected $widget_title = 'قسم الإحصائيات';
	protected $widget_description = 'أرقام مع عداد متحرك';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'أرقامنا', 'أرقام تتحدث عن جودتنا', 'ثقة الآلاف من العملاء.' );
		return array_merge( $fields, kayan_home_stats_fields() );
	}
}
(new kayan_home_stats)->Setup();
