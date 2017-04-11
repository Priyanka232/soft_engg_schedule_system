<?php
    session_start();
	include 'sql.php';

	function goback($status) {
		header('Location: first.php?status="'.$status.'"');
	}
	
	function isValid($email, $mob) {
		$position_of_at = strrpos($email, '@');
		$extention = substr($email, $position_of_at);
		return (($extention == '@iiti.ac.in' || $extention == '@gmail.com') && (strlen($mob) == 10));
	}
	
	function removeSpaces($string) {
		return str_replace(' ','',$string);
	}
	$email = removeSpaces($_POST['email']);
	if(count($_POST) === 1) {	//if existing user
		$sql = "select count(*) from customer where cust_email = '" . $email . "';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		//proceed or go back
		if ($row["count(*)"] == 0)
			goback("Not Found");
		else {
			$_SESSION['logged_in'] = true;
			$_SESSION['email'] = $email;
			header('Location: book.php');
		}
	}
	else {	//if new user
		echo $_POST['mobile'];
		$mobile = removeSpaces($_POST['mobile']);
		echo $mobile;
		if(!isValid($email, $mobile)) {
			goback("Email format or mobile number is incorrect");
		}
		else {
			$sql = "INSERT INTO customer VALUES ('$email', '".$_POST['name']."', $mobile, '".$_POST['address']."')";
			//proceed or go back
			if ($conn->query($sql)){
				$_SESSION['logged_in'] = true;
				$_SESSION['email'] = $email;
				header('Location: book.php');
			}
			else
				goback("Email already exists");
		}
	}
?>