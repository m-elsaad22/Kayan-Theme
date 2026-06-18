<?/**
 * Homepage 2026 — التقييمات
 */
class kayan_home_reviews extends Kayan_Home_Section_Widget {

	protected $section_slug = 'reviews';
	protected $widget_title = 'التقييمات';
	protected $widget_description = 'بطاقات آراء العملاء';
	protected $structured_section = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'آراء العملاء', 'آراء عملائنا', 'تقييمات موثقة من Google.' );
		return array_merge( $fields, kayan_home_reviews_fields() );
	}
}
(new kayan_home_reviews)->Setup();
