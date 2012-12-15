<?php
if($_SERVER['HTTP_USER_AGENT']=='Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'){
	header('Location: http://aylandirow.tmf.org.ru/robots.txt');
	exit;
}
header('Content-Type: text/html; charset=utf-8');
$s=substr($_SERVER['REQUEST_URI'],17);
//echo strlen($s);
//exit;
if(preg_match('#^([\w\-]+\.)+[\w]+$#ui',$s)==1){
	//echo 'ok';
	header('Location: http://aylandirow.tmf.org.ru/qazaqtantatarga/'.$s.'/');
	exit;
}
//exit;
//$s=file_get_contents('http://'.$s);
$adres='http://'.$s;
$d=new DOMDocument();
$d->loadHTMLFile($adres);
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
		$h='http://aylandirow.tmf.org.ru/qazaqtantatarga/'.substr($h,7);
	}
	$h=str_replace('&','&amp;',$h);
	//$h=urlencode($h);
//	echo ( $h.'<br />');
	$a->item($i)->attributes->getNamedItem('href')->nodeValue=$h;
	//echo ( $a->item($i)->attributes->getNamedItem('href')->nodeValue . '<br />');
	//$a->item($i)->attributes->getNamedItem('href')->nodeValue='http://example.com/';
}
//echo('script taglaro:<br>');
$a=$d->getElementsByTagName('script');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('src')->nodeValue;
	if($h!=''){
//		echo ( $adres.' '.$h.'<br />');
		$h=url_to_absolute($adres,$h);
		$h=str_replace('&','&amp;',$h);
//		echo ( $h.'<br />');
		//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
		$a->item($i)->attributes->getNamedItem('src')->nodeValue=$h;
	}
}
//echo('link taglaro:<br>');
$a=$d->getElementsByTagName('link');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('href')->nodeValue;
//	echo ( $adres.' '.$h.'<br />');
	$h=url_to_absolute($adres,$h);
	$h=str_replace('&','&amp;',$h);
