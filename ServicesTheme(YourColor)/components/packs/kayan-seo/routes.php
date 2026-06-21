<?
/**
 * Legacy AMP URL redirects only.
 * Sitemap: EXTERNAL (Rank Math issue) — not handled by the theme.
 */

if ( ! function_exists( 'kayan_seo_redirect_legacy_urls' ) ) {
	function kayan_seo_redirect_legacy_urls() {
		if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			return;
		}

		global $wp;
		$current_url = kayan_seo_get_current_url();
		$path        = trim( (string) $wp->request, '/' );

		if ( $path === 'amp' || strpos( $path, 'amp/' ) === 0 ) {
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}

		if ( isset( $_GET['output'] ) && 'amp' === $_GET['output'] ) {
			$target = remove_query_arg( 'output', $current_url );
			wp_safe_redirect( $target ? $target : home_url( '/' ), 301 );
			exit;
		}
	}
}
add_action( 'template_redirect', 'kayan_seo_redirect_legacy_urls', 0 );

if ( ! function_exists( 'kayan_seo_disable_amp_query_var' ) ) {
	function kayan_seo_disable_amp_query_var( $vars ) {
		if ( ! is_array( $vars ) ) {
			return $vars;
		}
		return array_values( array_diff( $vars, array( 'amp' ) ) );
	}
}
add_filter( 'query_vars', 'kayan_seo_disable_amp_query_var', 99 );
