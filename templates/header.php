<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo SITE_NAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic|Crete+Round:400,400italic' rel='stylesheet' type='text/css'>
<link type="text/css" href="<?php echo SITE_URL; ?>/css/style.css" rel="stylesheet">
<script src="<?php echo SITE_URL; ?>/js/modernizr.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>/js/jquery-min.js"></script>
<!--[if lte IE 9]>
  <script src="<?php echo SITE_URL; ?>/js/ie.js" type="text/javascript"></script>
<![endif]-->
</head>
<body>
<div class="container">
<?php $res = $mysqli->query("SELECT * FROM tbl_pages WHERE status = 1 ORDER BY sortOrder ASC"); ?>
<ul>
<?php while ($row = $res->fetch_assoc()) { ?>
	<li><a href="<?php echo SITE_URL.'/'.$row['slug']; ?>" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a></li>
<?php } ?>
</ul>