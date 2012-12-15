<?php


function connecttodb(){
global $db, $dbhost, $dbname, $dbusername, $dbuserpassword;
$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbusername, $dbuserpassword,
array(PDO::ATTR_PERSISTENT => true)
);
$db->exec("SET CHARACTER SET utf8");
}//function connecttodb()


function kucirow(){
	$alu=curl_init($ba);
	curl_setopt($alu,CURLOPT_NOBODY,TRUE);
	curl_setopt($alu,CURLOPT_MAXREDIRS,5);
	curl_exec($alu);
	$hc=curl_getinfo($alu,CURLINFO_HTTP_CODE);
	if($hc==302||$hc==301){
		header("HTTP/1.1 404 Not Found");
		header('Content-Type: text/html; charset=utf-8');
		echo('Бу артык күп тапкыр башка адреска күчерә');
		exit;
	}
	$eu=curl_getinfo($alu,CURLINFO_EFFECTIVE_URL);
	if( substr($eu,0,7)!='http://' ){
		header("HTTP/1.1 404 Not Found");
		header('Content-Type: text/html; charset=utf-8');
		echo('Бу әйләндергеч кабул итмәй торган протоколлы адреска күчерә');
		exit;
	}
	$eu=substr($eu,7);//            example.com/
	$pathstart=strpos($eu,'/');
	
	$ikinoqtaurono=strpos($eu,':');
	$portkursatilgan=false;//монысы башта
	if($ikinoqtaurono!==false){
		//x.com:90/
		if($pathstart!==false){
			if($ikinoqtaurono<$pathstart){
				if( substr($eu,$ikinoqtaurono+1,$pathstart-$ikinoqtaurono-1)=='80' ){
					$eu=substr($eu,0,$ikinoqtaurono).substr($eu,$pathstart);
					$pathstart=strpos($eu,'/');
					//порт күрсәтелмәгән иттерелде
				}else{
					$portkursatilgan=true;
				}
			}//else порт күрсәтелмәгән булып кала: x.com/f:f
		}else{
			if( substr($eu,$ikinoqtaurono+1)=='80' ){
				$eu=substr($eu,0,$ikinoqtaurono);
				//порт күрсәтелмәгән иттерелде
			}else{
				$portkursatilgan=true;
			}
		}
	}//else порт күрсәтелмәгән
	if( $portkursatilgan==true ){
		header("HTTP/1.1 404 Not Found");
		header('Content-Type: text/html; charset=utf-8');
		echo('Бу әйләндергеч кабул итмәй торган портлы адреска күчерә');
		exit;
	}
	if($pathstart===false){
		header('Location: http://'.$eu.'.'.$til.'.'.TOPDOMEN.'/');
	}else{
		$eud=substr($eu,0,$pathstart);
		$eup=substr($eu,$pathstart);
		header('Location: http://'.$eud.'.'.$til.'.'.TOPDOMEN.$eup);
	}
	exit;
}//function kucirow()


