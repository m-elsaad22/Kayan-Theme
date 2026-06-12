<?
ob_start();

if( !isset( $bodyClass ) ) $bodyClass = '';
# INTRO OPTIONS .

$site_color = yc_get_option('site_color'); 
$text_Color = yc_get_option('text_Color');
$kayan_global_gradient = function_exists( 'kayan_get_global_gradient_css' ) ? kayan_get_global_gradient_css() : '';
$kayan_global_shadow = function_exists( 'kayan_global_shadows_to_css' ) ? kayan_global_shadows_to_css( kayan_get_global_shadows_option() ) : '';

if( !isset($_GET['ajax']) ) {
	echo '<!DOCTYPE html>';
	echo '<html lang="ar" dir="rtl">';
	echo '<head>';
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		echo '<meta charset="utf-8">';
		if ( function_exists( 'kayan_perf_render_resource_hints' ) ) {
			kayan_perf_render_resource_hints();
		}
		if ( function_exists( 'kayan_seo_render_head_meta' ) && kayan_seo_is_enabled() ) {
			kayan_seo_render_head_meta();
		} else {
			$hide__description_show = yc_get_option('hide__description_show');
			if( empty( $hide__description_show ) || empty( $hide__description_show ) ) {
				echo'<meta name="description" content="'.esc_attr( get_bloginfo("name") ).'">';
			}
		}


		//
		$hide__theme_seo = yc_get_option('hide__theme_seo');
		if( empty( $hide__theme_seo ) ) (new ThemeSeo)->Title();

		do_action('BeforeWPHead');
		// KAYAN hotfix: force Font Awesome Free solid icons to render on frontend.
		echo '<style id="kayan-fa-free-hotfix">';
			echo '.fa:not(.fa-brands):not(.fab),.fas,.fa-solid,.fa-regular,.far,i[class^="fa-"]:not(.fa-brands):not(.fab),i[class*=" fa-"]:not(.fa-brands):not(.fab),span[class^="fa-"]:not(.fa-brands):not(.fab),span[class*=" fa-"]:not(.fa-brands):not(.fab){font-family:"Font Awesome 6 Free" !important;font-weight:900 !important;}';
			echo '.fa:not(.fa-brands):not(.fab)::before,.fas::before,.fa-solid::before,.fa-regular::before,.far::before,i[class^="fa-"]:not(.fa-brands):not(.fab)::before,i[class*=" fa-"]:not(.fa-brands):not(.fab)::before,span[class^="fa-"]:not(.fa-brands):not(.fab)::before,span[class*=" fa-"]:not(.fa-brands):not(.fab)::before{font-family:"Font Awesome 6 Free" !important;font-weight:900 !important;}';
			echo '.fa-brands,.fab,.fa-brands::before,.fab::before{font-family:"Font Awesome 6 Brands" !important;font-weight:400 !important;}';
			echo '[class*="fa-"]:not(.fa-brands):not(.fab)::before,[class*="fa-"]:not(.fa-brands):not(.fab)::after{font-weight:900;}';
		echo '</style>';


		// 1. استخدام رابط Font Awesome 6 Free المجاني
		echo ( ( IsSpeed() == false ) ) ? '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">' : '';
		echo ( ( IsSpeed() == false && ( is_single() || is_page() || ( isset( $Widgets__list ) && in_array( 'works_v1',$Widgets__list ) ) ) ) ) ? '<link rel="stylesheet" data-loader-href="https://unpkg.com/photoswipe@5.2.2/dist/photoswipe.css">' : '';

		if( isset( $HeadCode ) && !empty( $HeadCode ) ){
			echo $HeadCode;
		}else{
			echo yc_get_option('header___codes');
		}
		
		wp_head();

		$Styles['forms'] = 'forms.css';

       	$ips = ( is_array( yc_get_option( "open_css" ) ) ) ? yc_get_option( "open_css" ) : array();
		if( isset($_GET['open__css']) ) {
	       $ips[$_SERVER['REMOTE_ADDR']] = true;
	       yc_update_option("open_css", $ips);
		}

		if( isset( $ips[ $_SERVER['REMOTE_ADDR'] ]) ) {
			echo '<style>';
				$this->Part('fonts');
			echo '</style>';
			if(isset($Styles)){
				foreach ($Styles as $skey => $meky) {
					echo '<link rel="stylesheet" data-style-ajax="'.$skey.'" type="text/css" href="'.$this->StylesURL.$meky.'?v='.rand().'" />';
				}
			}

			echo '<link rel="stylesheet" data-style-ajax="main" type="text/css" href="'.$this->StylesURL.'main.css?v='.rand().'" />';
			echo '<link rel="stylesheet" data-style-ajax="hover" type="text/css" href="'.$this->StylesURL.'hover.css?v='.rand().'" />';
			echo '<link rel="stylesheet" data-style-ajax="responsive" type="text/css" href="'.$this->StylesURL.'responsive.css?v='.rand().'" />';
		}else{
		    echo '<style>';
				$this->Part('fonts');
				if(isset($Styles)){
					foreach ($Styles as $skey => $meky) {
		    			require ($this->StylesPath.$meky);
					}
				}
		    	require ($this->StylesPath."/main.css");
		    	require ($this->StylesPath."/hover.css");
		    	require ($this->StylesPath."/responsive.css");
		    echo '</style>';			
		}

		do_action('AfterWPHead');
		if( !empty( yc_get_option('favicon') ) ) {
			echo '<link rel="shortcut icon" type="image/png" href="'.yc_get_option('favicon').'">';
		}

		echo '<meta name="apple-mobile-web-app-title" content="'.get_bloginfo('name').'">';
		echo '<meta http-equiv="Cache-control" content="public">';
		echo '<meta name="application-name" content="'.get_bloginfo('name').'">';
		
		// 2. إيقاف سطر التحذير
		// echo '<link rel="preload" as="font">';
		
		echo '<meta name="msapplication-TileColor" content="#a03576">';
		//
		echo '<style>';
			echo 'body { ';
				echo ( ( !empty( $site_color ) ) ) ? '--uicolor:'.$site_color.';' : '';
				echo ( ( !empty( $text_Color ) ) ) ? '--primary-text:'.$text_Color.';' : '';
				echo ( ( !empty( $kayan_global_gradient ) ) ) ? '--kayan-global-gradient:'.$kayan_global_gradient.';' : '';
				echo ( ( !empty( $kayan_global_shadow ) ) ) ? '--kayan-global-shadow:'.$kayan_global_shadow.';' : '';
			echo '}';
		echo '</style>';
	echo '</head>';
	echo '<body mode="light" class="before-start '.$bodyClass.'">';
	do_action('yc_hook_body_start');
}

