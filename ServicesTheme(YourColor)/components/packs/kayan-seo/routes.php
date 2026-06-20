<?
/**
 * Legacy URL redirects — sitemap aliases + AMP remnants.
 * Rank Math sitemap: /sitemap_index.xml (not modified here).
 */

if ( ! function_exists( 'kayan_seo_get_request_path' ) ) {
	function kayan_seo_get_request_path() {
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
		$path = parse_url( $uri, PHP_URL_PATH );
		if ( ! is_string( $path ) || $path === '' ) {
			return '';
		}
		return trim( $path, '/' );
	}
}

if ( ! function_exists( 'kayan_seo_redirect_legacy_urls' ) ) {
	function kayan_seo_redirect_legacy_urls() {
		if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			return;
		}

		$path = kayan_seo_get_request_path();

		if ( in_array( $path, array( 'sitemap.xml', 'wp-sitemap.xml' ), true ) ) {
			wp_safe_redirect( home_url( '/sitemap_index.xml' ), 301 );
			exit;
		}

		if ( $path === 'amp' || strpos( $path, 'amp/' ) === 0 ) {
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}

		if ( isset( $_GET['output'] ) && 'amp' === $_GET['output'] ) {
			$target = remove_query_arg( 'output' );
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
