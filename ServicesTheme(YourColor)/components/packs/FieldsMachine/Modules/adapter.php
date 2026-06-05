<?php
class Kayan_ThemeOptions_Modules_Adapter {
	private $modules;
	private $views_path;

	function __construct( $args = array() ) {
		$this->modules = kayan_theme_options_modules_registry();
		$this->modules = $this->sort_modules( $this->modules );
		$this->views_path = trailingslashit( dirname( __FILE__ ) ) . 'views/';

		if( isset( $args['views_path'] ) && !empty( $args['views_path'] ) ) {
			$this->views_path = trailingslashit( $args['views_path'] );
		}
	}

	private function sort_modules( $modules ) {
		$return = array();
		$numbers = array();
		foreach ( ( is_array( $modules ) ) ? $modules : array() as $module_id => $module ) {
			$order = ( isset( $module['number'] ) && is_numeric( $module['number'] ) ) ? (int) $module['number'] : 100;
			while( isset( $numbers[ $order ] ) ) {
				$order++;
			}
			$numbers[ $order ] = $module_id;
		}
		ksort( $numbers );
		foreach ( $numbers as $module_id ) {
			$return[ $module_id ] = $modules[ $module_id ];
		}
		return $return;
	}

	public function modules() {
		return $this->modules;
	}

	public function module_slug( $module_id ) {
		return 'yts-module-' . $module_id;
	}

	public function normalize_page_request( $page ) {
		$page = ( is_string( $page ) ) ? $page : '';
		$page = strtolower( $page );
		if( strpos( $page, 'yts-module-' ) === 0 ) {
			return str_replace( 'yts-module-', '', $page );
		}
		if( strpos( $page, 'yts-' ) === 0 ) {
			return str_replace( 'yts-', '', $page );
		}
		if( $page == 'yts' || $page == '' ) {
			return '';
		}
		return $page;
	}

	public function is_module_request( $page ) {
		$page = ( is_string( $page ) ) ? strtolower( $page ) : '';
		if( strpos( $page, 'yts-module-' ) === 0 ) {
			return true;
		}
		$page = $this->normalize_page_request( $page );
		return isset( $this->modules[ $page ] );
	}

	public function pages_for_module( $module_id, $fields_setup ) {
		$pages = array();
		if( !isset( $this->modules[ $module_id ] ) ) {
			return $pages;
		}
		foreach ( ( isset( $this->modules[ $module_id ]['pages'] ) && is_array( $this->modules[ $module_id ]['pages'] ) ) ? $this->modules[ $module_id ]['pages'] : array() as $page_key ) {
			if( isset( $fields_setup[ $page_key ] ) ) {
				$pages[ $page_key ] = $fields_setup[ $page_key ];
			}
		}
		return $pages;
	}

	public function module_for_page( $page, $fields_setup = array() ) {
		$page = $this->normalize_page_request( $page );
		if( isset( $this->modules[ $page ] ) ) {
			return $page;
		}
		foreach ( $this->modules as $module_id => $module ) {
			$pages = ( isset( $module['pages'] ) && is_array( $module['pages'] ) ) ? $module['pages'] : array();
			if( in_array( $page, $pages ) ) {
				return $module_id;
			}
		}
		foreach ( $this->modules as $module_id => $module ) {
			if( !empty( $this->pages_for_module( $module_id, $fields_setup ) ) ) {
				return $module_id;
			}
		}
		return 'general';
	}

	public function first_page_for_module( $module_id, $fields_setup ) {
		$pages = $this->pages_for_module( $module_id, $fields_setup );
		foreach ( $pages as $page_key => $page_data ) {
			return $page_key;
		}
		foreach ( ( is_array( $fields_setup ) ) ? $fields_setup : array() as $page_key => $page_data ) {
			return $page_key;
		}
		return '';
	}

	public function default_page( $fields_setup ) {
		foreach ( $this->modules as $module_id => $module ) {
			$page = $this->first_page_for_module( $module_id, $fields_setup );
			if( !empty( $page ) && isset( $fields_setup[ $page ] ) ) {
				return $page;
			}
		}
		foreach ( ( is_array( $fields_setup ) ) ? $fields_setup : array() as $page_key => $page_data ) {
			return $page_key;
		}
		return '';
	}

	public function resolve_page( $requested_page, $fields_setup ) {
		$requested_page = $this->normalize_page_request( $requested_page );
		if( isset( $fields_setup[ $requested_page ] ) ) {
			return $requested_page;
		}
		if( isset( $this->modules[ $requested_page ] ) ) {
			return $this->first_page_for_module( $requested_page, $fields_setup );
		}
		return $this->default_page( $fields_setup );
	}

	public function module_admin_url( $module_id ) {
		return admin_url( 'admin.php?page=' . $this->module_slug( $module_id ) );
	}

	public function page_admin_url( $page_key ) {
		return admin_url( 'admin.php?page=yts-' . strtolower( $page_key ) );
	}

	public function module_label( $module ) {
		if( is_rtl() && isset( $module['title'] ) ) {
			return $module['title'];
		}
		return ( isset( $module['en_title'] ) ) ? $module['en_title'] : $module['title'];
	}

	public function page_label( $page_data ) {
		if( is_rtl() && isset( $page_data['title'] ) ) {
			return $page_data['title'];
		}
		return ( isset( $page_data['en_title'] ) ) ? $page_data['en_title'] : $page_data['title'];
	}

	public function render_navigation( $fields_setup, $active_page ) {
		$adapter = $this;
		$modules = $this->modules();
		$active_module_id = $this->module_for_page( $active_page, $fields_setup );
		$module_pages = $this->pages_for_module( $active_module_id, $fields_setup );

		$sidebar = $this->views_path . 'module-sidebar.php';
		$tabs = $this->views_path . 'module-tabs.php';
		$section = $this->views_path . 'module-section.php';

		if( file_exists( $sidebar ) ) {
			require $sidebar;
		}
		if( file_exists( $tabs ) ) {
			require $tabs;
		}
		if( file_exists( $section ) ) {
			require $section;
		}
	}
}
