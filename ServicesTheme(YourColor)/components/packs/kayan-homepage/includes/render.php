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
		$file = get_template_directory() . '/components/packs/kayan-homepage/template-parts/sections/' . $slug . '.php';
		if ( ! file_exists( $file ) ) {
			return;
		}
		$vars = is_array( $vars ) ? $vars : array();
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
		$classes = array( 'kayan-homepage-v3', 'kayan-homepage-rukn' );
		if ( function_exists( 'kayan_ui_show_call_button' ) && ! kayan_ui_show_call_button() ) {
			$classes[] = 'kayan-no-content-call';
		}
		if ( function_exists( 'kayan_ui_show_floating_call_button' ) && ! kayan_ui_show_floating_call_button( 0, false ) ) {
			$classes[] = 'kayan-no-floating-call';
		}
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'kayan_home_document_open' ) ) {
	function kayan_home_document_open() {
		$theme_color = '#0A1F4E';
		?><!DOCTYPE html>
<html <?php language_attributes(); ?> lang="ar" dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="<?php echo esc_attr( $theme_color ); ?>">
	<?php wp_head(); ?>
</head>
<body class="<?php echo esc_attr( kayan_home_body_classes() ); ?>">
		<?php
	}
}

if ( ! function_exists( 'kayan_home_document_close' ) ) {
	function kayan_home_document_close() {
		wp_footer();
		?></body>
</html>
		<?php
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

if ( ! function_exists( 'kayan_home_v2026_render_page' ) ) {
	function kayan_home_v2026_render_page( $home_widgets ) {
		$show_intro = false;
		$home_intro = array();
		$queue      = function_exists( 'kayan_get_homepage_render_queue' )
			? kayan_get_homepage_render_queue( $home_intro, $home_widgets, $show_intro )
			: array();

		kayan_home_document_open();

		if ( ! empty( $queue ) ) {
			$machine = new YC__WidgetsMachine();
			foreach ( $queue as $section ) {
				if ( $section['type'] === 'widget' && ! empty( $section['data'] ) ) {
					$key  = isset( $section['key'] ) ? $section['key'] : '';
					$data = array( $key => $section['data'] );
					kayan_home_render_widgets_ui( $data, 'home_widgets' );
				}
			}
		} else {
			kayan_home_render_widgets_ui( $home_widgets, 'home_widgets' );
		}

		kayan_home_document_close();
		die();
	}
}
