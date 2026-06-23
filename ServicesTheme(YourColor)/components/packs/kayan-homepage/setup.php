<?
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/section-builders.php';
require_once __DIR__ . '/content-builders.php';
require_once __DIR__ . '/demo-content.php';

if ( ! function_exists( 'kayan_homepage_v3_active_request' ) ) {
	function kayan_homepage_v3_active_request() {
		if ( ! empty( yc_get_option( 'kayan_homepage_v3_disable' ) ) ) {
			return false;
		}
		if ( function_exists( 'kayan_homepage_uses_new_design' ) && ! kayan_homepage_uses_new_design() ) {
			return false;
		}
		if ( is_front_page() ) {
			return true;
		}
		if ( is_home() && 'posts' === get_option( 'show_on_front' ) ) {
			return true;
		}
		return false;
	}
}

function kayan_homepage_v3_asset_version() {
	return '1.0.8';
}

function kayan_homepage_v3_resource_hints() {
	if ( ! kayan_homepage_v3_active_request() ) {
		return;
	}
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
	echo '<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />' . "\n";
	echo '<link rel="dns-prefetch" href="//fonts.googleapis.com" />' . "\n";
	echo '<link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />' . "\n";
}
add_action( 'wp_head', 'kayan_homepage_v3_resource_hints', 0 );

function kayan_homepage_v3_enqueue_assets() {
	if ( ! kayan_homepage_v3_active_request() ) {
		return;
	}

	$base = get_template_directory_uri() . '/components/packs/kayan-homepage/assets/';
	$ver  = kayan_homepage_v3_asset_version();

	wp_enqueue_style(
		'kayan-home-fonts',
		'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Tajawal:wght@400;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'kayan-home-fa',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1'
	);

	wp_enqueue_style( 'kayan-home', $base . 'kayan-home.css', array( 'kayan-home-fonts', 'kayan-home-fa', 'kayan-locale' ), $ver );
	wp_enqueue_script( 'kayan-home', $base . 'kayan-home.js', array(), $ver, true );

	$inline = '
.fa:not(.fa-brands):not(.fab),.fas,.fa-solid,.fa-regular,.far,i[class^="fa-"]:not(.fa-brands):not(.fab),i[class*=" fa-"]:not(.fa-brands):not(.fab){font-family:"Font Awesome 6 Free" !important;font-weight:900 !important;}
.fa-brands,.fab,.fa-brands::before,.fab::before{font-family:"Font Awesome 6 Brands" !important;font-weight:400 !important;}
.kayan-no-content-call .btn-call,
.kayan-no-content-call .m-call,
.kayan-no-content-call a[href^="tel:"] { display: none !important; }
.kayan-no-floating-call .mbar .m-call,
.kayan-no-floating-call .fab#fab { display: none !important; }
';
	wp_add_inline_style( 'kayan-home', $inline );
}
add_action( 'wp_enqueue_scripts', 'kayan_homepage_v3_enqueue_assets', 5 );

function kayan_homepage_v3_reenqueue_assets() {
	if ( ! kayan_homepage_v3_active_request() ) {
		return;
	}
	kayan_homepage_v3_enqueue_assets();
}
add_action( 'wp_enqueue_scripts', 'kayan_homepage_v3_reenqueue_assets', 1000000 );

function kayan_homepage_v3_dequeue_legacy_assets() {
	if ( ! kayan_homepage_v3_active_request() ) {
		return;
	}
	$handles = array( 'yourcolor-init', 'yourcolor-script', 'yourcolor-owlcarousel', 'kayan-ui-fixes', 'yourcolor-setup-carousel', 'yourcolor-setup-lazy' );
	foreach ( $handles as $handle ) {
		wp_dequeue_script( $handle );
		wp_deregister_script( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'kayan_homepage_v3_dequeue_legacy_assets', 100 );
add_action( 'wp_footer', 'kayan_homepage_v3_dequeue_legacy_assets', 999 );

function kayan_homepage_v3_takeover() {
	if ( ! kayan_homepage_v3_active_request() ) {
		return;
	}
	kayan_homepage_v3_render();
	die();
}
add_action( 'BeforeBlade_index', 'kayan_homepage_v3_takeover', 0 );
add_action( 'BeforeBlade_page', 'kayan_homepage_v3_takeover', 0 );
