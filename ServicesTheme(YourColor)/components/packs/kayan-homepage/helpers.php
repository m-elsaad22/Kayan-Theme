<?
/**
 * الصفحة الرئيسية — تصميم 2026 (محتوى افتراضي قابل للتعديل من إعدادات القالب).
 */

if ( ! function_exists( 'kayan_homepage_uses_new_design' ) ) {
	function kayan_homepage_uses_new_design() {
		return true;
	}
}

if ( ! function_exists( 'kayan_homepage_get_company_name' ) ) {
	/**
	 * اسم الشركة من إعدادات القالب (sitename) — يعمل على أي موقع.
	 */
	function kayan_homepage_get_company_name() {
		if ( function_exists( 'kayan_seo_get_site_name' ) ) {
			$name = kayan_seo_get_site_name();
			if ( $name !== '' ) {
				return $name;
			}
		}

		$name = yc_get_option( 'sitename' );
		if ( ! empty( $name ) ) {
			return is_string( $name ) ? trim( $name ) : $name;
		}

		$name = get_bloginfo( 'name' );
		return is_string( $name ) ? trim( $name ) : '';
	}
}

if ( ! function_exists( 'kayan_homepage_get_brand_parts' ) ) {
	function kayan_homepage_get_brand_parts() {
		$first  = trim( (string) yc_get_option( 'kayan_homepage_brand_first' ) );
		$second = trim( (string) yc_get_option( 'kayan_homepage_brand_second' ) );

		if ( $first !== '' || $second !== '' ) {
			return array( $first, $second );
		}

		$name  = kayan_homepage_get_company_name();
		$parts = preg_split( '/\s+/u', trim( $name ), 2 );

		if ( is_array( $parts ) && count( $parts ) === 2 ) {
			return array( $parts[0], $parts[1] );
		}

		return array( $name, '' );
	}
}

if ( ! function_exists( 'kayan_homepage_get_phone_raw' ) ) {
	function kayan_homepage_get_phone_raw() {
		$phone = yc_get_option( 'phonenumber' );
		if ( empty( $phone ) ) {
			$phone = yc_get_option( 'contact_number' );
		}
		if ( empty( $phone ) ) {
			$phone = get_option( 'phonenumber' );
		}
		return trim( (string) $phone );
	}
}

if ( ! function_exists( 'kayan_homepage_get_whatsapp_raw' ) ) {
	function kayan_homepage_get_whatsapp_raw() {
		$number = yc_get_option( 'whatsapp_number' );
		if ( empty( $number ) ) {
			$number = get_option( 'whatsapp_number' );
		}
		if ( empty( $number ) ) {
			$number = kayan_homepage_get_phone_raw();
		}
		return trim( (string) $number );
	}
}

if ( ! function_exists( 'kayan_homepage_format_phone_display' ) ) {
	function kayan_homepage_format_phone_display( $phone ) {
		$digits = preg_replace( '/\D+/', '', (string) $phone );
		if ( strlen( $digits ) >= 11 && strpos( $digits, '971' ) === 0 ) {
			$local = substr( $digits, 3 );
			if ( strlen( $local ) >= 9 ) {
				return '+971 ' . substr( $local, 0, 2 ) . ' ' . substr( $local, 2, 3 ) . ' ' . substr( $local, 5 );
			}
		}
		return trim( (string) $phone );
	}
}

if ( ! function_exists( 'kayan_homepage_get_tel_url' ) ) {
	function kayan_homepage_get_tel_url( $phone = null ) {
		if ( null === $phone ) {
			$phone = kayan_homepage_get_phone_raw();
		}
		$digits = preg_replace( '/\D+/', '', (string) $phone );
		if ( $digits === '' ) {
			return '#';
		}
		return 'tel:+' . ltrim( $digits, '+' );
	}
}

if ( ! function_exists( 'kayan_homepage_get_whatsapp_url' ) ) {
	function kayan_homepage_get_whatsapp_url( $number = null ) {
		if ( null === $number ) {
			$number = kayan_homepage_get_whatsapp_raw();
		}
		if ( function_exists( 'kayan_wa_build_url' ) ) {
			$url = kayan_wa_build_url( $number );
			if ( $url !== '' ) {
				return $url;
			}
		}
		$digits = preg_replace( '/\D+/', '', (string) $number );
		if ( $digits === '' ) {
			return '#';
		}
		return 'https://wa.me/' . $digits;
	}
}

