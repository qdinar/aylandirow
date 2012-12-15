<?php
//япон викисындагы хатаны төзәтмәкче булып ясаган вариант

/*	function aylandir($s){
		return $s;
	}*/
	function aylandir($s){
		return '1'.$s;
		//return strlen($s).$s;
		//return $s;
	}
$inl=array('span','font','del','ins','a','abbr','acronym','dfn','em','strong',
'code','samp','kbd','var','b','i','small','big','strike','s','tt','u',
'bdo','cite','q','sub','sup','address','dfn',
'script','br','object','img','embed','applet','map','area','base','basefont','iframe',
'fieldset','input','button','label','legend','select'
);
$bl=array('div','title','h1','h2','h3','h4','h5','h6','p','ol','ul','dl','li'
,'dd','dt','form','center','pre','frame','frameset','table','tbody','td','th','tr','col','colgroup'
,'tfoot','thead','blockquote');
/*$inl=array('span');
$bl=array('div');
$inl=array('a','span');
$bl=array('ul','h6','h2','li',);*/
function yoropcoq($e){
	global $inl,$es,$k,$l;
	$ee=$e->childNodes;
	for($j=0;$j<$ee->length;$j++){//ул әйберләрне
		$bir_ee=$ee->item($j);//шуларның берсе
		if($bir_ee->nodeType==XML_TEXT_NODE && $bir_ee->nodeValue!="\n"){//текстларны
			//$bir_ee->nodeValue = aylandir($bir_ee->nodeValue);
			$es[$k][$l]=$bir_ee->nodeValue;
			//echo$k.':'.$l.':'.$es[$k][$l].';';
			//$bir_ee->nodeValue=$es[$k][$l];
			//$bir_ee->nodeValue='OK'.$bir_ee->nodeValue;
			//$bir_ee->nodeValue=$k.':'.$l.':'.$bir_ee->nodeValue;
			$l++;
		}elseif($bir_ee->nodeType==XML_ELEMENT_NODE){//элементларны
			if(in_array($bir_ee->nodeName,$inl)){//мәсәлән спан булса
				//$bir_ee->firstChild->nodeValue = aylandir($bir_ee->firstChild->nodeValue);
				yoropcoq($bir_ee);
			}else{
				//$es[$k]['blok']=$bir_ee->nodeName;
				$k++;$l=0;
			}
		}else{
			$k++;$l=0;
		}
	}
}
function yoropcoq2($e){
	global $inl,$es,$k,$l;
	$ee=$e->childNodes;
	for($j=0;$j<$ee->length;$j++){//ул әйберләрне
		$bir_ee=$ee->item($j);//шуларның берсе
		if($bir_ee->nodeType==XML_TEXT_NODE && $bir_ee->nodeValue!="\n"){//текстларны
			$bir_ee->nodeValue = $es[$k][$l];
			//$bir_ee->nodeValue='OK'.$bir_ee->nodeValue;
			//$bir_ee->nodeValue=$k.':'.$l.':'.$bir_ee->nodeValue;
			//echo$k.':'.$l.':'.$es[$k][$l].';';
			$l++;
		}elseif($bir_ee->nodeType==XML_ELEMENT_NODE){//элементларны
			if(in_array($bir_ee->nodeName,$inl)){//мәсәлән спан булса
				//$bir_ee->firstChild->nodeValue = aylandir($bir_ee->firstChild->nodeValue);
				yoropcoq2($bir_ee);
			}else{
				$k++;$l=0;
			}
		}else{
			$k++;$l=0;
		}
	}
}
header('Content-Type: text/html; charset=utf-8');
foreach($bl as $en){
	$e=$d->getElementsByTagName($en);
	for($i=0;$i<$e->length;$i++){//мәсәлән дивлар
		if($e->item($i)->hasChildNodes()){//див эчендә әйбер булса
			$k++;$l=0;
			yoropcoq($e->item($i));
		}
	}
}
//echo'<pre>';
//print_r($es);
//куша
for($k=0;$k<count($es);$k++){
	for($l=0;$l<count($es[$k]);$l++){
		$n[$k][$l]=mb_strlen($es[$k][$l]);
		$es2[$k].=$es[$k][$l];
	}
}
//echo'<pre>';
//print_r($es2);
//print_r($n);
//үзгәртә
for($k=0;$k<count($es);$k++){
	$es2[$k] = aylandir($es2[$k]);
}
//кире бүлеп чыга
for($k=0;$k<count($es);$k++){
	$start=0;
	for($l=0;$l<count($es[$k]);$l++){
		$es[$k][$l]=mb_substr($es2[$k],$start,$n[$k][$l]);
		$start+=$n[$k][$l];
	}
}
//echo'<hr>';
//print_r($es);
//exit;
//кире кертә
$k=0;
foreach($bl as $en){
	$e=$d->getElementsByTagName($en);
	for($i=0;$i<$e->length;$i++){//мәсәлән дивлар
		if($e->item($i)->hasChildNodes()){//див эчендә әйбер булса
			$k++;$l=0;
			yoropcoq2($e->item($i));
		}
	}
}

//exit;




//echo'OK';


?>
