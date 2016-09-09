<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo SITE_NAME . ' Admin'; ?></title>
<link href="<?php echo BACKEND_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="<?php echo BACKEND_URL; ?>/css/style.css" rel="stylesheet">
<script src="<?php echo BACKEND_URL; ?>/js/modernizr.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo BACKEND_URL; ?>/js/jquery-min.js"></script>
<!--[if lte IE 9]>
  <script src="<?php echo BACKEND_URL; ?>js/ie.js" type="text/javascript"></script>
<![endif]-->
</head>
<body>
<div id="wrapper">
<div class="container">
<?php if(isset($_SESSION["loginUser"])) { ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo BACKEND_URL; ?>/page.php">Pages</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">Our Team</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">Addresses</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">Gallery</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">Events</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">Testimonials</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">Newsletter</a></li>
        <li><a href="<?php echo BACKEND_URL; ?>/">FAQs</a></li>
      </ul>
      <p class="navbar-text navbar-right">Welcome Admin, <a href="<?php echo BACKEND_URL; ?>/logout.php" tite="Logout"><span class="glyphicon glyphicon-lock"></span> Logout</a></p>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php } ?>
