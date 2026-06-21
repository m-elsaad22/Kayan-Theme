<?
require_once __DIR__ . '/helpers.php';

if ( ! function_exists( 'kayan_i18n_register_query_var' ) ) {
	function kayan_i18n_register_query_var( $vars ) {
		$vars[] = 'kayan_lang';
		return $vars;
	}
}
add_filter( 'query_vars', 'kayan_i18n_register_query_var' );

if ( ! function_exists( 'kayan_i18n_register_rewrites' ) ) {
	function kayan_i18n_register_rewrites() {
		if ( ! kayan_i18n_is_enabled() ) {
			return;
		}
		add_rewrite_rule( '^en/?$', 'index.php?kayan_lang=en', 'top' );
		add_rewrite_rule( '^en/([^/]+)/?$', 'index.php?kayan_lang=en&name=$matches[1]', 'top' );
		add_rewrite_rule( '^en/([^/]+)/page/([0-9]+)/?$', 'index.php?kayan_lang=en&name=$matches[1]&paged=$matches[2]', 'top' );
	}
}
add_action( 'init', 'kayan_i18n_register_rewrites', 5 );

if ( ! function_exists( 'kayan_i18n_resolve_english_request' ) ) {
	function kayan_i18n_resolve_english_request( $query ) {
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}
		if ( 'en' !== get_query_var( 'kayan_lang' ) ) {
			return;
		}
		$name = get_query_var( 'name' );
		if ( empty( $name ) ) {
			$query->set( 'kayan_lang', 'en' );
			$query->is_home = true;
			$query->is_front_page = true;
			return;
		}
		$query->set( 'post_type', 'post' );
		$query->set( 'name', $name );
	}
}
add_action( 'pre_get_posts', 'kayan_i18n_resolve_english_request', 1 );

add_filter( 'kayan_seo_resolved_title', 'kayan_i18n_filter_seo_title', 10, 1 );
add_filter( 'kayan_seo_resolved_description', 'kayan_i18n_filter_seo_description', 10, 1 );
add_filter( 'language_attributes', 'kayan_i18n_filter_language_attributes', 20 );