if ( ! function_exists( 'kayan_homepage_expand_inline_tokens' ) ) {
	function kayan_homepage_expand_inline_tokens( $text ) {
		$company = kayan_homepage_get_company_name();
		$text    = str_replace( '{{company_name}}', $company, $text );
		$text    = str_replace( '{{year}}', gmdate( 'Y' ), $text );

		if ( function_exists( 'kayan_i18n_get_lang' ) ) {
			$lang = kayan_i18n_get_lang();
			$text = str_replace( '{{country_name}}', kayan_i18n_country_label( null, $lang ), $text );
			$text = str_replace( '{{in_country}}', kayan_i18n_country_in_phrase( null, $lang ), $text );
			$text = str_replace( '{{all_regions}}', kayan_i18n_country_regions( null, $lang ), $text );
		}

		return $text;
	}
}

if ( ! function_exists( 'kayan_homepage_is_english' ) ) {
	function kayan_homepage_is_english() {
		return function_exists( 'kayan_i18n_is_english' ) && kayan_i18n_is_english();
	}
}

if ( ! function_exists( 'kayan_homepage_pick_locale_text' ) ) {
	function kayan_homepage_pick_locale_text( $key_ar, $default_ar, $key_en, $default_en ) {
		if ( kayan_homepage_is_english() ) {
			return kayan_homepage_get_option_text( $key_en, $default_en );
		}
		return kayan_homepage_get_option_text( $key_ar, $default_ar );
	}
}

if ( ! function_exists( 'kayan_homepage_get_address' ) ) {
	function kayan_homepage_get_address() {
		$address = yc_get_option( 'company__adress' );
		if ( empty( $address ) && function_exists( 'kayan_i18n_country_address' ) ) {
			$address = kayan_i18n_country_address();
		}
		if ( empty( $address ) ) {
			$address = 'دبي، الإمارات العربية المتحدة';
		}
		return trim( (string) $address );
	}
}

if ( ! function_exists( 'kayan_homepage_get_option_text' ) ) {
	function kayan_homepage_get_option_text( $key, $default ) {
		$value = yc_get_option( $key );
		if ( $value === '' || $value === null ) {
			$value = $default;
		}
		return trim( (string) $value );
	}
}

if ( ! function_exists( 'kayan_homepage_get_option_html' ) ) {
	function kayan_homepage_get_option_html( $key, $default ) {
		$value = kayan_homepage_get_option_text( $key, $default );
		$value = kayan_homepage_expand_inline_tokens( $value );
		return wp_kses_post( $value );
	}
}

if ( ! function_exists( 'kayan_homepage_build_social_links_html' ) ) {
	function kayan_homepage_build_social_links_html() {
		$networks = array(
			'instagram' => array( 'icon' => 'fab fa-instagram', 'label' => 'Instagram' ),
			'facebook'  => array( 'icon' => 'fab fa-facebook-f', 'label' => 'Facebook' ),
			'youtube'   => array( 'icon' => 'fab fa-youtube', 'label' => 'YouTube' ),
			'twitter'   => array( 'icon' => 'fab fa-x-twitter', 'label' => 'X' ),
			'linkedin'  => array( 'icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn' ),
			'threads'   => array( 'icon' => 'fab fa-threads', 'label' => 'Threads' ),
			'telegram'  => array( 'icon' => 'fab fa-telegram', 'label' => 'Telegram' ),
		);

		$html = '';
		foreach ( $networks as $id => $data ) {
			$url = trim( (string) yc_get_option( $id ) );
			if ( $url === '' ) {
				continue;
			}
			$html .= '<a href="' . esc_url( $url ) . '" aria-label="' . esc_attr( $data['label'] ) . '" rel="noopener noreferrer" target="_blank"><i class="' . esc_attr( $data['icon'] ) . '"></i></a>';
		}

		$wa_url = kayan_homepage_get_whatsapp_url();
		if ( $wa_url !== '#' ) {
			$html .= '<a href="' . esc_url( $wa_url ) . '" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>';
		}

		return $html;
	}
}

