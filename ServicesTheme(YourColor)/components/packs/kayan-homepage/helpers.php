<?
/**
 * الصفحة الرئيسية — تصميم ركن التطور 2026 (افتراضي).
 * يُحمَّل عبر حزمة kayan-homepage ويستبدل Intro والودجات القديمة تلقائياً.
 */

if ( ! function_exists( 'kayan_homepage_uses_new_design' ) ) {
	function kayan_homepage_uses_new_design() {
		return true;
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

if ( ! function_exists( 'kayan_homepage_v3_filter_html' ) ) {
	function kayan_homepage_v3_filter_html( $html ) {
		$year = gmdate( 'Y' );
		$html = str_replace( '© 2026 ركن التطور', '© ' . $year . ' ركن التطور', $html );
		return $html;
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
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted theme template for ركن التطور.
		echo $html;
		wp_footer();
		?>
</body>
</html>
		<?php
	}
}
