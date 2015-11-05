<?php
session_start();
$sql=mysql_connect("localhost","root","");
mysql_select_db("cms",$sql);
$result = mysql_query("SELECT * FROM tbl_setting");

while($row=mysql_fetch_array($result))
{
echo $row['name'];
echo $row['value'];
}

?>