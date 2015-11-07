<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $sitename . ' Admin'; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link type="text/css" href="<?php echo $backend; ?>/css/style.css" rel="stylesheet">
<script src="<?php echo $backend; ?>/js/modernizr.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $backend; ?>/js/jquery-min.js"></script>
<!--[if lte IE 9]>
  <script src="<?php echo $backend; ?>js/ie.js" type="text/javascript"></script>
<![endif]-->
</head>
<body>
<div id="wrapper">
<div class="container">
<?php if(isset($_SESSION["user_login"])) { ?>
	Welcome <?php echo $_SESSION["user_login"]; ?>. <a href="<?php echo $backend; ?>/logout.php" tite="Logout">Logout</a>
<?php } ?>
