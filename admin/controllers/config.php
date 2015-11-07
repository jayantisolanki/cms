<?php
session_start();
$sql=mysql_connect("localhost","root","");
mysql_select_db("cms",$sql);
/* Globle Variable */
$siteurl	= 'http://localhost/cms/trunk';
$backend	= 'http://localhost/cms/trunk/admin';
$sitename	= 'Simple CMS';
$sitedesc	= 'Just another CMS site';
$prefix = ".html";
?>