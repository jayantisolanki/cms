<?php include('../controllers/config.php'); ?>
<?php include('templates/header.php'); ?>
<?php
$message="";
if(count($_POST)>0) {
$result = mysql_query("SELECT * FROM tbl_users WHERE user_login='" . $_POST["user_name"] . "' and user_pass = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
	$_SESSION["user_login"] = $row['user_login'];
} else {
	$message = '<div class="message error">Invalid Username or Password!</div>';
}
}
if(isset($_SESSION["user_login"])) {
	header("Location:dashboard.php");
}
?>
<form name="frmUser" method="post" action="">
<?php echo $message; ?>
<label for="user_name">Username</label><input type="text" name="user_name" id="user_name">
<label for="password">Password</label><input type="password" name="password" id="password">
<input type="submit" name="submit" value="Submit">
</form>
<?php include('templates/footer.php'); ?>