# LOGO EDITS .
	$logo__data = yc_get_option( 'logo__data' );
	$logo__data = ( ( is_array( $logo__data ) ) ) ? $logo__data : array();
	if( empty( $logo__data ) || empty( $logo__data ) && ( !isset( $logo__data['logo__mode'] ) || ( isset( $logo__data['logo__mode'] ) && isset( $logo__data[ $logo__data['logo__mode'] ] ) ) ) ) 
		$logo__data = array( 'logo__mode'=>'Text','logo__mode'=>array('logo_Text'=>'YOUR{%COLOR%}') );

# SEARCHING AREA EDITS .
	$hide_search = yc_get_option( 'hide_search' );
	if( empty( $hide_search ) ) {
		$search_placeholder = yc_get_option('search_placeholder');
		$search_title = yc_get_option('search_title');
		$search__Button = yc_get_option('search__Button');
		$searchButtonType = 'icon';

	}
		if( !empty( $search__Button ) && isset( $search__Button['button_mode'] ) && $search__Button['button_mode'] == 'Text' && isset( $search__Button[ $search__Button['button_mode'] ] ) ) {
			$Text_search_button = $search__Button[ $search__Button['button_mode'] ]['logo_Text'];
			$searchButtonType = $search__Button['button_mode'];
		}else{
		    // 3. أيقونة البحث المجانية
			$Text_search_button = '<i class="fa-solid fa-magnifying-glass"></i>';
		}
