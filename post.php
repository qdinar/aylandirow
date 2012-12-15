<?php

echo('Тәкъдимең барып җитте!');

if(isset($_POST['yaponcaso'])){
	$yaponcaso=$_POST['yaponcaso'];
	$tatarcaso=$_POST['tatarcaso'];

	//echo("\n".$yaponcaso.'|'.$tatarcaso);
	include('yaponnantatarga.php');
	if(!isset($aylandirow[$yaponcaso])){
		$aylandirow[$yaponcaso]=$tatarcaso;
		$output='<?php'."\n\n".'$aylandirow='.var_export($aylandirow,true).";\n\n?>";
		file_put_contents('/var/www/saytlar/aylandirow/yaponnantatarga.php',$output);
	}else{
		echo("\nЛәкин ул кертелмәде, чөнки ул текстның тәрҗемәсе бар инде.");
	}
}elseif(isset($_POST['qazaqcaso'])){

	mb_internal_encoding('UTF-8');
	$qazaqcaso=$_POST['qazaqcaso'];
	$tatarcaso=$_POST['tatarcaso'];
	include('qazaqtantatarga.php');
	if(!isset($aylandirow2[$qazaqcaso])){
		$aylandirow2[$qazaqcaso]=$tatarcaso;
		$qazaqcasoo=mb_strlen($qazaqcaso);
		$tatarcasoo=mb_strlen($tatarcaso);
		if(mb_substr($tatarcaso,$tatarcasoo-1)=='к'){
			$tatarcaso=mb_substr($tatarcaso,0,$tatarcasoo-1).'г';
		}
		if(mb_substr($qazaqcaso,-1)=='қ'){//ахырдан беренче хәреф
			$aylandirow2[mb_substr($qazaqcaso,0,$qazaqcasoo-1).'ғ']=$tatarcaso;
		}
		if(mb_substr($qazaqcaso,-1)=='к'){//ахырдан беренче хәреф
			$aylandirow2[mb_substr($qazaqcaso,0,$qazaqcasoo-1).'г']=$tatarcaso;
		}
		if(mb_substr($tatarcaso,$tatarcasoo-1)=='п'){
			$tatarcaso=mb_substr($tatarcaso,0,$tatarcasoo-1).'б';
		}
		if(mb_substr($qazaqcaso,-1)=='п'){//ахырдан беренче хәреф
			$aylandirow2[mb_substr($qazaqcaso,0,$qazaqcasoo-1).'б']=$tatarcaso;
		}
		
		$output='<?php'."\n\n".'$aylandirow2='.var_export($aylandirow2,true).";\n\n?>";
		file_put_contents('/var/www/saytlar/aylandirow/qazaqtantatarga.php',$output);
	}else{
		echo("\nЛәкин ул кертелмәде, чөнки ул текстның тәрҗемәсе бар инде.");
	}
	
}elseif(isset($_POST['uzgartasitugilqazaqca'])){

	$qazaqcaso=$_POST['uzgartasitugilqazaqca'];
	include('qazaqtantatarga-yevropa.php');
	if(!in_array($qazaqcaso,$aylandirow1)){
		$aylandirow1[]=$qazaqcaso;
		$output='<?php'."\n\n".'$aylandirow1='.var_export($aylandirow1,true).";\n\n?>";
		file_put_contents('/var/www/saytlar/aylandirow/qazaqtantatarga-yevropa.php',$output);
	}else{
		echo("\nЛәкин ул кертелмәде, чөнки ул бар инде.");
	}

}

?>
