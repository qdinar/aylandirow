<?php
//function url_to_absolute($hazirgiadres,$barasoadres){
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

//tuloadres('http://example.com/iii.bmp', '/өөө');
//echo tuloadres('http://example.com/iii.bmp', '/өөө');
//echo tuloadres('http://example.com/i/ii.bmp', 'өөө');
//echo tuloadres('http://example.com/', '?өөө');
//echo tuloadres('http://example.com/33', 'http://12312.123/ewrwer');
//echo tuloadres('http://aylandirow.tmf.org.ru/qazaqtantatarga/kz.astana.kz', 'http://kz.astana.kz/templates/astana_eleven/images/favicon.ico');

?>
