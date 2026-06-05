<? function LoardIcons($json="",$w="50px",$h="50px",$options=array("primary"=>'#ffffff',"secondary"=>'#ffffff',"stroke"=>'70',"trigger"=>'loop',"delay"=>'3000')){
	if($json == '') return false;
	if(!isset($options['trigger'])) $options['trigger'] = 'loop';
	if(!isset($options['primary'])) $options['primary'] = '#151c28';
	if(!isset($options['secondary'])) $options['secondary'] = '#1147a7';
	$Trigger = '<lord-icon ';
		$Trigger .= 'src="https://cdn.lordicon.com/'.$json.'.json" ';
		$Trigger .= 'style="width:'.$w.';height:'.$h.'" ';
		$Trigger .= 'trigger="'.$options['trigger'].'" ';
		$Trigger .= 'colors="primary:'.$options['primary'].',secondary:'.$options['secondary'].'" ';
		if(isset($options['stroke'])){
			$Trigger .= 'stroke="'.$options['stroke'].'" ';
		}
		if(isset($options['axis-x'])){
			$Trigger .= 'axis-x="'.$options['axis-x'].'" ';
		}
		if(isset($options['axis-y'])){
			$Trigger .= 'axis-y="'.$options['axis-y'].'" ';
		}

		if(isset($options['delay'])){
			$Trigger .= 'delay="'.$options['delay'].'" ';
		}
		if(isset($options['scale'])){
			$Trigger .= 'scale="'.$options['scale'].'" ';
		}
	$Trigger .= "></lord-icon>";
	return $Trigger;
}