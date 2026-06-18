<?/**
 * Homepage 2026 — المدونة
 */
class kayan_home_blog extends Kayan_Home_Section_Widget {

	protected $section_slug = 'blog';
	protected $widget_title = 'معاينة المدونة';
	protected $widget_description = 'مقالات من ووردبريس مع الصور البارزة';
	protected $data_driven = true;

	protected function section_fields() {
		$fields = kayan_home_section_header_fields( 'المدونة', 'مقالات ونصائح <span>مفيدة</span>', 'محتوى متخصص يساعدك على العناية بمنزلك.' );
		return array_merge( $fields, kayan_home_blog_query_fields() );
	}
}
(new kayan_home_blog)->Setup();
