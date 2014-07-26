<?php


$reklama='Реклама: <a href="http://qdinar.wp.kukmara-rayon.ru" target="_blank">Бу &#1241;йл&#1241;ндергеч авторыны&#1187; ш&#1241;хси сайты</a>.<br />
'
//.'<a href="http://tmf.org.ru/perevesti_yge/?t=tt" target="_blank">БДИны (Россияк&#1199;л&#1241;м) к&#1199;птелл&#1241;штер&#1199; &#1257;чен тавыш &#1175;ыю</a><br />
//'
;

/*
$iglan=$d->createElement('div');
$iglan->appendChild($d->createTextNode('Бу aylandirow.tmf.org.ru &#1199;зг&#1241;ртеп к&#1199;рс&#1241;тк&#1241;н сайт! '));
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
$maglumat='Мәгълүмат: ';
if($til=='ttcysuttlart1999'||$til=='ttcysuttlasu'){
$maglumat.=$forumtemaso.'.<br />';
if(!$kesislay){
$maglumat.=($til=='ttcysuttlart1999'?'Бу сайт авторына бу латин язуы ошамый! Ч&#1257;нки латин язуыны&#1187; б&#1257;тен &#1257;стенлекл&#1241;рен кулланмый, киресенч&#1241;, зыянлы итеп куллана. Аны&#1187; тыелуы турында мин уйлыйм: Аллага ш&#1257;кер!<br />
Мондагы латин язуы 1999 елгы проекттагы латин язуына тулысынча т&#1241;&#1187;г&#1241;л килми ик&#1241;н, &#1241;мма мин аны т&#1257;з&#1241;тмим әле. Ул проект буенча slavyan диеп язылырга тиеш булган, минекенд&#1241; slav\'an.<br />
':'');
}
$maglumat.='<form method="POST" action="http://'.TOPDOMEN.'/" style="margin:0px;">'."\n";
if(isset($ba)){$maglumat.='<input type="text" name="ba" value="'.str_replace('&','&amp;',$ba).'" style="width:100%;" /><br />'."\n";}
$maglumat.='Латин язуы төре: <select name="yunalis">
<option value="ttcysuttlart1999" '.($til=='ttcysuttlart1999'?'selected="selected" ':'').'>ТР 1999 проекты</option>
<option value="ttcysuttlasu" '.($til=='ttcysuttlasu'?'selected="selected" ':'').'>"Я&#1187;алиф" СССР 1928-1940</option>
</select><input type="submit" value="&gt;" />
</form>'
;
}
$maglumat.='<a href="http://qdinar.wp.kukmara-rayon.ru/2012/12/15/sayt-teksto-aylandirgicni-tulosonca-actom/" target="_blank">
бу &#1241;йл&#1241;ндергеч кодын тулысынча гпл3 р&#1257;хс&#1241;те бел&#1241;н ачтым</a>.<br />
';
$maglumat.='Бит &#1241;йл&#1241;ндерелеп бетм&#1241;с&#1241;, я&#1187;артып карагыз<br />';
$iglan->appendXML('<div style="position:fixed;z-index:32767;top:70px;left:100px;background:#fff;border:1px solid #eee;direction:ltr;text-align:center;width:700px;font-size:10pt;">
<span style="border:1px solid #eee;cursor:pointer;padding:2px 5px;float:left;" onclick=\'this.parentNode.style.visibility="hidden";\'>X</span>
Бу <a href="http://'.TOPDOMEN.'/">'.TOPDOMEN.'</a> &#1199;зг&#1241;ртеп к&#1199;рс&#1241;тк&#1241;н '.
(isset($ba)?'<a href="'.str_replace('&','&amp;',$ba).'" target="_blank" id="conadres">сайт</a>':'текст').'!
<span style="border:1px solid #eee;cursor:pointer;padding:2px 5px;float:right;" onclick=\'this.parentNode.style.visibility="hidden";\'>X</span><br />
Бу &#1241;йл&#1241;ндергеч аркылы сайтларга язып булмый.<br />'."\n".
//(isset($ba)?'<a href="'.str_replace('&','&amp;',$ba).'" target="_blank" id="conadres">Чын адресына к&#1199;ч&#1199;</a><br />':'').
//(($til=='ttcysuttlart1999'||$til=='ttcysuttlasu')?('<a href="http://qdinar.wp.kukmara-rayon.ru/2012/03/19/latinlastorgoc-funktsiyani-satam/" target="_blank">Бу латинлаштыргыч php функциясен барча халыкка 1000 сумга сатмакчымын</a><br/>'):'').
'<br />'.$reklama
.'Монда сезне&#1187; реклама була ала.<br /><br />'.
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
($kesislay?'<br />Бу бит 5 к&#1257;нг&#1241; кэшланган':'').
'<br />Бу битне т&#1257;з&#1199; вакыты '.date('Y-m-d H:i:s').
'. <!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href=\'//www.liveinternet.ru/click;aylandirow\' "+
"target=_blank><img src=\'//counter.yadro.ru/hit;aylandirow?t52.1;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,80))+";"+Math.random()+
"\' alt=\'\' title=\'LiveInternet: соңгы 24 сәгатьтәге бит ачу саны"+
" һәм ачучылар саны күрсәтелгән\' "+
"border=\'0\' width=\'88\' height=\'31\'><\/a>")
//--></script><!--/LiveInternet-->'.
'</div>'.
$skript//казак, япон телл&#1241;ренн&#1241;н &#1241;йл&#1241;ндергечл&#1241;рд&#1241; яваскрипт бар
);





$body=$d->getElementsByTagName('body');
$body=$body->item(0);
if(is_object($body)){
	//$body->appendChild($iglan);
	$body->insertBefore($iglan,$body->firstChild);
	if($debug!=''){
		$debug='';//бу т&#1257;шт&#1241;н со&#1187; чыккан дебаг башкача чыгарыла, анда монда чыкканы тагы чыгарылмасын &#1257;чен
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
