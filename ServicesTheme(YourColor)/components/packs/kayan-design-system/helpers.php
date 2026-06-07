<?
if ( ! function_exists( 'kayan_gradient_builder_defaults' ) ) {
	function kayan_gradient_builder_defaults() {
		return array(
			'enabled' => '',
			'type' => 'linear',
			'angle' => '135',
			'radial_shape' => 'circle',
			'radial_position' => 'center',
			'apply_target' => 'body',
			'stops' => array(
				0 => array(
					'color' => '#a03576',
					'position' => '0',
				),
				1 => array(
					'color' => '#2563eb',
					'position' => '100',
				),
			),
		);
	}
}

if ( ! function_exists( 'kayan_normalize_gradient_builder' ) ) {
	function kayan_normalize_gradient_builder( $value ) {
		$defaults = kayan_gradient_builder_defaults();
		if ( ! is_array( $value ) ) {
			return $defaults;
		}

		$value = wp_parse_args( $value, $defaults );

		if ( ! is_array( $value['stops'] ) || empty( $value['stops'] ) ) {
			$value['stops'] = $defaults['stops'];
		}

		$normalized_stops = array();
		foreach ( $value['stops'] as $stop ) {
			if ( ! is_array( $stop ) ) {
				continue;
			}
			$color = isset( $stop['color'] ) ? sanitize_hex_color( $stop['color'] ) : '';
			if ( empty( $color ) ) {
				continue;
			}
			$position = isset( $stop['position'] ) ? floatval( $stop['position'] ) : 0;
			if ( $position < 0 ) {
				$position = 0;
			}
			if ( $position > 100 ) {
				$position = 100;
			}
			$normalized_stops[] = array(
				'color' => $color,
				'position' => (string) $position,
			);
		}

		if ( count( $normalized_stops ) < 2 ) {
			$value['stops'] = $defaults['stops'];
		} else {
			usort(
				$normalized_stops,
				function( $a, $b ) {
					return floatval( $a['position'] ) <=> floatval( $b['position'] );
				}
			);
			$value['stops'] = array_values( $normalized_stops );
		}

		if ( ! in_array( $value['type'], array( 'linear', 'radial' ), true ) ) {
			$value['type'] = 'linear';
		}

		$value['angle'] = (string) max( 0, min( 360, intval( $value['angle'] ) ) );

		if ( ! in_array( $value['radial_shape'], array( 'circle', 'ellipse' ), true ) ) {
			$value['radial_shape'] = 'circle';
		}

		$allowed_positions = array( 'center', 'top', 'bottom', 'left', 'right' );
		if ( ! in_array( $value['radial_position'], $allowed_positions, true ) ) {
			$value['radial_position'] = 'center';
		}

		$allowed_targets = array( 'body', 'header', 'buttons' );
		if ( ! in_array( $value['apply_target'], $allowed_targets, true ) ) {
			$value['apply_target'] = 'body';
		}

		return $value;
	}
}

if ( ! function_exists( 'kayan_gradient_builder_to_css' ) ) {
	function kayan_gradient_builder_to_css( $value ) {
		$value = kayan_normalize_gradient_builder( $value );

		if ( empty( $value['enabled'] ) ) {
			return '';
		}

		$parts = array();
		foreach ( $value['stops'] as $stop ) {
			$parts[] = $stop['color'] . ' ' . floatval( $stop['position'] ) . '%';
		}

		if ( empty( $parts ) ) {
			return '';
		}

		$stops_css = implode( ', ', $parts );

		if ( $value['type'] === 'radial' ) {
			return 'radial-gradient(' . $value['radial_shape'] . ' at ' . $value['radial_position'] . ', ' . $stops_css . ')';
		}

		return 'linear-gradient(' . intval( $value['angle'] ) . 'deg, ' . $stops_css . ')';
	}
}

if ( ! function_exists( 'kayan_get_gradient_builder_option' ) ) {
	function kayan_get_gradient_builder_option() {
		$value = yc_get_option( 'kayan_gradient_builder', array() );
		return kayan_normalize_gradient_builder( $value );
	}
}

if ( ! function_exists( 'kayan_get_global_gradient_css' ) ) {
	function kayan_get_global_gradient_css() {
		return kayan_gradient_builder_to_css( kayan_get_gradient_builder_option() );
	}
}

if ( ! function_exists( 'kayan_render_global_gradient_styles' ) ) {
	function kayan_render_global_gradient_styles() {
		$settings = kayan_get_gradient_builder_option();
		$css = kayan_gradient_builder_to_css( $settings );

		if ( empty( $css ) ) {
			return;
		}

		$target = $settings['apply_target'];
		$selector = 'body.before-start';

		if ( $target === 'header' ) {
			$selector = 'header.-YC-Header-Main';
		} elseif ( $target === 'buttons' ) {
			$selector = '.-YC-Button, .-YC-Button-Primary, button[type="submit"]';
		}

		echo '<style id="kayan-global-gradient">';
			echo esc_html( $selector ) . '{background:' . esc_html( $css ) . ' !important;background-image:' . esc_html( $css ) . ' !important;}';
			echo ':root{--kayan-global-gradient:' . esc_html( $css ) . ';}';
		echo '</style>';
	}
}
