<?php
function kayan_theme_options_modules_registry() {
	return array(
		'general' => array(
			'id' => 'general',
			'title' => 'عام',
			'en_title' => 'General',
			'icon' => '<i class="fa-regular fa-sliders"></i>',
			'disc' => 'الهوية، الألوان، الخطوط، الوضع الداكن، الحدود والظلال.',
			'number' => 1,
			'pages' => array('general'),
		),
		'layout_builder' => array(
			'id' => 'layout_builder',
			'title' => 'Layout Builder',
			'en_title' => 'Layout Builder',
			'icon' => '<i class="fa-regular fa-layer-group"></i>',
			'disc' => 'تنظيم أقسام الصفحة الرئيسية، الصفحات، اللاندنج، الأسعار والأعمال.',
			'number' => 2,
			'pages' => array('home_page', 'pages-options', 'price__options', 'work__page', 'contact_page'),
		),
		'header_engine' => array(
			'id' => 'header_engine',
			'title' => 'Header Engine',
			'en_title' => 'Header Engine',
			'icon' => '<i class="fa-regular fa-window-maximize"></i>',
			'disc' => 'الشعار، البحث، السوشيال، Sticky Header، Mega Menu وأزرار الهيدر.',
			'number' => 3,
			'pages' => array('header'),
		),
		'footer_engine' => array(
			'id' => 'footer_engine',
			'title' => 'Footer Engine',
			'en_title' => 'Footer Engine',
			'icon' => '<i class="fa-regular fa-window-restore"></i>',
			'disc' => 'أعمدة الفوتر، القوائم، الخرائط، الروابط والأزرار العائمة.',
			'number' => 4,
			'pages' => array('footer_options'),
		),
		'contact_leads' => array(
			'id' => 'contact_leads',
			'title' => 'Contact & Leads',
			'en_title' => 'Contact & Leads',
			'icon' => '<i class="fa-regular fa-address-book"></i>',
			'disc' => 'أرقام الاتصال، الواتساب، النماذج، Popups وتتبع التحويلات.',
			'number' => 5,
			'pages' => array('contact_options', 'forms_setting', 'single'),
		),
		'advanced_integrations' => array(
			'id' => 'advanced_integrations',
			'title' => 'Advanced & Integrations',
			'en_title' => 'Advanced & Integrations',
			'icon' => '<i class="fa-regular fa-screwdriver-wrench"></i>',
			'disc' => 'SEO، Schema، Sitemap، الإعلانات، العملات، التعليقات والأداء.',
			'number' => 6,
			'pages' => array('theme__seo', 'schema', 'site__map', 'ads', 'currency-options', 'comments__options', 'archive'),
		),
	);
}
