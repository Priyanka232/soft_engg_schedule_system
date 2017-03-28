<?php
	$username = 'root';
	$password = '';
	$db = 'project';
	//print_r ($_GET);
	$conn = new mysqli('localhost', $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	list($month,$day,$year) = explode("/",$_GET['q']);
	$date = $year."-".$month."-".$day;
	$sql = "select start_time from slot where date = '" . $date . "';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result); 
	echo json_encode($row);
?>