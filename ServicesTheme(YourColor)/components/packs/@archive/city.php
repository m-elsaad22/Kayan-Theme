<?
$obj = get_queried_object();
$Styles = array(
	'city-archive' => 'singular/city-archive.css',
	'city__widget' => 'YourColor__Widgets/city__widget.css',
);

$city_name = esc_html( $obj->name );
$city_icon = get_term_meta( $obj->term_id, 'icon', true );
$city_image = function_exists( 'kayan_seo_get_term_image_url' ) ? kayan_seo_get_term_image_url( $obj->term_id ) : '';
$city_headline = function_exists( 'kayan_seo_get_city_headline' ) ? kayan_seo_get_city_headline( $obj ) : 'خدمات منزلية في ' . $city_name;

$seo_description = '';
if ( function_exists( 'kayan_seo_get_description' ) ) {
	$seo_description = kayan_seo_get_description();
}

$intro_content = $obj->description;
$intro_content = str_replace( '<br/>', PHP_EOL, $intro_content );
$intro_content = str_replace( '&nbsp;', ' ', $intro_content );
$intro_content = strip_tags( $intro_content );

if ( empty( $intro_content ) && ! empty( $seo_description ) ) {
	$intro_content = $seo_description;
}

if ( empty( $intro_content ) ) {
	$intro_content = 'نقدّم أفضل الخدمات المنزلية في ' . $city_name . ' بفريق محترف وأسعار منافسة.';
}

if ( strlen( $intro_content ) > 500 ) {
	$intro_content = mb_substr( $intro_content, 0, 500, 'utf-8' ) . '... <a href="javascript:void(0);" data-button="readmore-objects" data-object-type="taxonomeis" data-object-name="' . esc_attr( $obj->taxonomy ) . '" data-object-id="' . (int) $obj->term_id . '" class="readmore--category-item -BTN--hoverable">قراءة المزيد</a>';
}

$post_count = (int) $obj->count;
$phone = yc_get_option( 'contact_number' );
if ( empty( $phone ) ) {
	$phone = yc_get_option( 'phonenumber' );
}
$whatsapp = yc_get_option( 'whatsapp_number' );
$site_name = function_exists( 'kayan_seo_get_site_name' ) ? kayan_seo_get_site_name() : get_bloginfo( 'name' );

$this->Part( 'header', array( 'Styles' => $Styles ) );

