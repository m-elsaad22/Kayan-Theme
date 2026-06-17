<?/**
 * Homepage 2026 — قبل / بعد
 */
class kayan_home_ba extends Kayan_Home_Section_Widget {

	protected $section_slug = 'ba';
	protected $widget_title = 'قبل / بعد';
	protected $widget_description = 'نتائج من مشاريع works (صور قبل وبعد)';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'قبل وبعد', 'قبل وبعد — <span>نتائج حقيقية</span>', 'اسحب المقبض لرؤية الفرق.' );
		$works  = kayan_home_works_query_fields( 'مشاريع قبل/بعد' );
		$works[1]['value'] = '2';
		return array_merge( $fields, $works );
	}
}
(new kayan_home_ba)->Setup();