# HIDE SOCIAL EDITS .
$hide_social_header = yc_get_option( 'hide_social_header' );
if( empty( $hide_social_header ) ) {
	$social_header_list = yc_get_option('social_header_list');
	$social_header_list = ( ( is_array( $social_header_list ) ) ) ? $social_header_list : array();		
}
$contact_icon = yc_get_option('contact_icon');
$contact_title = yc_get_option('contact_title');
$contact_number = yc_get_option('contact_number');
echo '<root>';
	echo '<header class="fixedintro">';
		echo '<div class="-Header-Fix">';
			echo '<div class="container">';

				echo '<div class="-mobile-menu-button background">';
				  	echo '<div class="menu__icon">';
				    	echo '<span></span>';
				    	echo '<span></span>';
				    	echo '<span></span>';
				  	echo '</div>';
				echo '</div>';
				# SITE LOGO	
				if( isset( $logo__data['logo__mode'] ) && $logo__data['logo__mode'] == 'Image' && isset( $logo__data[ $logo__data['logo__mode'] ] ) && isset( $logo__data[ $logo__data['logo__mode'] ]['image_logo'] ) && isset( $logo__data[ $logo__data['logo__mode'] ]['image_logo_id'] ) ){
					$logo__data[ $logo__data['logo__mode'] ]['header__alt'] = ( ( isset( $logo__data[ $logo__data['logo__mode'] ]['header__alt'] ) ) ) ? $logo__data[ $logo__data['logo__mode'] ]['header__alt'] : get_bloginfo('name');
					echo '<div class="-site-logo --logo-'.$logo__data['logo__mode'].' '.( ( empty( $hide_social_header ) || empty( $hide_search ) ) ? ' active':'').'">';					
					    echo '<a href="'.home_url().'" title="'.$logo__data[ $logo__data['logo__mode'] ]['header__alt'].'">';
					        echo YC_get_attachment(
					        	array(
						            'alt' =>$logo__data[ $logo__data['logo__mode'] ]['header__alt'],
						            'id'=>$logo__data[ $logo__data['logo__mode'] ]['image_logo_id'],
						            'alt'=>$logo__data[ $logo__data['logo__mode'] ]['header__alt'],
						            'size'=>'logo__size',
						        )
						    );
					    echo '</a>';
					echo '</div>';
				}else if( isset( $logo__data['logo__mode'] ) &&  $logo__data['logo__mode'] == 'Text' ){

					$logo__data[ $logo__data['logo__mode'] ]['header__alt'] = ( ( isset( $logo__data[ $logo__data['logo__mode'] ]['header__alt'] ) ) ) ? $logo__data[ $logo__data['logo__mode'] ]['header__alt'] : get_bloginfo('name');

						if( isset( $logo__data[ $logo__data['logo__mode'] ]['logo_Text'] ) && strpos( $logo__data[ $logo__data['logo__mode'] ]['logo_Text'],'{%') !== FALSE && strpos( $logo__data[ $logo__data['logo__mode'] ]['logo_Text'],'%}') !== FALSE ){
                            $logo__data[$logo__data['logo__mode']]['logo_Text'] = '<span class="first-logo-word">' . $logo__data[$logo__data['logo__mode']]['logo_Text'] . '</span>';
                            $logo__data[$logo__data['logo__mode']]['logo_Text'] = str_replace('{%', '</span><strong style="color:'.$logo__data[$logo__data['logo__mode']]['secondary_color'].'" class="second-logo-word">', $logo__data[$logo__data['logo__mode']]['logo_Text']);
							$logo__data[ $logo__data['logo__mode'] ]['logo_Text'] = str_replace('%}','</strong>',$logo__data[ $logo__data['logo__mode'] ]['logo_Text']);
						}
						echo '<div class="-site-logo --logo-'.$logo__data['logo__mode'].'">';
							echo'<div class="main-header"></div>';
							echo '<a href="'.home_url().'" title="'.$logo__data[ $logo__data['logo__mode'] ]['header__alt'].'">'.$logo__data[ $logo__data['logo__mode'] ]['logo_Text'].'</a>';
						echo '</div>';
				}
				echo '<div class="--Site--Menu">';
					wp_nav_menu(
				       	array(
							'theme_location' => 'main-menu',
							'menu'           => '',
							'container'      => '',
							'container_class' => '',
							'container_id'   => '',
							'menu_class'     => 'nav navbar-nav menu-master',
							'menu_id'        => '',
							'echo'           => true,
							'fallback_cb'    => 'wp_page_menu',
							'before'         => '',
							'after'          => '',
							'link_before'    => '',
							'link_after'     => '',
							'items_wrap'     => '<ul>%3$s</ul>',
							'depth'          => 0,
							'walker'         => '',
					   	)
					);
					$hide_contact__header = yc_get_option('hide_contact__header');
					if( empty($hide_contact__header) ) 
					$contact_header_list = yc_get_option('contact_header_list');
					if( empty( $hide_contact__header) && !empty($contact_header_list) ){
						$contact_header_list = ( ( is_array( $contact_header_list ) ) ) ? $contact_header_list : array();
						echo '<div class="--company-menu-mobile">';
							echo '<span>روابط المشاركة</span>';	
							echo '<ul class="-company-contact-minibox">';
								$SocialIcons = array(
									'phonenumber'=>'<i class="fa-solid fa-phone"></i>',
									'company__adress'=>'<i class="fa-solid fa-location-dot"></i>',
									'whatsapp'=>'<i class="fa-brands fa-whatsapp"></i>',
									'company__mail'=>'<i class="fa-solid fa-envelope"></i>',
								);
								foreach ( $contact_header_list as $social__item ) {
									$social_value = yc_get_option($social__item);
									if( !empty($social_value) ) {
										$URL__value = $social_value;
										$Name__value = $social_value;
										if( $social__item == 'whatsapp_number' ) {
											$URL__value = "https://wa.me/{$social_value}";
											$Name__value = 'تواصل عبر الواتساب ';
											$social__item = 'whatsapp';
										}
										if( $social__item == 'phonenumber' ) {
											$URL__value = "tel:{$social_value}";
											$Name__value = $social_value;
										}
										if( $social__item == 'company__mail' || $social__item == 'company__adress' ) {
											$URL__value = '#';
											$Name__value = $social_value;
										}

										echo '<li class="'.$social__item.'">';
											echo '<a target="_blank" href="'.$URL__value.'"  title="'.$Name__value.'">';
												echo $SocialIcons[ $social__item ];
												echo '<span>'.$Name__value.'</span>';
											echo '</a>';
										echo '</li>';
									}
								}

							echo '<ul>';
						echo '</div>';
						##
					}
				echo '</div>';
				echo '<div class="header--Tools">';

					# SEARCH
					echo '<div class="all-searsh-in">';
						if( empty( $hide_search ) ){
							if( empty( $search_placeholder ) ) $search_placeholder = 'ابحث';
							echo '<div class="--open--searching --search--buttonType-'.$searchButtonType.'" data-button="open-searching" data-searching-argums="'.base64_encode( json_encode( array('Text_search_button'=>$Text_search_button,'search_placeholder'=>$search_placeholder,'search_title'=>$search_title ) ) ).'">'.$Text_search_button.'</div>';
						}
					echo '</div>';

					# GEO + LANGUAGE SWITCHER — KAYAN by MAHMOUD ELSAAD
					// Detect country & lang server-side (no flash on load)
					$_ksw_path = $_SERVER['REQUEST_URI'] ?? '/';
					// Detect country from path prefix (e.g. /sa/, /qa/) — UAE is the base domain
					if( preg_match( '#^/sa(/|$)#', $_ksw_path ) ){
						$_ksw_country = 'sa'; $_ksw_flag = '🇸🇦';
					} elseif( preg_match( '#^/qa(/|$)#', $_ksw_path ) ){
						$_ksw_country = 'qa'; $_ksw_flag = '🇶🇦';
					} elseif( preg_match( '#^/kw(/|$)#', $_ksw_path ) ){
						$_ksw_country = 'kw'; $_ksw_flag = '🇰🇼';
					} elseif( preg_match( '#^/om(/|$)#', $_ksw_path ) ){
						$_ksw_country = 'om'; $_ksw_flag = '🇴🇲';
					} elseif( preg_match( '#^/bh(/|$)#', $_ksw_path ) ){
						$_ksw_country = 'bh'; $_ksw_flag = '🇧🇭';
					} else {
						$_ksw_country = 'ae'; $_ksw_flag = '🇦🇪';
					}
					$_ksw_lang = ( preg_match( '#/(sa|qa|kw|om|bh)/en(/|$)#', $_ksw_path ) || strpos( $_ksw_path, '/en' ) === 0 ) ? 'EN' : 'AR';

					echo '<div class="kayan-switcher-wrap" id="kayanSwitcher" dir="rtl">';
						echo '<button class="kayan-switcher-btn --open--searching --search--buttonType-icon" id="kayanSwitcherBtn" aria-haspopup="true" aria-expanded="false" aria-label="تبديل الدولة واللغة" title="اختر دولتك ولغتك">';
							echo '<span class="ksw-flag" id="kayanFlag" aria-hidden="true">'.$_ksw_flag.'</span>';
							echo '<span class="ksw-lang-label" id="kayanLang">'.$_ksw_lang.'</span>';
						echo '</button>';
						echo '<div class="ksw-dropdown" id="kayanDropdown" role="menu" aria-hidden="true">';
							echo '<div class="ksw-arrow" aria-hidden="true"></div>';
							// ── Country Section
							echo '<div class="ksw-section">';
								echo '<p class="ksw-section-label"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>الدولة</p>';
								echo '<div class="ksw-countries" role="group">';
									echo '<button class="ksw-country-btn" data-country="ae" role="menuitem"><span class="ksw-btn-flag" aria-hidden="true">🇦🇪</span><span>الإمارات</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
									echo '<button class="ksw-country-btn" data-country="sa" role="menuitem"><span class="ksw-btn-flag" aria-hidden="true">🇸🇦</span><span>السعودية</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
									echo '<button class="ksw-country-btn" data-country="qa" role="menuitem"><span class="ksw-btn-flag" aria-hidden="true">🇶🇦</span><span>قطر</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
									echo '<button class="ksw-country-btn" data-country="kw" role="menuitem"><span class="ksw-btn-flag" aria-hidden="true">🇰🇼</span><span>الكويت</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
									echo '<button class="ksw-country-btn" data-country="om" role="menuitem"><span class="ksw-btn-flag" aria-hidden="true">🇴🇲</span><span>عمان</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
									echo '<button class="ksw-country-btn" data-country="bh" role="menuitem"><span class="ksw-btn-flag" aria-hidden="true">🇧🇭</span><span>البحرين</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
								echo '</div>';
							echo '</div>';
							echo '<div class="ksw-divider" role="separator" aria-hidden="true"></div>';
							// ── Language Section
							echo '<div class="ksw-section">';
								echo '<p class="ksw-section-label"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 8l6 6"/><path d="M4 14l6-6 2-3"/><path d="M2 5h12"/><path d="M7 2h1"/><path d="M22 22l-5-10-5 10"/><path d="M14 18h6"/></svg>اللغة</p>';
								echo '<div class="ksw-langs" role="group">';
									echo '<button class="ksw-lang-btn" data-lang="ar" role="menuitem" aria-label="اللغة العربية"><span class="ksw-lang-badge" aria-hidden="true">ع</span><span>العربية</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
									echo '<button class="ksw-lang-btn" data-lang="en" role="menuitem" aria-label="English language"><span class="ksw-lang-badge" aria-hidden="true">EN</span><span>English</span><svg class="ksw-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></button>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
					// ── Switcher JS (inline, no dependencies)
					echo '<script>