function tuloadres($hazirgiadres,$barasoadres){
	global $debug;


	$basqaprotokol='#(javascript|mailto|ftp):.*#ui';
	$basqaprotokolsano=preg_match($basqaprotokol,$barasoadres);
	if($basqaprotokolsano==1){
		return $barasoadres;
	}

	$domainregex='([\w\-\x{0400}-\x{0697}]+\.)*[\w\-\x{0400}-\x{0697}]+';
	//$toptan='#https?://([\w\-]+\.)+[\w]+/?.*#ui';
	//$toptan='#https?://([\w\-]+\.)*[\w]+(:[\d]+)?(/.*)?#ui';
	$toptan="#(https?://)($domainregex)(:[\d]+)?(/.*)?#ui";
	//$toptansano=preg_match($toptan,$barasoadres);
	$toptansano=preg_match($toptan,$barasoadres,$olos);
	if($toptansano==1){
		//return $barasoadres;
		//$debug.=$olos[1].urldecode($olos[2]).$olos[4].$olos[5];
		return $olos[1].idn_to_ascii($olos[2]).$olos[4].$olos[5];
	}


	$ikislestan="#(//)($domainregex)(:[\d]+)?(/.*)?#ui";
	//$toptansano=preg_match($toptan,$barasoadres);
	$ikislestansano=preg_match($ikislestan,$barasoadres,$olos);
	if($ikislestansano==1){
		//return $barasoadres;
		//$debug.=$olos[1].urldecode($olos[2]).$olos[4].$olos[5];
		return $olos[1].idn_to_ascii($olos[2]).$olos[4].$olos[5];
	}


	$resetkeden='#^\#.*$#ui';
	$resetkedensano=preg_match($resetkeden,$barasoadres);
	if($resetkedensano==1){
		return $barasoadres;
	}


//	$domentobondan='#/([^"\'\#>]*)?(\#[^"\'\s>]*)?["\']?[\s>]#ui';
//	$domentobondan='#^/[^"\'\#>]*(\#[^"\'\s>]*)?$#ui';
	$domentobondan='#^/.*$#ui';
	$domentobondansano=preg_match($domentobondan,$barasoadres);
	if($domentobondansano==1){
		
//		$domen='#[\w\-]+\.([\w\-]+\.)*[\w]+#ui';
		//$domen='#https?://([\w\-]+\.)+[\w]+#ui';
		//$domen='#https?://([\w\-]+\.)*[\w]+(:[\d]+)?#ui';
		$domen="#(https?://)($domainregex)(:[\d]+)?#ui";
		$domensano=preg_match($domen,$hazirgiadres,$tabolgandomen);
		if($domensano==1){
			//print_r($tabolgandomen);
			//echo(strlen($tabolgandomen[1]));
			//return $tabolgandomen[0].$barasoadres;
			return
$tabolgandomen[1].idn_to_ascii($tabolgandomen[2]).
$tabolgandomen[4].$barasoadres
			;
		}
		
		return $barasoadres;
	}


	$sawottan='#^[^/\?].*$#ui';
	$sawottansano=preg_match($sawottan,$barasoadres);
	if($sawottansano==1){
		//$domenbilansawot='#https?://([\w\-]+\.)*[\w]+(:[\d]+)?/([^\#\?]*/)?#ui';
		$domenbilansawot="#(https?://)($domainregex)(:[\d]+)?/([^\#\?]*/)?#ui";
		$domenbilansawotsano=preg_match($domenbilansawot,$hazirgiadres,$tabolgandomenbilansawot);
		if($domenbilansawotsano==1){
			//echo(' савыттан ');
			//print_r($tabolgandomenbilansawot);
			return
$tabolgandomenbilansawot[1].idn_to_ascii($tabolgandomenbilansawot[2]).
$tabolgandomenbilansawot[4].'/'.$tabolgandomenbilansawot[5].$barasoadres
			;
		}
		//$slessozdomen='#https?://([\w\-]+\.)*[\w]+(:[\d]+)?#ui';
		$slessozdomen="#(https?://)($domainregex)(:[\d]+)?#ui";
		$slessozdomensano=preg_match($slessozdomen,$hazirgiadres,$tabolganslessozdomen);
		if($slessozdomensano==1){
			//echo(' савыттан ');
			//print_r($tabolgandomenbilansawot);
			return
$tabolganslessozdomen[1].idn_to_ascii($tabolganslessozdomen[2]).
$tabolganslessozdomen[4].'/'.$barasoadres
			;
		}
	}


	$sorawdan='#^\?.*$#ui';
	$sorawdansano=preg_match($sorawdan,$barasoadres);
	if($sorawdansano==1){
		//$sorawgaca='#https?://([\w\-]+\.)*[\w]+(:[\d]+)?/[^\#\?]*#ui';
		$sorawgaca="#(https?://)($domainregex)(:[\d]+)?(/[^\#\?]*)#ui";
		$sorawgacasano=preg_match($sorawgaca,$hazirgiadres,$tabolgansorawgaca);
		if($sorawgacasano==1){
			//print_r($tabolgansorawgaca);
			return
$tabolgansorawgaca[1].idn_to_ascii($tabolgansorawgaca[2]).
$tabolgansorawgaca[4].$tabolgansorawgaca[5].$barasoadres
			;
		}
	}


	return;

}


