<?php

function aylandir($s){
	global
$nickartao,$gut,$guto,$kut,$kuto,/*$vut,$vuto,*/$convertmain,$nickartyeyuya,$convertyeyuya,$convertrus,$convertao,
$basqarussuz,$basqarussuzo
	;
	$so=mb_strlen($s);
	$i=0;$ns='';$h='';
	//$nh='';
	while($i<$so){
		//$ns.='ok';
		//$hm1=$h;
		$h=mb_substr($s,$i,1);
		//if(($i==0||!kirillitsa($hm1))&&kirillitsa($h)){//сүз башы
		if(kirillitsa($h)){
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
				$j=0;$birsuz='';$russuzdir=false;
				do{//сүз ахырынача
					$hij=mb_substr($s,$i+$j,1);
					if(!$russuzdir){
						if($hij=='о'||$hij=='О'){
							if($j>1){//эколог,эволюция
								$russuzdir=true;
							}else{//во,товар
								$birsuzbaso=mb_strtolower(mb_substr($s,$i,3));
								if(
mb_strpos($birsuzbaso,'ов')!==false||mb_strpos($birsuzbaso,'во')!==false
								){
									$russuzdir=true;
								}
							}
						//}elseif($hij=='и'||$hij=='И'){//амбиция
						//	if($j>1){//ия,бия,чия,кия,тия кебек сүзләр калсынга
						//		$hijp1=mb_substr($s,$i+$j+1,1);
						//		if($hijp1=='я'||$hijp1=='Я'){
						//			$russuzdir=true;
						//		}
						//	}
						}elseif($hij=='ё'||$hij=='Ё'||$hij=='щ'||$hij=='Щ'){//ёлка,ще(ё)тка
							$russuzdir=true;
						}
					}
					$birsuz.=$hij;
					$j+=1;
				}while(kirillitsa($hij));
				$birsuz=mb_substr($birsuz,0,-1);
				if($russuzdir){
					//кушымчаларны алып ату
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
					}
				}else{//искәрмәләрне эзләп карыйсы, "аватар" кебек, "в" хәрефен дөрес әйләндерер өчен, "рия" да шунда, рус сүзе булмаса да, анысы "я"ны калын итеп әйләндерер өчен
					for($j=0;$j<$basqarussuzo;$j++){
						if(
mb_strtolower(mb_substr($birsuz,0,mb_strlen($basqarussuz[$j])))==$basqarussuz[$j]
						){
							$russuzdir=true;
							$russuz=$basqarussuz[$j];
							break;
						}
					}
				}
				if($russuzdir){
					//бу төштә "рус сүзе" табылган, аны әйләндереп өстисе
					$russuzo=mb_strlen($russuz);
					for($j=0;$j<$russuzo;$j++){
						$russuzh=mb_substr($russuz,$j,1);
						if(($russuzh=='ю'||$russuzh=='Ю')&&$j==0){
							$ns.=($russuzh=='ю'?'yu':'Yu');
						}elseif($russuzh=='ё'||$russuzh=='Ё'){
							$russuzhm1=mb_substr($russuz,$j-1,1);
							if($j==0||!tartoq($russuzhm1)){
								$ns.=($russuzh=='ё'?'yo':'Yo');
							}else{
								$ns.=($russuzh=='ё'?'\'o':'\'o');
							}
						}else{
							$ns.=$convertrus[$russuzh];
						}
					}
					$i+=$russuzo;
					continue;
				}
				$i2=0;
				$birsuzo=mb_strlen($birsuz);
				while($i2<$birsuzo){
					$birsuzh=mb_substr($birsuz,$i2,1);
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
