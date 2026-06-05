<?php
if( !isset( $adapter ) || !isset( $module_pages ) ) return;

echo '<nav class="kayan-module-tabs" aria-label="KAYAN module sections">';
foreach ( $module_pages as $page_key => $page_data ) {
	$active = ( $page_key == $active_page ) ? ' active' : '';
	echo '<a class="kayan-module-tab'.$active.'" href="'.esc_url( $adapter->page_admin_url( $page_key ) ).'">'.esc_html( $adapter->page_label( $page_data ) ).'</a>';
}
echo '</nav>';
