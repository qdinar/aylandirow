<?php
function aylandir($s){
	/*
	$so=mb_strlen($s);
	$i=0;$h='';$ns='';
	while($i<$so){
		$h=mb_substr($s,$i,1);
		if($h=='а'){
			$in_word_h=true;
			if(!$in_word_hm1){
				$j=0;
				$qalon_suz=true;
			}else{
				$j++;
				if( $hm1=='г' || $hm1=='Г' ){
				}
			}
		}
		else
		if($h=='А'){
			$in_word_h=true;
		}
		$i++;
		$ns.=$h;
		$in_word_hm1=$in_word_h;
	}
	return $ns;
	*/
	
	$words_count=preg_match_all('/\b\w+\b/u',$s,$words);
	$spaces_count=preg_match_all('/\b\W+\b/u',$s,$spaces);
	//$spaces_count=preg_match_all('/(\b|^)\W+(\b|$)/u',$s,$spaces);
	$first_space_c=preg_match_all('/^\W+(\b|$)/u',$s,$first_space);
	$last_space_c=preg_match_all('/(\b|^)\W+$/u',$s,$last_space);
	$ns='';
	// echo '|'.$words_count.'-'.$spaces_count.'|';
	// print_r($words);
	// print_r($spaces);
	for($i=0;$i<$words_count;$i++){
		//$aword=$words[0][$i];
		//$wl=mb_strlen($aword);
		// for($j=0;$j<$wl;$j++){
		// }
		$words[0][$i]=wconv($words[0][$i]);
	}
	if($first_space_c){
		$ns.=$first_space[0][0];
	}
	if($words_count){
		$ns.=$words[0][0];
		for($i=1;$i<$words_count;$i++){
			$ns.=$spaces[0][$i-1].$words[0][$i];
		}
		if($last_space_c){
			$ns.=$last_space[0][0];
		}
	}
	//echo $ns;
	return $ns;
	
	/*
	$words=preg_split('/(\W+)/u',$s);
	$spaces=preg_split('/(\w+)/u',$s);
	echo '<pre>';
	//print_r($words);
	var_dump($words);
	var_dump($spaces);
	echo '</pre>';
	*/
}


