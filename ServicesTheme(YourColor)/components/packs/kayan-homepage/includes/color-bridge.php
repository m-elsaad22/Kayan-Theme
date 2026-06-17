<?
/**
 * ربط ألوان إعدادات القالب (--uicolor) بلوحة تصميم الرئيسية 2026.
 */

if ( ! function_exists( 'kayan_home_sanitize_hex' ) ) {
	function kayan_home_sanitize_hex( $hex, $fallback = '#1AB8B8' ) {
		$hex = trim( (string) $hex );
		if ( preg_match( '/^#([a-fA-F0-9]{3}|[a-fA-F0-9]{6})$/', $hex ) ) {
			return $hex;
		}
		return $fallback;
	}
}

if ( ! function_exists( 'kayan_home_hex_to_rgb' ) ) {
	function kayan_home_hex_to_rgb( $hex ) {
		$hex = ltrim( kayan_home_sanitize_hex( $hex ), '#' );
		if ( strlen( $hex ) === 3 ) {
			$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
		}
		return array(
			'r' => hexdec( substr( $hex, 0, 2 ) ),
			'g' => hexdec( substr( $hex, 2, 2 ) ),
			'b' => hexdec( substr( $hex, 4, 2 ) ),
		);
	}
}

if ( ! function_exists( 'kayan_home_mix_hex' ) ) {
	function kayan_home_mix_hex( $hex_a, $hex_b, $weight_b = 0.5 ) {
		$a   = kayan_home_hex_to_rgb( $hex_a );
		$b   = kayan_home_hex_to_rgb( $hex_b );
		$w   = max( 0, min( 1, (float) $weight_b ) );
		$inv = 1 - $w;
		$r   = (int) round( $a['r'] * $inv + $b['r'] * $w );
		$g   = (int) round( $a['g'] * $inv + $b['g'] * $w );
		$bl  = (int) round( $a['b'] * $inv + $b['b'] * $w );
		return sprintf( '#%02x%02x%02x', $r, $g, $bl );
	}
}

if ( ! function_exists( 'kayan_home_color_tokens' ) ) {
	function kayan_home_color_tokens() {
		$brand = kayan_home_sanitize_hex( yc_get_option( 'site_color' ), '#1AB8B8' );
		$text  = kayan_home_sanitize_hex( yc_get_option( 'text_Color' ), '#1C2E44' );
		$navy  = kayan_home_mix_hex( '#0A1F4E', $brand, 0.22 );
		$navy2 = kayan_home_mix_hex( '#1A3A6B', $brand, 0.35 );
		$blue  = kayan_home_mix_hex( '#2980D4', $brand, 0.45 );
		$gold  = '#F4A428';

		return array(
			'brand' => $brand,
			'text'  => $text,
			'navy'  => $navy,
			'navy2' => $navy2,
			'blue'  => $blue,
			'turq'  => $brand,
			'aqua'  => kayan_home_mix_hex( $brand, '#00D4D4', 0.35 ),
			'gold'  => $gold,
			'bg'    => kayan_home_mix_hex( '#F4F8FD', $brand, 0.06 ),
			'footer'=> kayan_home_mix_hex( '#071226', $brand, 0.18 ),
		);
	}
}

if ( ! function_exists( 'kayan_home_color_bridge_css' ) ) {
	function kayan_home_color_bridge_css() {
		if ( ! function_exists( 'kayan_home_v2026_active' ) || ! kayan_home_v2026_active() ) {
			return '';
		}
		$c = kayan_home_color_tokens();
		$css = 'body.kayan-homepage-v3,body.kayan-homepage-v3 .kayan-home-2026-main{';
		$css .= '--uicolor:' . esc_attr( $c['brand'] ) . ';';
		$css .= '--primary-text:' . esc_attr( $c['text'] ) . ';';
		$css .= '--navy:' . esc_attr( $c['navy'] ) . ';';
		$css .= '--navy2:' . esc_attr( $c['navy2'] ) . ';';
		$css .= '--blue:' . esc_attr( $c['blue'] ) . ';';
		$css .= '--turq:' . esc_attr( $c['turq'] ) . ';';
		$css .= '--aqua:' . esc_attr( $c['aqua'] ) . ';';
		$css .= '--gold:' . esc_attr( $c['gold'] ) . ';';
		$css .= '--text:' . esc_attr( $c['text'] ) . ';';
		$css .= '--bg:' . esc_attr( $c['bg'] ) . ';';
		$css .= '--kayan-footer-bg:' . esc_attr( $c['footer'] ) . ';';
		$css .= '--grad:linear-gradient(135deg,var(--navy) 0%,var(--navy2) 45%,var(--turq) 100%);';
		$css .= '--grad-cta:linear-gradient(135deg,var(--blue),var(--turq));';
		$css .= '}';
		return $css;
	}
}
