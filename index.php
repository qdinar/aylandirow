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


include('aylandirow.php');



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
