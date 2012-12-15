<?php
//echo'OK';
if(!$yuzeradmin){exit;}

header('Content-Type: text/html; charset=utf-8');

if($_SERVER['REQUEST_METHOD']=='POST'){
//echo'OK';
if($_POST['password']!='t^u*78Redr3#45DswEBm,k'){exit;}



if($_POST['command']=='create table'){
	connecttodb();
	$stmt = $db->prepare("CREATE TABLE {$dbprefix}lastmod (md5 BINARY(16), waqot DATETIME, url VARCHAR(3000), INDEX USING HASH(md5))");
	//CREATE TABLE lastmod (md5 BINARY(16), waqot DATETIME, url VARCHAR(3000), INDEX USING HASH(md5))
	//CREATE TABLE lastmod (INDEX USING HASH(md5), md5 BINARY(16), waqot DATETIME, url VARCHAR(3000))
	//CREATE TABLE lastmod (md5 BINARY(16), INDEX USING HASH(md5), waqot DATETIME, url VARCHAR(3000))
	//CREATE TABLE lastmod (md5 BINARY(16), waqot DATETIME, url VARCHAR(3000))
	//CREATE TABLE a (y BINARY(10), x VARCHAR(3000), INDEX USING HASH(y))
	//CREATE TABLE a (INDEX USING HASH(y), y BINARY(10), x VARCHAR(3000))
	$stmt->execute();
	echo'таблица ясадык';
}//if($_POST['command']=='create table')
elseif($_POST['command']=='delete table'){
	connecttodb();
	$stmt = $db->prepare("DROP TABLE {$dbprefix}lastmod");
	$stmt->execute();
	echo'таблицаны бетердек';
}//if($_POST['command']=='create table')...elseif($_POST['command']=='delete table')...


}//if($_SERVER['REQUEST_METHOD']=='POST')



?>

<form method="POST">
сер сүз: <input type="text" name="password" value="123" />
<input type="submit" name="command" value="create table" />
<input type="submit" name="command" value="delete table" />
</form>
