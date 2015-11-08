<?php 
include_once 'controllers/config.php';
include_once 'controllers/functions.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (login($email, $password, $mysqli) == true) {
        // Login success 
		$_SESSION['loginUser'] = $email;
		header("Location: dashboard.php");
    } else {
        // Login failed 
        $message = '<div class="alert alert-danger">Invalid email or Password!</div>';
    }
}
if(isset($_SESSION["loginUser"])) {header("Location: dashboard.php");exit; }
?>
<?php include('templates/header.php'); ?>
<div class="loginForm">
<h1><span class="glyphicon glyphicon-compressed"></span>Dashboard</h1>
<?php if (!empty($message)) { echo $message; } ?>
<form name="frmUser" method="post" action="" class="form-horizontal">
	<div class="form-group">
    <label for="email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <input class="btn btn-primary" type="submit" value="Log in">
    </div>
  </div>
</form>
</div>
<?php include('templates/footer.php'); ?>
