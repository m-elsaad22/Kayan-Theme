<?
if ( ! class_exists( 'Kayan_Home_Section_Widget' ) ) {
	abstract class Kayan_Home_Section_Widget extends YC__WidgetsMachine {

		protected $section_slug = '';
		protected $widget_title = '';
		protected $widget_description = '';
		protected $folder__name = 'Home2026';
		protected $data_driven = false;
		protected $layout_widget = false;
		protected $structured_section = false;

		public function __construct() {
			$this->widget__name = $this->get_widget_id();
		}

		public function get_widget_id() {
			return 'kayan_home_' . $this->section_slug;
		}

		public function widget__ui( $vars ) {
			kayan_home_render_section( $this->section_slug, $vars );
		}

		public function widget__setup() {
			if ( $this->layout_widget ) {
				return;
			}
			global $yc__widgets__center;
			$fields = array_merge( $this->base_content_fields(), $this->section_fields() );
			if ( function_exists( 'kayan_home_widget_visibility_fields' ) ) {
				$fields = array_merge( $fields, kayan_home_widget_visibility_fields() );
			}
			$yc__widgets__center[ $this->folder__name ]['Packs'][ $this->widget__name ] = array(
				'id'          => $this->widget__name,
				'title'       => $this->widget_title,
				'description' => $this->widget_description,
				'fields'      => $fields,
			);
		}

		public function Setup() {
			add_action( 'yc__widgets__center', array( $this, 'widget__setup' ) );
		}

		abstract protected function section_fields();

		protected function base_content_fields() {
			if ( $this->data_driven && function_exists( 'kayan_home_data_source_fields' ) ) {
				return kayan_home_data_source_fields();
			}
			if ( $this->structured_section || $this->layout_widget ) {
				return array(
					array(
						'type'  => 'Title',
						'title' => 'تخصيص متقدم',
						'disc'  => 'اختياري — لاستبدال القسم بالكامل بـ HTML.',
					),
				array(
					'id'    => 'content_html',
					'type'  => 'TextArea',
					'title' => 'استبدال HTML كامل',
				),
			);
			}
			return array(
				array(
					'type'  => 'Title',
					'title' => 'تخصيص متقدم',
					'disc'  => 'افتراضياً يُعرض تصميم القسم. لتجاوزه بالكامل أدخل HTML.',
				),
				array(
					'id'    => 'content_html',
					'type'  => 'TextArea',
					'title' => 'استبدال HTML كامل',
				),
			);
		}
	}
}
