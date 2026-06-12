<?
if ( ! function_exists( 'kayan_perf_is_enabled' ) ) {
	function kayan_perf_is_enabled() {
		if ( function_exists( 'kayan_seo_is_enabled' ) && ! kayan_seo_is_enabled() ) {
			return false;
		}
		return empty( yc_get_option( 'kayan_perf_disable' ) );
	}
}

if ( ! function_exists( 'kayan_perf_get_lcp_image_url' ) ) {
	function kayan_perf_get_lcp_image_url() {
		if ( is_singular() && has_post_thumbnail() ) {
			$url = get_the_post_thumbnail_url( get_queried_object_id(), 'full' );
			if ( $url ) {
				return esc_url( $url );
			}
		}

		if ( is_tax( 'city' ) ) {
			$term = get_queried_object();
			if ( $term && ! empty( $term->term_id ) && function_exists( 'kayan_seo_get_term_image_url' ) ) {
				$url = kayan_seo_get_term_image_url( $term->term_id );
				if ( $url ) {
					return $url;
				}
			}
		}

		if ( function_exists( 'kayan_seo_get_og_image' ) ) {
			$url = kayan_seo_get_og_image();
			if ( $url ) {
				return $url;
			}
		}

		$logo_data = yc_get_option( 'logo__data' );
		if ( is_array( $logo_data ) && isset( $logo_data['Image']['image_logo'] ) && ! empty( $logo_data['Image']['image_logo'] ) ) {
			return esc_url( $logo_data['Image']['image_logo'] );
		}

		return '';
	}
}

if ( ! function_exists( 'kayan_perf_render_resource_hints' ) ) {
	function kayan_perf_render_resource_hints() {
		if ( ! kayan_perf_is_enabled() || ( function_exists( 'IsSpeed' ) && IsSpeed() ) ) {
			return;
		}

		echo '<link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />' . "\n";
		echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />' . "\n";

		if ( empty( yc_get_option( 'kayan_perf_disable_preload' ) ) ) {
			$lcp = kayan_perf_get_lcp_image_url();
			if ( ! empty( $lcp ) ) {
				echo '<link rel="preload" as="image" href="' . esc_url( $lcp ) . '" fetchpriority="high" />' . "\n";
			}
		}
	}
}

if ( ! function_exists( 'kayan_perf_attachment_image_attributes' ) ) {
	function kayan_perf_attachment_image_attributes( $attr, $attachment, $size ) {
		if ( ! kayan_perf_is_enabled() || ( function_exists( 'IsSpeed' ) && IsSpeed() ) ) {
			return $attr;
		}

		if ( is_singular() && (int) get_post_thumbnail_id() === (int) $attachment->ID ) {
			$attr['fetchpriority'] = 'high';
			$attr['loading'] = 'eager';
			$attr['decoding'] = 'async';
		}

		return $attr;
	}
}
