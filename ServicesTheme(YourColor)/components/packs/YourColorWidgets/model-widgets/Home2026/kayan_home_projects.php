<?/**
 * Homepage 2026 — المشاريع
 */
class kayan_home_projects extends Kayan_Home_Section_Widget {

	protected $section_slug = 'projects';
	protected $widget_title = 'المشاريع';
	protected $widget_description = 'سابقة الأعمال (works) مع الصور والفلترة';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'أعمالنا', 'مشاريعنا <span>المنجزة</span>', 'نماذج من مشاريعنا في جميع الإمارات.' );
		return array_merge( $fields, kayan_home_works_query_fields() );
	}
}
(new kayan_home_projects)->Setup();
