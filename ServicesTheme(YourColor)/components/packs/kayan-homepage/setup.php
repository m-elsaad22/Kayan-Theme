<?
require_once __DIR__ . '/includes/fields-common.php';
require_once __DIR__ . '/includes/render.php';

function kayan_homepage_v3_asset_version() {
	return '2027.3.0';
}

function kayan_homepage_enqueue_v2026_assets() {
	if ( ! function_exists( 'kayan_home_v2026_active' ) || ! kayan_home_v2026_active() ) {
		return;
	}

	$base = get_template_directory_uri() . '/components/packs/kayan-homepage/assets/';
	$ver  = kayan_homepage_v3_asset_version();

	wp_enqueue_style(
		'kayan-home-fonts',
		'https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Tajawal:wght@400;500;700;800;900&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'kayan-home-fa',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1'
	);

	wp_enqueue_style( 'kayan-home', $base . 'kayan-home.css', array( 'kayan-home-fonts', 'kayan-home-fa' ), $ver );
	wp_enqueue_script( 'kayan-home', $base . 'kayan-home.js', array(), $ver, true );

	$inline = '
.fa:not(.fa-brands):not(.fab),.fas,.fa-solid,.fa-regular,.far,i[class^="fa-"]:not(.fa-brands):not(.fab),i[class*=" fa-"]:not(.fa-brands):not(.fab){font-family:"Font Awesome 6 Free" !important;font-weight:900 !important;}
.fa-brands,.fab,.fa-brands::before,.fab::before{font-family:"Font Awesome 6 Brands" !important;font-weight:400 !important;}
.kayan-no-content-call .btn-call,.kayan-no-content-call .m-call,.kayan-no-content-call a[href^="tel:"]{display:none!important;}
.kayan-no-floating-call .mbar .m-call,.kayan-no-floating-call .fab#fab{display:none!important;}
.kayan-home-widgets .kayan-home-widget-inner{width:100%;max-width:none;padding:0;margin:0;}
';
	wp_add_inline_style( 'kayan-home', $inline );
}
add_action( 'wp_enqueue_scripts', 'kayan_homepage_enqueue_v2026_assets', 5 );

function kayan_homepage_reenqueue_v2026_assets() {
	if ( function_exists( 'kayan_home_v2026_active' ) && kayan_home_v2026_active() ) {
		kayan_homepage_enqueue_v2026_assets();
	}
}
add_action( 'wp_enqueue_scripts', 'kayan_homepage_reenqueue_v2026_assets', 1000000 );

function kayan_homepage_dequeue_legacy_on_v2026() {
	if ( ! function_exists( 'kayan_home_v2026_active' ) || ! kayan_home_v2026_active() ) {
		return;
	}
	$handles = array( 'yourcolor-init', 'yourcolor-script', 'yourcolor-owlcarousel', 'kayan-ui-fixes' );
	foreach ( $handles as $handle ) {
		wp_dequeue_script( $handle );
		wp_deregister_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'kayan_homepage_dequeue_legacy_on_v2026', 100 );
add_action( 'wp_footer', 'kayan_homepage_dequeue_legacy_on_v2026', 999 );

function kayan_homepage_render_static_front_page() {
	if ( ! is_front_page() || ! is_page() ) {
		return;
	}
	$home_widgets = kayan_home_get_widgets_option();
	if ( kayan_home_widgets_use_v2026( $home_widgets ) ) {
		kayan_home_v2026_render_page( $home_widgets );
	}
}
add_action( 'BeforeBlade_page', 'kayan_homepage_render_static_front_page', 0 );
