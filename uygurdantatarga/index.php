<?php
if($_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'){
	header('Location: http://aylandirow.tmf.org.ru/robots.txt');
	exit;
}
header('Content-Type: text/html; charset=utf-8');
$s=substr($_SERVER['REQUEST_URI'],17);

//$s=file_get_contents('http://'.$s);
$adres='http://'.$s;
//$s=file_get_contents($adres);

/*$tidy = new tidy;
$config = array(
	'clean' => true,
	'indent'         => true,
	'output-html'   => true,
	'wrap'           => 200
);
$tidy->parseString($s, $config, 'utf8');
$tidy->cleanRepair();
$s= $tidy;*/

$d=new DOMDocument();
$d->loadHTMLFile($adres);
//$d->loadHTML($s);
require('../url_to_absolute.php');
//echo('A taglaro:<br>');
$a=$d->getElementsByTagName('a');
/*echo(url_to_absolute( 'http://example.com/әәә', 'өөө').'<br>');//эшләми
echo(url_to_absolute( urlencode('http://example.com/әәә'), 'өөө').'<br>');//эшләми
echo(url_to_absolute( urlencode('http://example.com/әәә'), urlencode('өөө')).'<br>');//эшләми
echo(url_to_absolute( rawurlencode('http://example.com/әәә'), rawurlencode('өөө')).'<br>');//эшләми
echo(urlencode('http://example.com/әәә').' '.urlencode('өөө').'<br>');//аңлашылды:http%3A%2F%2Fexample.com%2F
echo(url_to_absolute( 'http://example.com/', 'x.html').'<br>');
echo(url_to_absolute( 'http://example.com', 'x.html').'<br>');
echo(url_to_absolute( 'http://example.com/', '#x.html').'<br>');
echo(url_to_absolute( 'http://example.com/html/', 'x.html').'<br>');
echo(url_to_absolute( 'http://example.com/html/y.html', 'x.html').'<br>');
echo(url_to_absolute( 'http://example.com/html/y.html', '?x=html').'<br>');
echo(url_to_absolute( 'http://example.com/html', 'x.html').'<br>');
echo(url_to_absolute( 'http://example.com/html/', '?x=html').'<br>');
echo(url_to_absolute( 'http://example.com/html/y.html', '?x=html&z=ftp').'<br>');
echo(url_to_absolute( 'http://example.com/html/y.html', '?x=html&amp;z=ftp').'<br>');
echo(url_to_absolute( 'http://example.com/html/y.html', 'z.php?x=html&amp;z=ftp').'<br>');*/
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('href')->nodeValue;
	$h=url_to_absolute($adres,$h);
	//echo ( $h.'<br />');
	//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
	if(substr($h,0,7)=='http://'){
		$h='http://aylandirow.tmf.org.ru/uygurdantatarga/'.substr($h,7);
	}
	$h=str_replace('&','&amp;',$h);
	//$h=urlencode($h);
	//echo ( $h.'<br />');
	$a->item($i)->attributes->getNamedItem('href')->nodeValue=$h;
	//echo ( $a->item($i)->attributes->getNamedItem('href')->nodeValue . '<br />');
	//$a->item($i)->attributes->getNamedItem('href')->nodeValue='http://example.com/';
}
//exit;
//echo('script taglaro:<br>');
$a=$d->getElementsByTagName('script');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('src')->nodeValue;
	if($h!=''){
		$h=url_to_absolute($adres,$h);
		$h=str_replace('&','&amp;',$h);
		//echo ( $h.'<br />');
		//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
		$a->item($i)->attributes->getNamedItem('src')->nodeValue=$h;
	}
}
//echo('link taglaro:<br>');
$a=$d->getElementsByTagName('link');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('href')->nodeValue;
	$h=url_to_absolute($adres,$h);
	$h=str_replace('&','&amp;',$h);
	//echo ( $h.'<br />');
	//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
	$a->item($i)->attributes->getNamedItem('href')->nodeValue=$h;
}
//echo('form taglaro:<br>');
$a=$d->getElementsByTagName('form');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('action')->nodeValue;
	$h=url_to_absolute($adres,$h);
	//echo ( $h.'<br />');
	//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
	if(substr($h,0,7)=='http://'){
		$h='http://aylandirow.tmf.org.ru/uygurdantatarga/'.substr($h,7);
	}
	$h=str_replace('&','&amp;',$h);
	$a->item($i)->attributes->getNamedItem('action')->nodeValue=$h;
}
//echo('img taglaro:<br>');
$a=$d->getElementsByTagName('img');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('src')->nodeValue;
	$h=url_to_absolute($adres,$h);
	$h=str_replace('&','&amp;',$h);
	//echo ( $h.'<br />');
	$a->item($i)->attributes->getNamedItem('src')->nodeValue=$h;
}

