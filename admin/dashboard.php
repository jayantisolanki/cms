<?php include('templates/header.php'); if(isset($_SESSION["user_login"])) {} else {header("Location:index.php");} ?>
<h1>Dashboard</h1>
<?php include('templates/footer.php'); ?>