if ( ! function_exists( 'kayan_homepage_get_blog_fallback_html' ) ) {
	function kayan_homepage_get_blog_fallback_html() {
		ob_start();
		?>
      <article class="post rv">
        <div class="post-img" style="background:linear-gradient(135deg,var(--blue),var(--navy2))"><i class="fas fa-droplet"></i></div>
        <div class="post-body">
          <span class="post-cat">كشف تسربات</span><span class="post-date">15 يونيو 2026</span>
          <h3>دليلك الشامل لكشف تسربات المياه في الإمارات</h3>
          <p>تعرّف على أحدث تقنيات الكشف بدون تكسير وكيفية اكتشاف التسرب مبكراً.</p>
          <a class="read" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
        </div>
      </article>
      <article class="post rv">
        <div class="post-img" style="background:linear-gradient(135deg,var(--turq),var(--aqua))"><i class="fas fa-layer-group"></i></div>
        <div class="post-body">
          <span class="post-cat">عزل</span><span class="post-date">10 يونيو 2026</span>
          <h3>أفضل أنواع عزل الأسطح لمناخ الإمارات الحار</h3>
          <p>مقارنة بين الفوم والأغشية البيتومينية لاختيار الأنسب لمنزلك.</p>
          <a class="read" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
        </div>
      </article>
      <article class="post rv">
        <div class="post-img" style="background:linear-gradient(135deg,var(--gold),#ffce6b);color:#3a2600"><i class="fas fa-snowflake"></i></div>
        <div class="post-body">
          <span class="post-cat">تكييف</span><span class="post-date">2 يونيو 2026</span>
          <h3>كيف تحافظ على تكييفك طوال فصل الصيف</h3>
          <p>نصائح عملية للصيانة الدورية تطيل عمر مكيفك وتوفر فاتورة الكهرباء.</p>
          <a class="read" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>">اقرأ المقال <i class="fas fa-arrow-left"></i></a>
        </div>
      </article>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'kayan_homepage_build_blog_posts_html' ) ) {
	function kayan_homepage_build_blog_posts_html() {
		$limit = (int) kayan_homepage_get_option_text( 'kayan_homepage_blog_count', '3' );
		if ( $limit < 1 ) {
			$limit = 3;
		}
		if ( $limit > 6 ) {
			$limit = 6;
		}

		$posts = get_posts(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => $limit,
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);

		if ( empty( $posts ) ) {
			return '';
		}

		$gradients = array(
			'linear-gradient(135deg,var(--blue),var(--navy2))',
			'linear-gradient(135deg,var(--turq),var(--aqua))',
			'linear-gradient(135deg,var(--gold),#ffce6b)',
			'linear-gradient(135deg,var(--success),var(--turq))',
		);
		$icons     = array( 'fas fa-droplet', 'fas fa-layer-group', 'fas fa-snowflake', 'fas fa-wrench' );

		$html = '';
		$i    = 0;
		foreach ( $posts as $post ) {
			$gradient = $gradients[ $i % count( $gradients ) ];
			$icon     = $icons[ $i % count( $icons ) ];
			$thumb    = get_the_post_thumbnail_url( $post, 'medium_large' );
			$cats     = get_the_category( $post->ID );
			$cat_name = ! empty( $cats ) ? $cats[0]->name : 'مقال';
			$style    = $thumb ? 'background-image:url(' . esc_url( $thumb ) . ');background-size:cover;background-position:center' : 'background:' . $gradient;

			$html .= '<article class="post rv">';
			$html .= '<div class="post-img" style="' . esc_attr( $style ) . '">';
			if ( ! $thumb ) {
				$html .= '<i class="' . esc_attr( $icon ) . '"></i>';
			}
			$html .= '</div><div class="post-body">';
			$html .= '<span class="post-cat">' . esc_html( $cat_name ) . '</span>';
			$html .= '<span class="post-date">' . esc_html( get_the_date( 'j F Y', $post ) ) . '</span>';
			$html .= '<h3>' . esc_html( get_the_title( $post ) ) . '</h3>';
			$html .= '<p>' . esc_html( wp_trim_words( get_the_excerpt( $post ), 18, '…' ) ) . '</p>';
			$html .= '<a class="read" href="' . esc_url( function_exists( 'kayan_i18n_get_localized_url' ) ? kayan_i18n_get_localized_url( kayan_i18n_get_lang(), $post->ID ) : get_permalink( $post ) ) . '">' . esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'read_article' ) : 'اقرأ المقال' ) . ' <i class="fas fa-arrow-left"></i></a>';
			$html .= '</div></article>';
			$i++;
		}

		return $html;
	}
}

