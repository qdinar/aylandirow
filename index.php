<?php
//мин бу алгоритмнан яхшыракны ясап була икәнен беләм, мин андыйны микрософт оффис визуал бейсигы белән ясаган идем, әмма аны югалттым. ул ысул болай: текст буйлап барганда флаг тотарга, анда хәзер калын хәреф тәэсире территорияседәме-юкмы икәнен һәм башкаларны саклайсы.
$tw1=microtime(true);
//apc_clear_cache('user');//вапче конвертер үзгәргәч чистартасы
mb_internal_encoding('UTF-8');
libxml_use_internal_errors(true);
define('TOPDOMEN','aylandirow.tmf.org.ru');
/*if(function_exists('apc_fetch')){
	define('USECACHE',true);
}else{
	define('USECACHE',false);
}*/
	define('USECACHE',false);

$topdomeno=explode('.',TOPDOMEN);
$topdomenoo=count($topdomeno);
$debug='';
$yuzeradmin=($_SERVER['REMOTE_ADDR']=='78.138.176.205');
//$debug.='OK';
//header("HTTP/1.0 404 Not Found");
//header("Status: 404 Not Found");
//header('HTTP/1.1 403 Forbidden');
//exit;
//echo $_SERVER['REQUEST_URI'];
$ru=$_SERVER['REQUEST_URI'];
$domain=$_SERVER['HTTP_HOST'];
$do=explode('.',$domain);//домейн өлешләре
$doo=count($do);
if($doo>$topdomenoo){
	$til=$do[$doo-$topdomenoo-1];
	if($_SERVER['REQUEST_METHOD']=='POST'&&$ru=='/'){
		include('post.php');
		exit;
	}
}else{
	if($ru=='/'){
		include 'topbit.php';
		exit;
	}
	$til=mb_substr($ru,1,15);
}
$rohsattil=array(
	'qazaqtantatarga',
	'uygurdantatarga',
	'toroktantatarga',
	'yaponnantatarga',
	'tatardantatarga',
	'kkcysuttcysu-2',
	'ttcysuttlart1999',
	'ttcysuttlasu',
	'ttcysuttlaqdphon',
	'inglizdantatarga',
);
if(
	in_array($til,$rohsattil)
){
//	echo('ok');
//	$ba=mb_substr($ru,17);//барасы адрес
//	echo($ba);
}else{
	header('Content-Type: text/html; charset=utf-8');
	//header("HTTP/1.0 404 Not Found");
	header("HTTP/1.1 404 Not Found");
	//header("Status: 404 Not Found");
	//header("HTTP 404 Not Found");//error
	//header("404 Not Found");//error
	echo('/* Дөрес адрес түгел */');
	//echo('<br />');
	//echo($domain);
	//echo($til);
	//echo($doo);
	exit;
}
/*
if($til=='tatardantatarga'){
	echo 'ok';
}
*/
$referer=$_SERVER['HTTP_REFERER'];
$ttcysusayt=array('matbugat.ru','gzalilova.narod.ru','belem.ru','beznen.ru','www.azatliq.org','forum.belem.ru',
'adiplar.narod.ru'
);
if($doo>5){
	$bdo=array_slice($do,0,$doo-$topdomenoo-1);
	$bd=implode('.',$bdo);
	$ba=$bd.$ru;
	//echo($bd);
	//echo($ba);
	//exit;
	if($bd=='www.matbugat.ru'){
		header('Location: http://matbugat.ru.'.$til.'.'.TOPDOMEN.$ru);
		exit;
	}elseif($bd=='www.facebook.com'&&substr($ru,0,17)=='/plugins/like.php'){
		header('Location: http://www.facebook.com'.$ru);
		exit;
	}
	/*if(//моны яңа файлга күчерәсе
$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; AhrefsBot/1.0; +http://ahrefs.com/robot/)'
	){
		header('HTTP/1.1 403 Forbidden');
		exit;
	}*/
	if($ru=='/robots.txt'){
		header('Content-Type: text/plain; charset=utf-8');
		echo 'User-agent: *
Disallow: /';
		exit;
	}
	if(
$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'||
$_SERVER['HTTP_USER_AGENT']=='Mail.Ru/1.0'||
$_SERVER['HTTP_USER_AGENT']=='Damaku'||
$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)'||
$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; AhrefsBot/1.0; +http://ahrefs.com/robot/)'
	){
	//	header('Location: http://aylandirow.tmf.org.ru/robots.txt');
		header('HTTP/1.1 403 Forbidden');
		exit;
	}
	/*if(    !($til=='ttcysuttlart1999'&&in_array($bd,$ttcysusayt))    ){
	if($ru=='/robots.txt'){
		header('Content-Type: text/plain; charset=utf-8');
		echo 'User-agent: *
Disallow: /';
		exit;
	}
	//2011-11-11 16:43 моны комментладым, ботларга ачтым. 16:45 кире ябам, бер бит тә ачылмады әле.
	//20:22 $til=='ttcysuttlart1999'&&$bd=='matbugat.ru' дән башка
	//11-12 11:52 gzalilova.narod.ru ны өстәдем.
	if(
$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'||
$_SERVER['HTTP_USER_AGENT']=='Mail.Ru/1.0'||
$_SERVER['HTTP_USER_AGENT']=='Damaku'||
$_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)'
	){
	//	header('Location: http://aylandirow.tmf.org.ru/robots.txt');
		header('HTTP/1.1 403 Forbidden');
		exit;
	}
	}//if(!($til=='ttcysuttlart1999'&&$bd=='matbugat.ru'))
	else{
	if($ru=='/robots.txt'){//моны яңа файлга күчерәсе
		header('Content-Type: text/plain; charset=utf-8');
		echo 'User-agent: *
Crawl-delay: 300

user-agent: AhrefsBot
disallow: /

';
		exit;
	}
	}*/
}elseif($doo>4){
	if($ru=='/referer'){
		//echo('123');
		if(substr($referer,0,7)=='http://'){
			$ba=substr($referer,7);
		}elseif(substr($referer,0,8)=='https://'){
			$ba=substr($referer,8);
		}else{
			header('Content-Type: text/html; charset=utf-8');
			header("HTTP/1.1 404 Not Found");
			echo('Дөрес реферер күрсәтелмәгән. Бу адресны копияләп куеп ачасы түгел, ә күчкегә басып ачасы, күчке торган бит әйләндерелеп күрсәтелә.');
			exit;
		}
		$pathstart=strpos($ba,'/');
		if($pathstart===false){
			header('Location: http://'. $ba. '.'. $til. '.'.TOPDOMEN.'/');
		}else{
			$bd=substr($ba,0,$pathstart);
			$bp=substr($ba,$pathstart);
			header('Location: http://'. $bd. '.'. $til. '.'.TOPDOMEN.$bp);
		}
	}elseif($ru=='/'){
		for($i=0;$i<count($ttcysusayt);$i++){
			$au=aylandirilgan_url('http://'.$ttcysusayt[$i]);
			echo"<a href=\"$au\" target=\"_blank\">{$ttcysusayt[$i]}</a> ";
		}
	}
	exit;
}else{
	$ba=mb_substr($ru,17);//барасы адрес
	/*
	if(preg_match('#^([\w\-]+\.)+[\w]+$#ui',$ba)==1){
	//	echo 'ok';
		header('Location: http://aylandirow.tmf.org.ru/'.$til.'/'.$ba.'/');
		exit;
	}
	*/
	
	$pathstart=strpos($ba,'/');
	if($pathstart===false){
		header('Location: http://'. $ba. '.'. $til. '.'.TOPDOMEN.'/');
	}else{
		$bd=substr($ba,0,$pathstart);
		$bp=substr($ba,$pathstart);
		header('Location: http://'. $bd. '.'. $til. '.'.TOPDOMEN.$bp);
	}
	exit;
}

