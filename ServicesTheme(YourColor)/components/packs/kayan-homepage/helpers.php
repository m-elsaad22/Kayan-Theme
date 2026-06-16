<?
if ( ! function_exists( 'kayan_homepage_v3_is_enabled' ) ) {
	function kayan_homepage_v3_is_enabled() {
		return ! empty( yc_get_option( 'kayan_homepage_v3' ) );
	}
}

if ( ! function_exists( 'kayan_home_get_site_name' ) ) {
	function kayan_home_get_site_name() {
		if ( function_exists( 'kayan_wa_get_site_name' ) ) {
			return kayan_wa_get_site_name();
		}
		$name = yc_get_option( 'sitename' );
		if ( empty( $name ) ) {
			$name = get_bloginfo( 'name' );
		}
		return trim( wp_strip_all_tags( (string) $name ) );
	}
}

if ( ! function_exists( 'kayan_home_logo_html' ) ) {
	function kayan_home_logo_html() {
		$name = kayan_home_get_site_name();
		if ( $name === '' ) {
			return '<b>KAYAN</b>';
		}
		$parts = preg_split( '/\s+/u', $name, 2 );
		if ( count( $parts ) > 1 ) {
			return esc_html( $parts[0] ) . ' <b>' . esc_html( $parts[1] ) . '</b>';
		}
		return '<b>' . esc_html( $name ) . '</b>';
	}
}

if ( ! function_exists( 'kayan_home_loader_logo_html' ) ) {
	function kayan_home_loader_logo_html() {
		$name = kayan_home_get_site_name();
		if ( $name === '' ) {
			return 'KAYAN <span>Theme</span>';
		}
		$parts = preg_split( '/\s+/u', $name, 2 );
		if ( count( $parts ) > 1 ) {
			return esc_html( $parts[0] ) . ' <span>' . esc_html( $parts[1] ) . '</span>';
		}
		return esc_html( $name );
	}
}

if ( ! function_exists( 'kayan_home_whatsapp_number' ) ) {
	function kayan_home_whatsapp_number() {
		$num = yc_get_option( 'whatsapp_number' );
		return preg_replace( '/\D+/', '', (string) $num );
	}
}

if ( ! function_exists( 'kayan_home_phone_number' ) ) {
	function kayan_home_phone_number() {
		$num = yc_get_option( 'phonenumber' );
		return preg_replace( '/\D+/', '', (string) $num );
	}
}

if ( ! function_exists( 'kayan_home_wa_url' ) ) {
	function kayan_home_wa_url( $page_title = null ) {
		$num = kayan_home_whatsapp_number();
		if ( $num === '' ) {
			return '#';
		}
		if ( function_exists( 'kayan_wa_build_url' ) ) {
			return kayan_wa_build_url( $num, null, $page_title );
		}
		return 'https://wa.me/' . $num;
	}
}

if ( ! function_exists( 'kayan_home_tel_url' ) ) {
	function kayan_home_tel_url() {
		$num = kayan_home_phone_number();
		if ( $num === '' ) {
			return '#';
		}
		return 'tel:+' . $num;
	}
}

if ( ! function_exists( 'kayan_home_phone_display' ) ) {
	function kayan_home_phone_display() {
		$raw = yc_get_option( 'phonenumber' );
		if ( ! empty( $raw ) ) {
			return esc_html( $raw );
		}
		$num = kayan_home_phone_number();
		if ( $num === '' ) {
			return '';
		}
		return '+' . $num;
	}
}

if ( ! function_exists( 'kayan_home_body_classes' ) ) {
	function kayan_home_body_classes() {
		$classes = array( 'kayan-homepage-v3' );
		if ( function_exists( 'kayan_ui_show_call_button' ) && ! kayan_ui_show_call_button() ) {
			$classes[] = 'kayan-no-content-call';
		}
		if ( function_exists( 'kayan_ui_show_floating_call_button' ) && ! kayan_ui_show_floating_call_button( 0, false ) ) {
			$classes[] = 'kayan-no-floating-call';
		}
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'kayan_homepage_v3_filter_html' ) ) {
	function kayan_homepage_v3_filter_html( $html ) {
		$site_name = kayan_home_get_site_name();
		$wa_url    = kayan_home_wa_url();
		$tel_url   = kayan_home_tel_url();
		$phone_dsp = kayan_home_phone_display();

		$replacements = array(
			'https://wa.me/971586634710' => esc_url( $wa_url ),
			'tel:+971586634710'          => esc_attr( $tel_url ),
			'+971 58 663 4710'           => $phone_dsp,
			'ركن <b>التطور</b>'          => kayan_home_logo_html(),
			'ركن <span>التطور</span>'    => kayan_home_loader_logo_html(),
			'ركن التطور'                 => esc_html( $site_name ),
			'© 2026 ركن التطور للخدمات المنزلية. جميع الحقوق محفوظة.' => '© ' . gmdate( 'Y' ) . ' ' . esc_html( $site_name ) . '. جميع الحقوق محفوظة.',
			'لوحة خدمات ركن التطور'      => 'لوحة خدمات ' . esc_html( $site_name ),
		);

		return str_replace( array_keys( $replacements ), array_values( $replacements ), $html );
	}
}

if ( ! function_exists( 'kayan_homepage_v3_render' ) ) {
	function kayan_homepage_v3_render() {
		$body_file = __DIR__ . '/template-parts/body.html.php';
		if ( ! file_exists( $body_file ) ) {
			return;
		}

		$html = file_get_contents( $body_file );
		$html = kayan_homepage_v3_filter_html( $html );

		$theme_color = '#0A1F4E';
		?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> lang="ar" dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="<?php echo esc_attr( $theme_color ); ?>">
	<?php wp_head(); ?>
</head>
<body class="<?php echo esc_attr( kayan_home_body_classes() ); ?>">
<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- filtered HTML from trusted theme template.
		echo $html;
		wp_footer();
		?>
</body>
</html>
		<?php
	}
}
