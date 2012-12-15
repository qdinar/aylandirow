<?php
//$debug.='OK';
//mb_internal_encoding('UTF-8');
//$ut=array('кукмара','кама','командир');
//$uto=count($uzgartasitugillar);
//$probellar=array(' ',"\n","\t","\r",'_',',','.','!','?',':',';','-','-','-','-');
//+"'()*/0123456789<>=@[]{}©«»±×÷‐‑‒–—―
/*
$kirillitsa=
	'аәбвгдеёжҗзийклмнңоөпрстуүфхһцчшщъыьэюя';
$latin=
	"aabvgdeejcziyklmnnooprstuufxhscssъi'eua";
$kirillitsa.=mb_strtoupper($kirillitsa,'utf-8');
$latin.=mb_strtoupper($latin,'utf-8');
$latin=preg_split('//u',$latin);
$kirillitsa=preg_split('//u',$kirillitsa);
$latin=array_splice($latin,1,count($latin)-2);
$kirillitsa=array_splice($kirillitsa,1,count($kirillitsa)-2);
function aylandir($s){
	global $kirillitsa,$latin;
	return str_replace($kirillitsa,$latin,$s);
}
*/
//function utf8ord($u) {
//	$k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
//	$k1 = ord($k{0});
//	$k2 = ord($k{1});
//	return $k2 * 256 + $k1;
//}
function kirillitsa($s){
	return ($s>='А'&&$s<='я')||$s=='Җ'||$s=='җ'||$s=='Ң'||$s=='ң'||$s=='Ү'||$s=='ү'||$s=='Һ'||$s=='һ'||$s=='Ә'||$s=='ә'||$s=='Ө'||$s=='ө'||$s=='Ё'||$s=='ё';
}
function tartoq($s){
	return
($s>='Б'&&$s<='Д')||($s>='Ж'&&$s<='З')||($s>='Й'&&$s<='Н')||($s>='П'&&$s<='Т')||($s>='Ф'&&$s<='Щ')||$s=='Җ'||$s=='Ң'||$s=='Һ'||
($s>='б'&&$s<='д')||($s>='ж'&&$s<='з')||($s>='й'&&$s<='н')||($s>='п'&&$s<='т')||($s>='ф'&&$s<='щ')||$s=='җ'||$s=='ң'||$s=='һ';
}
$convertao=array(
		'а'=>'a','А'=>'A','о'=>'o','О'=>'O',//'ы'=>KICI_Ы,'Ы'=>ZUR_Ы,
);
$nickartao=array('а'=>'ə','А'=>'Ə','о'=>'ɵ','О'=>'Ɵ',);//ƏəɵƟÖö
//$gut=array('газ','гоби',);//'го',
$guto=count($gut);
//$kut=array('камил','каток','кама','кукмара');
$kuto=count($kut);
//$vut=array('во');
//$vuto=count($vut);
$convertmain=array(
'а'=>'a','ә'=>'ə','б'=>KICI_B,'д'=>'d','ж'=>KICI_Ж,'з'=>'z','и'=>KICI_I,'й'=>KICI_Y,//
'л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',/*'у'=>'u',*/'ф'=>'f','х'=>'x',
'ч'=>KICI_C,'ш'=>'ş','щ'=>'ş'.KICI_C,'ы'=>KICI_Ы,
'ө'=>'ɵ','җ'=>KICI_J,'ң'=>'ñ','һ'=>'h',
'А'=>'A','Ә'=>'Ə','Б'=>ZUR_B,'Д'=>'D','Ж'=>ZUR_Ж,'З'=>'Z','И'=>ZUR_I,'Й'=>ZUR_Y,//
'Л'=>'L','М'=>'M','Н'=>'N','О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T',/*'У'=>'U',*/'Ф'=>'F','Х'=>'X',
'Ч'=>ZUR_C,'Ш'=>'Ş','Щ'=>'Ş'.ZUR_C,'Ы'=>ZUR_Ы,
'Ө'=>'Ɵ','Җ'=>ZUR_J,'Ң'=>'Ñ','Һ'=>'H',
);
$nickartyeyuya=array(
'е'=>KICI_Y.'e','ю'=>KICI_Y.KICI_U,'я'=>KICI_Y.'ə',
'Е'=>ZUR_Y.'e','Ю'=>ZUR_Y.KICI_U,'Я'=>ZUR_Y.'ə',
);
$convertyeyuya=array(
'е'=>KICI_Y.KICI_Ы,'ю'=>KICI_Y.'u','я'=>KICI_Y.'a',
'Е'=>ZUR_Y.KICI_Ы,'Ю'=>ZUR_Y.'u','Я'=>ZUR_Y.'a',
);
$convertrus=array(
'а'=>'a','б'=>KICI_B,'в'=>'v','г'=>'g','д'=>'d',
'ж'=>KICI_Ж,'з'=>'z','и'=>KICI_I,'й'=>KICI_Y,'к'=>'k','л'=>'l','м'=>'m','н'=>'n',
'о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',
'ф'=>'f','х'=>'x',
'ч'=>KICI_C,'ш'=>'ş','щ'=>'ş'.KICI_C,'ъ'=>'','ы'=>KICI_Ы,'ь'=>'\'','э'=>'e',
'А'=>'A','Б'=>ZUR_B,'В'=>'V','Г'=>'G','Д'=>'D',
'Ж'=>ZUR_Ж,'З'=>'Z','И'=>ZUR_I,'Й'=>ZUR_Y,'К'=>'K','Л'=>'L','М'=>'M','Н'=>'N',
'О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T',
'Ф'=>'F','Х'=>'X',
'Ч'=>ZUR_C,'Ш'=>'Ş','Щ'=>'Ş'.ZUR_C,'Ъ'=>'','Ы'=>ZUR_Ы,'Ь'=>'\'','Э'=>'E',
);
$basqarussuz=array(
'аватар','рия','авиа','кукмара','кучук','чигайка','вамин','магазин','реклама','кама','камал','тдгпу','газет','курган',
'ульян','тнв','алфавит','куласа','ерэ','код','кабинет','конкурс','егэ','диктант','камил','ваз','газ','музыка','кандидат',
'округ','арканзас','канзас','португал','канада','украин','карта','поезд','нияз','казбек','заказ','указ','балкан','команда',
'лига',
);
$basqarussuzo=count($basqarussuz);
$yoyuyaoua=array(
'е'=>'e','я'=>'a','ю'=>'u','ё'=>'o',
'Е'=>'E','Я'=>'A','Ю'=>'U','Ё'=>'O',
);
$rusyeyuya=array(
'е'=>KICI_Y.'e','ю'=>KICI_Y.'u','я'=>KICI_Y.'a',
'Е'=>ZUR_Y.'e','Ю'=>ZUR_Y.'u','Я'=>ZUR_Y.'a',
);
$yeyoyuya=array(
'е'=>KICI_Y.'e','ю'=>KICI_Y.'u','я'=>KICI_Y.'a','ё'=>KICI_Y.'o',
'Е'=>ZUR_Y.'e','Ю'=>ZUR_Y.'u','Я'=>ZUR_Y.'a','Ё'=>ZUR_Y.'o',
);
$nickartzuraytyeyuya=array(
'Е'=>ZUR_Y.'E','Ю'=>ZUR_Y.''.ZUR_U,'Я'=>ZUR_Y.'Ə',
);
function zur($s){
	return ($s>='А'&&$s<='Я')||$s=='Ә'||$s=='Ө'||$s=='Ү'||$s=='Җ'||$s=='Ң'||$s=='Һ'||$s=='Ё';
}
$convertzuraytyeyuya=array(
'Е'=>ZUR_Y.ZUR_Ы,'Ю'=>ZUR_Y.'U','Я'=>ZUR_Y.'A',
);
/*function nsplusbirsuzqalonyeyuya(){
	global $birsuzh, $ns, $i2, $convertyeyuya, $convertzuraytyeyuya,$birsuz;
	if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
		$birsuzhp1=mb_substr($birsuz,$i2+1,1);
		if(zur($birsuzhp1)||!kirillitsa($birsuzhp1)){
			$ns.=$convertzuraytyeyuya[$birsuzh];
		}else{
			$ns.=$convertyeyuya[$birsuzh];
		}
	}else{//еюя:
		$ns.=$convertyeyuya[$birsuzh];
	}
}*/
$zuraytrusyeyuya=array(
'Е'=>ZUR_Y.'E','Ю'=>ZUR_Y.'U','Я'=>ZUR_Y.'A',
);
$zuraytyeyoyuya=array(
'Е'=>ZUR_Y.'E','Ю'=>ZUR_Y.'U','Я'=>ZUR_Y.'A','Ё'=>ZUR_Y.'O',
);
$iskarmaconvert=array(//махсус ысул белән әйләндерү
'карават'=>'karawat','мәгариф'=>'mə'.KICI_G.'ərif','гатаулл'=>KICI_G.'ataull',
'пауза'=>'pauza','мөгаен'=>'mɵ'.KICI_G.'ayen','мөлаем'=>'mɵlayem',
'биектау'=>'biyektaw','төбәкара'=>'tɵbəkara','акъегет'=>'aqyeget',
);
$iskarmatatarsuzconvert=array(//махсус ысул белән әйләндерү һәм урыс сүзе итеп тамгаланса ул тамганы алып ата
'акш'=>'aqş','юхиди'=>KICI_Y.'xidi','тяг'=>'ty'.KICI_G,'ядкяр'=>KICI_Y.'adkar','никях'=>'nikax','аккош'=>'aqqoş',
);
$iskarmatatarsuz=array(//урыс сүзе тамгасы табылганнан соң тикшереп кире татар сүзенә әйләндерү
'солтан',//солтангалиев дигәндә
'веб','гомум','коточкыч','гомер','гореф','гошер',//(монда KICI_G язасы түгел)
);
/*
function aylandir($s){
$ss=explode(' ',$s);
for($i=0;$i<count($ss);$i++){
	$ss[$i]=conaylandir($ss[$i]);
}
return implode(' ',$ss);
}
function conaylandir($s){
*/
function aylandir($s){
	$s=preg_replace('/­/u','',$s);// \xAD сә­я­си  //моны күчерәсе һәм моны сакланып кала торган итеп тә ясау мөмкин...
	global
$nickartao,$gut,$guto,$kut,$kuto,/*$vut,$vuto,*/$convertmain,$nickartyeyuya,$convertyeyuya,$convertrus,$convertao,
$basqarussuz,$basqarussuzo,$yoyuyaoua,$rusyeyuya,$yeyoyuya,$nickartzuraytyeyuya,$convertzuraytyeyuya,$zuraytrusyeyuya,
$zuraytyeyoyuya,$iskarmaconvert,$iskarmatatarsuzconvert,$debug,$iskarmatatarsuz,$bd
	;
	$so=mb_strlen($s);
	$i=0;$ns='';$h='';
	//$nh='';
	//$debug.='|';
	while($i<$so){
		//$ns.='ok';
		//$hm1=$h;
		$h=mb_substr($s,$i,1);
		//if(($i==0||!kirillitsa($hm1))&&kirillitsa($h)){//сүз башы
		if(kirillitsa($h)){
			//$debug.='|';
			//$hm1=mb_substr($s,$i-1,1);//-1 булганда дөрес түгел, әмма ул очрак барыбер дөрес үтеп китә
			$suzbaso=false;
			if($i==0){
				$suzbaso=true;
			}else{
				$hm1=mb_substr($s,$i-1,1);
				if(!kirillitsa($hm1)){
					$suzbaso=true;
				}
			}
			if($suzbaso){
				//$debug.='|';
				$j=0;$birsuz='';$russuzdir=false;$russuz='';$russuziyuq=false;
				$ebar=false;$ubar=false;$ibar=false;$obar=false;$meagkiyznakbar=false;
				do{//сүз ахырынача
					$hij=mb_substr($s,$i+$j,1);
					//if($hij===false){$ns.='OK';}
					//if($hij===''){$ns.='OK';}
					//$ns.='OK'.$hij.'OK';
					if(!$russuzdir&&!$russuziyuq){
						if($hij=='о'||$hij=='О'){
							$obar=true;
							if($ibar||$ebar){
								//кабардино - и + о, шемордан - е + о
								$russuzdir=true;
							}
							if($j==4&&($h=='б'||$h=='Б')){//башкорт
								//$ns.='OK';
								//$ns.=mb_strtolower(mb_substr($s,$i+1,6)).'OK';
								if(mb_strtolower(mb_substr($s,$i+1,6))!='ашкорт'){
									//$ns.='OK';
									$russuzdir=true;
								}else{
									$russuziyuq=true;
								}
							}elseif($j>1){//эколог,эволюция,кукморяне - о
								$hijp1=mb_substr($s,$i+$j+1,1);
								if($hijp1!='в'&&$hijp1!='В'){//фамилияләрдән башка
									$russuzdir=true;
								}
							}else{//во,товар
								$birsuzbaso=mb_strtolower(mb_substr($s,$i,3));
								if(
mb_strpos($birsuzbaso,'ов')!==false||mb_strpos($birsuzbaso,'во')!==false//беренче 3 хәрефтә ов булса йәки во булса
								){
									$russuzdir=true;
								}else{
								}
							}
						//}elseif($hij=='и'||$hij=='И'){//амбиция
						//	if($j>1){//ия,бия,чия,кия,тия кебек сүзләр калсынга
						//		$hijp1=mb_substr($s,$i+$j+1,1);
						//		if($hijp1=='я'||$hijp1=='Я'){
						//			$russuzdir=true;
						//		}
						//	}
						}elseif(
$hij=='ё'||$hij=='щ'||$hij=='ц'||$hij=='Ё'||$hij=='Щ'||$hij=='Ц'
//ёлка,ще(ё)тка, ведущем - щ, е + у
//муниципаль - ц
						){
							$russuzdir=true;
						}elseif($hij=='в'||$hij=='В'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							$hijm1=mb_substr($s,$i+$j-1,1);
							if(
//$hijp1=='м'||$hijp1=='М'||//вместе - вм
( $j==0 && (!kirillitsa($hijp1)||$hijp1==false) )||//в - берүзе
//$hijp1=='л'||$hijp1=='Л'//власть
(tartoq($hijp1)&&!($hijm1=='е'||$hijm1=='о'||$hijm1=='Е'||$hijm1=='О'))||//враг,все,взрыв,бавлы әмма садриевка,корбановка
$hijp1=='е'||$hijp1=='Е'||//версия
($j==0 && ($hijp1=='и'||$hijp1=='И') )//визит
							){
								$russuzdir=true;
							}
						}elseif($hij=='е'||$hij=='Е'){
							if($j>0){
								$hijm1=mb_substr($s,$i+$j-1,1);
								if(tartoq($hijm1)){
									$ebar=true;
									if($ubar||$obar){
							//уничтожен, лучшее, кушкет, кузмесь - у + е
										//$ns.='OK';
										$russuzdir=true;
									}
								}
							}
							$hijp1=mb_substr($s,$i+$j+1,1);
							/*if($hijp1=='е'||$hijp1=='Е'){
								//лучшее - ее
								//әмма юбилее
								$russuzdir=true;
							}else*/
							if($hijp1=='ж'||$hijp1=='Ж'){
								//одежды - еж
								$russuzdir=true;
							/*}elseif($hijp1=='в'||$hijp1=='В'){
								//бушуев - ев
								//әмма имамиева
								$russuzdir=true;*/
							}elseif($hijp1=='я'||$hijp1=='Я'){
								//галерея, фея -ея
								$russuzdir=true;
							}
							if($meagkiyznakbar){
								//карьер - ь + е, ье
								//әмма яшьлек
								$hijm1=mb_substr($s,$i+$j-1,1);
								if($hijm1=='ь'||$hijm1=='Ь'){
									$russuzdir=true;
								}
							}
						}elseif($hij=='у'||$hij=='У'){
							if($ebar||$ibar){//$ubar - кулланучылар
								//$ns.='OK';
								//ведущем - е + у, иду - и + у, кучук - у + у
								//интересует - и + у, е + у
								//әмма тасвирлау
								//әмма гомуми
								if($j==0){
									$russuzdir=true;
								}else{
									//$debug.=$birsuz;
									$hijm1=mb_substr($s,$i+$j-1,1);
									if(
!($hijm1=='а'||
$hijm1=='о'||
$hijm1=='А'||$hijm1=='О')
									){
										//$debug.=$birsuz;
										$russuzdir=true;
									}
								}
							}
							$ubar=true;
							$hijp1=mb_substr($s,$i+$j+1,1);
							if(
$hijp1=='н'||//колдун - ..+ун$
$hijp1=='с'||//фокус
$hijp1=='Н'||$hijp1=='С'
							){
								$hijp2=mb_substr($s,$i+$j+2,1);
								if(!kirillitsa($hijp2)||$hijp2==false){
									$russuzdir=true;
								}
							}
						}elseif($hij=='д'||$hij=='Д'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='ж'||$hijp1=='л'||$hijp1=='Ж'||$hijp1=='Л'){
								//джаннату - дж
								//предлагаем - дл
								$russuzdir=true;
							}
						}elseif($hij=='и'||$hij=='И'){
							$ibar=true;
							if($obar){//||$ubar
								//уничтожен, куркино - у + и
								//муниципаль - у + и
								//әмма гатауллин
								//борис
								$russuzdir=true;
							}
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='и'||$hijp1=='И'){
								//балкарии - ии
								$russuzdir=true;
							}elseif($hijp1=='к'||$hijp1=='К'){
								//физика - ика
								$hijp2=mb_substr($s,$i+$j+2,1);
								if($hijp2=='а'||$hijp2=='А'){
									$russuzdir=true;
								}
							}elseif($hijp1=='й'||$hijp1=='Й'){
								//верхний - ий
								//аркадий
								$hijp2=mb_substr($s,$i+$j+2,1);
								if(
$hijp2!='а'&&//*рийа
$hijp2!='ә'&&//*кийәм
$hijp2!='е'&&//*кийем
$hijp2!='ү'&&//*кийү
$hijp2!='у'&&//*җийу
$hijp2!='ы'&&//*җийын
$hijp2!='А'&&$hijp2!='Ә'&&$hijp2!='Е'&&$hijp2!='Ү'&&$hijp2!='У'&&$hijp2!='Ы'
								){
									//$ns.='OK';
									$russuzdir=true;
								}
							}elseif($hijp1=='в'||$hijp1=='В'){
								//иван
								//актив
								$russuzdir=true;
							}elseif($hijp1=='а'||$hijp1=='А'){
								//вариант
								$russuzdir=true;
							}
						}elseif($hij=='я'||$hij=='ю'||$hij=='Я'||$hij=='Ю'){
							//бәлки ья ны бетерергәдер әмма дөнья,дәрья
							if($j>0){
								$hijm1=mb_substr($s,$i+$j-1,1);
								if(tartoq($hijm1)){
									//января - тартыктан соң я йә ю
									//люгдон - лю
									$russuzdir=true;
								}
							}elseif($hij=='ю'||$hij=='Ю'){//юмья - юмь
								$hijp1=mb_substr($s,$i+$j+1,1);
								//$ns.='OK';
								if($hijp1=='м'||$hijp1=='М'){
									//$ns.='OK';
									$hijp2=mb_substr($s,$i+$j+2,1);
									if($hijp2=='ь'||$hijp2=='Ь'){
										$russuzdir=true;
									}
								}
							}
						}elseif($hij=='п'||$hij=='П'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='р'||$hijp1=='Р'){
								//предлагаем - пр
								//приглашаем - пр
								$russuzdir=true;
							}
						}elseif($hij=='т'||$hij=='Т'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='в'||$hijp1=='В'){//качественные - тв
								$russuzdir=true;
							}
						}elseif($hij=='к'||$hij=='К'){//электричкада - ктр
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='т'||$hijp1=='Т'){
								$hijp2=mb_substr($s,$i+$j+2,1);
								if($hijp2=='р'||$hijp2=='Р'){
									$russuzdir=true;
								}
							}elseif($j==0&&($hijp1=='р'||$hijp1=='Р')){
								//красивая
								$russuzdir=true;
							}
						}elseif($hij=='ч'||$hij=='Ч'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='ш'||$hijp1=='Ш'){
								//лучшее - чш
								$russuzdir=true;
							}
						}elseif($hij=='ь'||$hij=='Ь'){
							//синерь - е + ь , әмма "мәсьәлән" кебек сүз куркынычы бар
							//вирь - и + ь
							//булмады әле болары, чөнки "фигыль"
							$meagkiyznakbar=true;
							if($ebar){//$ibar
								//верь - е + ь
								//эльвира - э + ь
								$russuzdir=true;
							}
							//$hijp1=mb_substr($s,$i+$j+1,1);
							//if($hijp1=='е'||$hijp1=='Е'){
							//	//карьер - ье
							//	$russuzdir=true;
							//}
						}elseif($hij=='р'||$hij=='Р'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='в'||$hijp1=='В'){
								//первое - рв
								//первый - рв
								$russuzdir=true;
							}
						}elseif($hij=='ы'||$hij=='Ы'){
							if($j>0){
								$hijm1=mb_substr($s,$i+$j-1,1);
								if(
$hijm1!='г'&&$hijm1!='к'&&$hijm1!='Г'&&$hijm1!='К'//фигыль
								){
									if($ebar){
										$russuzdir=true;
									}
								}
							}
						}elseif($hij=='э'||$hij=='Э'){
							$ebar=true;
						}elseif($hij=='ж'||$hij=='Ж'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if(!kirillitsa($hijp1)||$hijp1==false){
								//лельвиж - ж ахырда
								$russuzdir=true;
							}
						}elseif($hij=='г'||$hij=='Г'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='д'||$hijp1=='Д'){
								//люгдон - гд
								$russuzdir=true;
							}
						}elseif($hij=='м'||$hij=='М'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='п'||$hijp1=='П'){
								//компьютер - мп
								$russuzdir=true;
							}
						}elseif($hij=='а'||$hij=='А'){
							//коммуналь - аль
							//фестиваль - аль
							//муниципаль - аль
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='л'||$hijp1=='Л'){
								$hijp2=mb_substr($s,$i+$j+2,1);
								if($hijp2=='ь'||$hijp2=='Ь'){
									$russuzdir=true;
								}
							}
							if($ebar){//телеграмма,екатерина
								$russuzdir=true;
							}
						}elseif($j==0&&($hij=='с'||$hij=='С')){
						//	//конструктор - стр
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='с'||$hijp1=='С'){
								$russuzdir=true;
							}
						//	if($hijp1=='т'||$hijp1=='Т'){
						//		$hijp2=mb_substr($s,$i+$j+2,1);
						//		if($hijp2=='р'||$hijp2=='Р'){
						//			$russuzdir=true;
						//		}
						//	}elseif($hijp1=='к'||$hijp1=='К'){
								//кукморский - рск
								//минск - нск
								//дискларым
						//		$hijp2=mb_substr($s,$i+$j+2,1);
						//		if(tartoq($hijp2)){
						//			$russuzdir=true;
						//		}
						//	}
						}elseif($hij=='х'||$hij=='Х'){
							$hijp1=mb_substr($s,$i+$j+1,1);
							if(tartoq($hijp1)){
								//хна,верхний
								$russuzdir=true;
							}elseif($j>0){
								$hijm1=mb_substr($s,$i+$j-1,1);
								if(tartoq($hijm1)){
									//верх
									$russuzdir=true;
								}
							}
						}elseif($hij=='б'||$hij=='Б'){
							//ноябрь
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='р'||$hijp1=='Р'){
								$hijp2=mb_substr($s,$i+$j+2,1);
								if($hijp2=='ь'||$hijp2=='Ь'){
									$russuzdir=true;
								}
							}
						}
						if(tartoq($hij)){
							//$ns.='OK'.$j.'OK';
							if($j>1){
								//$ns.='OK';
								$hijm1=mb_substr($s,$i+$j-1,1);
								if(tartoq($hijm1)){//&&($hijm1!=$hij)
									//$ns.='OK';
									$hijm2=mb_substr($s,$i+$j-2,1);
									if(tartoq($hijm2)){
										//$ns.='OK';
										if(
!(
	($hijm1=='т'||$hijm1=='Т')&&
	($hijm2=='р'||//артка,көрткә,картка
	$hijm2=='н'||//антка
	$hijm2=='т'||//астта
	$hijm2=='л'||//шалт..
	$hijm2=='Р'||$hijm2=='Н'||$hijm2=='Т'||$hijm2=='Л')
)&&
!($hijm2=='й'||$hijm2=='Й')//гыйнвар
										){
											$russuzdir=true;
										}
									}else{
										$hijp1=mb_substr($s,$i+$j+1,1);
										if(!kirillitsa($hijp1)){//вепс,штутгард
											if(
!(
	($hij=='т'||$hij=='Т')&&
	($hijm1=='р'||//арт,көрт,карт,корт
	$hijm1=='н'||//ант
	$hijm1=='т'||//аст
	$hijm1=='л'||//шалт
	$hijm1=='Р'||$hijm1=='Н'||$hijm1=='Т'||$hijm1=='Л')
)&&
!($hijm1=='й'||$hijm1=='Й')//барыйк,кылыйк
											){
												$russuzdir=true;
											}
										}
									}
								}
							}elseif($j==1){//трамвай,грамм,граф
								$hijm1=mb_substr($s,$i+$j-1,1);
								if(tartoq($hijm1)){
									$russuzdir=true;
								}
							}
						}
					}//рус сүзе әле табылмаган булганда эшләнгән өлеш бетте
					if($russuz==''&&!$russuziyuq){
						if(
$hij=='ә'||$hij=='ө'||$hij=='ү'||$hij=='җ'||$hij=='ң'||$hij=='һ'||
$hij=='Ә'||$hij=='Ө'||$hij=='Ү'||$hij=='Җ'||$hij=='Ң'||$hij=='Һ'
						){
							if($russuzdir){//рус сүзе табылган булса кисү
								$russuz=$birsuz;
							}else{//рус сүзе табылмаган булса "димәк" рус сүзе монда булмас
								$russuziyuq=true;
							}
						}elseif($hij=='и'||$hij=='ы'||$hij=='И'||$hij=='Ы'){//кыямова
							$hijp1=mb_substr($s,$i+$j+1,1);
							if($hijp1=='я'||$hijp1=='Я'){
								//станциясе
								if($russuzdir){//рус сүзе табылган булса кисү
									//$ns.='OK';
									$russuz=$birsuz;
									//$ns.=$russuz.'OK';
								}else{
								//рус сүзе табылмаган булса "димәк" рус сүзе монда булмас
									$russuziyuq=true;
									//$ns.='OK';
								}
							}elseif($hijp1=='й'||$hijp1=='Й'){
								$hijp2=mb_substr($s,$i+$j+2,1);
								if(
$hij=='ы'||$hij=='Ы'||//гыйлемханов
$hijp2=='а'||//*рийа
$hijp2=='ә'||//*кийәм
$hijp2=='е'||//*кийем
$hijp2=='ү'||//*кийү
$hijp2=='у'||//*җийу
$hijp2=='ы'||//*җийын
$hijp2=='А'||$hijp2=='Ә'||$hijp2=='Е'||$hijp2=='Ү'||$hijp2=='У'||$hijp2=='Ы'
								){
									if($russuzdir){//рус сүзе табылган булса кисү
										//$ns.='OK';
										$russuz=$birsuz;
										//$ns.=$russuz.'OK';
									}else{
								//рус сүзе табылмаган булса "димәк" рус сүзе монда булмас
										$russuziyuq=true;
										//$ns.='OK';
									}
								}
							}
						}
					}
					$birsuz.=$hij;
					$j+=1;
				}while(kirillitsa($hij));
				if($hij!=''){//<span>ун  ун</span>
					$birsuz=mb_substr($birsuz,0,-1);
				}
				$i2=0;
				foreach($iskarmatatarsuzconvert as $key=>$value){//АКШ
					$keyo=mb_strlen($key);
					$birsuzbaso=mb_substr($birsuz,0,$keyo);
					if(mb_strtolower($birsuzbaso)==$key){
						//$ns.=$value;
						$valueo=mb_strlen($value);
						for($j=0;$j<$valueo;$j++){
							$sourcej=
								round(
									($j/($valueo-1))*
									($keyo-1)
								);
							if(zur(mb_substr($birsuzbaso,$sourcej,1))){
								$nh=mb_substr($value,$j,1);
								if($nh==KICI_I){
									$ns.=ZUR_I;
								}else{
									$ns.=mb_strtoupper($nh);
								}
							}else{
								$ns.=mb_substr($value,$j,1);
							}
						}
						$i2+=$keyo;
						$russuzdir=false;
						break;
					}
				}
				//$debug.='|';
				//if(mb_substr($birsuz,0,4)=='гата'){$debug.='OK';}
				if($russuzdir){
					//if(mb_substr($birsuz,0,4)=='гата'){$debug.='OK';}
					/*//кушымчаларны алып ату
					$birsuzahoro=mb_strtolower(mb_substr($birsuz,-2));
					$birsuzahorom1=mb_strtolower(mb_substr($birsuz,-3,1));
					if($birsuzahoro=='га'||$birsuzahoro=='гә'){
						if($birsuzahorom1=='н'||$birsuzahorom1=='р'){
						}else{
						}
						$russuz=mb_substr($birsuz,0,-3);
					}elseif($birsuzahoro=='ка'||$birsuzahoro=='кә'){
						if($birsuzahorom1=='ч'||$birsuzahorom1=='т'){
							$russuz=mb_substr($birsuz,0,-3);
						}else{
							$russuz=$birsuz;
						}
					}else{
						$russuz=$birsuz;
					}*/
					if($russuz==''){//ахыры табылып киселмәгән булса - тулысынча
						$russuz=$birsuz;
					}
					$iskarmatatarsuzo=count($iskarmatatarsuz);
					for($j=0;$j<$iskarmatatarsuzo;$j++){
						$key=$iskarmatatarsuz[$j];
						$keyo=mb_strlen($key);
						$birsuzbaso=mb_strtolower(mb_substr($birsuz,0,$keyo));
						if($birsuzbaso==$key){
							$russuzdir=false;
							break;
						}
					}
					//if($russuzdir){
						//iskarmatatarsuzconvert иде монда
					//}
				}else{//искәрмәләрне эзләп карыйсы, "аватар" кебек, "в" хәрефен дөрес әйләндерер өчен, "рия" да шунда, рус сүзе булмаса да, анысы "я"ны калын итеп әйләндерер өчен
					//$debug.='|';
					for($j=0;$j<$basqarussuzo;$j++){
						if(
mb_strtolower(mb_substr($birsuz,0,mb_strlen($basqarussuz[$j])))==$basqarussuz[$j]
						){
							$russuzdir=true;
							//$russuz=$basqarussuz[$j];
							$russuz=mb_substr($birsuz,0,mb_strlen($basqarussuz[$j]));
							break;
						}
					}
				}
				//if(mb_substr($birsuz,0,4)=='гата'){$debug.='OK';}
				if(!$russuzdir){
					//$debug.='.';
					//for($j=0;$j<$iskarmaconverto;$j++){
					foreach($iskarmaconvert as $key=>$value){
						$keyo=mb_strlen($key);
						$birsuzbaso=mb_substr($birsuz,0,$keyo);
						//if(mb_substr($birsuz,0,4)=='гата'){$debug.='OK';}
						if(mb_strtolower($birsuzbaso)==$key){
							//$ns.=$value;
							//$debug.=$key;
							//$ns.='OK';
							//$debug.=$value;
							$valueo=mb_strlen($value);
							for($j=0;$j<$valueo;$j++){
								$sourcej=
									round(
										($j/($valueo-1))*
										($keyo-1)
									);
								if(zur(mb_substr($birsuzbaso,$sourcej,1))){
									$nh=mb_substr($value,$j,1);
									if($nh==KICI_I){
										$ns.=ZUR_I;
									}else{
										$ns.=mb_strtoupper($nh);
									}
								}else{
									$ns.=mb_substr($value,$j,1);
								}
							}
							$i2+=$keyo;
							break;
						}
					}
				}
				$birsuzo=mb_strlen($birsuz);
				//if(false){
				if($russuzdir){
					//if(mb_substr($birsuz,0,4)=='гата'){$debug.='OK';}
					//бу төштә "рус сүзе" табылган, аны әйләндереп өстисе
					$russuzo=mb_strlen($russuz);
					for($j=0;$j<$russuzo;$j++){
						//$ns.=$j;
						$russuzh=mb_substr($russuz,$j,1);
						if(
$russuzh=='е'||$russuzh=='ю'||$russuzh=='я'||$russuzh=='ё'||$russuzh=='Я'||$russuzh=='Е'||$russuzh=='Ё'||$russuzh=='Ю'
						){//бельё, ёлка, кулёк
							if($j==0){
								//$ns.=($russuzh=='ё'?KICI_Y.'o':ZUR_Y.'o');
								//$ns.=KICI_Y.$yoyuyaoua[$russuzh];
								//$ns.=$yeyoyuya[$russuzh];
								if(
$russuzh=='Е'||$russuzh=='Ю'||$russuzh=='Я'||$russuzh=='Ё'
								){
									$russuzhp1=mb_substr($russuz,$i2+1,1);
									if(
zur($russuzhp1)||!kirillitsa($russuzhp1)
									){
										$ns.=$zuraytyeyoyuya[$russuzh];
									}else{
										$ns.=$yeyoyuya[$russuzh];
									}
								}else{//еюя:
									$ns.=$yeyoyuya[$russuzh];
								}
							}else{
								//$ns.='OK';
								$russuzhm1=mb_substr($russuz,$j-1,1);
								if(
$russuzhm1=='ь'||$russuzhm1=='е'||$russuzhm1=='ъ'||//бельё,белъё,её
$russuzhm1=='а'||$russuzhm1=='у'||$russuzhm1=='и'||$russuzhm1=='о'||$russuzhm1=='ы'||//аё,уё,иё,оё,ыё
$russuzhm1=='я'||$russuzhm1=='ю'||$russuzhm1=='е'||$russuzhm1=='ё'||//яё,юё,её,ёё
$russuzhm1=='Ь'||$russuzhm1=='Е'||$russuzhm1=='Ъ'||
$russuzhm1=='А'||$russuzhm1=='У'||$russuzhm1=='И'||$russuzhm1=='О'||$russuzhm1=='Ы'||
$russuzhm1=='Я'||$russuzhm1=='Ю'||$russuzhm1=='Е'||$russuzhm1=='Ё'
								){
									//$ns.=($russuzh=='ё'?KICI_Y.'o':ZUR_Y.'o');
									//$ns.=$yeyoyuya[$russuzh];
									if(
$russuzh=='Е'||$russuzh=='Ю'||$russuzh=='Я'||$russuzh=='Ё'
									){
										$russuzhp1=mb_substr($russuz,$i2+1,1);
										if(
zur($russuzhp1)||!kirillitsa($russuzhp1)
										){
											$ns.=$zuraytyeyoyuya[$russuzh];
										}else{
											$ns.=$yeyoyuya[$russuzh];
										}
									}else{//еюя:
										$ns.=$yeyoyuya[$russuzh];
									}
								}else{//белё
									//$ns.=($russuzh=='ё'?'\'o':'\'O');
									if($russuzh=='е'){
										$ns.='e';
									}elseif($russuzh=='Е'){
										$ns.='E';
									}else{
										$ns.='\''.$yoyuyaoua[$russuzh];
									}
								}
							}
						}elseif($russuzh=='у'||$russuzh=='У'){
							if($j==0){
								//$ns.='OK'.$birsuzh.'OK';
								$ns.=($russuzh=='у'?'u':'U');
							}else{
								//(ахыргы хәрефкә әйләнә алыр иде)
								$russuzhm1=mb_substr($russuz,$j-1,1);
								//$ns.='OK'.$birsuzhm1.'OK';
								if(
$russuzhm1=='а'||$russuzhm1=='А'||
$russuzhm1=='о'||$russuzhm1=='О'//шоу,боулинг
								){
									$ns.=($russuzh=='у'?KICI_W:ZUR_W);
								}else{
									$ns.=($russuzh=='у'?'u':'U');
								}
							}
						//}elseif($russuzh=='ц'||$russuzh=='Ц'){
						}elseif($russuzh=='Ц'){
							$russuzhp1=mb_substr($russuz,$j+1,1);
							if(
zur($russuzhp1)||!kirillitsa($russuzhp1)
							){
								$ns.='TS';
							}else{
								$ns.='Ts';
							}
						//}else{//еюя:
						}elseif($russuzh=='ц'){
							$ns.='ts';
						//}
						}else{
							$ns.=$convertrus[$russuzh];
						}
					}
					$i2+=$russuzo;
				}
				//$ns.='OK';
				//$ns.=$i2;
				while($i2<$birsuzo){
					if($i2>0){
						$suzbaso=false;
					}
					$birsuzh=mb_substr($birsuz,$i2,1);
					//if(convertmain($birsuzh)){
						//$ns.=$birsuzh;
						//$ns.=$convertmain[$birsuzh];
					//}elseif($birsuzh=='в'||$birsuzh=='В'){
						//for($j=0;$j<$vuto;$j++){
						//	if(mb_substr($birsuz,$i2,mb_strlen($vut[$j]))==$vut[$j]){
						//		$ns.=($birsuzh=='в'?'v':'V');
						//		$i2+=1;
						//		continue 2;
						//	}
						//}
						//$ns.=($birsuzh=='в'?KICI_W:ZUR_W);
					//}elseif($birsuzh=='г'||$birsuzh=='Г'){
					if($birsuzh=='г'||$birsuzh=='Г'){
						//$ns.='ok';
						//if($suzbaso){
						//	for($j=0;$j<$guto;$j++){
						//		if(mb_strtolower(mb_substr($birsuz,$i2,mb_strlen($gut[$j])))==$gut[$j]){
						//			$ns.=($birsuzh=='г'?'g':'G');
						//			$i2+=1;
						//			continue 2;
						//		}
						//	}
						//}
						$birsuzhp1=mb_substr($birsuz,$i2+1,1);//false була ала
						if(
$birsuzhp1=='а'||$birsuzhp1=='о'||$birsuzhp1=='О'||$birsuzhp1=='А'
						){
							$j=1;//"карагаем" кебек сүзләрне монда j=2 дип куеп кына төзәтеп булмый, чөнки j=2 дән башланганда бу икенче сүз башына эләгә ала
							do{
								$j+=1;//"га дальше" булганда hp1=а, бу башлана " " дан... "карагаем" дигәндә "е"дән. гореф дигәндә р дән
								$x=mb_substr($birsuz,$i2+$j,1);
							}while(
								tartoq($x)||//
								$x=='я'||$x=='Я'||//гаять,гаярь
								($j==2&&($x=='е'||$x=='Е'))//карагаем,тугаем
							);
							//хәзер икс йә сузык, йә пробел-мазар
							if(
$x=='ь'||//гарь
$x=='ә'||//гаҗәп,гаепләде
$x=='е'||//гомер,гаебе
$x=='Ь'||$x=='Ә'||$x=='Е'
							){
								//$ns.='OK';
								//$ns.='OK'.$x.'OK';
								$ns.=($birsuzh=='г'?KICI_G:ZUR_G);
								$ns.=$nickartao[$birsuzhp1];
								$i2+=1;
							//}elseif($x=='и'/*галим*/||$x=='И'){
							//	$ns.=($birsuzh=='г'?KICI_G:ZUR_G);
							//	$ns.=$convertao[$birsuzhp1];
							//	$i2+=1;
							//}elseif(($birsuzhp1=='а'||$birsuzhp1=='А')&&()/*гаеп*/){
							}else{
								$ns.=($birsuzh=='г'?KICI_G:ZUR_G);
								if($suzbaso){//"гаеп":
									$birsuzhp2=mb_substr($birsuz,$i2+2,1);
									if(
($birsuzhp1=='а'||$birsuzhp1=='А')&&($birsuzhp2=='е'||$birsuzhp2=='Е')
									){
										$ns.=($birsuzhp1=='а'?'ə':'Ə');
										$ns.=($birsuzhp2=='е'?KICI_Y.'e':ZUR_Y.'e');
										$i2+=3;//+г+а+е
										continue;
									}
								}
								$ns.=$convertao[$birsuzhp1];
								$i2+=1;
							}
						}elseif($birsuzhp1=='ы'||$birsuzhp1=='Ы'){//
							$ns.=($birsuzh=='г'?KICI_G:ZUR_G);
							$birsuzhp2=mb_substr($birsuz,$i2+2,1);//false була ала
							//if($birsuzhp2=='й'||$birsuzhp2=='Й'){//гыйрак
							//	$ns.=($birsuzhp1=='ы'?KICI_I:ZUR_I);
							//	$i2+=2;//г+ы+й
							if(
//$birsuzhp2=='я'||$birsuzhp2=='Я'
$birsuzhp2=='я'||
$birsuzhp2=='е'||
$birsuzhp2=='ю'||
$birsuzhp2=='Я'||$birsuzhp2=='Е'||$birsuzhp2=='Ю'
							){//җәмгыять
								$j=2;
								do{
									$j+=1;
							//җәмгыять дигәндә т дән башлана
							//җәмгы абв дигәндә а дан башланыр иде әмма алай булса монда кермәй
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(
									tartoq($x)
								);
								if(
$x=='ь'||//җәмгыять
$x=='е'||//җәмгыяте
$x=='и'||//җәмгыяви
$x=='ә'||//*җәмгыяткә
$x=='Ь'||$x=='Е'||$x=='И'||$x=='Ә'
								){
									$ns.=($birsuzhp1=='ы'?'e':'E');
									//$ns.=($birsuzhp2=='я'?KICI_Y.'ə':ZUR_Y.'ə');
									$ns.=$nickartyeyuya[$birsuzhp2];
								}elseif(!kirillitsa($x)){//сүз ахыры:гыя,гые
									if($suzbaso){//гыя
										$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
										//$ns.=($birsuzhp2=='я'?KICI_Y.'a':ZUR_Y.'a');
										$ns.=$convertyeyuya[$birsuzhp2];
									}else{
										$j=0;
										do{
											$j-=1;
											if($i2+$j<0){break;}
											$x=mb_substr($birsuz,$i2+$j,1);
										}while(tartoq($x));
										if(
											$x=='ә'||//әгыя
											$x=='и'||//игыя
											$x=='ь'||//гатьгыя
											$x=='Ә'||$x=='И'||$x=='Ь'
										){
											$ns.=($birsuzhp1=='ы'?'e':'E');
											$ns.=$nickartyeyuya[$birsuzhp2];
										}else{
											$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
											$ns.=$convertyeyuya[$birsuzhp2];
										}
									}
								}else{//җәмгыяты
									$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
									$ns.=$convertyeyuya[$birsuzhp2];
								}
								$i2+=2;//г+ы+я
							}else{//җәмгысы,җәмгысе,бәгырь
								$j=1;
								do{
									$j+=1;
							//җәмгысе дигәндә с дән башлана
							//җәмгы абв дигәндә " " дан башлана
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(
									tartoq($x)
								);
								if(
$x=='е'||//җәмгысе
$x=='ә'||//*җәмгынәть
$x=='ь'||//бәгырь
$x=='Е'||$x=='Ә'||$x=='Ь'
								){
									$ns.=($birsuzhp1=='ы'?'e':'E');
								}else{
									$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
								}
								$i2+=1;
							}
						}elseif($birsuzhp1=='ъ'||$birsuzhp1=='Ъ'){//игълан
							$ns.=($birsuzh=='г'?KICI_G:ZUR_G);
						}else{//
							$j=0;//
							do{
								$j+=1;//гөа - ө дан башлана
								$x=mb_substr($birsuz,$i2+$j,1);
							}while(
								tartoq($x)
							);
							if(
								$x=='а'||$x=='А'||//грамм,туглан,баглан,вигвам,зигзаг
								$x=='у'||$x=='У'||//агу
								$x=='ы'||$x=='Ы'//тугры,угры(алай язылмый),багын,бугын,чугын
							){
								$ns.=($birsuzh=='г'?KICI_G:ZUR_G);
							}else{//гәп, гүләп, багира, баг,зигзаг
								$ns.=($birsuzh=='г'?'g':'G');
							}
						}
					}elseif(
$birsuzh=='е'||$birsuzh=='ю'||$birsuzh=='я'||$birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'
					){//
						//if($bd=='qdb.tmf.org.ru')$ns.='OK'.$i2.'OK';
						if(
						$suzbaso //|| ( !$suzbaso&&!($birsuzh=='е'||$birsuzh=='Е') )
						){
							//if($bd=='qdb.tmf.org.ru')$ns.='OK'.$i2.'OK';
							$j=0;
							do{
								$j+=1;
								$x=mb_substr($birsuz,$i2+$j,1);
							}while(tartoq($x));
							if(
$x=='е'/*егет,юеш,*/||$x=='ә'/*ефәк,юкә,ярәш*/||$x=='и'/*юри,яки*/||$x=='ь'/*юнь,яшь*/||
$x=='Е'||$x=='Ә'||$x=='И'||$x=='Ь'
							){
								//$ns.=($birsuzh=='е'?KICI_Y.'e':ZUR_Y.'e');
								//$ns.=$nickartyeyuya[$birsuzh];
								if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
									$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
									){
										$ns.=$nickartzuraytyeyuya[$birsuzh];
									}else{
										$ns.=$nickartyeyuya[$birsuzh];
									}
								}else{//еюя:
									$ns.=$nickartyeyuya[$birsuzh];
								}
							}else{//ерак
								//$ns.=($birsuzh=='е'?KICI_Y.'ı':ZUR_Y.'ı');
								//$ns.=$convertyeyuya[$birsuzh];
								if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
									$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
									){
										$ns.=$convertzuraytyeyuya[$birsuzh];
									}else{
										$ns.=$convertyeyuya[$birsuzh];
									}
								}else{//еюя:
									$ns.=$convertyeyuya[$birsuzh];
								}
								//nsplusbirsuzqalonyeyuya();
							}
						}else{//сүз эче, йә ахыры: гаепләде
							//$ns.='OK';
							$birsuzhm1=mb_substr($birsuz,$i2-1,1);
							$birsuzhp1=mb_substr($birsuz,$i2+1,1);
							if(
($birsuzh=='е'||$birsuzh=='Е')&&($birsuzhp1=='в'||$birsuzhp1=='В')//Әхмәтвәлиева,садриев
							){
								if(tartoq($birsuzhm1)){
									if($birsuzh=='е'){
										$ns.='e';
									}else{
										if($birsuzhp1=='в'){
											$ns.='e';
										}else{
											$ns.='E';
										}
									}
								}else{
									if($birsuzh=='е'){
										$ns.=KICI_Y.'e';
									}else{
										if($birsuzhp1=='в'){
											$ns.=ZUR_Y.'e';
										}else{
											$ns.=ZUR_Y.'E';
										}
									}
								}
								$i2+=1;
								continue;
							}
							if($birsuzhm1=='а'||$birsuzhm1=='А'){//ае,ая,аю,гаепләде
								$j=1;
								do{
									$j+=1;//гаярь булганда "ь"дан башлана
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(tartoq($x));
								if(
$x=='ь'||
$x=='е'||
$x=='ә'||//гаепләде
$x=='Ь'||$x=='Е'||$x=='ә'
								){
									//$ns.=$nickartyeyuya[$birsuzh];
									if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
										$birsuzhp1=mb_substr($birsuz,$i2+1,1);
										if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
										){
											$ns.=$nickartzuraytyeyuya[$birsuzh];
										}else{
											$ns.=$nickartyeyuya[$birsuzh];
										}
									}else{//еюя:
										$ns.=$nickartyeyuya[$birsuzh];
									}
								}else{
									//$ns.=$convertyeyuya[$birsuzh];
									if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
										$birsuzhp1=mb_substr($birsuz,$i2+1,1);
										if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
										){
											$ns.=$convertzuraytyeyuya[$birsuzh];
										}else{
											$ns.=$convertyeyuya[$birsuzh];
										}
									}else{//еюя:
										$ns.=$convertyeyuya[$birsuzh];
									}
								}
							}elseif(//каек һ.б., сагаеп, карагаем, ә "гаеп" - искәрмә
//$birsuzhm1=='а'||//гаеп,бае,гаять,гаярь,таяк
$birsuzhm1=='о'||//тоем,тою,тоя
$birsuzhm1=='у'||//уем,ую,уя
$birsuzhm1=='ы'||//кыяк,сыя,сыю,сые,кыямова,васыять
//$birsuzhm1=='А'||
$birsuzhm1=='О'||$birsuzhm1=='У'||$birsuzhm1=='Ы'
							){
								$j=0;
								do{
									$j+=1;//васыяте булганда "т"дан башлана
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(tartoq($x));
								if(
$x=='ь'||$x=='е'||$x=='и'||$x=='Ь'||$x=='Е'||$x=='И'
								){
//$ns.=$convertyeyuya[$birsuzh];
if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
	//$ns.='OK';
	$birsuzhp1=mb_substr($birsuz,$i2+1,1);
	if(zur($birsuzhp1)||!kirillitsa($birsuzhp1)){
		$ns.=$nickartzuraytyeyuya[$birsuzh];
	}else{
		$ns.=$nickartyeyuya[$birsuzh];
	}
}else{//еюя:
	$ns.=$nickartyeyuya[$birsuzh];
}
								}else{
//$ns.=$convertyeyuya[$birsuzh];
if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
	//$ns.='OK';
	$birsuzhp1=mb_substr($birsuz,$i2+1,1);
	if(zur($birsuzhp1)||!kirillitsa($birsuzhp1)){
		$ns.=$convertzuraytyeyuya[$birsuzh];
	}else{
		$ns.=$convertyeyuya[$birsuzh];
	}
}else{//еюя:
	$ns.=$convertyeyuya[$birsuzh];
}
								}
							}elseif(
$birsuzhm1=='ә'||$birsuzhm1=='ө'||//чәе,җәя,чөя,
$birsuzhm1=='Ә'||$birsuzhm1=='Ө'
							){
								//$ns.=$nickartyeyuya[$birsuzh];
								if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
									$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(zur($birsuzhp1)||!kirillitsa($birsuzhp1)){
										$ns.=$nickartzuraytyeyuya[$birsuzh];
									}else{
										$ns.=$nickartyeyuya[$birsuzh];
									}
								}else{//еюя:
									$ns.=$nickartyeyuya[$birsuzh];
								}
							}elseif(
$birsuzhm1=='ү'||//гүя,киенүе
$birsuzhm1=='Ү'
							){
								if($birsuzh=='Ю'||$birsuzh=='Я'){//гүя,*гүю
									$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(zur($birsuzhp1)||!kirillitsa($birsuzhp1)){
										$ns.=$nickartzuraytyeyuya[$birsuzh];
									}else{
										$ns.=$nickartyeyuya[$birsuzh];
									}
								}elseif($birsuzh=='ю'||$birsuzh=='я'){//еюя:
									$ns.=$nickartyeyuya[$birsuzh];
								}else{//үе,ҮЕ,Үе,үЕ
									$ns.=($birsuzhm1=='ү'?KICI_W:ZUR_W);
									$ns.=($birsuzh=='е'?'e':'E');
								}
							}elseif($birsuzhm1=='и'||$birsuzhm1=='И'){//чия, чиягә, чияга, рияга, суфиян, наҗия, ия
								$j=0;
								do{
									$j+=1;//рияга булганда "г"дан башлана
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(tartoq($x));
								if(
$x=='а'||$x=='ы'||$x=='А'||$x=='Ы'||$x=='о'||$x=='у'||$x=='О'||$x=='У'
								){
									//$ns.=$convertyeyuya[$birsuzh];
									//$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(
$birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'
									){
										//$birsuzhp1=mb_substr($birsuz,$i2+1,1);
										if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
										){
											$ns.=$convertzuraytyeyuya[$birsuzh];
										}else{
											$ns.=$convertyeyuya[$birsuzh];
										}
									}else{//еюя:
										$ns.=$convertyeyuya[$birsuzh];
									}
								}elseif(!kirillitsa($x)||$x===false){
									//if($bd=='qdb.tmf.org.ru'){$ns.='OK';}
									$j=1;
									do{
										$j+=1;//рия булганда "р"дан башлана
										$x2=mb_substr($birsuz,$i2-$j,1);
									}while(tartoq($x2)&&($i2-$j)>0);
									//if($bd=='qdb.tmf.org.ru'){$ns.='OK'.$j.'OK';}
									if(
$x2=='ы'||$x2=='Ы'||$x2=='о'||$x2=='у'||$x2=='О'||$x2=='У'//$x2=='а'||$x2=='А'||
									){
										$ns.=$convertyeyuya[$birsuzh];
									}else{
										//$ns.=$nickartyeyuya[$birsuzh];
										//ƏəüÜ
										if($birsuzh=='я'){
											$ns.='ə';
										}elseif($birsuzh=='Я'){
											$ns.='Ə';
										}elseif($birsuzh=='ю'){
											$ns.=KICI_U;
										}elseif($birsuzh=='Ю'){
											$ns.=ZUR_U;
										}elseif($birsuzh=='е'){
											$ns.='e';
										}elseif($birsuzh=='Е'){
											$ns.='E';
										}
									}
								}else{//наҗия
									//$ns.=$nickartyeyuya[$birsuzh];
									//ƏəüÜ
									if($birsuzh=='я'){
										$ns.='ə';
									}elseif($birsuzh=='Я'){
										$ns.='Ə';
									}elseif($birsuzh=='ю'){
										$ns.=KICI_U;
									}elseif($birsuzh=='Ю'){
										$ns.=ZUR_U;
									}elseif($birsuzh=='е'){
										$ns.='e';
									}elseif($birsuzh=='Е'){
										$ns.='E';
									}
								}
							}elseif(
$birsuzhm1=='ь'||$birsuzhm1=='е'||$birsuzhm1=='ъ'||$birsuzhm1=='Ь'||$birsuzhm1=='Е'||$birsuzhm1=='Ъ'//юмья, юмъя, кунья, фея, юбилеена
							){
								//$ns.=$rusyeyuya[$birsuzh];
								if($birsuzh=='Е'||$birsuzh=='Ю'||$birsuzh=='Я'){
									$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
									){
										//$ns.=$zuraytrusyeyuya[$birsuzh];
										$ns.=$convertzuraytyeyuya[$birsuzh];
									}else{
										//$ns.=$rusyeyuya[$birsuzh];
										$ns.=$convertyeyuya[$birsuzh];
									}
								}else{//еюя:
									//$ns.=$rusyeyuya[$birsuzh];
									$ns.=$convertyeyuya[$birsuzh];
								}
							}elseif($birsuzh=='е'||$birsuzh=='Е'){//кабер,калеб,теле
								$ns.=($birsuzh=='е'?'e':'E');
							}else{//наиля,тюк
								$ns.='\''.$yoyuyaoua[$birsuzh];
							}
						}
					}elseif($birsuzh=='ё'||$birsuzh=='Ё'){//бельё, ёлка, кулёк
						if($suzbaso){
							//$ns.=($birsuzh=='ё'?KICI_Y.'o':ZUR_Y.'o');
							if($birsuzh=='Ё'){
								$birsuzhp1=mb_substr($birsuz,$i2+1,1);
								if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
								){
									$ns.=ZUR_Y.'O';
								}else{
									$ns.=ZUR_Y.'o';
								}
							}else{//еюя:
								$ns.=KICI_Y.'o';
							}
						}else{
							$birsuzhm1=mb_substr($birsuz,$i2-1,1);
							if(
$birsuzhm1=='ь'||$birsuzhm1=='е'||$birsuzhm1=='ъ'||$birsuzhm1=='Ь'||$birsuzhm1=='Е'||$birsuzhm1=='Ъ'||//бельё,белъё,её
$birsuzhm1=='а'||$birsuzhm1=='у'||$birsuzhm1=='и'||$birsuzhm1=='о'||$birsuzhm1=='ы'||//аё,уё,иё,оё,ыё
$birsuzhm1=='я'||$birsuzhm1=='ю'||$birsuzhm1=='е'||$birsuzhm1=='ё'||//яё,юё,её,ёё
$birsuzhm1=='А'||$birsuzhm1=='У'||$birsuzhm1=='И'||$birsuzhm1=='О'||$birsuzhm1=='Ы'||//аё,уё,иё,оё,ыё
$birsuzhm1=='Я'||$birsuzhm1=='Ю'||$birsuzhm1=='Е'||$birsuzhm1=='Ё'||//яё,юё,её,ёё
$birsuzhm1=='ә'||$birsuzhm1=='ө'||$birsuzhm1=='ү'||
$birsuzhm1=='Ә'||$birsuzhm1=='Ө'||$birsuzhm1=='Ү'
							){
								//$ns.=($birsuzh=='ё'?KICI_Y.'o':ZUR_Y.'o');
								if($birsuzh=='Ё'){
									$birsuzhp1=mb_substr($birsuz,$i2+1,1);
									if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
									){
										$ns.=ZUR_Y.'O';
									}else{
										$ns.=ZUR_Y.'o';
									}
								}else{//еюя:
									$ns.=KICI_Y.'o';
								}
							}else{//белё
								$ns.=($birsuzh=='ё'?'\'o':'\'O');
							}
						}
					}elseif($birsuzh=='к'||$birsuzh=='К'){//
						//$ns.='OK';
						//if($suzbaso){
						//	for($j=0;$j<$kuto;$j++){
						//		if(mb_strtolower(mb_substr($birsuz,$i2,mb_strlen($kut[$j])))==$kut[$j]){
						//			$ns.=($birsuzh=='к'?'k':'K');
						//			$i2+=1;
						//			continue 2;
						//		}
						//	}
						//}
						$birsuzhp1=mb_substr($birsuz,$i2+1,1);//false була ала, йә пробел-мазар
						if(
$birsuzhp1=='а'||$birsuzhp1=='А'//каләм,калак,мәшәкать
						){
							$j=1;//j=2 дип чишү хатага китерә
							$x=array();
							do{
								$j+=1;
								//$x=mb_substr($birsuz,$i2+$j,1);
								$x[$j]=mb_substr($birsuz,$i2+$j,1);
							}while(
								//tartoq($x)||
								//($j==2&&($x=='е'||$x=='Е'))
								tartoq($x[$j])||
								($j==2&&($x[$j]=='е'||$x[$j]=='Е'))
							);
							if($suzbaso&&$j==4){//кайбер
								if(
($x[2]=='й'||$x[2]=='Й')&&($x[3]=='б'||$x[3]=='Б')&&($x[4]=='е'||$x[4]=='Е')
								){
									$ns.=($birsuzh=='к'?'q':'Q');
									$i2+=1;
									continue;
								}
							}
							$x=$x[$j];
							//хәзер икс йә сузык, йә пробел-мазар
							if(
$x=='ә'||//каләм
$x=='е'||//калеб
$x=='ь'||//мәшәкать
$x=='Ә'||$x=='Е'||$x=='Ь'
							){
								$ns.=($birsuzh=='к'?'q':'Q');
								$ns.=$nickartao[$birsuzhp1];
								$i2+=1;
							}else{//кабил,кап; каен
								$ns.=($birsuzh=='к'?'q':'Q');
							}
						}elseif(
$birsuzhp1=='у'||//куен
$birsuzhp1=='У'
						){
							$ns.=($birsuzh=='к'?'q':'Q');
						}elseif(
$birsuzhp1=='ы'||//кыен,тәрәккыять
$birsuzhp1=='Ы'
						){
							//$ns.='OK';
							$ns.=($birsuzh=='к'?'q':'Q');
							$birsuzhp2=mb_substr($birsuz,$i2+2,1);//false була ала
							//if($birsuzhp2=='й'||$birsuzhp2=='Й'){//*тәрәккыйнәт
							//	$ns.=($birsuzhp1=='ы'?KICI_I:ZUR_I);
							//	$i2+=2;//г+ы+й
							if(
$birsuzhp2=='я'||
$birsuzhp2=='е'||
$birsuzhp2=='ю'||
$birsuzhp2=='Я'||$birsuzhp2=='Е'||$birsuzhp2=='Ю'
							){//тәрәккыять,кыямова
								$j=2;
								do{
									$j+=1;//тәрәккыяте дигәндә т дән башлана
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(tartoq($x));
								if(
$x=='е'||//тәрәккыяте
$x=='ә'||//тәрәккыяткә
$x=='ь'||//тәрәккыять
$x=='и'||//тәрәккыяви
$x=='Е'||$x=='Ә'||$x=='Ь'||$x=='И'
								){
									$ns.=($birsuzhp1=='ы'?'e':'E');
									//$ns.=($birsuzhp2=='я'?KICI_Y.'ə':ZUR_Y.'ə');
									$ns.=$nickartyeyuya[$birsuzhp2];
								}elseif(!kirillitsa($x)){//сүз ахыры:тәрәккыя, кыя
									if($suzbaso){//кыя
										$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
										//$ns.=($birsuzhp2=='я'?KICI_Y.'a':ZUR_Y.'a');
										//$ns.=$convertyeyuya[$birsuzhp2];
										if(
$birsuzhp2=='Е'||$birsuzhp2=='Ю'||$birsuzhp2=='Я'
										){
											$ns.=
											$convertzuraytyeyuya[$birsuzhp2]
											;
										}else{//еюя:
											$ns.=$convertyeyuya[$birsuzhp2];
										}
									}else{
										$j=0;
										do{
											$j-=1;
											if($i2+$j<0){break;}
											$x=mb_substr($birsuz,$i2+$j,1);
										}while(tartoq($x));
										if(
											$x=='ә'||//әкыя
											$x=='и'||//икыя
											$x=='ь'||//гатькыя
											$x=='Ә'||$x=='И'||$x=='Ь'
										){
											$ns.=($birsuzhp1=='ы'?'e':'E');
											//$ns.=$nickartyeyuya[$birsuzhp2];
											if(
									$birsuzhp2=='Е'||$birsuzhp2=='Ю'||$birsuzhp2=='Я'
											){
										$ns.=$nickartzuraytyeyuya[$birsuzhp2];
											}else{//еюя:
										$ns.=$nickartyeyuya[$birsuzhp2];
											}
										}else{
											$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
											//$ns.=$convertyeyuya[$birsuzhp2];
											if(
									$birsuzhp2=='Е'||$birsuzhp2=='Ю'||$birsuzhp2=='Я'
											){
										$ns.=$convertzuraytyeyuya[$birsuzhp2];
											}else{//еюя:
										$ns.=$convertyeyuya[$birsuzhp2];
											}
										}
									}
								}else{//кыямова
									$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
									//$ns.=$convertyeyuya[$birsuzhp2];
									if(
$birsuzhp2=='Е'||$birsuzhp2=='Ю'||$birsuzhp2=='Я'
									){
										$birsuzhp3=mb_substr($birsuz,$i2+3,1);
										if(
zur($birsuzhp3)||!kirillitsa($birsuzhp3)
										){
										$ns.=$convertzuraytyeyuya[$birsuzhp2];
										}else{
										$ns.=$convertyeyuya[$birsuzhp2];
										}
									}else{//еюя:
										$ns.=$convertyeyuya[$birsuzhp2];
									}
								}
								$i2+=2;
							}else{
								$j=1;
								do{
									$j+=1;
									//*тәрәккынәть дигәндә н дән башлана
									//*тәрәккы абв дигәндә пробелдан башлана
									$x=mb_substr($birsuz,$i2+$j,1);
								}while(
									tartoq($x)
								);
								if(
$x=='е'||//*тәрәккыне
$x=='ә'||//*тәрәккынә
$x=='ь'||//*тәрәккынь
$x=='и'||//*тәрәккыни
$x=='Е'||$x=='Ә'||$x=='Ь'||$x=='И'
								){
									$ns.=($birsuzhp1=='ы'?'e':'E');
								}else{
									$ns.=($birsuzhp1=='ы'?KICI_Ы:ZUR_Ы);
								}
								$i2+=1;
							}
						}elseif(
//$suzbaso&&($birsuzhp1=='о'||$birsuzhp1=='О')//коерык,кое
$birsuzhp1=='о'||$birsuzhp1=='О'//коерык,кое,башкорт
						){
							$ns.=($birsuzh=='к'?'q':'Q');
						}elseif(!kirillitsa($birsuzhp1)){//сүз ахыры
							//$ns.='OK';
							if(!$suzbaso){//сүз башы булмаса алдагы хәрефләрне карыйм
								//$ns.='OK';
								$birsuzhm1=mb_substr($birsuz,$i2-1,1);
								if(
$birsuzhm1=='а'||$birsuzhm1=='ы'||$birsuzhm1=='я'||$birsuzhm1=='у'||$birsuzhm1=='ю'||//ак,ык,таяк,як,хокук
$birsuzhm1=='А'||$birsuzhm1=='Ы'||$birsuzhm1=='Я'||$birsuzhm1=='У'||$birsuzhm1=='Ю'
								){
									$ns.=($birsuzh=='к'?'q':'Q');
								}elseif(
$birsuzhm1=='е'||$birsuzhm1=='й'||$birsuzhm1=='Е'||$birsuzhm1=='Й'//аек,белек,барыйк
								){
									//$ns.='OK';
									if($i2==1){//^ек,^йк
										//$ns.='OK';
										$ns.=($birsuzh=='к'?'q':'Q');
									}else{//аек,белек
										$birsuzhm2=mb_substr($birsuz,$i2-2,1);
										if(
$birsuzhm2=='а'||$birsuzhm2=='А'||$birsuzhm2=='ы'||$birsuzhm2=='Ы'||$birsuzhm2=='у'||$birsuzhm2=='У'||$birsuzhm2=='о'||$birsuzhm2=='О'||!kirillitsa($birsuzhm2)//аек,боек,уек,барыйк
										){
											$ns.=($birsuzh=='к'?'q':'Q');
										}else{
											$ns.=($birsuzh=='к'?'k':'K');
										}
									}
								}else{//бик,чиләк
									$ns.=($birsuzh=='к'?'k':'K');
								}
							}else{
								$ns.=($birsuzh=='к'?'k':'K');
							}
						}else{
//күмер,шикәр, сүз ахыры түгел, нечкә хәреф йә тартык алдындагы к, бакча, -акш-(руссүз)
							//$ns.='OK';
							$j=0;//
							do{
								$j+=1;//көа - ө дан башлана
								$x=mb_substr($birsuz,$i2+$j,1);
							}while(
								tartoq($x)
							);
							if(
								$x=='а'||$x=='А'||//бакча
								$x=='у'||$x=='У'||//аксу
								$x=='ы'||$x=='Ы'||//балыклы
								$x=='ъ'||$x=='Ъ'//икътисад
							){
								$ns.=($birsuzh=='к'?'q':'Q');
							}else{//яки
								$ns.=($birsuzh=='к'?'k':'K');
								/*$birsuzhm1=mb_substr($birsuz,$i2-1,1);
								if(
$birsuzhm1=='а'||$birsuzhm1=='ы'||$birsuzhm1=='у'||//акш
$birsuzhm1=='А'||$birsuzhm1=='Ы'||$birsuzhm1=='У'
								){
									$ns.=($birsuzh=='к'?'q':'Q');
								}elseif(
$birsuzhm1=='е'||$birsuzhm1=='й'||$birsuzhm1=='Е'||$birsuzhm1=='Й'//аекш
								){
									//$ns.='OK';
									if($i2==1){//^ек,^йк
										//$ns.='OK';
										$ns.=($birsuzh=='к'?'q':'Q');
									}else{//аек,белек
										$birsuzhm2=mb_substr($birsuz,$i2-2,1);
										if(
$birsuzhm2=='а'||$birsuzhm2=='А'||$birsuzhm2=='ы'||$birsuzhm2=='Ы'||$birsuzhm2=='у'||$birsuzhm2=='У'||$birsuzhm2=='о'||$birsuzhm2=='О'||!kirillitsa($birsuzhm2)//аек,боек,уек,барыйк
										){
											$ns.=($birsuzh=='к'?'q':'Q');
										}else{
											$ns.=($birsuzh=='к'?'k':'K');
										}
									}
								}else{//
									$ns.=($birsuzh=='к'?'k':'K');
								}*/
							}
						}
					}elseif($birsuzh=='у'||$birsuzh=='У'){//
						//$ns.='OK'.$birsuzh.'OK';
						$birsuzhp1=mb_substr($birsuz,$i2+1,1);
						if(
$birsuzhp1=='ы'||//уына,укуы
$birsuzhp1=='а'||//уа,куа
$birsuzhp1=='Ы'||$birsuzhp1=='А'
						){
							$ns.=($birsuzh=='у'?'uw':'UW');
						}elseif($suzbaso){//учак
							//$ns.='OK'.$birsuzh.'OK';
							$ns.=($birsuzh=='у'?'u':'U');
						}else{
							//(ахыргы хәрефкә әйләнә алыр иде)
							$birsuzhm1=mb_substr($birsuz,$i2-1,1);
							//$ns.='OK'.$birsuzhm1.'OK';
							if(
$birsuzhm1=='а'||
$birsuzhm1=='я'||//аяу,*ауа
$birsuzhm1=='о'||//шоу,боулинг
$birsuzhm1=='А'||$birsuzhm1=='Я'||$birsuzhm1=='О'
							){
								$ns.=($birsuzh=='у'?KICI_W:ZUR_W);
							}else{//курык
								$ns.=($birsuzh=='у'?'u':'U');
							}
						}
					}elseif($birsuzh=='ү'||$birsuzh=='Ү'){//
						$birsuzhp1=mb_substr($birsuz,$i2+1,1);
						if($birsuzhp1=='ә'||$birsuzhp1=='Ә'){//күәм
							$ns.=($birsuzh=='ү'?KICI_U.KICI_W:ZUR_U.ZUR_W);
						}elseif($suzbaso){
							$ns.=($birsuzh=='ү'?KICI_U:ZUR_U);
						}else{
							$birsuzhm1=mb_substr($birsuz,$i2-1,1);
							if($birsuzhm1=='ә'||$birsuzhm1=='Ә'){//әү
								$ns.=($birsuzh=='ү'?KICI_W:ZUR_W);
							}else{
								$ns.=($birsuzh=='ү'?KICI_U:ZUR_U);
							}
						}
					}elseif($birsuzh=='ц'||$birsuzh=='Ц'){//
						if($suzbaso){
							$ns.=($birsuzh=='ц'?'s':'S');
						}else{
							//$ns.=($birsuzh=='ц'?'ts':'Ts');
							if($birsuzh=='Ц'){
								$birsuzhp1=mb_substr($birsuz,$i2+1,1);
								if(
zur($birsuzhp1)||!kirillitsa($birsuzhp1)
								){
									$ns.='TS';
								}else{
									$ns.='Ts';
								}
							}else{//еюя:
								$ns.='ts';
							}
						}
					}elseif($birsuzh=='э'||$birsuzh=='Э'){//
						if($suzbaso){
							$ns.=($birsuzh=='э'?'e':'E');
						}else{
							$birsuzhm1=mb_substr($birsuz,$i2-1,1);
							if(
$birsuzhm1=='ә'||$birsuzhm1=='а'||$birsuzhm1=='Ә'||$birsuzhm1=='А'//маэмай,тәэсир һәм әмма тәэссорат, ризаэтдин
							){
								$birsuzhp1=mb_substr($birsuz,$i2+1,1);
								$birsuzhp2=mb_substr($birsuz,$i2+2,1);
								if(tartoq($birsuzhp1)&&tartoq($birsuzhp2)){
									$ns.=($birsuzh=='э'?'\'e':'\'E');
								}else{
									$ns.='\'';
								}
							}else{
								$ns.=($birsuzh=='э'?'e':'E');
							}
						}
					}elseif(
$birsuzh=='ь'||$birsuzh=='ъ'||$birsuzh=='Ь'||$birsuzh=='Ъ'
					){
						$birsuzhp1=mb_substr($birsuz,$i2+1,1);
						if(
$birsuzhp1=='ә'||$birsuzhp1=='Ә'//коръән,мәсьәлән
						){
							$ns.='\'';
						}else{
							$ns.='';
						}
					}elseif($birsuzh=='в'||$birsuzh=='В'){//
						if($suzbaso){
							$ns.=($birsuzh=='в'?KICI_W:ZUR_W);
						}else{
							$birsuzhm1=mb_substr($birsuz,$i2-1,1);
							if(
$birsuzhm1=='о'||$birsuzhm1=='е'||$birsuzhm1=='О'||$birsuzhm1=='Е'
							){
								$ns.=($birsuzh=='в'?'v':'V');
							}else{
								$ns.=($birsuzh=='в'?KICI_W:ZUR_W);
							}
						}
					}else{
						$ns.=$convertmain[$birsuzh];
					}
					$i2+=1;
				}
			}
		}else{//кириллица түгел
			$ns.=$h;
		}
		$i+=1;
	}
	return $ns;
}


?>