if($til=='qazaqtantatarga'){
	header('Location: http://'. $bd. '.kkcysuttcysu-2.'.TOPDOMEN.$ru);
	exit;
}

/*if($til=='ttcysuttlart1999'
	&&!$yuzeradmin
){//&&$_SERVER['REMOTE_ADDR']!='78.138.176.205'
//$ctype!='text/html' булганда барыбер эшләми, чөнки соңгырак код аны файлга сакламый.
	$kesislay=true;
}//if($til=='ttcysuttlart1999')
*/
if($kesislay){
$kesfi=str_replace('/','%2f',$ba);
$kesfi='ttcysuttlart1999-kes/'.$kesfi;
if(file_exists($kesfi)){
//$debug.=time()-filemtime($kesfi);
$kesfiw=filemtime($kesfi);
$kesfiws=gmdate("D, d M Y H:i:s",$kesfiw).' GMT';
if(time()-$kesfiw<3600*24*5){
if($_SERVER['HTTP_IF_MODIFIED_SINCE']==$kesfiws){
	header('HTTP/1.0 304 Not Modified');
	exit;
}//if($_SERVER['HTTP_IF_MODIFIED_SINCE']==$kesfiws)
else{
header('Last-Modified:'.$kesfiws);
header('Content-Type: text/html; charset=utf-8');
echo file_get_contents($kesfi);
exit;
}//if($_SERVER['HTTP_IF_MODIFIED_SINCE']==$kesfiws)...else...
}//if(time()-$kesfiw<3600*24*5)
}//if(file_exists($kesfi))
}//if($kesislay)

$ba='http://'.$ba;
//if(function_exists('apache_request_headers')){
//	$arh=apache_request_headers();
//	$mts=$arh['If-Modified-Since'];
//}else{
	$mts=$_SERVER['HTTP_IF_MODIFIED_SINCE'];
