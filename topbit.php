<?php
header('Content-Type: text/html; charset=utf-8');
if($_GET['lang']=='rus'){
	$rus=true;
}
include 'reklama.php';
?>
<span style="width:100%;">
<?php if($rus){ ?>
<a href="/" style="float:right;">татарча</a>
<?php }else{ ?>
<a href="http://ttcysuttlart1999.<?php echo TOPDOMEN; ?>/">тр 1999 латины</a>
<a href="http://ttcysuttlasu.<?php echo TOPDOMEN; ?>/">ссср латины</a>
<a href="http://ttcysuttlart1999-2.<?php echo TOPDOMEN; ?>/">тр 1999 латины, яңа программа</a>
<a href="http://ttlart2012ttcysu.<?php echo TOPDOMEN; ?>/">тр 1999 лат-ның комп. верс-нән кир-га әйл-ү</a>
<a href="/?lang=rus" style="float:right;">на русском</a>
<?php } ?>
</span>
<table style="width:100%;">
<tr>
<td style="vertical-align:middle;text-align:center;">
<form method="POST" style="margin:0px;">
<select name="yunalis">
<?php if(!$rus){ ?>
<option value="kkcysuttcysu-2" >кирилл язулы казакча язуны татарчалаштыру</option>
<option value="uygurdantatarga" >гарәп язулы уйгырча язуны кирилл язуына күчерү һәм татарчалаштыру</option>
<option value="toroktantatarga" >латин язулы төрекчә язуны кирилл язуына күчерү һәм татарчалаштыру</option>
<!--option value="yaponnantatarga" >японча язуны татарчага тәрҗемәләү</option-->
<option value="ttcysuttlart1999">татарча язуны кириллицадан ТР 1999ынчы ел законы латин язуына күчерү</option>
<option value="ttcysuttlart1999-2" selected="true">татарча язуны кириллицадан ТР 1999ынчы ел законы латин язуына күчерү, яңа версия</option>
<option value="ttcysuttlasu" >татарча кириллицадан СССРда 1928енче елны кабул ителгән латин язуына</option>
<option value="ttlart2012ttcysu">тр 1999 латинының компьютер версиясеннән кириллицага әйләндерү</option>
<?php } ?>
<option value="cyrlatiso9a" <?php if($rus){ ?>selected="true"<?php } ?>>транслитерация русского текста с кириллицы на латиницу по iso9a</option>
<option value="cyrlatyandex" >транслитерация русского текста с кириллицы на латиницу по транслитерация.рф "по яндексу"</option>
</select><br />
url:(http://)<input type="text" style="width:400px;" name="ba" value="<?php if($rus){ ?>ru<?php }else{ ?>tt<?php } ?>.wikipedia.org" />
<input type="submit" value="&gt;" name="url">
<br />
<?php /*if($yuzeradmin){*/ ?><textarea name="inputstr"><?php if($rus){ ?>вставьте сюда текст или текст с html кодом<?php }else{ ?>монда текст йә html кодлы текст кертегез<?php } ?></textarea>
<input type="submit" name="string" value="&gt;"><?php /*}*/ ?>
</form>
<?php if(!$rus){ ?>
<br />Мисаллар:<br />
<a href="http://tt.wikipedia.org.ttcysuttlart1999.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%88_%D0%B1%D0%B8%D1%82">Википедия 1999 ел проекты латин язуында</a><br />
<a href="http://tt.wikipedia.org.ttcysuttlasu.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%88_%D0%B1%D0%B8%D1%82">Википедия "яңалиф"тә</a><br />
<a href="http://tt.wikipedia.org.ttcysuttlart1999-2.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%88_%D0%B1%D0%B8%D1%82">Википедия 1999 ел проекты латин язуында, яңа конвертер белән</a><br />
<a href="http://tt.wikipedia.org.ttlart2012ttcysu.<?php echo TOPDOMEN; ?>/wiki/Ba%C5%9F_bit">Википедиянең латин бүлеге кириллицада</a><br />
<!--a href="http://kk.wikipedia.org.kkcysuttcysu-2.<?php echo TOPDOMEN; ?>/wiki/%D0%91%D0%B0%D1%81%D1%82%D1%8B_%D0%B1%D0%B5%D1%82">Бер аз хәзерге татар язуына әйләндерелгән <strong>казак</strong> Википедиясы</a><br />
<a href="http://ug.wikipedia.org.uygurdantatarga.<?php echo TOPDOMEN; ?>/wiki/%D8%A6%DB%87%D9%8A%D8%BA%DB%87%D8%B1%DA%86%DB%95_%DB%8B%D9%89%D9%83%D9%89%D9%BE%D9%89%D8%AF%D9%89%D9%8A%DB%95">Бер аз хәзерге татар язуына әйләндерелгән <strong>уйгыр</strong> Википедиясы</a><br />
<a href="http://tr.wikipedia.org.toroktantatarga.<?php echo TOPDOMEN; ?>/wiki/Ana_Sayfa">Бер аз хәзерге татар язуына әйләндерелгән <strong>төрек</strong> Википедиясы</a><br />
<a href="http://ja.wikipedia.org.yaponnantatarga.<?php echo TOPDOMEN; ?>/wiki/%E3%83%A1%E3%82%A4%E3%83%B3%E3%83%9A%E3%83%BC%E3%82%B8">Өлешчә хәзерге татар теленә тәрҗемә ителгән <strong>япон</strong> Википедиясы</a><br /-->
<?php } ?>
<br />Примеры:<br />
<a href="http://ru.wikipedia.org.cyrlatiso9a.<?php echo TOPDOMEN; ?>/wiki/%D0%97%D0%B0%D0%B3%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0">Википедия на латинице ISO9A</a><br />
<a href="http://ru.wikipedia.org.cyrlatyandex.<?php echo TOPDOMEN; ?>/wiki/%D0%97%D0%B0%D0%B3%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0">Википедия на латинице "по Яндексу" по транслитерация.рф</a><br />
<?php if(!$rus){ ?>
<br />Әйләндергеч <strong>турында сөйләшүләр</strong>:<br />
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=87">1999ынчы ел проекты татар латин язуына әйләндергеч турында</a><br />
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=85"><strong>казак</strong> язуын хәзерге татар язуына әйләндергеч турында</a><br />
<!--a href="http://tmf.org.ru/viewtopic.php?f=4&t=84"><strong>япон</strong>ча сайтны татар теленә тәрҗемәләгеч турында</a><br /-->
<a href="http://tmf.org.ru/viewtopic.php?f=4&t=95">уртак, гомумән әйләндергеч турында сөйләшү</a><br />
<?php } ?>
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
