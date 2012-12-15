<?php


$reklama='Реклама: <a href="http://qdinar.wp.kukmara-rayon.ru" target="_blank">Бу әйләндергеч авторының шәхси сайты</a> .<br />
'
//.'<a href="http://tmf.org.ru/perevesti_yge/?t=tt" target="_blank">БДИны (Россиякүләм) күптелләштерү өчен тавыш җыю</a><br />
//'
.($til=='ttcysuttlart1999'?'Бу сайт авторына бу латин язуы ошамый! Чөнки латин язуының бөтен өстенлекләрен кулланмый, киресенчә, зыянлы итеп куллана. Аның тыелуы турында мин уйлыйм: Аллага шөкер!<br />
':'')
.'Монда сезнең реклама була ала.';

/*
$iglan=$d->createElement('div');
$iglan->appendChild($d->createTextNode('Бу aylandirow.tmf.org.ru үзгәртеп күрсәткән сайт! '));
$yapqoc=$d->createElement('span','X');
$iglan->appendChild($yapqoc);
$iglan->appendChild($d->createElement('br'));
*/
$iglan=$d->createDocumentFragment();
//$debug='OK';
//if($bd=='qdb.tmf.org.ru'){
//	$debug='OK';
//}
//if($bd=='qdb.tmf.org.ru'){
//	$nomessage='<script>alert(parent.location);</script>';
//}
if($til=='ttcysuttlart1999'||$til=='ttcysuttlasu'){
if(!$kesislay){
$maglumat.='<br />Бит әйләндерелеп бетмәсә, яңартып карагыз';
}
$maglumat.=
'<br /><form method="POST" action="http://aylandirow.tmf.org.ru/" style="margin:0px;">
<input type="text" name="ba" value="'.str_replace('&','&amp;',$ba).'" style="width:100%;" /><br />
Латин язуы төре: <select name="yunalis">
<option value="ttcysuttlart1999" '.($til=='ttcysuttlart1999'?'selected="selected" ':'').'>ТР 1999 проекты</option>
<option value="ttcysuttlasu" '.($til=='ttcysuttlasu'?'selected="selected" ':'').'>"Яңалиф" СССР 1928-1940</option>
</select><input type="submit" value="&gt;" />
</form>'
;
}
$iglan->appendXML('<div style="position:fixed;z-index:32767;top:70px;left:100px;background:#fff;border:1px solid #eee;direction:ltr;text-align:center;width:700px;font-size:10pt;">
<span style="border:1px solid #eee;cursor:pointer;padding:2px 5px;float:left;" onclick=\'this.parentNode.style.visibility="hidden";\'>X</span>
Бу aylandirow.tmf.org.ru үзгәртеп күрсәткән сайт!
<span style="border:1px solid #eee;cursor:pointer;padding:2px 5px;float:right;" onclick=\'this.parentNode.style.visibility="hidden";\'>X</span><br />
Бу әйләндергеч хәзер UTC+4 тәгечә төнлә якынча 23 тән 9 гача эшләми.<br />
Бу әйләндергеч аркылы сайтларга язып булмый<br />
<a href="'.str_replace('&','&amp;',$ba).'" target="_blank" id="conadres">Чын адресына күчү</a><br />'.
//(($til=='ttcysuttlart1999'||$til=='ttcysuttlasu')?('<a href="http://qdinar.wp.kukmara-rayon.ru/2012/03/19/latinlastorgoc-funktsiyani-satam/" target="_blank">Бу латинлаштыргыч php функциясен барча халыкка 1000 сумга сатмакчымын</a><br/>'):'').
$reklama.
$maglumat.
(
	(
		$debug!=''&&
		!$kesislay&&
		(
			//$bd=='qdb.tmf.org.ru'||
			//$_SERVER['REMOTE_ADDR']=='78.138.176.205'
			$yuzeradmin
		)
	)?
	('<br />'.$debug):
	'' 
).
$aylandirowwaqoto.'; '.$tw.
($kesislay?'<br />Бу бит 5 көнгә кэшланган':'').
'<br />Бу битне төзү вакыты '.date('Y-m-d H:i:s').'</div>'.
$skript//казак, япон телләреннән әйләндергечләрдә яваскрипт бар
);





$body=$d->getElementsByTagName('body');
$body=$body->item(0);
if(is_object($body)){
	//$body->appendChild($iglan);
	$body->insertBefore($iglan,$body->firstChild);
	if($debug!=''){
		$debug='';//бу төштән соң чыккан дебаг башкача чыгарыла, анда монда чыкканы тагы чыгарылмасын өчен
	}
}

if(is_object($body)&&($til=='ttcysuttlart1999'||$til=='ttcysuttlasu')){
	$d2=new DOMDocument();
	$d2->loadHTML('<html><body></body></html>');
	$body2=$d2->getElementsByTagName('body');
	$body2=$body2->item(0);
	$iglan2=$d2->importNode($body->firstChild,TRUE);
	$body2->appendChild($iglan2);
	$e=$d2->getElementsByTagName('*');
	//foreach($e as $bir_e){
	for($i=0;$i<$e->length;$i++){
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
					//$debug.=$bir_ee->nodeValue;
				}
			}
		}
	}
	$iglan=$d->importNode($body2->firstChild,TRUE);
	$body->replaceChild($iglan,$body->firstChild);
}













?>
