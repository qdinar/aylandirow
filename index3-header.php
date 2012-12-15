<?php


//вакыт
$tw1=microtime(true);


//конфиг
mb_internal_encoding('UTF-8');
libxml_use_internal_errors(true);
#define('TOPDOMEN','aylandirow.tmf.org.ru');
define('TOPDOMEN','ayl.tmf.org.ru');define('SONAWDOMEN',true);
$debug='';
$yuzeradmin=($_SERVER['REMOTE_ADDR']=='78.138.176.205');
if(SONAWDOMEN&&!$yuzeradmin)exit;
$reklama='Реклама: <a href="http://qdinar.wp.kukmara-rayon.ru" target="_blank">Бу әйләндергеч авторының шәхси сайты</a> .<br />
<a href="http://tmf.org.ru/perevesti_yge/?t=tt" target="_blank">БДИны (Россиякүләм) күптелләштерү өчен тавыш җыю</a><br />
Монда сезнең реклама була ала.';


$ru=$_SERVER['REQUEST_URI'];
$domain=$_SERVER['HTTP_HOST'];
$do=explode('.',$domain);//домейн өлешләре
$doo=count($do);
//домен6 тткүсуттласу5 әйләндерү4 тмф3 орг2 ру1
if($doo>4){
	$til=$do[$doo-5];
	if($_SERVER['REQUEST_METHOD']=='POST'&&$ru=='/'){
		//аякс
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


//конфиг
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
$dbname='izlaw';
$dbusername='izlaw';
$dbuserpassword='RR$$%%^^8*deRTw!@';
$dbprefix='ayl_';
$dbhost='localhost';


if(
	!in_array($til,$rohsattil)
){
	header('Content-Type: text/html; charset=utf-8');
	header("HTTP/1.1 404 Not Found");
	echo('/* Дөрес адрес түгел */');
	exit;
}
$referer=$_SERVER['HTTP_REFERER'];


//конфиг
$ttcysusayt=array('matbugat.ru','gzalilova.narod.ru','belem.ru','beznen.ru','www.azatliq.org','forum.belem.ru',
'adiplar.narod.ru'
);


//домен6 тткүсуттласу5 әйләндерү4 тмф3 орг2 ру1
if($doo>5){
	$bdo=array_slice($do,0,$doo-5);
	$bd=implode('.',$bdo);
	$ba=$bd.$ru;
	if($bd=='www.matbugat.ru'){
		header('Location: http://matbugat.ru.'.$til.'.'.TOPDOMEN.$ru);
		exit;
	}elseif($bd=='www.facebook.com'&&substr($ru,0,17)=='/plugins/like.php'){
		header('Location: http://www.facebook.com'.$ru);
		exit;
	}
	if(!($til=='ttcysuttlart1999'&&in_array($bd,$ttcysusayt))){
		if($ru=='/robots.txt'){
			header('Content-Type: text/plain; charset=utf-8');
			echo 'User-agent: *
		Disallow: /';
			exit;
		}//if($ru=='/robots.txt')
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
	}//if(!($til=='ttcysuttlart1999'&&in_array($bd,$ttcysusayt)))
//домен6 тткүсуттласу5 әйләндерү4 тмф3 орг2 ру1
}//if($doo>5)
elseif($doo>4){
	if($ru=='/referer'){
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
	}elseif($ru=='/idara'){
		include('idara.php');
	}
	exit;
//домен6 тткүсуттласу5 әйләндерү4 тмф3 орг2 ру1
}//if($doo>5)...elseif($doo>4)...
else{
	$ba=mb_substr($ru,17);//барасы адрес
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
if($kesislay){
$kesfi=str_replace('/','%2f',$ba);
$kesfi='ttcysuttlart1999-kes/'.$kesfi;
if(file_exists($kesfi)){
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
//бу бит кэшта юк или кэш сүндерелгән
$ba='http://'.$ba;
$mts=$_SERVER['HTTP_IF_MODIFIED_SINCE'];
$mt=strtotime($mts);


$alu0=curl_init($ba);
if(!SONAWDOMEN)curl_setopt($alu0,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT'].' '.$til.'.'.TOPDOMEN);
curl_setopt($alu0,CURLOPT_AUTOREFERER,TRUE);
curl_setopt($alu0,CURLOPT_FOLLOWLOCATION,TRUE);//false куйсаң эшләми икән
curl_setopt($alu0,CURLOPT_MAXREDIRS,0);//дөрес эшләмәй: хедырны бирмәй
//curl_setopt($alu0,CURLOPT_TIMECONDITION,CURL_TIMECOND_IFMODSINCE);//Бу кирәк икән
//curl_setopt($alu0,CURLOPT_FILETIME,TRUE);
curl_setopt($alu0,CURLOPT_REFERER,SONAWDOMEN?'':$referer);
//curl_setopt($alu0,CURLOPT_NOBODY,TRUE);
//curl_setopt($alu0,CURLOPT_TIMEVALUE,$mt);
//кэш эшләсә
	//кэшта бу бит булса
		//димәк ул 5 көннән искерәк
		//сорауда вакыт күрсәтелгән булса
			//димәк ул әйләндерелгән файл вакыты
			//мҗ дан үзгәреш вакытын алам
			//берничә нәтиҗә булса язып куй, эш бетте ;)
			//0 нәтиҗә булса
				//димәк, ул бит гел үзгәреп тора торган, яки таблица чистартылган
				//сорау
				//күчерсә күчерү
				//соңгы үзгәртелү вакыты бармы
				//булса
					//биш минуттан картракмы
					//әе
						//мҗ га язырга
				//әйләндерү, кэш ясау, кэш вакыты белән чыгару, эш бетте
			//1 нәтиҗә булса
				//шуның белән сорыйм
				//үзгәрмәгән булса
					//әйләндергеч тә үзгәрмәгән булса
						//304 эш бетте
					//әйләндергеч үзгәргән булса
						//әйләндерү, кэшны яңарту, кэш вакыты белән чыгару, эш бетте
				//күчерсә таблицадан бетерү, күчерү
				//үзгәргән булса /*яңадан сорату, эчтәлекне алу,*/ үзгәреш вакытын мҗда саклау, әйләндерү, кэшны яңарту, кэш вакыты белән чыгару, эш бетте
		//сорауда вакыт күрсәтелмәгән булса
			//димәк бу браузер кэшында бу бит юк
			//мҗ дан үзгәреш вакытын алам, шуның белән сорыйм
			//үзгәрмәгән булса кэштагы файлны вакыты белән чыгару эш бетте
			//үзгәргән булса (яки мҗ да вакыт булмаса) яңадан сорату, эчтәлекне алу, үзгәреш вакытын мҗда саклау, әйләндерү, кэшны яңарту, кэш вакыты белән чыгару, эш бетте
	//кэшта бу бит булмаса
		//димәк ул моңарчы соралмаган яки соралган әмма кэш эшләмәгән булган
		//сорауда вакыт күрсәтелгән булса
			//димәк ул йырактагы файл вакыты йәки элек кэшта булган файл вакыты
			//әмма хәзер кэштагы файл вакыты итеп карыйсы
			//битне алу, үзгәреш вакытын мҗда саклау, әйләндерү, кэшка язу, кэш вакыты белән чыгару, эш бетте
		//сорауда вакыт күрсәтелмәгән булса
			//битне алу, үзгәреш вакытын мҗда саклау, әйләндерү, кэшка язу, кэш вакыты белән чыгару, эш бетте
//кэш эшләмәсә
	//кэшта бу битнең булуы-булмавын тикшереп тормыйм
	//сорауда вакыт күрсәтелгән булса
		//димәк ул йырактагы файл вакыты йәки элек кэшта булган файл вакыты
		//әмма хәзер аны йырактагы файл вакыты итеп карыйсы
		//шул вакыт белән сорау
		//үзгәрмәгән булса
			//304 эш бетте
		//үзгәргән булса
			//битне алып әйләндереп җибәрәсе, эш бетте
	//сорауда вакыт күрсәтелмәгән булса
		//битне алып әйләндереп җибәрәсе, эш бетте

			/*connecttodb();
			$stmt = $db->prepare("SELECT waqot FROM {$dbprefix}lastmod WHERE md5=:md5");
			$stmt->bindValue(':md5', md5($ba,true));
			$stmt->execute();
			$results=$stmt->fetchAll();
			print_r($results);exit;
			*/
if($kesislay){
	if(file_exists($kesfi)){
		if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])){
			connecttodb();
			$stmt = $db->prepare("SELECT waqot FROM {$dbprefix}lastmod WHERE md5=:md5");
			$stmt->bindValue(':md5', md5($ba,true));
			$stmt->execute();
			$results=$stmt->fetchAll();
			if(count($results)>1){
				touch(md5($ba));exit;
			}
			elseif(count($results)==0){
				curl_setopt($alu0,CURLOPT_FILETIME,TRUE);
				curl_setopt($alu,CURLOPT_RETURNTRANSFER,TRUE);
				$ic=curl_exec($alu0);
				$hc=curl_getinfo($alu0,CURLINFO_HTTP_CODE);
				$smt=curl_getinfo($alu,CURLINFO_FILETIME);//куелмаган булса -1 икән. куелган булса сан.
				curl_close($alu0);
				if(time()-$smt>5*60){
					$stmt = $db->prepare("INSERT INTO {$dbprefix}lastmod VALUES (:md5, :waqot, :url)");
					$stmt->bindValue(':md5', md5($ba,true));
					$stmt->bindValue(':waqot', $smt);
					$stmt->bindValue(':url', $ba);
					$stmt->execute();
				}
			}
			else{
				curl_setopt($alu0,CURLOPT_NOBODY,TRUE);
				curl_setopt($alu0,CURLOPT_TIMECONDITION,CURL_TIMECOND_IFMODSINCE);//Бу кирәк икән
				curl_setopt($alu0,CURLOPT_FILETIME,TRUE);
				curl_setopt($alu0,CURLOPT_TIMEVALUE,$results[0]);
				curl_exec($alu0);
				$hc=curl_getinfo($alu0,CURLINFO_HTTP_CODE);
				curl_close($alu0);
				if($hc==304){
					header('HTTP/1.0 304 Not Modified');
					exit;
				}elseif($hc==302||$hc==301){
					$stmt = $db->prepare("DELETE FROM {$dbprefix}lastmod WHERE md5=:md5");
					$stmt->bindValue(':md5', md5($ba,true));
					$stmt->execute();
					kucirow();
				}else{
					//$smt=curl_getinfo($alu,CURLINFO_FILETIME);//куелмаган булса -1 икән. куелган булса сан.
				}
			}
		}
	}//if(file_exists($kesfi))
	else{
	}//if(file_exists($kesfi))..else..
}//if($kesislay)
else{
}//if($kesislay)..else..

//touch(md5($ba));

curl_exec($alu0);
//$eu0=curl_getinfo($alu0,CURLINFO_EFFECTIVE_URL);
//$smt0=curl_getinfo($alu0,CURLINFO_FILETIME);//куелмаган булса -1 икән. куелган булса сан.
$ct=curl_getinfo($alu0,CURLINFO_CONTENT_TYPE);
$hc=curl_getinfo($alu0,CURLINFO_HTTP_CODE);
curl_close($alu0);
if($hc==302||$hc==301){
	kucirow();
}//if($hc==302||$hc==301)
elseif($hc==304){
	header('HTTP/1.0 304 Not Modified');
	exit;
}
$cto=explode(';',$ct);//cto - контент тайп өлешләре
$ctype=$cto[0];//text html
if($ctype!='text/html'){
	if($debug==''){
		header('Location: '.$ba);
		//echo'OK';
		//echo$ctype;
		exit;
	}else{
		echo($debug);
		exit;
	}
}
if(count($cto)==2){//text html ; charset=utf-8
	$cchseto=explode('=',$cto[1]);//c chset o - контент чарсет өлешләре
	$hecocha=$cchseto[1];//utf-8//hecocha - хедер контент чарсет
	$hecocha=strtolower(trim($hecocha));
}




//exit;














$alu=curl_init($ba);
curl_setopt($alu,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT'].' '.$til.'.'.TOPDOMEN);
curl_setopt($alu,CURLOPT_AUTOREFERER,TRUE);
curl_setopt($alu,CURLOPT_FOLLOWLOCATION,TRUE);//false куйсаң эшләми икән
curl_setopt($alu,CURLOPT_MAXREDIRS,0);//дөрес эшләмәй: хедырны бирмәй
//curl_setopt($alu,CURLOPT_MAXREDIRS,5);

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
if(strpos($ic,'˟')===false){
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
if($kesislay||!apc_fetch($ba)){
	include('iglan.php');
}
//include('iglan.php');

$ic=$d->saveHTML();
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
