<?php include('../../controllers/config.php'); ?>

<?php
function string_limit_words($string) {
	$words = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
	return $words;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$title=mysql_real_escape_string($_POST['title']);
	$body=mysql_real_escape_string($_POST['body']);
	$title=htmlentities($title);
	$body=htmlentities($body);
	$date=date("Y/m/d");
	//Title to friendly URL conversion
	$newtitle=string_limit_words($title); // First 6 words
	$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);
	$newurltitle=str_replace(" ","-",$newtitle);
	$url = $newurltitle.$prefix; // Final URL
	
	//Inserting values into my_blog table
	mysql_query("insert into tbl_pages(pagename,pagecontent,pageslug) values('$title','$body','$url')");
}
?>
<?php include('../templates/header.php'); if(isset($_SESSION["user_login"])) {} else {header("Location:index.php");} ?>
<h1>Add Page</h1>
<form method="post" action="">
Title:
<input type="text" name="title"/>
Body:
<textarea name="body"></textarea>
<input type="submit" value=" Publish "/>
</form>

<?php include('../templates/footer.php'); ?>