function wconv($w){
	global $convtatar;
	//'рия','тдгпу','камил','нияз',
	$ns='';
	//remove invalid letters
	//find rus of dic and take out
	/*
	global $rus;
	$ruso=count($rus);
	for($j=0;$j<$ruso;$j++){
		//if(mb_strtolower(mb_substr($w,0,mb_strlen($w[$j])))==$rus[$j]){
		//if(strpos($w,$rus[$j])===0){
		if(preg_match('/^'.$rus[$j].'/u',$w)){
			//$w='['.$w.']';
			//$russuzdir=true;
			//$russuz=mb_substr($birsuz,0,mb_strlen($basqarussuz[$j]));
			$ns.=convrus($rus[$j]);
			$w=mb_substr($w,mb_strlen($rus[$j]));
			// if( mbstrlen($w) > mbstrlen($rus[$j]) ){
			// }
			break;
		}
	}
	*/
	$rusw=find_rus_of_dic($w);
	if($rusw){
		$ns.='[rd'.convrus($rusw).']';
		$w=mb_substr($w,mb_strlen($rusw));
	}
	//$ns.=mb_strlen($w);
	//find tatar words by dic, there are false positive as russian words by features
		//find also 2 root words
		$tatarw=find_tatar_of_dic($w);
		if($tatarw){
			$ns.='[td['.convtatar($tatarw).']]';
			$w=mb_substr($w,mb_strlen($tatarw));
		}
	//find other "russian" words by features
		//ё,щ,ц,дж,дл,ии,ика,ив,иа,пр,тв,ктр,рв,гд,мп,аль,брь
		//ий except before ә/е/ү/а/ы/у
		//ий may be nonstandartly used at words like чия->чийә; йәшийк
		if(preg_match('/[ёщц]|д[жл]|и(и|ка|й[^әеүаыу]|в|а)|пр|тв|ктр|чш|рв|гд|мп|аль|брь/ui',$w)){
			$ns.='[щ'.convrus($w).']';
			$w='';
		}
		//2 consonants cannot be together at beginning in tatar words, but can be in russian words
		if(preg_match('/^[бвгджҗзйклмнңпрстфхһчш]{2,}/ui',$w)){//щц removed, look above
			$ns.='[хр'.convrus($w).']';
			$w='';
		}
		//seems 3 consonants cannot be together except лт*,рт*,нт* and some exceptions (гыйнвар) in tatar words
		//seems 2 consonants cannot be together at end of word except лт,рт,нт,йк in tatar words
		//я/ю after cons. are in russian words
		if(preg_match('/[бвгджҗзйклмнңпрстфхһчш][юя]/ui',$w)){//ёщц removed, look above
			$ns.='[лю'.convrus($w).']';
			$w='';
		}
		//seems ь after some letters after е - russian words
		if(preg_match('/[еэ].+ь/ui',$w)){
			$ns.='[ерь'.convrus($w).']';
			$w='';
		}
	//find ов,ев,ин family name suffixes - they are russian suffixes but can be in tatar words
		if(preg_match('/.{2,}[ое]в/ui',$w)){
			$ns.='[ов['.convtatar($w).']]';
			$w='';
		}
		if(preg_match('/.{2,}[шл]ин/ui',$w)){
			$ns.='[шин['.convtatar($w).']]';
			$w='';
		}
	//find other "russian" words by features
		//о can be only in first syllable in one-root words in tatar language
		//exception: but о can be at ов suffix, look above
		//2-root words are removed, see above
		if(preg_match('/^[бвгджҗзйклмнңпрстфхһчш]?[аәеиоөуүэюя]\w*о/ui',$w)){//ёщц removed, look above
			$ns.='[о'.convrus($w).']';
			$w='';
		}
	//find "arabic" words by features
	//convert "tatar" (turkic) words
	$ns.=convtatar($w);
	/*
	for($i=0;$i<mb_strlen($w);$i++){
		//$ns.='-';
		$letter=mb_substr($w,$i,1);
		//$ns.=$convtatar[$letter];
		if(isset($convtatar[$letter])){
			$ns.=$convtatar[$letter];
		}else{
			$ns.=$letter;
		}
	}
	*/
	//$ns.=$w;
	return '<'.$ns.'>';
}

function convrus($w){
	$w='['.$w.']';
	return $w;
}


