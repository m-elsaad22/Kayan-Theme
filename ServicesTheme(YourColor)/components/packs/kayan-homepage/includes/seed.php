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
		return '2027.4.0';
	}
}

if ( ! function_exists( 'kayan_home_count_seeded_widgets' ) ) {
	function kayan_home_count_seeded_widgets() {
		$widgets = kayan_home_get_widgets_option();
		if ( empty( $widgets ) ) {
			return 0;
		}
		$count = 0;
		foreach ( $widgets as $widget_row ) {
			if ( empty( $widget_row['widget_id'] ) || strpos( $widget_row['widget_id'], 'kayan_home_' ) !== 0 ) {
				continue;
			}
			if ( empty( $widget_row['widget_post__id'] ) ) {
				continue;
			}
			$meta = get_post_meta( (int) $widget_row['widget_post__id'], 'widget_post_meta', true );
			if ( is_array( $meta ) && ( ! empty( $meta['content_html'] ) || ( isset( $meta['data_source'] ) && $meta['data_source'] === 'wordpress' ) ) ) {
				$count++;
			}
		}
		return $count;
	}
}

if ( ! function_exists( 'kayan_home_needs_seed' ) ) {
	function kayan_home_needs_seed() {
		return kayan_home_count_seeded_widgets() === 0;
	}
}

if ( ! function_exists( 'kayan_home_delete_home_widget_posts' ) ) {
	function kayan_home_delete_home_widget_posts( $widgets ) {
		if ( empty( $widgets ) || ! is_array( $widgets ) ) {
			return;
		}
		foreach ( $widgets as $widget_row ) {
			if ( ! empty( $widget_row['widget_post__id'] ) ) {
				wp_delete_post( (int) $widget_row['widget_post__id'], true );
			}
		}
	}
}

if ( ! function_exists( 'kayan_home_seed_new_widget_post' ) ) {
	function kayan_home_seed_new_widget_post( $post_id, $widget_type ) {
		if ( strpos( (string) $widget_type, 'kayan_home_' ) !== 0 ) {
			return;
		}
		if ( ! function_exists( 'kayan_home_get_widget_defaults' ) ) {
			return;
		}
		$defaults = kayan_home_get_widget_defaults( $widget_type );
		if ( ! empty( $defaults ) ) {
			update_post_meta( (int) $post_id, 'widget_post_meta', $defaults );
		}
	}
}

if ( ! function_exists( 'kayan_home_merge_widget_admin_meta' ) ) {
	function kayan_home_merge_widget_admin_meta( $widget_type, $meta ) {
		if ( strpos( (string) $widget_type, 'kayan_home_' ) !== 0 ) {
			return is_array( $meta ) ? $meta : array();
		}
		if ( ! function_exists( 'kayan_home_get_widget_defaults' ) ) {
			return is_array( $meta ) ? $meta : array();
		}
		$defaults = kayan_home_get_widget_defaults( $widget_type );
		$meta     = is_array( $meta ) ? $meta : array();
		foreach ( $defaults as $key => $value ) {
			if ( ! isset( $meta[ $key ] ) || $meta[ $key ] === '' ) {
				$meta[ $key ] = $value;
			}
		}
		return $meta;
	}
}

if ( ! function_exists( 'kayan_home_seed_default_widgets' ) ) {
	function kayan_home_seed_default_widgets( $force = false ) {
		if ( ! function_exists( 'kayan_home_seed_manifest' ) ) {
			return false;
		}

		$existing = kayan_home_get_widgets_option();
		if ( ! $force && ! kayan_home_needs_seed() ) {
			return false;
		}

		if ( ( $force || kayan_home_needs_seed() ) && ! empty( $existing ) ) {
			kayan_home_delete_home_widget_posts( $existing );
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
			if ( empty( $defaults ) ) {
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
		if ( ! kayan_home_needs_seed() ) {
			if ( ! kayan_home_seed_is_done() ) {
				yc_update_option( 'kayan_home_seeded_v1', kayan_home_seed_version() );
			}
			return;
		}
		if ( kayan_home_seed_default_widgets( false ) ) {
			set_transient( 'kayan_home_auto_seeded_notice', '1', 120 );
		}
	}
}
add_action( 'after_setup_theme', 'kayan_home_maybe_auto_seed', 20 );
add_action( 'after_switch_theme', 'kayan_home_maybe_auto_seed', 20 );

if ( ! function_exists( 'kayan_home_maybe_seed_in_admin' ) ) {
	function kayan_home_maybe_seed_in_admin() {
		if ( ! is_admin() || ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
		if ( $page !== 'yts-home_page' ) {
			return;
		}
		if ( ! kayan_home_needs_seed() ) {
			return;
		}
		if ( kayan_home_seed_default_widgets( false ) ) {
			set_transient( 'kayan_home_auto_seeded_notice', '1', 120 );
		}
	}
}
add_action( 'admin_init', 'kayan_home_maybe_seed_in_admin', 5 );

if ( ! function_exists( 'kayan_home_admin_notices' ) ) {
	function kayan_home_admin_notices() {
		if ( isset( $_GET['kayan_home_imported'] ) ) {
			echo '<div class="notice notice-success is-dismissible"><p>تم استيراد إعدادات الرئيسية بنجاح — الأقسام جاهزة للتعديل (الهيدر والفوتر من تبويباتهما).</p></div>';
		}
		if ( get_transient( 'kayan_home_auto_seeded_notice' ) ) {
			delete_transient( 'kayan_home_auto_seeded_notice' );
			echo '<div class="notice notice-success is-dismissible"><p>تم تعبئة أقسام الرئيسية تلقائياً من تصميم index.html. يمكنك تعديل أي قسم من الأسفل.</p></div>';
		}
	}
}
add_action( 'admin_notices', 'kayan_home_admin_notices' );

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
