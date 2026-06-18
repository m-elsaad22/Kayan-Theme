<?
/**
 * ألوان القالب — تُقرأ من لوحة التحكم فقط (بدون فرض ألوان من الكود).
 */

if ( ! function_exists( 'kayan_home_sanitize_hex' ) ) {
	function kayan_home_sanitize_hex( $hex, $fallback = '' ) {
		$hex = trim( (string) $hex );
		if ( preg_match( '/^#([a-fA-F0-9]{3}|[a-fA-F0-9]{6})$/', $hex ) ) {
			return $hex;
		}
		return $fallback;
	}
}

if ( ! function_exists( 'kayan_theme_color_map' ) ) {
	/**
	 * option_id => CSS variable (فارغ في لوحة التحكم = اللون الافتراضي من ملفات CSS).
	 */
	function kayan_theme_color_map() {
		return array(
			// قالب عام
			'site_color'               => array( 'var' => '--uicolor', 'scope' => 'body' ),
			'text_Color'               => array( 'var' => '--primary-text', 'scope' => 'body' ),
			'kayan_secondary_text'     => array( 'var' => '--secondarytext', 'scope' => 'body' ),
			'kayan_footer_bg'          => array( 'var' => '--kayan-footer-bg', 'scope' => 'body' ),
			'kayan_header_scrolled_bg' => array( 'var' => '--kayan-header-scrolled-bg', 'scope' => 'body' ),
			'kayan_header_hero_text'   => array( 'var' => '--kayan-header-hero-text', 'scope' => 'body' ),
			// الرئيسية 2026
			'kayan_home_navy'          => array( 'var' => '--navy', 'scope' => 'home' ),
			'kayan_home_navy2'         => array( 'var' => '--navy2', 'scope' => 'home' ),
			'kayan_home_blue'          => array( 'var' => '--blue', 'scope' => 'home' ),
			'kayan_home_turq'          => array( 'var' => '--turq', 'scope' => 'home' ),
			'kayan_home_aqua'          => array( 'var' => '--aqua', 'scope' => 'home' ),
			'kayan_home_gold'          => array( 'var' => '--gold', 'scope' => 'home' ),
			'kayan_home_bg'            => array( 'var' => '--bg', 'scope' => 'home' ),
			'kayan_home_text'          => array( 'var' => '--text', 'scope' => 'home' ),
			'kayan_home_text2'         => array( 'var' => '--text2', 'scope' => 'home' ),
			'kayan_home_border'        => array( 'var' => '--border', 'scope' => 'home' ),
			'kayan_home_footer_bg'     => array( 'var' => '--kayan-home-footer-bg', 'scope' => 'home' ),
			'kayan_home_success'       => array( 'var' => '--success', 'scope' => 'home' ),
			'kayan_home_wa'            => array( 'var' => '--wa', 'scope' => 'home' ),
		);
	}
}

if ( ! function_exists( 'kayan_theme_colors_css' ) ) {
	function kayan_theme_colors_css() {
		$body_vars = array();
		$home_vars = array();

		foreach ( kayan_theme_color_map() as $option_id => $cfg ) {
			$raw = yc_get_option( $option_id );
			if ( $raw === '' || $raw === null ) {
				continue;
			}
			$val = kayan_home_sanitize_hex( $raw, $raw );
			if ( $val === '' ) {
				continue;
			}
			if ( $cfg['scope'] === 'home' ) {
				$home_vars[ $cfg['var'] ] = $val;
			} else {
				$body_vars[ $cfg['var'] ] = $val;
			}
		}

		$css = '';

		if ( ! empty( $body_vars ) ) {
			$css .= 'body{';
			foreach ( $body_vars as $var => $val ) {
				$css .= $var . ':' . esc_attr( $val ) . ';';
			}
			$css .= '}';
		}

		if ( ! empty( $home_vars ) ) {
			$css .= 'body.kayan-homepage-v3,body.kayan-homepage-v3 .kayan-home-2026-main{';
			foreach ( $home_vars as $var => $val ) {
				$css .= $var . ':' . esc_attr( $val ) . ';';
			}
			if ( isset( $home_vars['--navy'] ) || isset( $home_vars['--navy2'] ) || isset( $home_vars['--turq'] ) ) {
				$css .= '--grad:linear-gradient(135deg,var(--navy) 0%,var(--navy2) 45%,var(--turq) 100%);';
			}
			if ( isset( $home_vars['--blue'] ) || isset( $home_vars['--turq'] ) ) {
				$css .= '--grad-cta:linear-gradient(135deg,var(--blue),var(--turq));';
			}
			$css .= '}';
		}

		if ( ! empty( $body_vars['--kayan-footer-bg'] ) ) {
			$css .= '.--YC-footer--,footer .Yc--footer,.Yc--footer{background:var(--kayan-footer-bg)!important;}';
		}

		if ( ! empty( $home_vars['--kayan-home-footer-bg'] ) ) {
			$css .= 'body.kayan-homepage-v3 .kayan-home-2026-main footer{background:var(--kayan-home-footer-bg)!important;}';
		}

		return $css;
	}
}

if ( ! function_exists( 'kayan_theme_enqueue_colors' ) ) {
	function kayan_theme_enqueue_colors() {
		if ( is_admin() ) {
			return;
		}
		$css = kayan_theme_colors_css();
		if ( $css === '' ) {
			return;
		}
		wp_register_style( 'kayan-theme-colors', false );
		wp_enqueue_style( 'kayan-theme-colors' );
		wp_add_inline_style( 'kayan-theme-colors', $css );
	}
}
