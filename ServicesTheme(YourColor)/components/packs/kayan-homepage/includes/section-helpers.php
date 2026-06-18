<?
/**
 * عناصر عرض مشتركة لأقسام Home2026 الديناميكية.
 */

if ( ! function_exists( 'kayan_home_section_title_html' ) ) {
	function kayan_home_section_title_html( $html ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- limited span markup from admin.
		echo $html;
	}
}

if ( ! function_exists( 'kayan_home_render_shead' ) ) {
	function kayan_home_render_shead( $vars, $tag, $title, $subtitle ) {
		$tag      = kayan_home_h( $vars, 'section_tag', $tag );
		$title    = kayan_home_h( $vars, 'section_title', $title );
		$subtitle = kayan_home_h( $vars, 'section_subtitle', $subtitle );
		echo '<div class="shead rv">';
		if ( $tag !== '' ) {
			echo '<span class="tag">' . esc_html( $tag ) . '</span>';
		}
		if ( $title !== '' ) {
			echo '<h2>';
			kayan_home_section_title_html( wp_kses_post( $title ) );
			echo '</h2>';
		}
		if ( $subtitle !== '' ) {
			echo '<p>' . esc_html( $subtitle ) . '</p>';
		}
		echo '</div>';
	}
}

if ( ! function_exists( 'kayan_home_render_img_or_icon' ) ) {
	function kayan_home_render_img_or_icon( $image_url, $icon_html, $class = '' ) {
		if ( ! empty( $image_url ) ) {
			echo '<img src="' . esc_url( $image_url ) . '" alt="" class="' . esc_attr( $class ) . '" loading="lazy" />';
			return;
		}
		if ( ! empty( $icon_html ) ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $icon_html;
			return;
		}
		echo '<i class="fas fa-image"></i>';
	}
}

if ( ! function_exists( 'kayan_home_sorted_group' ) ) {
	function kayan_home_sorted_group( $vars, $key ) {
		if ( empty( $vars[ $key ] ) || ! is_array( $vars[ $key ] ) ) {
			return array();
		}
		$items = $vars[ $key ];
		if ( function_exists( 'Sort__this__list' ) ) {
			$items = Sort__this__list( $items );
		}
		return $items;
	}
}

if ( ! function_exists( 'kayan_home_parse_link_lines' ) ) {
	function kayan_home_parse_link_lines( $text ) {
		$out  = array();
		$text = (string) $text;
		foreach ( preg_split( '/\r\n|\r|\n/', $text ) as $line ) {
			$line = trim( $line );
			if ( $line === '' ) {
				continue;
			}
			$parts = explode( '|', $line, 2 );
			$out[] = array(
				'title' => isset( $parts[0] ) ? trim( $parts[0] ) : '',
				'url'   => isset( $parts[1] ) ? trim( $parts[1] ) : '#',
			);
		}
		return $out;
	}
}

if ( ! function_exists( 'kayan_home_render_counter_attr' ) ) {
	function kayan_home_render_counter_attr( $item ) {
		$value = isset( $item['value'] ) ? $item['value'] : '';
		if ( $value === '' ) {
			return '';
		}
		if ( ! empty( $item['use_counter'] ) && $item['use_counter'] === 'on' && is_numeric( $value ) ) {
			$attr = ' data-count="' . esc_attr( $value ) . '"';
			if ( ! empty( $item['suffix'] ) ) {
				$attr .= ' data-suffix="' . esc_attr( $item['suffix'] ) . '"';
			}
			if ( ! empty( $item['decimals'] ) ) {
				$attr .= ' data-dec="' . esc_attr( $item['decimals'] ) . '"';
			}
			return $attr;
		}
		if ( is_numeric( $value ) ) {
			$attr = ' data-count="' . esc_attr( $value ) . '"';
			if ( ! empty( $item['suffix'] ) ) {
				$attr .= ' data-suffix="' . esc_attr( $item['suffix'] ) . '"';
			}
			if ( ! empty( $item['decimals'] ) ) {
				$attr .= ' data-dec="' . esc_attr( $item['decimals'] ) . '"';
			}
			return $attr;
		}
		return '';
	}
}

if ( ! function_exists( 'kayan_home_switch_on' ) ) {
	function kayan_home_switch_on( $value ) {
		return $value === 'on' || $value === true || $value === '1';
	}
}

if ( ! function_exists( 'kayan_home_layout_widget_ids' ) ) {
	function kayan_home_layout_widget_ids() {
		return array( 'kayan_home_header', 'kayan_home_footer', 'kayan_home_mobile_bar' );
	}
}

if ( ! function_exists( 'kayan_home_filter_content_widgets' ) ) {
	function kayan_home_filter_content_widgets( $widgets ) {
		if ( ! is_array( $widgets ) ) {
			return array();
		}
		$skip = kayan_home_layout_widget_ids();
		$out  = array();
		foreach ( $widgets as $key => $row ) {
			if ( empty( $row['widget_id'] ) || in_array( $row['widget_id'], $skip, true ) ) {
				continue;
			}
			$out[ $key ] = $row;
		}
		return $out;
	}
}

if ( ! function_exists( 'kayan_home_data_driven_slugs' ) ) {
	function kayan_home_data_driven_slugs() {
		return array( 'services', 'blog', 'projects', 'areas', 'team', 'ba', 'faq', 'pricing' );
	}
}
