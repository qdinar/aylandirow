<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
	$til=$_POST['yunalis'];
	$ba=$_POST['ba'];
	if(substr($ba,0,7)=='http://'){
		$ba=substr($ba,7);
	}else if(substr($ba,0,8)=='https://'){
		$ba=substr($ba,8);
	/*
	}else if(substr($ba,0,6)=='ftp://'){
		header('Content-Type: text/html; charset=utf-8');
		echo('фтпны әйләндермәй!');
		exit;
	*/
	}
	/*
	$domen='#^([\w\-]+\.)+[\w]+#ui';
	$domensano=preg_match($domen,$ba,$tabolgandomen);
	if($domensano==0){
		header('Content-Type: text/html; charset=utf-8');
		echo('Дөрес адрес түгел');
		exit;
	}
	*/
	$pathstart=strpos($ba,'/');
	$ikinoqtaurono=strpos($ba,':');
	
	if($ikinoqtaurono!==false){
		//x.com:90/
		if($pathstart!==false){
			if($ikinoqtaurono<$pathstart){
				$ba=substr($ba,0,$ikinoqtaurono).substr($ba,$pathstart);
				$pathstart=strpos($ba,'/');
			}//else кыскартасы түгел
		}else{
			$ba=substr($ba,0,$ikinoqtaurono);
		}
	}//else кыскартасы түгел
	
	if($pathstart===false){
		header('Location: http://'. idn_to_ascii(urldecode($ba)). '.'. $til. '.'.TOPDOMEN.'/');
	}else{
		$bd=substr($ba,0,$pathstart);
		$bp=substr($ba,$pathstart);
		header('Location: http://'. idn_to_ascii(urldecode($bd)). '.'. $til. '.'.TOPDOMEN.$bp);
	}
	exit;
}


header('Content-Type: text/html; charset=utf-8');
?>
<span style="position:absolute;"><a href="http://ttcysuttlart1999.<?php echo TOPDOMEN; ?>/">тр 99 латины</a>
<a href="http://ttcysuttlasu.<?php echo TOPDOMEN; ?>/">ссср латины</a>
</span>
<table style="width:100%;height:100%">
<tr>
<td style="vertical-align:middle;text-align:center;">
<form method="POST" style="margin:0px;">
url:<input type="text" style="width:400px;" name="ba" value="tt.wikipedia.org" /><br />
<select name="yunalis">
<option value="kkcysuttcysu-2" >кирилл язулы казакча язуны татарчалаштыру</option>
<option value="uygurdantatarga" >гарәп язулы уйгырча язуны кирилл язуына күчерү һәм татарчалаштыру</option>
<option value="toroktantatarga" >латин язулы төрекчә язуны кирилл язуына күчерү һәм татарчалаштыру</option>
<option value="yaponnantatarga" >японча язуны татарчага тәрҗемәләү</option>
<option value="ttcysuttlart1999" selected="true">татарча язуны кириллицадан ТР 1999ынчы ел законы латин язуына күчерү</option>
<option value="ttcysuttlasu" >татарча кириллицадан СССРда 1928енче елны кабул ителгән латин язуына</option>
</select>
<input type="submit" value="&gt;">
<br />
<?php /*if($yuzeradmin){*/ ?><textarea name="inputstr"><?php //echo htmlspecialchars($_POST['inputstr']); ?>монда текст йә html кодлы текст кертегез</textarea>
<input type="submit" name="string" value="&gt;"><?php /*}*/ ?>
</form>
<br />Мисаллар:<br />
<a href="http://tt.wikipedia.org.ttcysuttlart1999.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%88_%D0%B1%D0%B8%D1%82">Википедия 1999 ел проекты латин язуында</a><br />
<a href="http://tt.wikipedia.org.ttcysuttlasu.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%88_%D0%B1%D0%B8%D1%82">Википедия "яңалиф"тә</a><br />
<a href="http://kk.wikipedia.org.kkcysuttcysu-2.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%81%D1%82%D1%8B_%D0%B1%D0%B5%D1%82">Бер аз хәзерге татар язуына әйләндерелгән <strong>казак</strong> Википедиясы</a><br />
<a href="http://ug.wikipedia.org.uygurdantatarga.<?php echo TOPDOMEN; ?>/wiki/%D8%A6%DB%87%D9%8A%D8%BA%DB%87%D8%B1%DA%86%DB%95_%DB%8B%D9%89%D9%83%D9%89%D9%BE%D9%89%D8%AF%D9%89%D9%8A%DB%95">Бер аз хәзерге татар язуына әйләндерелгән <strong>уйгыр</strong> Википедиясы</a><br />
<a href="http://tr.wikipedia.org.toroktantatarga.<?php echo TOPDOMEN; ?>/wiki/Ana_Sayfa">Бер аз хәзерге татар язуына әйләндерелгән <strong>төрек</strong> Википедиясы</a><br />
<a href="http://ja.wikipedia.org.yaponnantatarga.<?php echo TOPDOMEN; ?>/wiki/%E3%83%A1%E3%82%A4%E3%83%B3%E3%83%9A%E3%83%BC%E3%82%B8">Өлешчә хәзерге татар теленә тәрҗемә ителгән <strong>япон</strong> Википедиясы</a><br />
<br />Әйләндергеч <strong>турында сөйләшүләр</strong>:<br />
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=87">1999ынчы ел проекты татар латин язуына әйләндергеч турында</a><br />
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=85"><strong>казак</strong> язуын хәзерге татар язуына әйләндергеч турында</a><br />
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=84"><strong>япон</strong>ча сайтны татар теленә тәрҗемәләгеч турында</a><br />
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=95">уртак, гомумән әйләндергеч турында сөйләшү</a><br />
<br /><?php echo$reklama; ?>

<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='//www.liveinternet.ru/click;aylandirow' "+
"target=_blank><img src='//counter.yadro.ru/hit;aylandirow?t52.1;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,80))+";"+Math.random()+
"' alt='' title='LiveInternet: соңгы 24 сәгатьтәге бит ачу саны"+
" һәм ачучылар саны күрсәтелгән' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->


<td>
<tr>
</table>
