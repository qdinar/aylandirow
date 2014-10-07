<?php
mb_internal_encoding('UTF-8');
libxml_use_internal_errors(true);
//phpinfo();
define('USECACHE',false);
define('TOPDOMEN','aylandirow.tmf.org.ru');
$ba='http://qdb.tmf.org.ru/fayllar/kirillitsadanlatinitsagaaylandirgicnisonaw.html';
$ic=file_get_contents($ba);
$til='ttcyrf';
include('aylandirilgan_url.php');
include('aylandirow.php');
echo $ic;

?>