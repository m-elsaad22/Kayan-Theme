<?php
if( !isset( $adapter ) || !isset( $modules ) ) return;

echo '<style>';
echo '.kayan-modules-layout{display:grid;grid-template-columns:260px minmax(0,1fr);gap:18px;margin:18px 0;}';
echo '.kayan-modules-sidebar{background:#fff;border:1px solid #e5e7eb;border-radius:18px;padding:12px;box-shadow:0 10px 30px rgba(15,23,42,.06);}';
echo '.kayan-module-link{display:flex;gap:10px;align-items:flex-start;padding:13px;border-radius:14px;text-decoration:none;color:#111827;margin-bottom:6px;border:1px solid transparent;}';
echo '.kayan-module-link.active{background:#f0f7ff;border-color:#bfdbfe;color:#0f172a;}';
echo '.kayan-module-link .kayan-module-icon{width:30px;height:30px;display:flex;align-items:center;justify-content:center;background:#f8fafc;border-radius:10px;}';
echo '.kayan-module-title{font-weight:800;display:block;}';
echo '.kayan-module-desc{font-size:12px;color:#64748b;line-height:1.5;display:block;margin-top:2px;}';
echo '.kayan-modules-main{min-width:0;}';
echo '.kayan-module-tabs{display:flex;flex-wrap:wrap;gap:8px;background:#fff;border:1px solid #e5e7eb;border-radius:18px;padding:10px;margin-bottom:14px;}';
echo '.kayan-module-tab{padding:9px 13px;border-radius:12px;background:#f8fafc;text-decoration:none;color:#334155;font-weight:700;}';
echo '.kayan-module-tab.active{background:#1269eb;color:#fff;}';
echo '.kayan-module-summary{background:#fff;border:1px solid #e5e7eb;border-radius:18px;padding:16px 18px;margin-bottom:14px;}';
echo '.kayan-module-summary h2{margin:0 0 6px;font-size:20px;}';
echo '.kayan-module-summary p{margin:0;color:#64748b;}';
echo '@media(max-width:900px){.kayan-modules-layout{grid-template-columns:1fr}.kayan-modules-sidebar{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px}.kayan-module-link{margin-bottom:0}}';
echo '</style>';

echo '<div class="kayan-modules-layout">';
echo '<aside class="kayan-modules-sidebar" aria-label="KAYAN Theme modules">';
foreach ( $modules as $module_id => $module ) {
	$module_pages = $adapter->pages_for_module( $module_id, $fields_setup );
	$disabled = empty( $module_pages ) ? ' is-disabled' : '';
	$active = ( $module_id == $active_module_id ) ? ' active' : '';
	$url = $adapter->module_admin_url( $module_id );
	echo '<a class="kayan-module-link'.$active.$disabled.'" href="'.esc_url( $url ).'">';
		echo '<span class="kayan-module-icon">'.( ( isset( $module['icon'] ) ) ? $module['icon'] : '<i class="fa-regular fa-circle"></i>' ).'</span>';
		echo '<span class="kayan-module-copy">';
			echo '<span class="kayan-module-title">'.esc_html( $adapter->module_label( $module ) ).'</span>';
			echo '<span class="kayan-module-desc">'.esc_html( ( isset( $module['disc'] ) ) ? $module['disc'] : '' ).'</span>';
		echo '</span>';
	echo '</a>';
}
echo '</aside>';
echo '<main class="kayan-modules-main">';
