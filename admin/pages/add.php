<?php include('../../controllers/config.php'); ?>
<?php 
$pagedesc = $pagecontent = $pageslug = $menu_order = $status = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST["pagename"])) {$pagename = $_POST["pagename"];$pageslug = create_slug($pagename);} else {$hasError = true;}
	if(!empty($_POST["pagecontent"])) {$pagecontent = $_POST["pagecontent"];} else {$hasError = true;}
	if (!isset($hasError)) {
		$sql = "insert into tbl_pages (pagename,pageslug,pagecontent) values ('$pagename','$pageslug','$pagecontent')";
		if (mysql_query($sql)) {
			header('Location: index.php');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
?>
<?php include('../templates/header.php'); if(isset($_SESSION["user_login"])) {} else {header("Location:index.php");} ?>
<h1>Add Page</h1>
<form role="form" method="post" action="">
    <div class="formGroup">
      <label for="pagename">Page Name</label>
      <input type="text" id="pagename" name="pagename">
    </div>
    <div class="formGroup">
      <label for="pagecontent">Page Content</label>
      <textarea name="pagecontent" id="pagecontent"></textarea>
    </div>
    <input type="submit" name="submit" value="Submit">
</form>
<?php include('../templates/footer.php'); ?>
