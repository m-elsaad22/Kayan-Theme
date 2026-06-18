<?
/**
 * أدوات ألوان — بدون طبقات شفافة أو خلط يُغيّر التصميم.
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

if ( ! function_exists( 'kayan_theme_palette' ) ) {
	/**
	 * لوحة ألوان ركن التطور 2026 — تُستخدم كلون أساسي للقالب (--uicolor).
	 */
	function kayan_theme_palette() {
		return array(
			'primary'   => '#1AB8B8',
			'primary_2' => '#2980D4',
			'aqua'      => '#00D4D4',
			'navy'      => '#0A1F4E',
			'navy_2'    => '#1A3A6B',
			'footer'    => '#071226',
			'text'      => '#1C2E44',
			'gold'      => '#F4A428',
		);
	}
}

if ( ! function_exists( 'kayan_theme_primary_color' ) ) {
	function kayan_theme_primary_color() {
		$saved = yc_get_option( 'site_color' );
		if ( ! empty( $saved ) ) {
			return kayan_home_sanitize_hex( $saved );
		}
		return kayan_theme_palette()['primary'];
	}
}
