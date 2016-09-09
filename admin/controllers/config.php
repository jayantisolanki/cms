<?php
error_reporting(0);
session_start();
define("HOST", "localhost"); // The host you want to connect to. 
define("USER", "root"); 	 // The database username. 
define("PASSWORD", ""); 	 // The database password. 
define("DATABASE", "cms");   // The database name.

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
}
define("SITE_URL", "http://localhost/cms/trunk");
define("BACKEND_URL", "http://localhost/cms/trunk/admin");
define("SITE_NAME", "Simple CMS | Developed by Jayanti Solanki");

 // Add pages globle variable 
$name = $content = $slug = $seotitle = $seodescrition = $seokeyword = $status = '';

// Message Variable
$message = $error = $success = '';

// User Login Variable
$email = $password = '';