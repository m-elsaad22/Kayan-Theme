<?
/**
 * Single tracking engine: KAYAN Track (REST). Legacy admin-ajax trackers are disabled when active.
 */

if ( ! function_exists( 'kayan_stabilization_unregister_legacy_tracking_ajax' ) ) {
	function kayan_stabilization_unregister_legacy_tracking_ajax() {
		if ( ! kayan_stabilization_legacy_tracking_disabled() ) {
			return;
		}

		$actions = array(
			'kt_register_visit',
			'kt_track_click',
			'kt_session_end',
			'kt_heatmap_batch',
			'rukn_track_click',
			'rukn_track_pv',
		);

		foreach ( $actions as $action ) {
			remove_all_actions( 'wp_ajax_' . $action );
			remove_all_actions( 'wp_ajax_nopriv_' . $action );
		}
	}
}
add_action( 'init', 'kayan_stabilization_unregister_legacy_tracking_ajax', 999 );

if ( ! function_exists( 'kayan_stabilization_block_legacy_tracking_inline' ) ) {
	function kayan_stabilization_block_legacy_tracking_inline( $html ) {
		if ( ! kayan_stabilization_legacy_tracking_disabled() || is_admin() ) {
			return $html;
		}

		$patterns = array(
			'#<script[^>]*id=["\']kayan-tracking-js["\'][^>]*>.*?</script>#is',
			'#<script>\s*\(function\(\)\s*\{\s*var A=.*?rukn_track_click.*?</script>#is',
			'#<script>\s*\(function\(\)\s*\{\s*var S=sessionStorage\.getItem\([\'"]_rsa_sid[\'"]\).*?</script>#is',
		);

		foreach ( $patterns as $pattern ) {
			$html = preg_replace( $pattern, '', $html );
		}

		return $html;
	}
}
add_action( 'template_redirect', function () {
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return;
	}
	if ( kayan_stabilization_legacy_tracking_disabled() ) {
		ob_start( 'kayan_stabilization_block_legacy_tracking_inline' );
	}
}, 0 );
