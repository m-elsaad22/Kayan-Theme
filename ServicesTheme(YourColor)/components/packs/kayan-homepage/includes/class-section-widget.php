<?
if ( ! class_exists( 'Kayan_Home_Section_Widget' ) ) {
	abstract class Kayan_Home_Section_Widget extends YC__WidgetsMachine {

		protected $section_slug = '';
		protected $widget_title = '';
		protected $widget_description = '';

		public function __construct() {
			$this->widget__name = $this->get_widget_id();
			$this->folder__name = basename( __DIR__ );
		}

		public function get_widget_id() {
			return 'kayan_home_' . $this->section_slug;
		}

		public function widget__ui( $vars ) {
			kayan_home_render_section( $this->section_slug, $vars );
		}

		public function widget__setup() {
			global $yc__widgets__center;
			$fields = $this->section_fields();
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
	}
}
