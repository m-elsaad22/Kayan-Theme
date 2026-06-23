<?
/**
 * Inner page layout markup — uses kayan-inner.css + kayan-home design tokens.
 */

if ( ! function_exists( 'kayan_homepage_uses_inner_layout' ) ) {
	function kayan_homepage_uses_inner_layout() {
		return function_exists( 'kayan_homepage_inner_page_request' ) && kayan_homepage_inner_page_request();
	}
}

if ( ! function_exists( 'kayan_homepage_render_inner_hero' ) ) {
	/**
	 * @param array $args title, subtitle, image_url, image_alt.
	 */
	function kayan_homepage_render_inner_hero( $args = array() ) {
		$args = wp_parse_args(
			$args,
			array(
				'title'     => '',
				'subtitle'  => '',
				'image_url' => '',
				'image_alt' => '',
			)
		);

		$title     = trim( (string) $args['title'] );
		$subtitle  = trim( (string) $args['subtitle'] );
		$image_url = trim( (string) $args['image_url'] );
		$image_alt = trim( (string) $args['image_alt'] );
		if ( $image_alt === '' ) {
			$image_alt = $title;
		}

		echo '<section class="kayan-inner-hero">';
		if ( $image_url !== '' ) {
			echo '<div class="kayan-inner-hero__media">';
			echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image_alt ) . '" loading="eager" decoding="async" />';
			echo '</div>';
			echo '<div class="kayan-inner-hero__overlay" aria-hidden="true"></div>';
		}
		echo '<div class="kayan-inner-hero__content">';
		if ( $title !== '' ) {
			echo '<h1 class="kayan-inner-hero__title">' . esc_html( $title ) . '</h1>';
		}
		if ( $subtitle !== '' ) {
			echo '<p class="kayan-inner-hero__sub">' . esc_html( $subtitle ) . '</p>';
		}
		echo '</div>';
		echo '</section>';
	}
}

if ( ! function_exists( 'kayan_homepage_render_inner_breadcrumb' ) ) {
	function kayan_homepage_render_inner_breadcrumb() {
		echo '<nav class="kayan-inner-breadcrumb" aria-label="Breadcrumb">';
		echo '<div class="kayan-inner-breadcrumb__inner">';
		if ( function_exists( 'Breadcrumb' ) ) {
			ob_start();
			Breadcrumb();
			$html = ob_get_clean();
			if ( $html !== '' ) {
				$html = str_replace( 'class="BreadcrumbsFilters"', 'class="BreadcrumbsFilters kayan-inner-breadcrumb__trail"', $html );
				echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Breadcrumb() markup.
			}
		}
		echo '</div>';
		echo '</nav>';
	}
}

if ( ! function_exists( 'kayan_homepage_render_contact_box' ) ) {
	/**
	 * @param int|null $post_id Post/page ID for contact resolver.
	 */
	function kayan_homepage_render_contact_box( $post_id = null ) {
		if ( ! function_exists( 'kayan_homepage_resolve_ui_tokens' ) ) {
			return;
		}

		$ui = kayan_homepage_resolve_ui_tokens( $post_id );
		$show_call = ! function_exists( 'kayan_ui_show_call_button' ) || kayan_ui_show_call_button();

		echo '<div class="kayan-contact-box">';
		echo '<h3 class="kayan-contact-box__title">';
		echo esc_html( function_exists( 'kayan_homepage_ui_string' ) ? kayan_homepage_ui_string( 'btn_service', 'تواصل معنا' ) : 'تواصل معنا' );
		echo '</h3>';
		echo '<p class="kayan-contact-box__text">';
		echo esc_html( function_exists( 'kayan_homepage_get_company_name' ) ? kayan_homepage_get_company_name() : get_bloginfo( 'name' ) );
		echo '</p>';
		echo '<div class="kayan-contact-box__actions">';

		if ( $show_call && ! empty( $ui['tel_url'] ) && $ui['tel_url'] !== '#' ) {
			echo '<a href="' . esc_url( $ui['tel_url'] ) . '" class="btn btn-call">';
			echo '<i class="fas fa-phone"></i> ' . esc_html( $ui['ui_btn_call'] );
			echo '</a>';
		}

		if ( ! empty( $ui['whatsapp_url'] ) && $ui['whatsapp_url'] !== '#' ) {
			echo '<a href="' . esc_url( $ui['whatsapp_url'] ) . '" class="btn btn-wa" target="_blank" rel="noopener noreferrer">';
			echo '<i class="fab fa-whatsapp"></i> ' . esc_html( $ui['ui_btn_whatsapp_full'] );
			echo '</a>';
		}

		echo '</div>';
		echo '</div>';
	}
}

if ( ! function_exists( 'kayan_homepage_render_inner_header' ) ) {
	function kayan_homepage_render_inner_header( $args = array() ) {
		kayan_homepage_render_inner_hero( $args );
		kayan_homepage_render_inner_breadcrumb();
	}
}

if ( ! function_exists( 'kayan_homepage_render_inner_layout_open' ) ) {
	/**
	 * Opens kayan-inner-body + layout grid. Set has_sidebar false for full-width.
	 */
	function kayan_homepage_render_inner_layout_open( $has_sidebar = true ) {
		$layout_class = $has_sidebar ? 'kayan-inner-layout' : 'kayan-inner-layout kayan-inner-layout--no-sidebar';
		echo '<div class="kayan-inner-body">';
		echo '<div class="' . esc_attr( $layout_class ) . '">';
		echo '<main class="kayan-inner-body__content kayan-inner-section">';
	}
}

if ( ! function_exists( 'kayan_homepage_render_inner_sidebar_open' ) ) {
	function kayan_homepage_render_inner_sidebar_open() {
		echo '</main>';
		echo '<aside class="kayan-inner-sidebar">';
	}
}

if ( ! function_exists( 'kayan_homepage_render_inner_layout_close' ) ) {
	function kayan_homepage_render_inner_layout_close( $has_sidebar = true ) {
		if ( $has_sidebar ) {
			echo '</aside>';
		} else {
			echo '</main>';
		}
		echo '</div>';
		echo '</div>';
	}
}