echo '<div class="-primary-body kayan-city-archive">';

	echo '<div class="kayan-city-hero' . ( ! empty( $city_image ) ? ' has-image' : '' ) . '">';
		if ( ! empty( $city_image ) ) {
			echo '<div class="kayan-city-hero__media" aria-hidden="true">';
				echo '<img src="' . esc_url( $city_image ) . '" alt="' . esc_attr( $city_headline ) . '" width="1200" height="480" loading="eager" fetchpriority="high" decoding="async" />';
			echo '</div>';
		}
		echo '<div class="container">';
			echo '<div class="kayan-city-hero__inner">';
				echo '<div class="kayan-city-hero__content">';
					if ( ! empty( $city_icon ) ) {
						echo '<div class="kayan-city-hero__icon">' . $city_icon . '</div>';
					}
					echo '<p class="kayan-city-hero__eyebrow">' . esc_html( $site_name ) . '</p>';
					echo '<h1 class="kayan-city-hero__title">' . esc_html( $city_headline ) . '</h1>';
					echo '<div class="kayan-city-hero__desc --archive--be-content">' . $intro_content . '</div>';
					if ( $post_count > 0 ) {
						echo '<p class="kayan-city-hero__stat"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i> ' . (int) $post_count . ' خدمة متاحة في ' . $city_name . '</p>';
					}
					if ( ! empty( $whatsapp ) || ( function_exists( 'kayan_ui_show_call_button' ) && kayan_ui_show_call_button() && ! empty( $phone ) ) ) {
						echo '<div class="kayan-city-hero__cta">';
							if ( function_exists( 'kayan_ui_show_call_button' ) && kayan_ui_show_call_button() && ! empty( $phone ) ) {
								echo '<a class="btn-ket_2 -BTN--hoverable" href="tel:' . esc_attr( preg_replace( '/\s+/', '', $phone ) ) . '"><i class="fa-solid fa-phone"></i> اتصل الآن</a>';
							}
							if ( ! empty( $whatsapp ) ) {
								$wa_digits = preg_replace( '/\D+/', '', $whatsapp );
								echo '<a class="btn-ket_1 -BTN--hoverable button_url_2" href="https://wa.me/' . esc_attr( $wa_digits ) . '" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> واتساب</a>';
							}
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	echo '<div class="-Yc-breadcrumb-">';
		echo '<div class="container">';
			echo '<div class="YC-BreadCrumb -BreadCrumb-PT-city">';
				Breadcrumb();
			echo '</div>';
		echo '</div>';
	echo '</div>';

	echo '<div class="-YC-Widgets-Inner-Row">';
		echo '<div class="container">';
			echo '<div class="-archive--container">';
				echo '<div class="kayan-city-section-head">';
					echo '<h2 class="kayan-city-section-head__title">خدماتنا في ' . $city_name . '</h2>';
					echo '<p class="kayan-city-section-head__desc">تصفّح جميع الخدمات المنزلية المتوفرة في ' . $city_name . '.</p>';
				echo '</div>';
				echo '<div class="-archivePage-Posts-Grid">';
					$this->Part(
						'Posts',
						array(
							'object__type' => 'posts',
							'object__name' => 'post',
							'part_object__name' => 'post',
							'part__name' => 'Post-box',
							'ObjectTerms' => array( $obj ),
							'ScrollLoader' => true,
							'per' => 8,
							'show__empty_part' => 'object--empty',
							'data__empty_part' => array(
								'__empty_icon' => '<i class="fa-solid fa-ban"></i>',
								'__empty_title' => 'لا توجد خدمات في ' . $city_name . ' حالياً',
								'__empty_description' => '<a href="' . esc_url( home_url() ) . '">العودة للرئيسية</a>',
								'__Ajax_empty_title' => 'لقد شاهدت جميع الخدمات',
								'__Ajax_empty_description' => 'تم عرض جميع الخدمات في ' . $city_name . ' — <a href="' . esc_url( home_url() ) . '">الرئيسية</a>',
							),
						)
					);
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	$other_cities = get_terms(
		array(
			'taxonomy' => 'city',
			'hide_empty' => true,
			'exclude' => array( $obj->term_id ),
			'number' => 8,
		)
	);

	if ( is_array( $other_cities ) && ! empty( $other_cities ) ) {
		echo '<div class="-YC-Widgets-Inner-Row kayan-city-related">';
			echo '<div class="container">';
				echo '<div class="kayan-city-section-head">';
					echo '<h2 class="kayan-city-section-head__title">مدن أخرى نخدمها</h2>';
					echo '<p class="kayan-city-section-head__desc">استكشف خدماتنا المنزلية في مدن أخرى.</p>';
				echo '</div>';
				echo '<div class="-cityBox-widgets-items-s1 -page--cites--boxes">';
					$uniq = uniqid();
					foreach ( $other_cities as $city ) {
						$city_url = get_term_link( $city );
						$icon = get_term_meta( $city->term_id, 'icon', true );
						$description = $city->description;
						$words = explode( ' ', strip_tags( $description ) );
						$snippet = implode( ' ', array_slice( $words, 0, 10 ) );
						echo '<div class="--single--city--boxitem" data-trigger-action="' . esc_attr( $uniq ) . '">';
							echo '<div class="--cites-single-box-">';
								echo '<div class="-city-wrap-">';
									echo '<div class="--city--logoIcon">';
										if ( ! empty( $icon ) ) {
											echo '<div class="--citeyes-icon-in">' . $icon . '</div>';
										} else {
											echo '<div class="--citeyes-icon-in"><i class="fa-solid fa-house"></i></div>';
										}
									echo '</div>';
									echo '<div class="--city--info-boxitem">';
										echo '<a href="' . esc_url( $city_url ) . '" title="' . esc_attr( $city->name ) . '" data-trigger-url="' . esc_attr( $uniq ) . '"><h4 class="--city-name--">' . esc_html( $city->name ) . '</h4></a>';
										if ( ! empty( $snippet ) ) {
											echo '<p class="--city-content--">' . esc_html( $snippet ) . '</p>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}

echo '</div>';

$this->Part( 'footer', array( 'Styles' => $Styles ) );
