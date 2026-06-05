<?php
if( !function_exists('kayan_theme_options_modules_registry') ) {
	require_once trailingslashit( dirname( __FILE__ ) ) . 'registry.php';
}

if( !class_exists('Kayan_ThemeOptions_Modules_Adapter') ) {
	require_once trailingslashit( dirname( __FILE__ ) ) . 'adapter.php';
}