//	echo ( $h.'<br />');
	//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
	$a->item($i)->attributes->getNamedItem('href')->nodeValue=$h;
}
//echo('form taglaro:<br>');
$a=$d->getElementsByTagName('form');
for($i=0;$i<$a->length;$i++){
	$h=$a->item($i)->attributes->getNamedItem('action')->nodeValue;
	$h=url_to_absolute($adres,$h);
//	echo ( $h.'<br />');
	//$h=str_replace('http://','http://aylandirow.tmf.org.ru/qazaqtantatarga/',$h);
	if(substr($h,0,7)=='http://'){
		$h='http://aylandirow.tmf.org.ru/qazaqtantatarga/'.substr($h,7);
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
//	echo ( $h.'<br />');
	$a->item($i)->attributes->getNamedItem('src')->nodeValue=$h;
}

$s=$d->saveHTML();

//$s=mb_strtolower($s,'UTF-8');

$aylandorow=array(
	'е'=>'ә','і'=>'е','у'=>'ў','ө'=>'ү','ү'=>'ө','о'=>'у',
	'Е'=>'Ә','І'=>'Е','У'=>'Ў','Ө'=>'Ү','Ү'=>'Ө','О'=>'У'
);
$s=strtr($s,$aylandorow);

$aylandorow=array(
	'әкем'=>'хәким',
	'Әкем'=>'Хәким',
	'әсәп'=>'исәп',
	'Әсәп'=>'Исәп',
	'бәр'=>'бир',
	'Бәр'=>'Бир',
	'ардақ'=>'кадер',
	'Ардақ'=>'Кадер',
	'тың'=>'ның',
//	'ты'=>'лы',
	'мәлем'=>'мәгълүм',
	'Мәлем'=>'Мәгълүм',
	'әлбасы'=>'илбашы',
	'Әлбасы'=>'Илбашы',
//	'жыл'=>'йыл',
//	'жул'=>'йул',
	' әт'=>' ит',
	'Әт'=>'Ит',
	' мән'=>' белән',	
	'бәлге'=>'билге',
	'Бәлге'=>'Билге',
	'экунумика'=>'экономика',
	'Экунумика'=>'Экономика',
//	'жаңа'=>'йаңа',
	'ж'=>'й',
	'Ж'=>'Й',
	'мөмкен'=>'мөмкин',
	'Мөмкен'=>'Мөмкин',
	'МӨМКЕН'=>'МӨМКИН',
	'ув'=>'ов',
	'мәнең'=>'миннең',
	'Мәнең'=>'Миннең',
	'эләктрун'=>'электрон',
	'Эләктрун'=>'Электрон',
	'маўсым'=>'июн',
	'Маўсым'=>'Июн',
	'маў'=>'июн',
	'Маў'=>'Июн',
	'ешке'=>'эчке',
	'Ешке'=>'Эчке',
	'естәр'=>'эшләр',
	'Естәр'=>'Эшләр',
	'ЮНӘСКУ'=>'ЮНЕСКО',
	'Құрмәт'=>'Хөрмәт',
	'құрмәт'=>'хөрмәт',
	'Әл'=>'Ил',
	' әл'=>' ил',
	' кәл'=>' кил',
	'Кәл'=>'Кил',
	'Дөниә'=>'Дөнья',
	'дөниә'=>'дөнья',
	'Гурький'=>'Горький',
	'қызмәт'=>'хезмәт',
	'Қызмәт'=>'Хезмәт',
	'рәйс'=>'рейс',
	'Рәйс'=>'Рейс',
	'Әўә'=>'Һава',
	'әўә'=>'һава',
	'Қайыр'=>'Хәйер',
	'қайыр'=>'хәйер',
	'кумитәт'=>'комитет',
	'Кумитәт'=>'Комитет',
	' кәт'=>' кит',
	'Кәт'=>'Кит',
	'агәнт'=>'агент',
	'Агәнт'=>'Агент',
	'йўрналист'=>'журналист',
	'Йўрналист'=>'Журналист',
	'Бурис'=>'Борис',
	'уркәстр'=>'оркестр',
	'пулиция'=>'полиция',
	'Пулиция'=>'Полиция',
	'ўнивәрситәт'=>'унивәрситет',
	'Ўнивәрситәт'=>'Университет',
	'кунцәрт'=>'концерт',
	'Кунцәрт'=>'Концерт',
	'Аўа'=>'Һаўа',
	' аўа'=>' һаўа',
	'бизнәс'=>'бизнес',
	'Бизнәс'=>'Бизнес',
	'Дйаз'=>'ДҖаз',
	'дйаз'=>'дҗаз',
	'салтанат'=>'тантана',
	'Салтанат'=>'Тантана',
	' дәп'=>' дип',
	' дәгән'=>' дигән',
	'таныс'=>'таныш',
	'Таныс'=>'Таныш',
	'кину'=>'кино',
	'интәрнәт'=>'интернет',
	'кәре'=>'кире',
	'Кәре'=>'Кире',
	'ФУТУ'=>'ФОТО',
	'Футу'=>'Фото',
	'футу'=>'фото',
	'тўралы'=>'турында',
	'әң'=>'иң',
	'Әң'=>'Иң',
	'райы'=>'торышы',
	'әләм'=>'галәм',
	'Әләм'=>'Галәм',
	'нше'=>'нче',
	'фәстив'=>'фестив',
	'тәз'=>'тиз',
	'Тәз'=>'Тиз',
	'кәлбәт'=>'килбәт',
	'Кәлбәт'=>'Килбәт',
	'кәң'=>'киң',
	'Кәң'=>'Киң',
	'нәтийә'=>'нәтиҗә',
	'Нәтийә'=>'Нәтиҗә',
	'Дән'=>'Тән',
	'дән'=>'тән',
	'буп'=>'булып',
	'нә '=>'ни ',
	'Нә '=>'Ни ',
	'зиңгер'=>'зәңгәр',
	'ғайап'=>'ғаҗәп',
	'Ғайап'=>'Ғаҗәп',
	'ғана'=>'ғына',
	'йұмыс'=>'йомыш',
	'Йұмыс'=>'Йомыш',
	'әрритурия'=>'ерритория',
	' байланыс'=>' бәйләнеш',
	'Байланыс'=>'Бәйләнеш',
	' күшә'=>' урам',
	'Күшә'=>'Урам',
	' кәрәк'=>' кирәк',
	'Кәрәк'=>'Кирәк',
	'үнәр'=>'һөнәр',
	'Үнәр'=>'Һөнәр',
	' әмәс'=>' имәс',
	'әмтихан'=>'имтихан',
	'Әмтихан'=>'Имтихан',
	'қазба'=>'қазылма',
	'Қазба'=>'Қазылма',
	'мұнай'=>'нефть',
	'Мұнай'=>'Нефть',
	'нәгез'=>'нигез',
	'Нәгез'=>'Нигез',
	'илбәттә'=>'әлбәттә',
	'Илбәттә'=>'Әлбәттә',
	'илурда'=>'башкала',
	'Илурда'=>'Башкала',
	'Иләм'=>'Галәм',
	'иләм'=>'галәм',
	'әскәрткеш'=>'истәлек',
	'Әскәрткеш'=>'Истәлек',
	'әскәрт'=>'искәрт',
	'Әскәрт'=>'Искәрт',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
	''=>'',
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
$s=str_replace(array_keys($aylandorow), array_values($aylandorow),$s );


echo $s;

?>