//}
$mt=strtotime($mts);
$alu=curl_init($ba);
curl_setopt($alu,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT'].' '.$til.'.'.TOPDOMEN);
curl_setopt($alu,CURLOPT_AUTOREFERER,TRUE);
curl_setopt($alu,CURLOPT_FOLLOWLOCATION,TRUE);//false куйсаң эшләми икән
curl_setopt($alu,CURLOPT_MAXREDIRS,0);//дөрес эшләмәй: хедырны бирмәй
//curl_setopt($alu,CURLOPT_MAXREDIRS,5);
function aylandirgicwaqoto(){
	
	global $til;
	$clmt=getlastmod();//converter last modified time
	$clmt=max($clmt,filemtime('iglan.php'),filemtime('tuloadres.php'));
	//if($til=='qazaqtantatarga'){
	if($til=='kkcysuttcysu-2'){
		$clmt=max($clmt,filemtime('qazaqtantatarga.php'),filemtime('qazaqtantatarga-yevropa.php'));
	}elseif($til=='yaponnantatarga'){
		$clmt=max($clmt,filemtime('yaponnantatarga.php'));
	}elseif($til=='ttcysuttlart1999'||$til=='ttcysuttlasu'){
		//$clmt=max($clmt,filemtime('ttcysuttlart1999.php'));
		$clmt=max($clmt,filemtime('ttcyttla.php'));//,filemtime('ttcyttla-k.php'),filemtime('ttcyttla-g.php'),filemtime('ttcyttla-yeyuya.php')
	}elseif($til=='tatardantatarga'){
		//$clmt=max($clmt,filemtime('test.php'));
		$clmt=max($clmt,filemtime('ttcyttla4.php'));
	}
	return $clmt;
	
	//return getlastmod();
}

//монда файл вакытлары сорала, сайт гел яңа булганда моны экономияләп буладыр...
//сайт гел яңа булса... ул... вакытны әйтмәскә мөмкин...
//гел яңа вакыт әйтергә мөмкин...
//вакытны әйтмәсә, клиентка да вакытны әйтмәскә кирәк.
//бик яңа вакыт әйтсә дә, клиентка әйтмәскә кирәк... әйләндергеч сәгате дөресрәк булса әйбәтрәк...
//әмма аның әйтмәвен йә йаңа вакыт әйтүен бу төштә белеп булмый шул...
//ә клиент вакытны белмәсә әйләндергеч вакытын монда ук исәпләмәскә дә була!
//аны.. сайт вакытны хәбәр итсә, шуннан соң гына, кирәк булса исәпләргә була ...
//
//if( $mt!==false && ($mt-time())>5*60 ){

if(//клиент вакыт турында берни дә әйтмәсә әллә ничә файл вакытын карарга ашыкмыйм
	isset($mts)
	//&&
	//( $mt-time() > 120 )
){
	$clmt=aylandirgicwaqoto();
	if($clmt<=$mt){//клиенттагы сайт вакыты - әйләндергеч вакыты йә яңарак(сайт инде әйләндергечтән яңарак булган)
		//сайтның вакытын карарга кирәк
		curl_setopt($alu,CURLOPT_TIMEVALUE,$mt);
		//сайт үзгәрмәде диеп җавап бирә алыр, алай дисә, клиентка да шулай диермен
	}//else (clmt>mt) клиенттагы сайт вакытына караганда әйләндергеч яңарак, сайтка үзгәрмәде диеп кенә җавап бирү мөмкинлеге калдырасы түгел, яңадан аласы, клиентка шуның яңа вакыты белән әйләндергечнең яңа вакытының зуррагы әйтелер
}

/*
//болай гына булмый икән шул, сүзлек яңаруын онытканмын
if(getlastmod()<=$mt){
	//әйләндергеч яңармаган булса гына сайтның текст җибәрмәйчә 304 белән генә котылуы мөмкин
	//клиент беренче сораганда мт==0 (мт===фэлс), монда керә алмый
	curl_setopt($alu,CURLOPT_TIMEVALUE,$mt);
}
*/

//curl_setopt($alu,CURLOPT_TIMEVALUE,$mt);
curl_setopt($alu,CURLOPT_TIMECONDITION,CURL_TIMECOND_IFMODSINCE);//Бу кирәк икән
curl_setopt($alu,CURLOPT_FILETIME,TRUE);
//curl_setopt($alu,CURLINFO_HEADER_OUT,TRUE);
//curl_setopt($alu,CURLOPT_HEADER,TRUE);
curl_setopt($alu,CURLOPT_RETURNTRANSFER,TRUE);

if(substr($referer,0,7)=='http://'){
	$referer=substr($referer,7);
	$pathstart=strpos($referer,'/');
	if($pathstart===false){
		$rd=$referer;
		$rp='';
	}else{
		$rd=substr($referer,0,$pathstart);
		$rp=substr($referer,$pathstart);
	}
	$uzdo=21;//strlen('aylandirow.tmf.org.ru');//21
	if(substr($rd,strlen($rd)-$uzdo)==TOPDOMEN){
		$rdo=explode('.',$rd);
		$rdoo=count($rdo);
		//if(in_array($rdo[$rdoo-5],$rohsattil)){
		if($rdoo>5){
			array_splice($rdo,$rdoo-5,5);
			$rd=implode('.',$rdo);
			$referer='http://'.$rd.$rp;
		}
	}
}

curl_setopt($alu,CURLOPT_REFERER,$referer);
$ic=curl_exec($alu);
$eu=curl_getinfo($alu,CURLINFO_EFFECTIVE_URL);
$smt=curl_getinfo($alu,CURLINFO_FILETIME);//куелмаган булса -1 икән. куелган булса сан.
$ct=curl_getinfo($alu,CURLINFO_CONTENT_TYPE);
$hc=curl_getinfo($alu,CURLINFO_HTTP_CODE);
//$sru=curl_getinfo($alu,CURLINFO_HEADER_OUT);//Дөрес күрсәтмәй
//echo($ba.' '.$eu);
//echo($ic);
//exit;
//echo $hc;
//if($yuzeradmin){echo$ic;exit;}

if($hc==302||$hc==301){
	//echo('ok');
	curl_setopt($alu,CURLOPT_NOBODY,TRUE);
	curl_setopt($alu,CURLOPT_MAXREDIRS,5);
	curl_exec($alu);
	$hc=curl_getinfo($alu,CURLINFO_HTTP_CODE);
	if($hc==302||$hc==301){
		header("HTTP/1.1 404 Not Found");
		header('Content-Type: text/html; charset=utf-8');
		echo('Бу гел башка адреска күчереп тора');
		exit;
	}
	$eu=curl_getinfo($alu,CURLINFO_EFFECTIVE_URL);
	//if(substr($eu,8)=='https://'){
	if( substr($eu,0,7)!='http://' ){
		header("HTTP/1.1 404 Not Found");
		header('Content-Type: text/html; charset=utf-8');
		echo('Бу әйләндергеч кабул итмәй торган протоколлы адреска күчерә');
		exit;
	}
//	echo($ba.' '.$eu);
	//if($doo>4){
		//echo('ok');
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
	//}else{
		//echo('ok');
	//	header('Location: http://aylandirow.tmf.org.ru/'.$til.'/'.substr($eu,7));
		//header('Location: http://aylandirow.tmf.org.ru/qazaqtantatarga/'.substr($eu,strpos($eu,'://')+3));
	//}
	exit;
}

/*
*/

curl_close($alu);

if($hc==304){
	header('HTTP/1.0 304 Not Modified');
	exit;
//}else{
	//$debug.=$hc;
}

$cto=explode(';',$ct);//cto - контент тайп өлешләре
if(count($cto)==2){//text html ; charset=utf-8
	$cchseto=explode('=',$cto[1]);//c chset o - контент чарсет өлешләре
	$hecocha=$cchseto[1];//utf-8//hecocha - хедер контент чарсет
	$hecocha=strtolower(trim($hecocha));
//}else{//text html
	//$hecocha='utf-8';//хәзер бу кулланылмый
}
$ctype=$cto[0];//text html
//if($ctype!='text/html'||strtolower($hecocha)!='utf-8'){
if($ctype!='text/html'){
//моны башта тикшереп, аннары күчерергә кирәк
	if($debug==''){
		if($smt>0){ //әгәр сайт соңгы үзгәргән вакытын әйтсә генә хедыр җибәрәсе була
			if(//берничә файл вакыты алдан ук каралып куймаган булган, әмма хәзер сайт вакыты килде
				!isset($clmt) //берничә файл вакыты инде каралып куймаган булса
				//&& //һәм, каралып куймаган булса да, шуның өстенә
				//($smt>0) //әгәр сайт соңгы үзгәргән вакытын әйтсә
				//&&
				//( $smt<time()-5*60 ) //һәм ул соңгы үзгәрү вакыты бик яңа булмаса
			){
				$clmt=aylandirgicwaqoto();
			}//else әйләндергеч вакыты каралган булган
			//if(
			//	isset($clmt)
				//&&
				//$smt>0
			//){
			header('Last-Modified:'.gmdate("D, d M Y H:i:s",max($smt,$clmt)).' GMT');
			//}
		}
		header('Content-Type: '.$ct);
		echo($ic);
	}else{
		echo($debug);
	}
	exit;
}
/*if($ctype=='text/html'&&strtolower($hecocha)!='utf-8'){
	header('Last-Modified:'.gmdate("D, d M Y H:i:s",$smt).' GMT');
	$ic=mb_convert_encoding($ic,'UTF-8',$hecocha);
	//$ic=iconv($hecocha,'UTF-8',$ic);
	//$ic=mb_convert_encoding($ic,$hecocha,$hecocha);
	//$ic=iconv($hecocha,$hecocha,$ic);
	//$d=new DOMDocument(NULL,'UTF-8');
	$d=new DOMDocument();
	$d->loadHTML('<?xml encoding="UTF-8">'.$ic);
	//$d->loadHTML($ic);
	$ic2=$d->saveHTML();
	header('Content-Type: text/html; charset=utf-8');
	echo($ic2);
	//echo($ic);
	exit;
}*/

include('tuloadres.php');
/*$i=0;
$o=mb_strlen($ic);
while($i<$o){
	$h=mb_substr($ic,$i,1);
	$i=$i+1;
}*/

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

$d=new DOMDocument(/*NULL,'UTF-8'*/);
//$d=new DOMDocument(NULL,'UTF-8');
//$d=new DOMDocument('1.0','UTF-8');
//$ic=str_replace('<meta http-equiv=\'content-type\' content=\'text/html; charset=windows-1251\'>','',$ic);
//if(count($cto)==2){
if(isset($hecocha)){
	//заголовокта ялгыш кодировка булса бу ялгыш төзәтәдер...
	//$ic=mb_convert_encoding($ic,$hecocha,$hecocha);//хаталарны төзәтә, әмма кодировка дөрес булмаса боза икән
	if($hecocha=='utf-8'){//||$hecocha=='utf8'
		$ic=mb_convert_encoding($ic,'utf-8','utf-8');
	}
	//$ic=mb_convert_encoding($ic,'UTF-8',$hecocha);
}//else заголовокта бирелмәгән булса мин пока кодировканы белмим һәм метадан карамыйм һәм төзәтмим
//$ic=mb_convert_encoding($ic,'UTF-8','UTF-8');
//$ic=iconv($ce,'UTF-8',$ic);
//echo($ic);exit;

//$d->loadHTML('<?xml encoding="UTF-8">'.$ic);
//$d->loadHTML($ic);
//$ic='<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.$ic;
/*
$headpos=strpos($ic,'<head>');
if (FALSE===$headpos){
	//echo('ok');
	$headpos=strpos($ic,'<HEAD>');
}
if (FALSE!==$headpos){
	$headpos+=6;
	$ic=
		substr($ic,0,$headpos).
		'<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.
		substr($ic,$headpos)
	;
}
*/

//e000

//белем ру форумында күренгән хатаны әйләнеп узу
if(strpos($ic,'$$$$')===false){
	$fixcdata=true;
	$ico=explode('<![CDATA[',$ic);
	$icoo=count($ico);
	$komment=array();
	for($i=1;$i<$icoo;$i++){
		$kommentahorourono=strpos($ico[$i],']]>');
		if($kommentahorourono===false){
			$komment[$i]=false;
		}else{
			$komment[$i]=substr($ico[$i],0,$kommentahorourono);
			$ico[$i]=substr($ico[$i],$kommentahorourono+3);
		}
	}
	$ic=implode('$$$$',$ico);
}else{
	$fixcdata=false;
}
//әдипләр народ ру да күренгән хатаны әйләнеп узу
if(strpos($ic,'˟')===false){// 2011-11-16 : монда <xxx></xxx> иде, ул скрипт эчендә дөрес эшләмәде
	$fixcomment=true;
	$ico2=explode('<!--',$ic);
	$icoo2=count($ico2);
	$komment2=array();
	for($i=1;$i<$icoo2;$i++){
		$kommentahorourono=strpos($ico2[$i],'-->');
		if($kommentahorourono===false){
			$komment2[$i]=false;
		}else{
			$komment2[$i]=substr($ico2[$i],0,$kommentahorourono);
			$ico2[$i]=substr($ico2[$i],$kommentahorourono+3);
		}
	}
	$ic=implode('˟',$ico2);
}else{
	$fixcomment=false;
}
/*if($yuzeradmin){
echo'<pre>'.str_replace(array('&','<'),array('&amp;','&lt;'),$ic);
exit;
}*/
//әдипләр народ ру да күренгән хатаны әйләнеп узу
$ic=str_replace('<=','&lt;=',$ic);
/*
//if($til=='tatardantatarga'){
//$debug.='OK';
$ico=explode('//<![CDATA[',$ic);
//<![CDATA[
//0: htmlscript
//<[
//1: javascript]]>scripthtmlscript
//<[
//2: scripthtmlscript
//<[
//3: javascript]]>scripthtmlscript
//<[
//4: javascript]]>scripthtml
$icoo=count($ico);
$komment=array();
for($i=1;$i<$icoo;$i++){
	$kommentahorourono=strpos($ico[$i],'//]]>');
	if($kommentahorourono===FALSE){//табылмады - хата
		$komment[$i]=false;
	}else{
		$komment[$i]=substr($ico[$i],0,$kommentahorourono);
		$ico[$i]=substr($ico[$i],$kommentahorourono+5);
	}
}
if($til=='tatardantatarga'){
	$ic=implode('',$ico);
}else{
	$ic=implode('&#xe000;',$ico);
}
//$ic=implode('',$ico);
//$ic=implode('&#57344;',$ico);
//$ic=implode('&#1244;',$ico);
//$debug.=count($ico);
//}
*/
//$ic=preg_replace('&(copy|nbsp)[^;]','&$1;',$ic);
$ic=preg_replace('/&(copy|nbsp)(?!;)/','&$1;',$ic);//adiplar.narod.ru
//if($bd=='qdb.tmf.org.ru'){
//$ic=preg_replace('/­/u','',$ic);//\xAD
//}
/*
хедер чарсет ны алу
мета чарсет ны алу
мета чарсет бармы?:
	юк:хедер чарсет бармы?
		юк: утф8 итеп ачып буламы?
			әйе: утф8 итеп төзәтү һәм ачу
			юк: төрекчәдән булса төрек белән, татарча, казакчадан вин1251 белән ачу
		әйе: хедер чарсет белән төзәтү һәм шуныңча мета чарсет ясап ачу.
	әйе:мета чарсет белән төзәтү һәм ачу

мета чарсетны алыр өчен регекс ясап карыйм әле:
...ясадым

хедер чарсет ны алу
өстә
мета чарсет ны алу
элек кулланган ысул аста
$mr=
'#'.
'([^<]*<[^>]*?>)*?'.
'<meta\s+'.
	'http-equiv\s*=\s*["\']?content-type["\']?\s+'.
	'content\s*=\s*["\']?\s*'.
		'[\w]+(\s*'.'/\s*[\w]*)*\s*'.
		'(;\s*(charset\s*=\s*[\w-]+)?)?\s*'.
	'["\']?\s+/?\s*'.
'>'.
'#i';
$mrno=preg_match($mr,$ic,$mrn);
флаг: метадаутф8ме? юк дип куйыйк.
$metadautf8=false;
мета чарсет бармы?:
if($mrno>0){
	әйе:мета чарсет белән төзәтү һәм ачу
	$metacharset=$mrn[5];
	if($metacharset=='utf-8'){//||$metacharset=='utf8'
		$ic=mb_convert_encoding($ic,'utf-8','utf-8');
		$metadautf8=true;//метада утф8 бар инде
	}
	//ачу аста, уртак
}else{
	юк:хедер чарсет бармы?
	if(isset($hecocha)){
		әйе: хедер чарсет белән төзәтү һәм...
		if($hecocha=='utf-8'){//||$hecocha=='utf8'
			$ic=mb_convert_encoding($ic,'utf-8','utf-8');
			$metadautf8=true;//метада утф8 булачак
		}
		//һәм шуныңча мета чарсет ясап...
		$ic=
			'<meta http-equiv="Content-Type" content="text/html; charset='.
			$hecocha.
			'" />'.
			$ic
		;
		//ачу аста, уртак
	}else{
		юк: утф8 итеп ачып буламы?
		if(mb_check_encoding($ic,'utf-8')){
			әйе: утф8 итеп төзәтү һәм...
			$ic=mb_convert_encoding($ic,'utf-8','utf-8');
			//утф8 итеп ачылсын өчен тамгалау:
			$ic='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.$ic;
			$metadautf8=true;//метада утф8
			//ачу аста
		}else{
			юк: төрекчәдән булса төрек белән, татарча, казакчадан вин1251 белән ачу
			//'uygurdantatarga',
			//'yaponnantatarga',
			if(
$til=='ttcysuttlart1999'||$til=='kkcysuttcysu-2'||$til=='tatardantatarga'
//qazaqtantatarga кулланылмый инде
			){
				//вин1251 булып ачылсын өчен тамгалау:
				$ic='<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />'.$ic;
			}elseif($til=='toroktantatarga'){
				//вин-төрек булып ачылсын өчен тамгалау:
				$ic='<meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />'.$ic;
			}else{
				//yaponnantatarga,uygurdantatarga,башкалар
				//утф8 итеп төзәтү һәм ачу
				$ic=mb_convert_encoding($ic,'utf-8','utf-8');
				//утф8 итеп ачылсын өчен тамгалау:
				$ic='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.$ic;
				$metadautf8=true;//метада утф8
				//ачу аста
			}
		}
	}
}
//ачкач мета чарсетны утф8гә әйләндерәсе бар



*/

//echo'OK';exit;
//$tw=microtime(true)-$tw1;
//$tw1=microtime(true);
//if($yuzeradmin){echo$ic;exit;}


//метада чарсеты булмаса дөрес ачмыйдыр инде бу моны..  западный итеп ача...
$d->loadHTML($ic);
//$ic=$d->saveHTML();echo($ic);exit;
//һәрвакыт утф8 ясау
$e=$d->getElementsByTagName('meta');
if($e->length>0){
	//$debug.='OK';
	//$debug.=$e->length;
	//чарсетны табасы
	for($i=0;$i<$e->length;$i++){
		$hteq=strtolower($e->item($i)->getAttribute('http-equiv'));
		if(!isset($metacharset)&&$hteq=='content-type'){
			//$debug.='OK';
			$mct=$e->item($i)->getAttribute('content');
			$mct=explode(';',$mct);
			if(count($mct)>1){
				$metacharset=explode('=',$mct[1]);
				$metacharset=$metacharset[1];
				//$debug.=$metacharset;
				$e->item($i)->setAttribute('content','text/html; charset=utf-8');
			}
			//$e->item($i)->setAttribute('content','text/html; charset=windows-1254');
			break;
			//!isset metacharset ка алыштырам
		/*}elseif($hteq=='refresh'){
			//<meta http-equiv="refresh" content="0; URL=http://example.com/">
			$mref=$e->item($i)->getAttribute('content');
			$mref=explode(';',$mref);
			//$debug.='OK';
			if(count($mref)>1){
				$metaurl=explode('=',$mref[1]);
				$metaurl=$metaurl[1];
				//$debug.=aylandirilgan_url($metaurl);
				$e->item($i)->setAttribute('content','0; URL='.aylandirilgan_url($metaurl));
				//$debug.=$e->item($i)->getAttribute('content');
			}*/
		}
	}
//}else{//мета тег юк, бу энтитилар белән чыгарылачак
}
if(!isset($metacharset)){
	if(count($cto)==2){//заголовоктагы чарсетны куейм
		$d->loadHTML(
			'<meta http-equiv="Content-Type" content="text/html; charset='.  $hecocha.  '">'.  $ic
		);
		$e=$d->getElementsByTagName('meta');
		$e->item(0)->setAttribute('content','text/html; charset=utf-8');
		//шулай загружать иткәннән соң үзгәртү чыгаргандагы документны үзгәртә
	}
}
//if($yuzeradmin){echo $d->saveHTML() ;exit;}

if(isset($metacharset)){
	$scriptcharset=$metacharset;
}elseif(isset($hecocha)){
	$scriptcharset=$hecocha;
}
//$debug.=$scriptcharset;

$base=$ba;

function fiximport($matches){
	global $base;
	return('@import "'.tuloadres($base,$matches[2].$matches[3]).'"');
}
$jitti=false;
function yoropcoq($current_node){
	global $base, $ba, $gaw, $t1, $jitti, $til, $scriptcharset, /*$jittiammabitmadi,*/ $kesislay,$debug;
	$current_childs=$current_node->childNodes;
	$current_child_count=$current_childs->length;
	for($i=0;$i<$current_child_count;$i++){
		$current_child=$current_childs->item($i);
		$current_child_type=$current_child->nodeType;
		if($current_child_type==XML_ELEMENT_NODE){
			if($current_child->hasAttribute('title')){
				//$current_child->getAttribute('title');

				//бу өлеш асттан копияләнде һәм бер аз үзгәртелде
				if(!$jitti){
					$tmps=$current_child->getAttribute('title');
					if(USECACHE){
						$tmpsmd5=md5($til.$tmps,true);//моны яңасына күчерәсе
						//$tmpsmd5=$tmps;//мд5 тән бер аз хужерак
						$tmpns=apc_fetch($tmpsmd5);
						//апс кына булып, мин моның белән тикшергән иң зур биттә дә барысы ярты секундка сыеп бетте
						if($tmpns==false){
							$tmpns=aylandir($tmps);
							apc_store($tmpsmd5,$tmpns);
						}
						//$current_child->nodeValue=$tmpns;
					}else{
						$tmpns=aylandir($tmps);
					}
					$current_child->setAttribute('title',$tmpns);
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



			}
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
				if(USECACHE){
					apc_store($h,true,20);
				}
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
		elseif($current_child_type==XML_TEXT_NODE){//||$current_child_type==XML_ATTRIBUTE_NODE
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
				//апц ны болай түгел сүзләп кулланырга кирәк.
				$tmps=$current_child->nodeValue;
				if(USECACHE){
					$tmpsmd5=md5($til.$tmps,true);//моны яңасына күчерәсе
					//$tmpsmd5=$tmps;//мд5 тән бер аз хужерак
					$tmpns=apc_fetch($tmpsmd5);
					$tmpns=false;
					//апс кына булып, мин моның белән тикшергән иң зур биттә дә барысы ярты секундка сыеп бетте
					if($tmpns==false){
						$tmpns=aylandir($tmps);
						//apc_store($tmpsmd5,$tmpns);
					}
				}else{
					$tmpns=aylandir($tmps);
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
			//$debug='OK';			
		}//if($current_child_type==XML_TEXT_NODE)
		//elseif($current_child_type>3&&$current_child_type!=10){//XML_ATTRIBUTE_NODE
			//бер нәрсә дә юк, текст, элемент, документ тайп, документ кына.
		//	$debug=$current_child_type;			
		//}//elseif($current_child_type==XML_ATTRIBUTE_NODE){
	}//for($i=0;$i<$current_child_count;$i++)
}//function yoropcoq($current_node)


//echo'OK';exit;
//$tw=microtime(true)-$tw1;
//echo$tw;exit;


//if($til=='qazaqtantatarga'){
if($til=='kkcysuttcysu-2'){
	include('qazaqtantatarga-yevropa.php');
	$aylandirow12=array();
	foreach($aylandirow1 as $value){
		$aylandirow12[$value]=$value;
	}
	unset($aylandirow1);
	include('qazaqtantatarga.php');
	/*foreach($aylandirow2 as $key=>$value){
		if(mb_substr($key,-2)=='ық'){
			$aylandirow2[]=$value;
		}
	}*/
	$aylandorow=array(
		'е'=>'э','і'=>'е','у'=>'ў','ө'=>'ү','ү'=>'ө','о'=>'у','ұ'=>'о','ш'=>'ч','ж'=>'й',
		//'Е'=>'Э','І'=>'Е','У'=>'Ў','Ө'=>'Ү','Ү'=>'Ө','О'=>'У','Ұ'=>'О',
	);
	$aylandirow=array_merge($aylandirow12,$aylandirow2,$aylandorow);
	//var_dump($aylandirow);
	//unset($aylandirow2,$aylandorow);
	function aylandir($s){
		global $aylandirow;
		//$s=mb_strtolower($s,'UTF-8');
		$s=mb_strtolower($s);
		/*
		$so=mb_strlen($s);
		for(){
		}
		*/
		$s=strtr($s,$aylandirow);
		return $s;
	}
	$skript='<script src="http://imgs.tmf.org.ru/aylandirow/skript-qazaq.js"></script>';
	$maglumat='<br /><a href="http://tmf.org.ru/viewtopic.php?f=4&amp;t=85" target="_blank">Казакчадан татарчага әйләндергеч турында сөйләшәсең, сорыйсың килсә, монда бас</a>';
}elseif($til=='uygurdantatarga'){
	$uygurgarap='اﺍﺎبﺒﺑﺐﺏةﺓﺔتﺘﺗﺕﺖثﺙﺚﺛﺜجﺠﺟﺞﺝحﺡﺢﺣﺤخﺥﺦﺧﺨدﺩﺪذﺫﺬرﺭﺮزﺯﺰ';
	$tataruros='ааабббббттттттттсссссҗҗҗҗҗххххххххххдддзззрррззз';
	$uygurgarap.='سﺱﺲﺳﺴشﺵﺶﺷﺸصﺹﺺﺻﺼضﺽﺾﺿﻀﻁﻂﻃﻄطﻅﻆﻇﻈظﻉﻊﻋﻌعﻍﻎﻏﻐغ ف ﻑ ﻒ ﻓ ﻔ ﻘق ﻕ ﻖﻗ  كﻙﻚﻛﻜﻝﻞﻟﻠلمﻡﻢﻣﻤﻥﻦﻧﻨن';
	$tataruros.='сссссшшшшшсссссзззззтттттзззззғғғғғғғғғғфффффқққққккккклллллмммммннннн';
	$uygurgarap.='هﻩﻪﻫﻬﻭﻮوي';
	$tataruros.='һәәһһуууй';
	$uygurgarap.='٠١٢٣٤٥٦٧٨٩';
	$tataruros.='0123456789';
	$uygurgarap.='گﮕﮔﮓﮒﮊﮋژپﭙﭘﭗﭖﯞﯟۋڭﯖﯕﯔﯓﯨﯩﻯﻰىﻱﻲﻳﻴې           ﯤ                ﯥ            ﯦ           ﯧ           ئﺉﺊﺋﺌ       ە  ؤ ۇﯗﯘ ۆﯚﯙ ۈﯛﯜ ﭺ ﭻ ﭼ ﭽ چ ،؟ھ';
	$tataruros.='гггггжжжпппппвввңңңңңеееееййййэээээ \'\'\'\'\'ә ў оооүүүөөөччччч,?һ';
	$uygurgarap=str_replace(' ','',$uygurgarap);
	$uygurgarap=preg_split('//u',$uygurgarap);//ﺅﺆ
	$uygurgarap=array_splice($uygurgarap,1,count($uygurgarap)-2);
	//print_r($uygurgarap);
	$tataruros=str_replace(' ','',$tataruros);
	$tataruros=preg_split('//u',$tataruros);
	$tataruros=array_splice($tataruros,1,count($tataruros)-2);
	$uygurgarap[]='ﻻ';$uygurgarap[]='ﻼ';
	$tataruros[]='ла';$tataruros[]='ла';
	function aylandir($s){
		global $uygurgarap,$tataruros;
		return str_replace($uygurgarap,$tataruros,$s);
	}
	/*$e=$d->getElementsByTagName('html');
	$h=$e->item(0)->attributes->getNamedItem('dir')->nodeValue;
	if($h=='rtl'){$h='ltr';}
	$e->item(0)->attributes->getNamedItem('dir')->nodeValue=$h;*/
}elseif($til=='toroktantatarga'){
	$torok='öüığşçÖÜİĞŞÇabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$tatar='үөығшчҮӨЕҒШЧабҗдэфгхежклмнупкрстоввхйзАБҖДЭФГХЫЖКЛМНУПКРСТОВВХЙЗ';
	$torok=preg_split('//u',$torok);
	$tatar=preg_split('//u',$tatar);
	$torok=array_splice($torok,1,count($torok)-2);
	$tatar=array_splice($tatar,1,count($tatar)-2);
	function aylandir($s){
		global $torok,$tatar;
		return str_replace($torok,$tatar,$s);
	}
}elseif($til=='yaponnantatarga'){
	include('yaponnantatarga.php');
	$aylandirow2=array(
		'ウ'=>'у','イ'=>'и','ィ'=>'и','キ'=>'ки',
	);
	$aylandirow=array_merge($aylandirow,$aylandirow2);
	$aylandirowkeys=array_keys($aylandirow);
	$aylandirowvalues=array_values($aylandirow);
	//foreach($aylandirowvalues as $value){$value.=' ';}
	for($i=0,$l=count($aylandirowvalues);$i<$l;$i++){$aylandirowvalues[$i].=' ';}
	function aylandir($s){
		global $aylandirowkeys,$aylandirowvalues;
		return str_replace($aylandirowkeys,$aylandirowvalues,$s);
	}
	//$skript='<div style="position:fixed;z-index:32767;top:170px;left:100px;background:#fff;border:1px solid #eee;direction:ltr;text-align:center;cursor:pointer;width:500px;" id="ooo">Соңгы сайланган текстка тәрҗемә тәкъдим итү<span style="border:1px solid #eee;cursor:pointer;padding:2px 5px;float:right;" onclick=\'this.parentNode.style.visibility="hidden";event.stopPropagation();\'>X</span><br /><small>Киңәш: берничә иероглифтан торса, шуны башта җибәрегез, аннары составындагы иероглиф тәрҗемәләрен җибәрегез</small></div>';
	$skript='<script src="http://imgs.tmf.org.ru/aylandirow/skript1.js"></script>';
	$maglumat='<br /><a href="http://tmf.org.ru/viewtopic.php?f=4&amp;t=84" target="_blank">Япончадан татарчага әйләндергеч турында сөйләшәсең, сорыйсың килсә, монда бас</a>';
}elseif($til=='tatardantatarga'){
	//include('test.php');

	function u($s){
		return mb_convert_encoding($s,'ucs2','utf8');
	}
	define('KICI_U',u('ü'));
	define('ZUR_U',u('Ü'));
	define('KICI_Y',u('y'));
	define('ZUR_Y',u('Y'));
	define('KICI_J',u('c'));
	define('ZUR_J',u('C'));
	define('KICI_C',u('ç'));
	define('ZUR_C',u('Ç'));
	define('KICI_I',u('i'));
	define('ZUR_I',u('İ'));
	define('KICI_Ы',u('ı'));
	define('ZUR_Ы',u('I'));
	define('KICI_B',u('b'));
	define('ZUR_B',u('B'));
	define('KICI_G',u('ğ'));
	define('ZUR_G',u('Ğ'));
	define('KICI_Ж',u('j'));
	define('ZUR_Ж',u('J'));
	define('KICI_W',u('w'));
	define('ZUR_W',u('W'));
	include('ttcyttla4.php');

	/*define('KICI_U','ü');
	define('ZUR_U','Ü');
	define('KICI_Y','y');
	define('ZUR_Y','Y');
	define('KICI_J','c');
	define('ZUR_J','C');
	define('KICI_C','ç');
	define('ZUR_C','Ç');
	define('KICI_I','i');
	define('ZUR_I','İ');
	define('KICI_Ы','ı');
	define('ZUR_Ы','I');
	define('KICI_B','b');
	define('ZUR_B','B');
	define('KICI_G','ğ');
	define('ZUR_G','Ğ');
	define('KICI_Ж','j');
	define('ZUR_Ж','J');
	define('KICI_W','w');
	define('ZUR_W','W');
	include('ttcyttla0.php');*/

	$maglumat='<br /><a href="http://tmf.org.ru/viewtopic.php?f=4&amp;t=87" target="_blank">Татарча кириллицадан ТР 1999ынчы ел законы латин язуына әйләндергеч турында сөйләшәсең, сорыйсың килсә, монда бас</a>';
}elseif($til=='ttcysuttlart1999'){
	//include('ttcysuttlart1999.php');
/*	define('KICI_U','ü');
	define('ZUR_U','Ü');
	define('KICI_Y','y');
	define('ZUR_Y','Y');
	define('KICI_J','c');
	define('ZUR_J','C');
	define('KICI_C','ç');
	define('ZUR_C','Ç');
	define('KICI_I','i');
	define('ZUR_I','İ');
	define('KICI_Ы','ı');
	define('ZUR_Ы','I');
	define('KICI_B','b');
	define('ZUR_B','B');
	define('KICI_G','ğ');
	define('ZUR_G','Ğ');
	define('KICI_Ж','j');
	define('ZUR_Ж','J');
	define('KICI_W','w');
	define('ZUR_W','W');
*/
	function u($s){
		return mb_convert_encoding($s,'ucs2','utf8');
	}
	define('KICI_U',u('ü'));
	define('ZUR_U',u('Ü'));
	define('KICI_Y',u('y'));
	define('ZUR_Y',u('Y'));
	define('KICI_J',u('c'));
	define('ZUR_J',u('C'));
	define('KICI_C',u('ç'));
	define('ZUR_C',u('Ç'));
	define('KICI_I',u('i'));
	define('ZUR_I',u('İ'));
	define('KICI_Ы',u('ı'));
	define('ZUR_Ы',u('I'));
	define('KICI_B',u('b'));
	define('ZUR_B',u('B'));
	define('KICI_G',u('ğ'));
	define('ZUR_G',u('Ğ'));
	define('KICI_Ж',u('j'));
	define('ZUR_Ж',u('J'));
	define('KICI_W',u('w'));
	define('ZUR_W',u('W'));
	include('ttcyttla.php');
	$maglumat='<br /><a href="http://tmf.org.ru/viewtopic.php?f=4&amp;t=87" target="_blank">Татарча кириллицадан ТР 1999ынчы ел законы латин язуына әйләндергеч турында сөйләшәсең, сорыйсың килсә, монда бас</a>';
}elseif($til=='ttcysuttlasu'){
	/*define('KICI_U','y');
	define('ZUR_U','Y');
	define('KICI_Y','j');
	define('ZUR_Y','J');
	define('KICI_J','ç');
	define('ZUR_J','Ç');
	define('KICI_C','c');
	define('ZUR_C','C');
	define('KICI_I','i');
	define('ZUR_I','I');
	define('KICI_Ы','ь');
	define('ZUR_Ы','Ь');
	define('KICI_B','в');
	define('ZUR_B','B');
	define('KICI_G','ƣ');
	define('ZUR_G','Ƣ');
	define('KICI_Ж','ƶ');
	define('ZUR_Ж','Ƶ');
	define('KICI_W','v');
	define('ZUR_W','V');*/
	function u($s){
		return mb_convert_encoding($s,'ucs2','utf8');
	}
	define('KICI_U',u('y'));
	define('ZUR_U',u('Y'));
	define('KICI_Y',u('j'));
	define('ZUR_Y',u('J'));
	define('KICI_J',u('ç'));
	define('ZUR_J',u('Ç'));
	define('KICI_C',u('c'));
	define('ZUR_C',u('C'));
	define('KICI_I',u('i'));
	define('ZUR_I',u('I'));
	define('KICI_Ы',u('ь'));
	define('ZUR_Ы',u('Ь'));
	define('KICI_B',u('в'));
	define('ZUR_B',u('B'));
	define('KICI_G',u('ƣ'));
	define('ZUR_G',u('Ƣ'));
	define('KICI_Ж',u('ƶ'));
	define('ZUR_Ж',u('Ƶ'));
	define('KICI_W',u('v'));
	define('ZUR_W',u('V'));
	include('ttcyttla.php');
	$maglumat='<br /><a href="http://tmf.org.ru/viewtopic.php?p=382#p382" target="_blank">Татарча кириллицадан Советлар Союзында 1928енче елны кабул ителгән латин язуына әйләндергеч турында сөйләшәсең, сорыйсың килсә, монда бас</a>';
}elseif($til=='ttcysuttlaqdphon'){
	function aylandir($s){
		return $s;
	}
}elseif($til=='inglizdantatarga'){
	function aylandir($s){
		return $s;
	}
}

//echo'OK';exit;
//if($yuzeradmin){echo $d->saveHTML() ;exit;}

if($til!='tatardantatarga'){
//if($til!='ttcysuttlart1999'&&$til!='ttcysuttlasu'){
$t1=microtime(true);
/*$e=$d->getElementsByTagName('*');
//foreach($e as $bir_e){
for($i=0;$i<$e->length;$i++){
//for($i=$e->length*3/4;$i<$e->length;$i++){
	//if($bir_e->hasChildNodes()){
	if($e->item($i)->hasChildNodes()){
		//$ee=$bir_e->childNodes;
		$ee=$e->item($i)->childNodes;
		//foreach($ee as $bir_ee){
		for($j=0;$j<$ee->length;$j++){
			$bir_ee=$ee->item($j);
			if($bir_ee->nodeType==XML_TEXT_NODE){
			//if($ee->item($j)->nodeType==XML_TEXT_NODE){
				$bir_ee->nodeValue = aylandir($bir_ee->nodeValue);
				//$ee->item($j)->nodeValue = aylandir($ee->item($j)->nodeValue);
			}
		}
	}
}*/
yoropcoq($d);
//exit;
$t2=microtime(true);
$aylandirowwaqoto=$t2-$t1;
}

//if($yuzeradmin){echo $d->saveHTML() ;exit;}
//echo'OK';exit;

//кайбер аякслар өчен файдасы бар
//бу импортларны төзәттем: "ә импорт белән кергән стильләрне хәзер зрәгә әйләндергеч аркыты үткәрәсе була:"
//2011-11-12: аңламадым, аякска? стильга? хмм аңлатыбрак язасы иде.
//аякслар барыбер башка доменнан ала алмый.
//элек адрес башкача булганда да булышмас иде, ә мондый адрес белән кирәк түгел
//стильдагы импортлар өчен? ә хәзер инде мин аларны тулы адрес иттем. моны комментка әйләндереп карыйм әле.
//эшләй бугай
//һәм монда язылган бейс болай да стандарт бейс инде ул
/*$e=$d->getElementsByTagName('base');
if($e->length==0){
	$e=$d->getElementsByTagName('head');
	$e=$e->item(0);//head
	//әгәр хотя бы бер мета булса, head ы уже бар икән
	$b=$d->createElement('base');
	//echo($b);
	if(is_object($e)){
		//$b=$e->appendChild($b);
		//$headchilds=$e->childNodes;
		//$b=$e->insertBefore($b,$headchilds->item(0));
		$b=$e->insertBefore($b,$e->firstChild);
	}
	//if($doo>4){
	$b->setAttribute('href','http://'.$bd.'.'.$til.'.aylandirow.tmf.org.ru'.$ru);
	//}else{
	//	$b->setAttribute('href',$ba);
		//$b->setAttribute('href','http://aylandirow.tmf.org.ru'.$ru);//мөмкин түгел: /ааа адресы айл..тмф.орг.ру/ааа була
	//}
}*/

/*
//if(apc_exists('aylandirow_iframes')){
//	$aylandirow_iframes=apc_fetch('aylandirow_iframes');
//	if(!in_array($ba,$aylandirow_iframes)){
//		include('iglan.php');
//	}
//}
*/
if($kesislay||!USECACHE||!apc_fetch($ba)){//тулы битне кешлау эшләсә - игланны бөтен фреймнарда күрсәтәсе.
//апс бөтенләй булмаса да игланны күрсәтәсе.
//адрес кешга язып куелмаган булса, игланны күрсәтәсе, кешга язылган ул - ифрейм адресы
	include('iglan.php');
}
//include('iglan.php');

$ic=$d->saveHTML();


/*if($yuzeradmin){
echo'<pre>'.str_replace(array('&','<'),array('&amp;','&lt;'),$ic);
exit;
}*/

//if($yuzeradmin){echo $ic;exit;}

/*
//if($til=='tatardantatarga'){
//$debug=$ic;
//}
//if($til=='tatardantatarga'){
//$ico=explode('',$ic);
if($til=='tatardantatarga'){
	$ico=explode('',$ic);//вин1251 утф8 әйләндерелгәндә бу оЂЂ га әйләндерелергә тиеш
}else{
	$ico=explode('&#xe000;',$ic);//игътибар, бу скрипт эчендә генә эшли һәм энтити белән кушылган булса, скрипт эчендә бу гына эшли... скрипт эчендә dom энтитины уникодка әйләндермәй икән, әмма скрипт тышында һәм стиль тышында бу эшләми.
}
//$debug.='ok:'.count($ico);
//$ico=explode('&#57344;',$ic);
//0: htmlscript
//<[
//1: scripthtmlscript|javascript
//<[
//2: scripthtmlscript|false
//<[
//3: scripthtmlscript|javascript
//<[
//4: scripthtml|javascript
for($i=1;$i<$icoo;$i++){
	if($komment[$i]!==false){
		$ico[$i]=$komment[$i].'//]]>'.$ico[$i];
	}
}
//0: htmlscript
//<[
//1: javascript]]>scripthtmlscript
//<[
//2: scripthtmlscript
//<[
//3: javascript]]>scripthtmlscript
//<[
//4: javascript]]>scripthtml
$ic=implode('//<![CDATA[',$ico);
//}
*/
if($fixcomment){
	$ico2=explode('˟',$ic);
	for($i=1;$i<$icoo2;$i++){
		if($komment2[$i]!==false){
			$ico2[$i]=$komment2[$i].'-->'.$ico2[$i];
		}
	}
	$ic=implode('<!--',$ico2);
}
if($fixcdata){
	$ico=explode('$$$$',$ic);
	for($i=1;$i<$icoo;$i++){
		if($komment[$i]!==false){
			$ico[$i]=$komment[$i].']]>'.$ico[$i];
		}
	}
	$ic=implode('<![CDATA[',$ico);
}



/*
$reklama='<div style="position:absolute;z-index:32767;top:70px;left:100px;background:#fff;border:1px solid #eee;direction:ltr;text-align:center;width:700px;">
Бу aylandirow.tmf.org.ru үзгәртеп күрсәткән сайт! 
<span style="border:1px solid #eee;cursor:pointer;padding:2px 5px;float:right;" onclick=\'this.parentNode.style.visibility="hidden";\'>X</span><br />
Реклама: <a href="http://qdinar.wp.kukmara.ru" target="_blank">Бу әйләндергеч авторының шәхси сайты</a> .<br />
Монда сезнең реклама була ала.'.$maglumat.'</div>';
*/
//Игълан: Бу әйләндергеч хәзер әйләндермәй, программалаштырыла.<br />
//$ic=$ic.$reklama.$skript;
//header('Last-Modified:'.gmdate("D, d M Y H:i:s",$smt).' GMT');

//мин бит сайтны сорап алганчы файл вакытларын карарга ашыкмаган идем.
if($smt>0){ //әгәр сайт соңгы үзгәргән вакытын әйтсә генә хедыр җибәрәсе була
	if(//берничә файл вакыты алдан ук каралып куймаган булган, әмма хәзер сайт вакыты килде
		!isset($clmt) //берничә файл вакыты инде каралып куймаган булса
		//&& //һәм, каралып куймаган булса да, шуның өстенә
		//($smt>0) //әгәр сайт соңгы үзгәргән вакытын әйтсә
		//&&
		//( $smt<time()-5*60 ) //һәм ул соңгы үзгәрү вакыты бик яңа булмаса
	){
		$clmt=aylandirgicwaqoto();
	}//else әйләндергеч вакыты каралган булган
	//if(
	//	isset($clmt)
		//&&
		//$smt>0
	//){
	header('Last-Modified:'.gmdate("D, d M Y H:i:s",max($smt,$clmt)).' GMT');
	//}
}

//header('Last-Modified:'.gmdate("D, d M Y H:i:s",max($smt,getlastmod())).' GMT');//хм монда апачи 304 җибәрә
/*
//болай гына булмый икән шул
if($smt>0){//-1 булырга мөмкин... -1 үтсә, гел гетластмод җибәрелә, апачи 304 җибәрә
	header('Last-Modified:'.gmdate("D, d M Y H:i:s",max($smt,getlastmod())).' GMT');
}
*/
//if(count($cto)==2){
//	header('Content-Type: text/html; charset='.$hecocha);
//}else{
//	header('Content-Type: text/html');
//}
//һәрвакыт утф8 ясау
header('Content-Type: text/html; charset=utf-8');
//header('Content-Type: text/html; charset=windows-1254');

/*
if($til=='tatardantatarga'){
	if(isset($mts)){
		echo 'mts is set. ';
		echo 'mts is '.$mts.'. ';
	}else{
		echo 'mts is not set .';
	}
	echo '<br>';
	if(isset($mt)){
		echo 'mt is set. ';
		if($mt===0){
			echo 'mt is 0. ';
		}
		if($mt==0){
			echo 'mt == 0. ';
		}
		if(1291289415<=$mt){
			echo '1291289415 <= mt . ';
		}
		if($mt===''){
			echo 'mt is "". ';
		}
		echo('mt is '.gettype($mt).'. ');
		if($mt===false){
			echo 'mt is false. ';
		}
		echo 'mt is '.$mt.'. ';
	}else{
		echo 'mt is not set';
	}
}
echo '<br>';
echo 'time is '.time();
*/
/*
if($til=='tatardantatarga'){
	if(isset($smt)){
		echo 'smt is set. ';
		echo 'smt is '.$smt.'. ';
		echo 'smt is '.gettype($smt).'. ';
	}else{
		echo 'smt is not set .';
	}
	echo '<br>';
}
*/
//($debug==''?'':('<br />'.$debug))
if($debug!=''&&$yuzeradmin){//чыгарылган булса бу монда килеп җиткәнче бушатыла
//&&$bd=='qdb.tmf.org.ru'
	echo("<div>$debug</div>");
}
echo($ic);


if($kesislay){
file_put_contents($kesfi,$ic);

}

?>
