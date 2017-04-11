<?php
	$username = 'root';
	$password = '';
	$db = 'project';
	
	$conn = new mysqli('localhost', $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>