$convtatar=array(
	'а' => 'a', 'А' => 'A',
	'ә' => 'ə', 'Ә' => 'Ə',
	'б' => 'b', 'Б' => 'B',
	'в' => 'w', 'В' => 'W',
	//'г' => 'g', 'Г' => 'G',
	'д' => 'd', 'Д' => 'D',
	'е' => 'e', 'Е' => 'E',
	'ё' => 'yo', 'Ё' => 'Yo',
	'ж' => 'j', 'Ж' => 'J',
	'җ' => 'c', 'Җ' => 'C',
	'з' => 'z', 'З' => 'Z',
	'и' => 'i', 'И' => 'İ',
	'й' => 'y', 'Й' => 'Y',
	//'к' => 'k', 'К' => 'K',
	'л' => 'l', 'Л' => 'L',
	'м' => 'm', 'М' => 'M',
	'н' => 'n', 'Н' => 'N',
	'ң' => 'ñ', 'Ң' => 'Ñ',
	'о' => 'o', 'О' => 'O',
	'ө' => 'ɵ', 'Ө' => 'Ɵ',
	'п' => 'p', 'П' => 'P',
	'р' => 'r', 'Р' => 'R',
	'с' => 's', 'С' => 'S',
	'т' => 't', 'Т' => 'T',
	'у' => 'u', 'У' => 'U',
	'ү' => 'ü', 'Ү' => 'Ü',
	'ф' => 'f', 'Ф' => 'F',
	'х' => 'x', 'Х' => 'X',
	'һ' => 'h', 'Һ' => 'H',
	'ц' => 'ts', 'Ц' => 'Ts',
	'ч' => 'ç', 'Ч' => 'Ç',
	'ш' => 'ş', 'Ш' => 'Ş',
	'щ' => 'şç', 'Щ' => 'Şç',
	'ъ' => '', 'Ъ' => '',
	'ы' => 'ı', 'Ы' => 'I',
	'ь' => '\'', 'Ь' => '\'',
	'э' => 'e', 'Э' => 'E',
	'ю' => 'yu', 'Ю' => 'Yu',
	'я' => 'ya', 'Я' => 'Ya',
);
function convtatar($w){
	global $convtatar;
	// $nw='';
	// for($i=0;$i<mb_strlen($w);$i++){
		// $letter=mb_substr($w,$i,1);
		// if(isset($convtatar[$letter])){
			// $nw.=$convtatar[$letter];
		// }else{
			// $nw.=$letter;
		// }
	// }
	// return $nw;
	$w = preg_replace( '/([аыоу])е/ui', '$1yı', $w );
	$w = preg_replace( '/([әеө])е/ui', '$1ye', $w );
	$w = preg_replace( '/([юү])е/ui', '$1we', $w );
	$w = preg_replace( '/([юу])ы/ui', '$1wı', $w );
	$w = preg_replace( '/([аәя])[уү]/ui', '$1w', $w );
	$w = preg_replace( '/к([аыоуъ])/u', 'q$1', $w );
	$w = preg_replace( '/К([аыоуАЫОУ])/u', 'Q$1', $w );
	$w = preg_replace( '/га(\w+[ьәе])/u', 'ğə$1', $w );
	//$w = preg_replace( '/г([аыоуъ])/u', 'ğ$1', $w );
	$w = preg_replace( '/Г([аыоуАЫОУ])/u', 'Ğ$1', $w );
	$w = preg_replace( '/\bе([шл])/ui', 'yı$1', $w );
	$w = preg_replace( '/\bЕ([шл])/ui', 'Yı$1', $w );
	$w = preg_replace( '/(\b|[ъь])е/ui', 'ye', $w );
	$w = preg_replace( '/([аыıоуАЫIОУ])к/u', '$1q', $w );
	$w = preg_replace( '/([аыоуАЫОУ]\w*[яЯ])к/u', '$1q', $w );
	$w = preg_replace( '/([иә])я/ui', '$1yə', $w );
	return strtr($w,$convtatar);
}




$rus=array(
'аватар','авиа','кукмара','кучук','чигайка','вамин','магазин','реклама','кама',
'камал','газет','курган','ульян','тнв','алфавит','куласа','ерэ','код','кабинет',
'конкурс','егэ','диктант','ваз','газ','музыка','кандидат','округ','арканзас',
'канзас','португал','канада','украин','карта','поезд','казбек','заказ','указ',
'балкан','команда','лига','нижнекамскшин','юмья'
);
/*
function find_rus_of_dic($w){
	global $rus;
	$ruso=count($rus);
	for($j=0;$j<$ruso;$j++){
		if(preg_match('/^'.$rus[$j].'/u',$w)){
			return $rus[$j];
		}
	}
	return false;
}
*/
function find_rus_of_dic($w){
	global $rus;
	return find_of_dic($rus,$w);
}
function find_of_dic($dic,$w){
	$dico=count($dic);
	for($j=0;$j<$dico;$j++){
		if(preg_match('/^'.$dic[$j].'/ui',$w)){
			return $dic[$j];
		}
	}
	return false;
}

$tatar=array(
'башкорт',//о in syllable later than 1 , because 2 root word
'гыйнвар'//3 consonants ...
);
function find_tatar_of_dic($w){
	global $tatar;
	return find_of_dic($tatar,$w);
}


