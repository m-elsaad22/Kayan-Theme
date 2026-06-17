<?
$Styles = array();
$Widgets__list = array();
$YC__WidgetsMachine = new YC__WidgetsMachine;

$home_widgets = ( is_array( yc_get_option( 'widgets_home__meta' ) ) ) ? yc_get_option( 'widgets_home__meta' ) : array();
$home_widgets = ( is_array( $home_widgets ) ) ? $home_widgets : array();

if ( function_exists( 'kayan_home_widgets_use_v2026' ) && kayan_home_widgets_use_v2026( $home_widgets ) ) {
	kayan_home_v2026_render_page( $home_widgets );
}

# LEGACY HOMEPAGE (Intro + Standard widgets) — below only when Home2026 widgets are not used.
$ShowIntro = false;
	$HomeIntro = ( is_array( yc_get_option('HomeIntro') ) ) ? yc_get_option('HomeIntro') : array();
	$HomeIntro = ( is_array( $HomeIntro ) ) ? $HomeIntro : array();
	#
	if( isset( $HomeIntro['SelectedModel'] ) && !empty( $HomeIntro['SelectedModel'] ) ){ $ShowIntro = true;
		$ActiveModel = $HomeIntro['SelectedModel'];

		$Intro_Data = ( ( isset( $HomeIntro[ $ActiveModel ] ) ) ) ? $HomeIntro[ $ActiveModel ] : array();
		#
		if( isset( $Intro_Data[ 'TextAreaColor' ] ) && strpos($Intro_Data[ 'TextAreaColor' ], PHP_EOL ) !== FALSE ){
			$Intro_Data[ 'TextAreaColor' ] = explode(PHP_EOL, $Intro_Data[ 'TextAreaColor' ]);
		}else{
			$Intro_Data[ 'TextAreaColor' ] = array();	
		}
		$HeaderAttr = 'style="'.implode('', $Intro_Data[ 'TextAreaColor' ]).'"';
		$Intro_Data['AttrStyle'] = $HeaderAttr;
		#
		$Path_style__Intro = $this->StylesPath.'YourColor__Intro';
		$StyleFields__Intro = array();
		#
		foreach( glob($Path_style__Intro.'/*.css') as $cs__file ) {
			$current_file_name = explode('YourColor__Intro/', $cs__file)[1];
			$current_file_name = explode('/', $current_file_name)[0];
			$current_file_name = explode('.css', $current_file_name)[0];
			$StyleFields__Intro[] = $current_file_name;
		}

		# Style FILES.
		if( in_array( $ActiveModel ,$StyleFields__Intro ) ){
			$Styles[$ActiveModel] = 'YourColor__Intro/'.$ActiveModel.'.css';
		}
	}

# HOME WIDGETS SETUP (legacy Standard widgets)
	if ( ! empty( $home_widgets ) && ! kayan_home_widgets_use_v2026( $home_widgets ) ) {
		$widgets__Enqueues = $YC__WidgetsMachine->widgets__Enqueues($home_widgets);
		$Styles = array_merge($Styles,$widgets__Enqueues);

		$extraxt__Widgetlist = $YC__WidgetsMachine->get__widgets__list($home_widgets);
		$Widgets__list = array_merge($Widgets__list,$extraxt__Widgetlist);
	}				


$this->Part('header',array('Styles'=>$Styles,'IntroPage'=>true,'Widgets__list'=>$Widgets__list));

	# HOMEPAGE SECTIONS QUEUE (supports kayan_homepage_sections_order).
	$homepage_render_queue = function_exists( 'kayan_get_homepage_render_queue' )
		? kayan_get_homepage_render_queue( $HomeIntro, $home_widgets, $ShowIntro )
		: array();

	if ( ! empty( $homepage_render_queue ) ) {
		foreach ( $homepage_render_queue as $homepage_section ) {
			if ( $homepage_section['type'] === 'intro' ) {
				$YC__WidgetsMachine->widgets__model__UI( array( 'model__value' => $HomeIntro ) );
			} elseif ( $homepage_section['type'] === 'widget' && ! empty( $homepage_section['data'] ) ) {
				$YC__WidgetsMachine->widgets___UI(
					array(
						'Widgets_data' => array( $homepage_section['key'] => $homepage_section['data'] ),
						'WidgetID' => 'home_widgets',
					)
				);
			}
		}
	} else {
		# INTRO UI.
		if ( $ShowIntro == true ) {
			$YC__WidgetsMachine->widgets__model__UI( array( 'model__value' => $HomeIntro ) );
		}

		# WIDGETS UI
		if ( ! empty( $home_widgets ) ) {
			$YC__WidgetsMachine->widgets___UI( array( 'Widgets_data' => $home_widgets, 'WidgetID' => 'home_widgets' ) );
		}
	}

$this->Part('footer',array('Styles'=>$Styles,'Widgets__list'=>$Widgets__list));