if ( ! function_exists( 'kayan_homepage_get_tokens' ) ) {
	function kayan_homepage_get_tokens() {
		list( $brand_first, $brand_second ) = kayan_homepage_get_brand_parts();
		$company_name                       = kayan_homepage_get_company_name();
		$phone_raw                          = kayan_homepage_get_phone_raw();
		$phone_display                      = kayan_homepage_format_phone_display( $phone_raw );
		$year                               = gmdate( 'Y' );

		$hero_title_default_ar     = '{{company_name}} — منصة <em>الخدمات المنزلية المتكاملة</em> الأولى في {{country_name}}';
		$hero_title_default_en     = '{{company_name}} — The Leading <em>Integrated Home Services</em> Platform in {{country_name}}';
		$hero_subtitle_default_ar  = 'من عزل الأسطح وكشف التسربات إلى صيانة التكييف والتنظيف الاحترافي — فريق معتمد، أجهزة حديثة، وضمان مكتوب يصل إلى 10 سنوات.';
		$hero_subtitle_default_en  = 'From roof insulation and leak detection to AC maintenance and deep cleaning — certified teams, modern equipment, and a written warranty up to 10 years.';
		$dashboard_title_default_ar = 'لوحة خدمات {{company_name}}';
		$dashboard_title_default_en = '{{company_name}} Services Dashboard';
		$why_heading_default_ar    = 'لماذا يختار الآلاف <span>{{company_name}}؟</span>';
		$why_heading_default_en    = 'Why do thousands choose <span>{{company_name}}?</span>';
		$compare_heading_default_ar = 'لماذا يختار العملاء <span>{{company_name}}؟</span>';
		$compare_heading_default_en = 'Why customers choose <span>{{company_name}}?</span>';
		$areas_intro_default_ar    = 'أينما كنت في {{in_country}}، فريق {{company_name}} قريب منك وجاهز للخدمة.';
		$areas_intro_default_en    = 'Wherever you are in {{in_country}}, the {{company_name}} team is nearby and ready to help.';
		$footer_tagline_default_ar = 'منصة الخدمات المنزلية المتكاملة الأولى في {{country_name}} — جودة احترافية وضمان مكتوب وثقة 15,000+ عميل.';
		$footer_tagline_default_en = 'A leading integrated home services platform in {{country_name}} — professional quality, written warranty, and 15,000+ happy clients.';
		$copyright_default_ar      = '© {{year}} {{company_name}} للخدمات المنزلية. جميع الحقوق محفوظة.';
		$copyright_default_en      = '© {{year}} {{company_name}} Home Services. All rights reserved.';

		$hero_title     = kayan_homepage_pick_locale_text( 'kayan_homepage_hero_title', $hero_title_default_ar, 'kayan_homepage_hero_title_en', $hero_title_default_en );
		$hero_subtitle  = kayan_homepage_pick_locale_text( 'kayan_homepage_hero_subtitle', $hero_subtitle_default_ar, 'kayan_homepage_hero_subtitle_en', $hero_subtitle_default_en );
		$dashboard_title = kayan_homepage_pick_locale_text( 'kayan_homepage_dashboard_title', $dashboard_title_default_ar, 'kayan_homepage_dashboard_title_en', $dashboard_title_default_en );
		$why_heading    = kayan_homepage_pick_locale_text( 'kayan_homepage_why_heading', $why_heading_default_ar, 'kayan_homepage_why_heading_en', $why_heading_default_en );
		$compare_heading = kayan_homepage_pick_locale_text( 'kayan_homepage_compare_heading', $compare_heading_default_ar, 'kayan_homepage_compare_heading_en', $compare_heading_default_en );
		$areas_intro    = kayan_homepage_pick_locale_text( 'kayan_homepage_areas_intro', $areas_intro_default_ar, 'kayan_homepage_areas_intro_en', $areas_intro_default_en );
		$footer_tagline = kayan_homepage_pick_locale_text( 'kayan_homepage_footer_tagline', $footer_tagline_default_ar, 'kayan_homepage_footer_tagline_en', $footer_tagline_default_en );
		$copyright      = kayan_homepage_pick_locale_text( 'kayan_homepage_copyright', $copyright_default_ar, 'kayan_homepage_copyright_en', $copyright_default_en );

		$switcher_html = function_exists( 'kayan_i18n_get_switcher_html' ) ? kayan_i18n_get_switcher_html( array( 'instance_suffix' => 'Home' ) ) : '';

		$header_logo_html = function_exists( 'kayan_homepage_build_logo_html' ) ? kayan_homepage_build_logo_html( 'header', 'logo' ) : '';
		$header_nav_html  = function_exists( 'kayan_homepage_build_nav_links_html' ) ? kayan_homepage_build_nav_links_html() : '';
		$footer_html      = function_exists( 'kayan_homepage_build_footer_html' ) ? kayan_homepage_build_footer_html() : '';
		$services_grid    = function_exists( 'kayan_homepage_build_services_grid_html' ) ? kayan_homepage_build_services_grid_html() : '';
		$cities_grid      = function_exists( 'kayan_homepage_build_cities_grid_html' ) ? kayan_homepage_build_cities_grid_html() : '';
		$services_head    = function_exists( 'kayan_homepage_build_section_head_html' )
			? kayan_homepage_build_section_head_html( 'services', 'خدماتنا', 'خدماتنا المنزلية <span>المتكاملة</span>', 'حلول احترافية شاملة تغطي كل احتياجات منزلك أو منشأتك بأعلى معايير الجودة والضمان.', 'Our services', 'Integrated <span>home services</span>', 'Professional solutions for your home or business.' )
			: '';

		$area_cards       = function_exists( 'kayan_homepage_build_area_cards_html' ) ? kayan_homepage_build_area_cards_html() : '';
		$areas_head       = function_exists( 'kayan_homepage_build_section_head_html' )
			? kayan_homepage_build_section_head_html( 'areas', 'مناطق الخدمة', 'خدماتنا في جميع <span>{{all_regions}}</span>', $areas_intro_default_ar, 'Service areas', 'We serve <span>{{all_regions}}</span>', $areas_intro_default_en )
			: '';
		$projects_head    = function_exists( 'kayan_homepage_build_section_head_html' )
			? kayan_homepage_build_section_head_html( 'projects', 'أعمالنا', 'مشاريعنا <span>المنجزة</span>', 'نماذج من مشاريعنا المنشورة في الموقع.', 'Our work', 'Completed <span>projects</span>', 'Published portfolio from your site.' )
			: '';
		$blog_head        = function_exists( 'kayan_homepage_build_section_head_html' )
			? kayan_homepage_build_section_head_html( 'blog', 'المدونة', 'مقالات ونصائح <span>مفيدة</span>', 'أحدث المقالات المنشورة في موقعك.', 'Blog', 'Helpful <span>articles</span>', 'Latest posts from your site.' )
			: '';
		$projects_grid    = function_exists( 'kayan_homepage_build_projects_grid_html' ) ? kayan_homepage_build_projects_grid_html() : '';
		$mobile_nav       = function_exists( 'kayan_homepage_build_mobile_nav_html' ) ? kayan_homepage_build_mobile_nav_html() : '';

		$tokens = array(
			'header_logo_html'     => $header_logo_html,
			'header_nav_html'      => $header_nav_html,
			'header_mobile_nav_html' => $mobile_nav,
			'footer_html'          => $footer_html,
			'services_grid_html'   => $services_grid,
			'cities_grid_html'     => $cities_grid,
			'services_head_html'   => $services_head,
			'areas_head_html'      => $areas_head,
			'area_cards_html'      => $area_cards,
			'projects_head_html'   => $projects_head,
			'projects_grid_html'   => $projects_grid,
			'blog_head_html'       => $blog_head,
			'brand_first'          => esc_html( $brand_first ),
			'brand_second'         => esc_html( $brand_second ),
			'company_name'         => esc_html( $company_name ),
			'country_name'         => esc_html( function_exists( 'kayan_i18n_country_label' ) ? kayan_i18n_country_label() : 'الإمارات' ),
			'all_regions'          => esc_html( function_exists( 'kayan_i18n_country_regions' ) ? kayan_i18n_country_regions() : 'جميع الإمارات' ),
			'whatsapp_url'         => esc_url( kayan_homepage_get_whatsapp_url() ),
			'tel_url'              => esc_url( kayan_homepage_get_tel_url() ),
			'phone_display'        => esc_html( $phone_display ),
			'address'              => esc_html( kayan_homepage_get_address() ),
			'hero_title_html'      => wp_kses_post( kayan_homepage_expand_inline_tokens( $hero_title ) ),
			'hero_subtitle'        => esc_html( kayan_homepage_expand_inline_tokens( $hero_subtitle ) ),
			'dashboard_title'      => esc_html( kayan_homepage_expand_inline_tokens( $dashboard_title ) ),
			'why_heading_html'     => wp_kses_post( kayan_homepage_expand_inline_tokens( $why_heading ) ),
			'compare_heading_html' => wp_kses_post( kayan_homepage_expand_inline_tokens( $compare_heading ) ),
			'areas_intro'          => esc_html( kayan_homepage_expand_inline_tokens( $areas_intro ) ),
			'footer_tagline'       => esc_html( kayan_homepage_expand_inline_tokens( $footer_tagline ) ),
			'copyright'            => esc_html( kayan_homepage_expand_inline_tokens( $copyright ) ),
			'social_links_html'    => kayan_homepage_build_social_links_html(),
			'blog_posts_html'      => kayan_homepage_build_blog_posts_html(),
			'locale_switcher_html' => $switcher_html,
			'ui_btn_whatsapp'      => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'btn_whatsapp' ) : 'واتساب' ),
			'ui_btn_whatsapp_full' => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'btn_whatsapp_full' ) : 'تواصل عبر واتساب' ),
			'ui_btn_call'          => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'btn_call' ) : 'اتصل الآن' ),
			'ui_btn_quote'         => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'btn_quote' ) : 'طلب عرض سعر' ),
			'ui_btn_service'       => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'btn_service' ) : 'طلب خدمة' ),
			'ui_btn_call_short'    => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'btn_call_short' ) : 'اتصال' ),
			'ui_nav_services'      => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'nav_services' ) : 'الخدمات' ),
			'ui_nav_cities'        => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'nav_cities' ) : 'المدن' ),
			'ui_nav_projects'      => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'nav_projects' ) : 'المشاريع' ),
			'ui_nav_blog'          => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'nav_blog' ) : 'المدونة' ),
			'ui_nav_about'         => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'nav_about' ) : 'من نحن' ),
			'ui_nav_faq'           => esc_html( function_exists( 'kayan_i18n_t' ) ? kayan_i18n_t( 'nav_faq' ) : 'الأسئلة الشائعة' ),
		);

		return apply_filters( 'kayan_homepage_tokens', $tokens );
	}
}

if ( ! function_exists( 'kayan_home_body_classes' ) ) {
	function kayan_home_body_classes() {
		$classes = array( 'kayan-homepage-v3', 'kayan-homepage-dynamic' );
		if ( kayan_homepage_is_english() ) {
			$classes[] = 'kayan-homepage-en';
		}
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
		$tokens = kayan_homepage_get_tokens();
		foreach ( $tokens as $key => $value ) {
			$html = str_replace( '{{' . $key . '}}', $value, $html );
		}
		if ( function_exists( 'kayan_hp_apply_section_visibility' ) ) {
			$html = kayan_hp_apply_section_visibility( $html );
		}
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
		$html_attrs  = function_exists( 'kayan_i18n_get_html_attrs' ) ? kayan_i18n_get_html_attrs() : 'lang="ar" dir="rtl"';
		?>
<!DOCTYPE html>
<html <?php echo $html_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="<?php echo esc_attr( $theme_color ); ?>">
	<?php wp_head(); ?>
</head>
<body class="<?php echo esc_attr( kayan_home_body_classes() ); ?>">
<?php
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tokens escaped in kayan_homepage_get_tokens().
		echo $html;
		wp_footer();
		?>
</body>
</html>
		<?php
	}
}
