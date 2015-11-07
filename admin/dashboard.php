<?php
include_once 'controllers/config.php';
include_once 'controllers/functions.php';
if(!isset($_SESSION["loginUser"])) {header("Location: index.php");exit; }
?>
<?php include('templates/header.php');?>
<h1>Dashboard</h1>
<ul>
    <li><a href="<?php echo BACKEND_URL; ?>/page.php">Pages</a></li>
    <li><a href="<?php echo BACKEND_URL; ?>/page.php?action=add">Add Page</a></li>
    <li><a href="<?php echo BACKEND_URL; ?>/page.php?action=edit&id=1">Edit Page</a></li>
    <li><a href="<?php echo BACKEND_URL; ?>/logout.php" tite="Logout">Logout</a></li>
</ul>
<?php include('templates/footer.php'); ?>
