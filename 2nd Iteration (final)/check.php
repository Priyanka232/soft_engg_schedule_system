<?php
    session_start();
	include 'sql.php';

	function goback($status) {
		header('Location: first.php?status="'.$status.'"');
	}
	
	function setRequiredAmount($email) {
		if((substr($email, -11) === '@iiti.ac.in'))
			$_SESSION['amo'] = '500';
		else
			$_SESSION['amo'] = '1000';
	}
	
	function isValid($email, $mob) {
		$position_of_at = strrpos($email, '@');
		$extention = substr($email, $position_of_at);
		return (($extention == '@iiti.ac.in' || $extention == '@gmail.com') && (strlen($mob) == 10));
	}
	
	function removeSpaces($string) {
		return str_replace(' ','',$string);
	}
	
	if(count($_POST) === 1) {	//if existing user
	    $mail = removeSpaces($_POST['email']);
		$sql = "select count(*) from customer where cust_email = '" . $mail . "';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		//proceed or go back
		if ($row["count(*)"] == 0)
			goback("Not Found");
		else {
			$_SESSION['logged_in'] = true;
			$_SESSION['email'] = $mail;
			setRequiredAmount($mail);
			header('Location: book.php?email='.$_SESSION['email']);
		}
	}
	else {	//if new user
		$mail = removeSpaces($_POST['email']);
		$nam = removeSpaces($_POST['name']);
		$mob = removeSpaces($_POST['mobile']);
		$add = removeSpaces($_POST['address']);
		if(isValid($mail, $mob)){
			$sql = "INSERT INTO customer (cust_email, cust_name, cust_mobile, cust_address) VALUES ('$mail', '$nam', '$mob', '$add')";
			//proceed or go back
			if ($conn->query($sql) === TRUE){
				$_SESSION['logged_in'] = true;
				$_SESSION['email'] = $mail;
				setRequiredAmount($mail);
				header('Location: book.php?email='.$_SESSION['email']);
			}
			else
				goback("Already Exists");
		}
		else
			goback("Email format or mobile number is incorrect");
	}
?>