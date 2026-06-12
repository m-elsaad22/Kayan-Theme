<?
if ( ! function_exists( 'kayan_ui_show_call_button' ) ) {
	function kayan_ui_show_call_button() {
		return ! empty( yc_get_option( 'kayan_show_call_buttons' ) );
	}
}
