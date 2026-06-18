<?/**
 * Homepage 2026 — الفريق
 */
class kayan_home_team extends Kayan_Home_Section_Widget {

	protected $section_slug = 'team';
	protected $widget_title = 'فريق الخبراء';
	protected $widget_description = 'أعضاء الفريق من نوع المحتوى «الفريق» مع الصور';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'فريقنا', 'خبراؤنا في <span>خدمتكم</span>', 'فريق معتمد من المتخصصين.' );
		return array_merge( $fields, kayan_home_team_query_fields() );
	}
}
(new kayan_home_team)->Setup();
