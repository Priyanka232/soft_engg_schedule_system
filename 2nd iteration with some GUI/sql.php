<?php
	$username = 'root';
	$password = '';
	$db = 'bsbe_db';
	
	$conn = new mysqli('localhost', $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>