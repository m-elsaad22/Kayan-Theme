<?
if ( ! function_exists( 'kayan_home_widgets_use_v2026' ) ) {
	function kayan_home_widgets_use_v2026( $widgets ) {
		if ( ! is_array( $widgets ) || empty( $widgets ) ) {
			return false;
		}
		foreach ( $widgets as $widget ) {
			if ( ! empty( $widget['widget_id'] ) && strpos( $widget['widget_id'], 'kayan_home_' ) === 0 ) {
				return true;
			}
		}
		return false;
	}
}

if ( ! function_exists( 'kayan_home_get_widgets_option' ) ) {
	function kayan_home_get_widgets_option() {
		$widgets = yc_get_option( 'widgets_home__meta' );
		return is_array( $widgets ) ? $widgets : array();
	}
}

if ( ! function_exists( 'kayan_home_v2026_active' ) ) {
	function kayan_home_v2026_active() {
		return is_front_page() && kayan_home_widgets_use_v2026( kayan_home_get_widgets_option() );
	}
}

if ( ! function_exists( 'kayan_home_render_section' ) ) {
	function kayan_home_render_section( $slug, $vars ) {
		$vars = kayan_home_merge_section_vars( $slug, is_array( $vars ) ? $vars : array() );

		$use_manual_html = ! empty( $vars['content_html'] )
			&& ( ! function_exists( 'kayan_home_uses_wordpress_data' ) || ! kayan_home_uses_wordpress_data( $vars ) );

		if ( $use_manual_html ) {
			kayan_home_echo_section_html( $vars['content_html'] );
			return;
		}

		$file = get_template_directory() . '/components/packs/kayan-homepage/template-parts/sections/' . $slug . '.php';
		if ( ! file_exists( $file ) ) {
			return;
		}
		include $file;
	}
}

if ( ! function_exists( 'kayan_home_esc' ) ) {
	function kayan_home_esc( $value ) {
		return esc_html( (string) $value );
	}
}

if ( ! function_exists( 'kayan_home_h' ) ) {
	function kayan_home_h( $vars, $key, $default = '' ) {
		if ( isset( $vars[ $key ] ) && $vars[ $key ] !== '' ) {
			return $vars[ $key ];
		}
		return $default;
	}
}

if ( ! function_exists( 'kayan_home_body_classes' ) ) {
	function kayan_home_body_classes() {
		$classes = array( 'kayan-homepage-v3', 'kayan-homepage-rukn', 'before-start' );
		if ( function_exists( 'kayan_ui_show_call_button' ) && ! kayan_ui_show_call_button() ) {
			$classes[] = 'kayan-no-content-call';
		}
		if ( function_exists( 'kayan_ui_show_floating_call_button' ) && ! kayan_ui_show_floating_call_button( 0, false ) ) {
			$classes[] = 'kayan-no-floating-call';
		}
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'kayan_home_render_widgets_ui' ) ) {
	function kayan_home_render_widgets_ui( $home_widgets, $widget_id_key = 'home_widgets' ) {
		if ( empty( $home_widgets ) ) {
			return;
		}
		$machine = new YC__WidgetsMachine();
		$machine->widgets___UI(
			array(
				'Widgets_data'           => $home_widgets,
				'WidgetID'               => $widget_id_key,
				'Parent__section__class' => 'kayan-home-widgets',
				'Single__section__class' => 'kayan-home-widget',
				'section_InnerRow_class' => 'kayan-home-widget-inner',
			)
		);
	}
}

if ( ! function_exists( 'kayan_home_render_section_queue' ) ) {
	function kayan_home_render_section_queue( $home_widgets ) {
		$show_intro = false;
		$home_intro = array();
		$queue      = function_exists( 'kayan_get_homepage_render_queue' )
			? kayan_get_homepage_render_queue( $home_intro, $home_widgets, $show_intro )
			: array();
		$skip       = function_exists( 'kayan_home_layout_widget_ids' ) ? kayan_home_layout_widget_ids() : array();

		if ( ! empty( $queue ) ) {
			foreach ( $queue as $section ) {
				if ( $section['type'] !== 'widget' || empty( $section['data'] ) ) {
					continue;
				}
				$data = $section['data'];
				if ( ! empty( $data['widget_id'] ) && in_array( $data['widget_id'], $skip, true ) ) {
					continue;
				}
				$key = isset( $section['key'] ) ? $section['key'] : '';
				kayan_home_render_widgets_ui( array( $key => $data ), 'home_widgets' );
			}
			return;
		}

		$filtered = function_exists( 'kayan_home_filter_content_widgets' )
			? kayan_home_filter_content_widgets( $home_widgets )
			: $home_widgets;
		kayan_home_render_widgets_ui( $filtered, 'home_widgets' );
	}
}

if ( ! function_exists( 'kayan_home_v2026_render_page' ) ) {
	function kayan_home_v2026_render_page( $home_widgets ) {
		global $ThemeStatic;
		if ( ! isset( $ThemeStatic ) ) {
			$ThemeStatic = new ThemeStatic();
		}

		$content_widgets = function_exists( 'kayan_home_filter_content_widgets' )
			? kayan_home_filter_content_widgets( $home_widgets )
			: $home_widgets;
		$machine         = new YC__WidgetsMachine();
		$styles          = $machine->widgets__Enqueues( $content_widgets );
		$widgets_list    = $machine->get__widgets__list( $content_widgets );

		$ThemeStatic->Part(
			'header',
			array(
				'Styles'        => $styles,
				'IntroPage'     => true,
				'Widgets__list' => $widgets_list,
				'bodyClass'     => kayan_home_body_classes(),
			)
		);

		echo '<div class="kayan-home-2026-main">';
		kayan_home_render_section_queue( $home_widgets );
		echo '</div>';

		$ThemeStatic->Part(
			'footer',
			array(
				'Styles'        => $styles,
				'Widgets__list' => $widgets_list,
			)
		);
		die();
	}
}