(function(){
"use strict";
var CFG={
  baseDomain:"www.rukn-eltatawer.com",
  countryPaths:{
      ae:"",
      sa:"/sa",
      qa:"/qa",
      kw:"/kw",
      om:"/om",
      bh:"/bh"
  },
  flags:{ae:"🇦🇪",sa:"🇸🇦",qa:"🇶🇦",kw:"🇰🇼",om:"🇴🇲",bh:"🇧🇭"},
  storageKey:"kayan_geo_pref"
};
function detect(){
  var p=location.pathname;
  var country="ae";
  if(p.indexOf("/sa/")===0||p==="/sa")country="sa";
  else if(p.indexOf("/qa/")===0||p==="/qa")country="qa";
  else if(p.indexOf("/kw/")===0||p==="/kw")country="kw";
  else if(p.indexOf("/om/")===0||p==="/om")country="om";
  else if(p.indexOf("/bh/")===0||p==="/bh")country="bh";
  var countryBase=CFG.countryPaths[country]||"";
  var pathAfterCountry=p.slice(countryBase.length)||"/";
  var isEn=(pathAfterCountry==="/en"||pathAfterCountry==="/en/"||pathAfterCountry.indexOf("/en/")===0);
  var lang=isEn?"en":"ar";
  var slug=pathAfterCountry;
  if(isEn){slug=pathAfterCountry.replace(/^\/en\/?/,"/")||"/"; if(slug!=="/"&&slug[0]!=="/")slug="/"+slug;}
  if(slug!=="/"&&slug.slice(-1)==="/")slug=slug.slice(0,-1);
  return{country:country,lang:lang,slug:slug};
}
function buildURL(country,lang,slug){
  var base=location.protocol+"//"+CFG.baseDomain;
  var countryPath=CFG.countryPaths[country]||"";
  var s=(slug&&slug!=="/")?slug:"";
  if(lang==="en") return base+countryPath+"/en"+(s||"")+"/";
  return base+countryPath+(s||"/");
}
function navigate(country,lang){
  var s=detect();
  var url=buildURL(country,lang,s.slug);
  try{localStorage.setItem(CFG.storageKey,JSON.stringify({country:country,lang:lang,ts:Date.now()}));}catch(e){}
  // HEAD check → fallback to homepage on 404
  fetch(url,{method:"HEAD"}).then(function(r){
    window.location.href=r.ok?url:(location.protocol+"//"+CFG.baseDomain+(CFG.countryPaths[country]||"")+"/");
  }).catch(function(){
    window.location.href=location.protocol+"//"+CFG.baseDomain+(CFG.countryPaths[country]||"")+"/";
  });
}
function updateUI(country,lang){
  var f=document.getElementById("kayanFlag");
  var l=document.getElementById("kayanLang");
  if(f)f.textContent=CFG.flags[country]||"🌐";
  if(l)l.textContent=lang==="en"?"EN":"AR";
  document.querySelectorAll(".ksw-country-btn").forEach(function(b){
    var a=b.dataset.country===country;
    b.classList.toggle("is-active",a);
    b.setAttribute("aria-pressed",a?"true":"false");
  });
  document.querySelectorAll(".ksw-lang-btn").forEach(function(b){
    var a=b.dataset.lang===lang;
    b.classList.toggle("is-active",a);
    b.setAttribute("aria-pressed",a?"true":"false");
  });
}
function open(){
  var d=document.getElementById("kayanDropdown"),b=document.getElementById("kayanSwitcherBtn");
  if(!d||!b)return;
  // Position dropdown dynamically to stay within viewport
  var rect=b.getBoundingClientRect();
  var dropW=210;
  var margin=8;
  var top=rect.bottom+margin;
  // Try to align to right edge of button first (RTL)
  var left=rect.right-dropW;
  // If goes off left edge, align to left edge of button
  if(left<margin)left=margin;
  // If goes off right edge, pull back
  if(left+dropW>window.innerWidth-margin)left=window.innerWidth-dropW-margin;
  d.style.top=top+"px";
  d.style.left=left+"px";
  d.style.right="auto";
  d.classList.add("is-open");
  b.setAttribute("aria-expanded","true");
  d.setAttribute("aria-hidden","false");
  var first=d.querySelector(".ksw-country-btn,.ksw-lang-btn");
  if(first)first.focus();
}
function close(){
  var d=document.getElementById("kayanDropdown"),b=document.getElementById("kayanSwitcherBtn");
  if(!d||!b)return;
  d.classList.remove("is-open");
  b.setAttribute("aria-expanded","false");
  d.setAttribute("aria-hidden","true");
}
function toggle(){var d=document.getElementById("kayanDropdown");if(d)d.classList.contains("is-open")?close():open();}
function init(){
  var btn=document.getElementById("kayanSwitcherBtn");
  var drop=document.getElementById("kayanDropdown");
  if(!btn||!drop)return;
  var st=detect();
  updateUI(st.country,st.lang);
  btn.addEventListener("click",function(e){e.stopPropagation();toggle();});
  document.querySelectorAll(".ksw-country-btn").forEach(function(b){
    b.addEventListener("click",function(){
      var s=detect();
      // Use saved lang preference if available
      var saved={};
      try{saved=JSON.parse(localStorage.getItem(CFG.storageKey)||"{}");}catch(e){}
      var preferLang=saved.lang||s.lang;
      navigate(b.dataset.country,preferLang);
    });
  });
  document.querySelectorAll(".ksw-lang-btn").forEach(function(b){
    b.addEventListener("click",function(){navigate(detect().country,b.dataset.lang);});
  });
  document.addEventListener("click",function(e){
    var w=document.getElementById("kayanSwitcher");
    if(w&&!w.contains(e.target))close();
  });
  document.addEventListener("keydown",function(e){
    var d=document.getElementById("kayanDropdown");
    if(!d)return;
    var isOpen=d.classList.contains("is-open");
    if(e.key==="Escape"&&isOpen){close();btn.focus();return;}
    if((e.key==="Enter"||e.key===" ")&&e.target===btn){e.preventDefault();toggle();return;}
    if(!isOpen)return;
    var items=Array.from(d.querySelectorAll(".ksw-country-btn,.ksw-lang-btn"));
    var idx=items.indexOf(document.activeElement);
    if(e.key==="ArrowDown"){e.preventDefault();(items[idx+1]||items[0]).focus();}
    else if(e.key==="ArrowUp"){e.preventDefault();(items[idx-1]||items[items.length-1]).focus();}
    else if(e.key==="Tab")close();
  });
  document.addEventListener("touchmove",function(){if(document.getElementById("kayanDropdown").classList.contains("is-open"))close();},{passive:true});
}
if(document.readyState==="loading")document.addEventListener("DOMContentLoaded",init);
else init();
})();
</script>';

					# CITY
					$hide_city_bar = yc_get_option('hide_city_bar');
					$city = yc_get_option('city_groub');
					if( empty($hide_city_bar) ) {
						if(	isset( $city )  && !empty( $city ) ) {
							echo'<div class="all-taxonimes-in">';
								echo'<div class="-header-call-">';
									echo'<i class="fa-solid fa-phone"></i>';
								echo'</div>';
								echo'<div class="-taxonomy--contact-">';
									foreach ($city as $c => $r) {
										$phonenumber = yc_get_option('number_city');
										$iconss = yc_get_option('city_name');
										echo'<div class="-taxonimes-">';
											echo'<a href="tel:'.$r['number_city'].'" class="tax-in-here">';
												echo'<i class="fa-solid fa-phone"></i>';
												echo'<div class="-cits-taxonimes-">';
													echo'<span class="-city-name-">' .$r['city_name']. '</span>';
													echo'<span class="-city-number-">' .$r['number_city']. '</span>';
												echo'</div>';
											echo'</a>';
										echo'</div>';
									}
									echo'<div class="contact-us-header">';
										echo'<div class="-conatct-text">';
										
										    // 4. أيقونة تواصل معنا المجانية
											echo'<i class="fa-solid fa-comment-dots"></i>';
											
											echo'<span class="conatct-place">تواصل معنا </span>';
										echo'</div>';
										# SOCIAL 
										echo '<div class="--top-area-social-">';
											if( empty( $hide_social_header ) ) {
												$SocialIcon = array(
													'facebook'=>'<i class="fab fa-facebook-f"></i>',
													'twitter'=>'<i class="fab fa-twitter"></i>',
													'telegram'=>'<i class="fa-brands fa-telegram"></i>',
													'youtube'=>'<i class="fab fa-youtube"></i>',
													'linkedin'=>'<i class="fab fa-linkedin-in"></i>',
													'instagram'=>'<i class="fab fa-instagram"></i>',
												);
												echo '<div class="--socialheader">';
													$SocialIcons = array(
														'phonenumber'=>'<i class="fa-solid fa-phone"></i>',
														'company__adress'=>'<i class="fa-solid fa-location-dot"></i>',
														'whatsapp'=>'<i class="fa-brands fa-whatsapp"></i>',
														'company__mail'=>'<i class="fa-solid fa-envelope"></i>',
													);
													echo'<ul class="list-unstyled">';
														foreach ( $social_header_list as $social__item ) {
															$social_value = yc_get_option($social__item);
															if( !empty($social_value) ) {
																echo'<li class="'.$social__item.'"><a class="hoverable" target="_blank" title="'.$social__item.'" href="'.$social_value.'">'.$SocialIcon[ $social__item ].'</a></li>';
															}
														}
													echo'</ul>';
												echo '</div>';
											}
										echo '</div>';
									echo'</div>';
								echo'</div>';
							echo'</div>';
						}
					}

				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</header>';