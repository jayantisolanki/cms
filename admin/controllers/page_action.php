<?php
include_once 'config.php';
function string_limit_words($string) {
	$words = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
	return $words;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$action = $_POST["action"];
	if($action == "edit"){
		$id  = $_POST["id"];
		$name = $_POST["name"];
		$content = $_POST["content"];
		$slug = string_limit_words($name); // First 6 words
		$seotitle = $_POST["seotitle"];
		$seodescrition = $_POST["seodescrition"];
		$seokeyword = $_POST["seokeyword"];
		$status = $_POST["status"];
		if (empty($name)) {$message .= 'Enter your page name<br>'; }
		if (empty($content)) {$message .= 'Enter your page content<br>'; }
		if ($status == ''	) {$status=1;}
		if (empty($message)) {
			if (updatePage($id, $name, $content, $slug, $seotitle, $seodescrition, $seokeyword, $status, $mysqli) == true) {
				header("Location: ../page.php");exit;	
			} else {
				$message = '<div class="alert alert-danger">Invalid!</div>';
			}
		}
			
	} else {
		$name = $_POST["name"];
		$content = $_POST["content"];
		$slug = string_limit_words($name); // First 6 words
		$seotitle = $_POST["seotitle"];
		$seodescrition = $_POST["seodescrition"];
		$seokeyword = $_POST["seokeyword"];
		$status = $_POST["status"];
		if (empty($name)) {$message .= 'Enter your page name<br>'; }
		if (empty($content)) {$message .= 'Enter your page content<br>'; }
		if ($status == ''	) {$status=1;}
		if (empty($message)) {
			if (addPage($name, $content, $slug, $seotitle, $seodescrition, $seokeyword, $status, $mysqli) == true) {
				
				$message = 'Paged successfully created';
				header("Location: ../page.php?success=$message");exit;	
			} else {
				$message = 'Invalid';
				header("Location: ../page.php?action=add&error=$message");exit;	
			}
		} else {
				header("Location: ../page.php?action=add&error=$message");exit;
		}
	}
}

function addPage($name, $content, $slug, $seotitle, $seodescrition, $seokeyword, $status, $mysqli) {
    // Insert the new user into the database 
	if ($insert_stmt = $mysqli->prepare("INSERT INTO tbl_pages (name, content, slug, seotitle, seodescrition, seokeyword, status) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
		$insert_stmt->bind_param('sssssss', $name, $content, $slug, $seotitle, $seodescrition, $seokeyword, $status);
		// Execute the prepared query.
		if ($insert_stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}

function updatePage($id, $name, $content, $slug, $seotitle, $seodescrition, $seokeyword, $status, $mysqli) {
    // Insert the new user into the database 
	if ($update_stmt = $mysqli->prepare("UPDATE tbl_pages SET name='$name', content='$content', slug='$slug', seotitle='$seotitle', seodescrition='$seodescrition', seokeyword='$seokeyword', status='$status' WHERE id = $id;")) {
		// Execute the prepared query.
		if ($update_stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
