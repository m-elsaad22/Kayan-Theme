<?php
if( !isset( $adapter ) || !isset( $modules ) || !isset( $active_module_id ) ) return;
$active_module = ( isset( $modules[ $active_module_id ] ) ) ? $modules[ $active_module_id ] : array();

echo '<section class="kayan-module-summary">';
echo '<h2>'.esc_html( !empty( $active_module ) ? $adapter->module_label( $active_module ) : '' ).'</h2>';
echo '<p>'.esc_html( ( isset( $active_module['disc'] ) ) ? $active_module['disc'] : '' ).'</p>';
echo '</section>';
echo '</main>';
echo '</div>';
