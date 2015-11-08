<?php
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

function updatePageData($id, $mysqli) {
	$stmt = $mysqli->prepare("SELECT name, content, seotitle, seodescrition, seokeyword, status FROM tbl_pages WHERE id = ? LIMIT 1");
	$stmt->bind_param('s', $id);
	$stmt->execute(); 
	$stmt->store_result();
	$stmt->bind_result($name, $content, $seotitle, $seodescrition, $seokeyword, $status);
	$row = $stmt->fetch();
}

