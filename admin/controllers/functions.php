<?php
 // Add pages globle variable 
$title = $content = $slug = $seotitle = $seodescrition = $seokeyword = '';

// Message Variable
$message = $error = $success = '';

// User Login Variable
$email = $password = '';

function login($email, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
	$stmt = $mysqli->prepare("SELECT username, password FROM tbl_users WHERE email = ? LIMIT 1");
	$stmt->bind_param('s', $email);  // Bind "$email" to parameter.
	$stmt->execute();    // Execute the prepared query.
	$stmt->store_result();
	// get variables from result.
	$stmt->bind_result($username, $db_password);
	$stmt->fetch();
	
    if ($stmt->num_rows == 1) {
		if ($db_password == $password) { return true;
		} else { return false;}
	}else { return false; }
}
function addPage($title, $content, $slug, $seotitle, $seodescrition, $seokeyword, $mysqli) {
    // Insert the new user into the database 
	if ($insert_stmt = $mysqli->prepare("INSERT INTO tbl_pages (name, content, slug, seotitle, seodescrition, seokeyword) VALUES (?, ?, ?, ?, ?, ?)")) {
		$insert_stmt->bind_param('ssssss', $title, $content, $slug, $seotitle, $seodescrition, $seokeyword);
		// Execute the prepared query.
		if ($insert_stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