$s=$d->saveHTML();
$s=html_entity_decode($s, ENT_NOQUOTES,'UTF-8');

//$s=mb_strtolower($s,'UTF-8');

/*$aylandorow=array(
	'е'=>'ә','і'=>'е','у'=>'ў','ө'=>'ү','ү'=>'ө','о'=>'у',
	'Е'=>'Ә','І'=>'Е','У'=>'Ў','Ө'=>'Ү','Ү'=>'Ө','О'=>'У'
);
$s=strtr($s,$aylandorow);*/
$uygurgarap='اﺍﺎبﺒﺑﺐﺏةﺓﺔتﺘﺗﺕﺖثﺙﺚﺛﺜجﺠﺟﺞﺝحﺡﺢﺣﺤخﺥﺦﺧﺨدﺩﺪذﺫﺬرﺭﺮزﺯﺰ';
$tataruros='ааабббббттттттттсссссҗҗҗҗҗххххххххххдддзззрррззз';
$uygurgarap.='سﺱﺲﺳﺴشﺵﺶﺷﺸصﺹﺺﺻﺼضﺽﺾﺿﻀﻁﻂﻃﻄطﻅﻆﻇﻈظﻉﻊﻋﻌعﻍﻎﻏﻐغ ف ﻑ ﻒ ﻓ ﻔ ﻘق ﻕ ﻖﻗ  كﻙﻚﻛﻜﻝﻞﻟﻠلمﻡﻢﻣﻤﻥﻦﻧﻨن';
$tataruros.='сссссшшшшшсссссзззззтттттзззззғғғғғғғғғғфффффқққққккккклллллмммммннннн';
$uygurgarap.='هﻩﻪﻫﻬﻭﻮوي';
$tataruros.='һәәһһўўўй';
$uygurgarap.='٠١٢٣٤٥٦٧٨٩';
$tataruros.='0123456789';
$uygurgarap.='گﮕﮔﮓﮒﮊﮋژپﭙﭘﭗﭖﯞﯟۋڭﯖﯕﯔﯓﯨﯩﻯﻰىﻱﻲﻳﻴې           ﯤ                ﯥ            ﯦ           ﯧ           ئﺉﺊﺋﺌ       ە  ؤ ۇﯗﯘ ۆﯚﯙ ۈﯛﯜ ﭺ ﭻ ﭼ ﭽ چ ،؟ھ';
$tataruros.='гггггжжжпппппвввңңңңңеееееййййѐѐѐѐѐ \'\'\'\'\'ә ў ууууууөөөччччч,?һ';
$uygurgarap=str_replace(' ','',$uygurgarap);
$uygurgarap=preg_split('//u',$uygurgarap);//ﺅﺆ
$uygurgarap=array_splice($uygurgarap,1,count($uygurgarap)-2);
//print_r($uygurgarap);
$tataruros=str_replace(' ','',$tataruros);
$tataruros=preg_split('//u',$tataruros);
$tataruros=array_splice($tataruros,1,count($tataruros)-2);
$uygurgarap[]='ﻻ';$uygurgarap[]='ﻼ';
$tataruros[]='ла';$tataruros[]='ла';
$s=str_replace($uygurgarap, $tataruros,$s );

/*$s=mb_split('//u',$uygurgarap);
print_r($s);*/

/*$aylandorow=array(
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>''

);
$s=str_replace(array_keys($aylandorow), array_values($aylandorow),$s );*/


echo $s;

?>
