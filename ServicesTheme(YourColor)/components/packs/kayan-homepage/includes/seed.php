<?
/**
 * استيراد تلقائي لمحتوى index.html إلى ودجات الرئيسية Home2026.
 */

if ( ! function_exists( 'kayan_home_seed_is_done' ) ) {
	function kayan_home_seed_is_done() {
		return (string) yc_get_option( 'kayan_home_seeded_v1' ) === kayan_home_seed_version();
	}
}

if ( ! function_exists( 'kayan_home_seed_version' ) ) {
	function kayan_home_seed_version() {
		return '2027.3.2';
	}
}

if ( ! function_exists( 'kayan_home_seed_default_widgets' ) ) {
	function kayan_home_seed_default_widgets( $force = false ) {
		if ( ! function_exists( 'kayan_home_seed_manifest' ) ) {
			return false;
		}

		$existing = kayan_home_get_widgets_option();
		if ( ! $force && ! empty( $existing ) ) {
			return false;
		}

		if ( $force && ! empty( $existing ) ) {
			foreach ( $existing as $widget_row ) {
				if ( ! empty( $widget_row['widget_post__id'] ) ) {
					wp_delete_post( (int) $widget_row['widget_post__id'], true );
				}
			}
		}

		$manifest     = kayan_home_seed_manifest();
		$widgets_meta = array();
		$order_rows   = array();
		$labels       = array();

		global $yc__widgets__center;
		if ( isset( $yc__widgets__center['Home2026']['Packs'] ) ) {
			foreach ( $yc__widgets__center['Home2026']['Packs'] as $wid => $pack ) {
				if ( ! empty( $pack['title'] ) ) {
					$labels[ $wid ] = $pack['title'];
				}
			}
		}

		foreach ( $manifest as $widget_id => $slug ) {
			$defaults = kayan_home_get_widget_defaults( $widget_id );
			if ( empty( $defaults['content_html'] ) ) {
				continue;
			}

			$post_id = wp_insert_post(
				array(
					'post_title'  => $widget_id . '_seed',
					'post_type'   => 'widgets__posts',
					'post_status' => 'publish',
				)
			);

			if ( ! $post_id || is_wp_error( $post_id ) ) {
				continue;
			}

			update_post_meta( $post_id, 'widget_type', $widget_id );
			update_post_meta( $post_id, 'widget_post_meta', $defaults );

			$key = 'seed_' . $slug;
			$widgets_meta[ $key ] = array(
				'widget_id'       => $widget_id,
				'widget_post__id' => $post_id,
			);

			$label = isset( $labels[ $widget_id ] ) ? $labels[ $widget_id ] : $widget_id;
			$order_rows[]       = array(
				'section_id'      => 'widget_' . $post_id,
				'type'            => 'widget',
				'widget_key'      => $key,
				'widget_post__id' => (string) $post_id,
				'widget_id'       => $widget_id,
				'visible'         => '1',
				'label'           => $label,
			);
		}

		if ( empty( $widgets_meta ) ) {
			return false;
		}

		yc_update_option( 'widgets_home__meta', $widgets_meta );
		yc_update_option(
			'kayan_homepage_sections_order',
			array(
				'enabled'  => '1',
				'sections' => $order_rows,
			)
		);
		yc_update_option( 'kayan_home_seeded_v1', kayan_home_seed_version() );

		return true;
	}
}

if ( ! function_exists( 'kayan_home_maybe_auto_seed' ) ) {
	function kayan_home_maybe_auto_seed() {
		if ( kayan_home_seed_is_done() ) {
			return;
		}
		if ( ! empty( kayan_home_get_widgets_option() ) ) {
			yc_update_option( 'kayan_home_seeded_v1', kayan_home_seed_version() );
			return;
		}
		kayan_home_seed_default_widgets( false );
	}
}
add_action( 'after_setup_theme', 'kayan_home_maybe_auto_seed', 20 );

function kayan_home_admin_import_defaults() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'غير مسموح.', 'yourcolor' ) );
	}
	check_admin_referer( 'kayan_home_import_defaults' );
	kayan_home_seed_default_widgets( true );
	$redirect = wp_get_referer();
	if ( ! $redirect ) {
		$redirect = admin_url( 'admin.php' );
	}
	wp_safe_redirect( add_query_arg( 'kayan_home_imported', '1', $redirect ) );
	exit;
}
add_action( 'admin_post_kayan_home_import_defaults', 'kayan_home_admin_import_defaults' );

function kayan_home_import_defaults_url() {
	return wp_nonce_url(
		admin_url( 'admin-post.php?action=kayan_home_import_defaults' ),
		'kayan_home_import_defaults'
	);
}
