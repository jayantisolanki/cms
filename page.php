<?php include('admin/controllers/config.php'); ?>
<?php
if($_GET['url']){
	$url=$_GET['url'];
	$url=$url; //Friendly URL 
	$stmt = $mysqli->prepare("SELECT name, content, seotitle, seodescrition, seokeyword, status FROM tbl_pages WHERE slug = ? LIMIT 1");
	$stmt->bind_param('s', $url);
	$stmt->execute(); 
	$stmt->store_result();
	$stmt->bind_result($name, $content, $seotitle, $seodescrition, $seokeyword, $status);
	$row = $stmt->fetch();	
}
else {
	echo '404 Page.';
}
?>
<?php include('templates/header.php'); ?>
	<h1><?php echo $name ?></h1>
    <?php echo $content ?>
<?php include('templates/footer.php'); ?>
