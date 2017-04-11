<?php
	session_start();
	$username = 'root';
	$password = '';
	$db = 'project';
	$conn = new mysqli('localhost', $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	list($day,$month,$year) = explode("/",$_GET['q']);
	$date = $year."-".$month."-".$day;
	$machine = $_SESSION['machine'];
	$sql = "select start_time from slot where date = '$date' and machine = '$machine';";
	$result = $conn->query($sql);
	$send = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$send[] = $row['start_time'];
	}
	echo json_encode($send, JSON_FORCE_OBJECT);
?>