function aylandirilgan_url($h){//http:// белән генә дөрес эшли!!
	//global $til,$doo;
	global $til,$debug;
	//$debug.=$h;
	//if($doo>4){
	$h=substr($h,7);
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
	//$debug.=substr($hd,-22);
	//$debug.=$hd;
	//$debug.=$h;
	if(substr($hd,-22)=='.'.TOPDOMEN){
		return 'http://'. $h;
	}
	
	if($pathstart===false){
		return 'http://'. $h. '.'. $til. '.'.TOPDOMEN.'/';
	}else{
		//$hd=substr($h,0,$pathstart);
		$hp=substr($h,$pathstart);
		return 'http://'. $hd. '.'. $til. '.'.TOPDOMEN.$hp;
	}
	//}else{
	//	return 'http://aylandirow.tmf.org.ru/'.$til.'/'.substr($h,7);
	//}
}


function yoropcoq($current_node){
	global $base, $ba, $gaw, $t1, $jitti, $til, $scriptcharset, /*$jittiammabitmadi,*/ $kesislay;
	$current_childs=$current_node->childNodes;
	$current_child_count=$current_childs->length;
	for($i=0;$i<$current_child_count;$i++){
		$current_child=$current_childs->item($i);
		$current_child_type=$current_child->nodeType;
		if($current_child_type==XML_ELEMENT_NODE){
			$current_child_tagname=$current_child->nodeName;
			if($current_child_tagname=='a'){
			if($current_child->hasAttribute('href')){
				$h=$current_child->getAttribute('href');
				$h=tuloadres($base,$h);
				if(substr($h,0,7)=='http://'){//https кирәк түгел, калсын
					$h=aylandirilgan_url($h);//әйләндерергә
				}
				$current_child->setAttribute('href',$h);
			}//if($current_child->hasAttribute('href'))
			yoropcoq($current_child);
			}//if($current_child->nodeName=='a')
			elseif($current_child_tagname=='iframe'){
			$h=$current_child->getAttribute('src');
			$h=tuloadres($base,$h);
			if(substr($h,0,7)=='http://'){//https кирәк түгел, калсын
				apc_store($h,true,20);
				$h=aylandirilgan_url($h);//әйләндерергә
			}
			$current_child->setAttribute('src',$h);
			}//if($current_child->nodeName=='a')...elseif($current_child->nodeName=='iframe')...
			elseif($current_child_tagname=='script'){
			if($current_child->hasAttribute('src')){
				$h=$current_child->getAttribute('src');
				$h=tuloadres($base,$h);
				$current_child->setAttribute('src',$h);
				if(isset($scriptcharset)&&!$current_child->hasAttribute('charset')){
					$current_child->setAttribute('charset',$scriptcharset);
				}
			}
			}//if($current_child->nodeName=='a')......elseif($current_child->nodeName=='script')...
			elseif($current_child_tagname=='form'){
				$h=$current_child->getAttribute('action');
				$h=tuloadres($base,$h);
				if(substr($h,0,7)=='http://'){//https кирәк түгел, калсын
					$h=aylandirilgan_url($h);//әйләндерергә
				}
				$current_child->setAttribute('action',$h);
				yoropcoq($current_child);
			}//if($current_child->nodeName=='a')............elseif($current_child->nodeName=='form')...
			elseif($current_child_tagname=='img'){
				$h=$current_child->getAttribute('src');
				$h=tuloadres($base,$h);
				$current_child->setAttribute('src',$h);
			}//if($current_child->nodeName=='a')....elseif....elseif($current_child->nodeName=='img')...
			elseif($current_child_tagname=='table'||$current_child_tagname=='td'){
				if($current_child->hasAttribute('background')){
					$h=$current_child->getAttribute('background');
					$h=tuloadres($base,$h);
					$current_child->setAttribute('background',$h);
				}
				yoropcoq($current_child);
			}//if($current_child->nodeName=='a')..elseif..elseif($current_child->nodeName=='table'||..)..
			elseif($current_child_tagname=='link'){
				$h=$current_child->getAttribute('href');
				$h=tuloadres($base,$h);
				$current_child->setAttribute('href',$h);
			}//if($current_child->nodeName=='a')..elseif..elseif($current_child->nodeName=='link')..
			elseif($current_child_tagname=='style'){
				$style=$current_child->nodeValue;
				$style=preg_replace_callback('/@import\s+(url\((.*)\)|"(.*)")/ui','fiximport',$style);
				$current_child->nodeValue=$style;
			}//if($current_child->nodeName=='a')..elseif..elseif($current_child->nodeName=='style')..
			elseif($current_child_tagname=='meta'){
				if(strtolower($current_child->getAttribute('http-equiv'))=='refresh'){
				$mref=$current_child->getAttribute('content');
				$mref=explode(';',$mref);
				if(count($mref)>1){
					$metaurl=explode('=',$mref[1]);
					$metaurl=$metaurl[1];
					$current_child->setAttribute('content','0; URL='.aylandirilgan_url($metaurl));
				}//if(count($mref)>1)
				}//if(strtolower($current_child->getAttribute('http-equiv'))=='refresh')
			}//if($current_child->nodeName=='a')..elseif..elseif($current_child->nodeName=='meta')..
			elseif($current_child_tagname=='base'){
				$base=$current_child->getAttribute('href');
				//$base=tuloadres($ba,$base);//бу кирәк түгел бугай
				//http://qdb.tmf.org.ru/html-js-css-xml-sinaw/base2.html
				//басе абсолют булмаса, "ба" басе булсын
				$domainregex='([\w\-\x{0400}-\x{0697}]+\.)*[\w\-\x{0400}-\x{0697}]+';
				$toptan="#(https?://)($domainregex)(:[\d]+)?(/.*)?#ui";
				$toptansano=preg_match($toptan,$barasoadres);
				if($toptansano==0){
					$base=$ba;
				}
			}//if($current_child->nodeName=='a')..elseif..elseif($current_child->nodeName=='base')..
			else{
				yoropcoq($current_child);
			}
		}//if($current_child_type==XML_ELEMENT_NODE)
		elseif($current_child_type==XML_TEXT_NODE){
			/*$aw1=microtime(true);
			if($gaw<30){
			$current_child->nodeValue=aylandir($current_child->nodeValue);
			}//if($gaw<..)
			$aw=microtime(true)-$aw1;
			$gaw+=$aw;*/
			/*if(microtime(true)-$t1<20){
			$current_child->nodeValue=aylandir($current_child->nodeValue);
			}*/
			/*if(!$jitti){
				$current_child->nodeValue=aylandir($current_child->nodeValue);
				if(microtime(true)-$t1>20){
					$jitti=true;
				}
			}*/
			if(!$jitti){
				$tmps=$current_child->nodeValue;
				$tmpsmd5=$til.md5($tmps);
				//$tmpsmd5=$tmps;//мд5 тән бер аз хужерак
				$tmpns=apc_fetch($tmpsmd5);
				//апс кына булып, мин моның белән тикшергән иң зур биттә дә барысы ярты секундка сыеп бетте
				if($tmpns==false){
					$tmpns=aylandir($tmps);
					apc_store($tmpsmd5,$tmpns);
				}
				$current_child->nodeValue=$tmpns;
				if(microtime(true)-$t1>20){
					$jitti=true;
				}
			//}elseif(!$jittiammabitmadi){
			}elseif($kesislay){
				if(mb_strlen($current_child->nodeValue)>0){
					//$jittiammabitmadi=true;
					$kesislay=false;
				}
			}
			//echo $aw.'('.$gaw.'); ';
		//}//if($current_child_type==XML_ELEMENT_NODE)...elseif($current_child_type==XML_TEXT_NODE)...
		//else{
		}
	}//for($i=0;$i<$current_child_count;$i++)
}//function yoropcoq($current_node)





?>
