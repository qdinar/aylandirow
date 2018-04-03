<?php


function aylandirilgan_url($h){//http:// белән генә дөрес эшли!!
	//global $til,$doo;
	global $til,$debug;
	//$debug.=$h;
	//if($doo>4){
	$https=false;
	if(substr($h,0,7)=='http://'){
		$h=substr($h,7);
	}elseif(substr($h,0,8)=='https://'){
		$h=substr($h,8);
		$https=true;
	}else{
		return $h;
	}
	$ikinoqtaurono=strpos($h,':');
	$pathstart=strpos($h,'/');
	
	if($ikinoqtaurono!==false){//ике нокта кайдадыр бар
		//x.com:90/
		if($pathstart!==false){//слеш бар
			if($ikinoqtaurono<$pathstart){//ике нокта портныкы
				if( substr($h,$ikinoqtaurono+1,$pathstart-$ikinoqtaurono-1)=='80' ){
					$h=substr($h,0,$ikinoqtaurono).substr($h,$pathstart);
					$pathstart=strpos($h,'/');
					//80енче порт күрсәтелмәгән иттерелде
				}else{//ниндидер башка порт күрсәтелгән, әйләндермим
					return 'http://'. $h;
				}
			}//else ике нокта портныкы түгел, проблема юк
		}else{//слеш юк, ә ике нокта бар, ул портныкы
			if( substr($h,$ikinoqtaurono+1)=='80' ){
				$h=substr($h,0,$ikinoqtaurono);
				//80енче порт күрсәтелмәгән иттерелде
			}else{//ниндидер башка порт күрсәтелгән, әйләндермим
				return 'http://'. $h;
			}
		}
	}//else ике нокта бөтенләй юк, проблема юк
	
	if($pathstart===false){
		$hd=$h;
	}else{
		$hd=substr($h,0,$pathstart);
	}
	if($https){
		$hd='https.'.$hd;
	}
	//$debug.=substr($hd,-22);
	//$debug.=$hd;
	//$debug.=$h;
	if(substr($hd,-22)=='.'.TOPDOMEN){
		return 'http://'.  $hd;
	}
	
	if($pathstart===false){
		return 'http://'.  $hd. '.'. $til. '.'.TOPDOMEN.'/';
	}else{
		//$hd=substr($h,0,$pathstart);
		$hp=substr($h,$pathstart);
		return 'http://'.  $hd. '.'. $til. '.'.TOPDOMEN.$hp;
	}
	//}else{
	//	return 'http://aylandirow.tmf.org.ru/'.$til.'/'.substr($h,7);
	//}
}
