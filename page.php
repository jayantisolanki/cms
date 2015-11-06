<?php include('controllers/config.php'); ?>
<?php
if($_GET['url']){
	$url=mysql_real_escape_string($_GET['url']);
	$url=$url; //Friendly URL 
	$sql=mysql_query("select * from tbl_pages where pageslug='$url';");
	$count = mysql_num_rows($sql);
	$row = mysql_fetch_array($sql);
	$title = $row['pagename'];
	$body = $row['pagecontent'];
}
else {
	echo '404 Page.';
}
?>
<?php include('templates/header.php'); ?>
<?php if($count) { ?>
	<h1><?php echo $title ?></h1>
    <div class="body"><?php echo $body ?></div>
<?php } else {?>
	<h1>404 Page.</h1>
<?php } ?>
<?php include('templates/footer.php'); ?>
