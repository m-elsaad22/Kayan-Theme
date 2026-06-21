<?
if ( ! function_exists( 'kayan_i18n_is_enabled' ) ) {
	function kayan_i18n_is_enabled() {
		return empty( yc_get_option( 'kayan_i18n_disable' ) );
	}
}

if ( ! function_exists( 'kayan_i18n_get_lang' ) ) {
	function kayan_i18n_get_lang() {
		if ( ! kayan_i18n_is_enabled() ) {
			return 'ar';
		}
		$lang = get_query_var( 'kayan_lang' );
		if ( 'en' === $lang ) {
			return 'en';
		}
		return 'ar';
	}
}

if ( ! function_exists( 'kayan_i18n_is_english' ) ) {
	function kayan_i18n_is_english() {
		return 'en' === kayan_i18n_get_lang();
	}
}

if ( ! function_exists( 'kayan_i18n_get_post_en_meta' ) ) {
	function kayan_i18n_get_post_en_meta( $post_id, $key ) {
		$value = get_post_meta( $post_id, 'kayan_en_' . $key, true );
		return ! empty( $value ) ? trim( wp_strip_all_tags( (string) $value ) ) : '';
	}
}

if ( ! function_exists( 'kayan_i18n_get_localized_url' ) ) {
	function kayan_i18n_get_localized_url( $lang = 'ar', $post_id = 0 ) {
		if ( ! $post_id ) {
			$post_id = get_queried_object_id();
		}
		if ( is_singular() && $post_id ) {
			$post = get_post( $post_id );
			if ( ! $post ) {
				return home_url( '/' );
			}
			if ( 'en' === $lang ) {
				return home_url( '/en/' . $post->post_name . '/' );
			}
			return get_permalink( $post );
		}
		if ( is_front_page() || is_home() ) {
			return 'en' === $lang ? home_url( '/en/' ) : home_url( '/' );
		}
		if ( function_exists( 'kayan_seo_get_current_url' ) ) {
			$url = kayan_seo_get_current_url();
			if ( 'en' === $lang ) {
				$path = wp_parse_url( $url, PHP_URL_PATH );
				$path = is_string( $path ) ? trim( $path, '/' ) : '';
				return home_url( '/en/' . ( $path ? $path . '/' : '' ) );
			}
			return $url;
		}
		return home_url( '/' );
	}
}

if ( ! function_exists( 'kayan_i18n_filter_seo_title' ) ) {
	function kayan_i18n_filter_seo_title( $title ) {
		if ( ! kayan_i18n_is_english() || ! is_singular() ) {
			return $title;
		}
		$en = kayan_i18n_get_post_en_meta( get_queried_object_id(), 'title' );
		return $en ? $en : $title;
	}
}

if ( ! function_exists( 'kayan_i18n_filter_seo_description' ) ) {
	function kayan_i18n_filter_seo_description( $description ) {
		if ( ! kayan_i18n_is_english() || ! is_singular() ) {
			return $description;
		}
		$en = kayan_i18n_get_post_en_meta( get_queried_object_id(), 'description' );
		return $en ? $en : $description;
	}
}

if ( ! function_exists( 'kayan_i18n_get_schema_language' ) ) {
	function kayan_i18n_get_schema_language() {
		return kayan_i18n_is_english() ? 'en' : 'ar';
	}
}

if ( ! function_exists( 'kayan_i18n_render_hreflang' ) ) {
	function kayan_i18n_render_hreflang() {
		if ( ! kayan_i18n_is_enabled() ) {
			return;
		}
		$ar_url = kayan_i18n_get_localized_url( 'ar' );
		$en_url = kayan_i18n_get_localized_url( 'en' );
		if ( empty( $ar_url ) || empty( $en_url ) || $ar_url === $en_url ) {
			return;
		}
		echo '<link rel="alternate" hreflang="ar" href="' . esc_url( $ar_url ) . '" />' . "\n";
		echo '<link rel="alternate" hreflang="en" href="' . esc_url( $en_url ) . '" />' . "\n";
		echo '<link rel="alternate" hreflang="x-default" href="' . esc_url( $ar_url ) . '" />' . "\n";
	}
}

if ( ! function_exists( 'kayan_i18n_filter_language_attributes' ) ) {
	function kayan_i18n_filter_language_attributes( $output ) {
		if ( ! kayan_i18n_is_enabled() ) {
			return $output;
		}
		if ( kayan_i18n_is_english() ) {
			return 'lang="en" dir="ltr"';
		}
		return 'lang="ar" dir="rtl"';
	}
}
