<?/**
 * Homepage 2026 — قصص النجاح
 */
class kayan_home_cases extends Kayan_Home_Section_Widget {

	protected $section_slug = 'cases';
	protected $widget_title = 'قصص النجاح';
	protected $widget_description = 'قصص يدوية أو من مشاريع works';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'قصص النجاح', 'قصص نجاح حقيقية من <span>مشاريعنا</span>', '' );
		return array_merge( $fields, kayan_home_cases_fields() );
	}
}
(new kayan_home_cases)->Setup();
