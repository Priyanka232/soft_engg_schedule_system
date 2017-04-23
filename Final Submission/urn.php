<?php
	session_start();
	include 'sql.php';
	print_r($_SESSION);
	$amount = 0;
	function setRequiredAmount($email) {
		global $amount;
		if((substr($email, -11) === '@iiti.ac.in'))
			$amount = 500;
		else
			$amount = 1000;
	}

	if(isset($_POST['complete'])) {
		session_unset();
		header('location: first.php');
	}
	else if(!isset($_SESSION['logged_in'])) {
		header('location: first.php');
	}
	else if(isset($_SESSION['urn'])) {
		echo "Please Logout";
	}
	else {
		$position_of_t = strrpos($_POST['time'],'t');
		$start_time = substr($_POST['time'], 0, $position_of_t - 1);
		$sqlp = "select count(*) from slot";
                $result = $conn->query($sqlp);
                $row = mysqli_fetch_assoc($result);
       	        $s=$row["count(*)"]+1;
		
		//convert dd/mm/yyyy to yyyy-mm-dd
		$dat = explode('/', $_POST['date']);
		$dat = $dat[2].'-'.$dat[1].'-'.$dat[0];
		date_default_timezone_set("asia/kolkata");
                $date=date("Y-m-d");
		$machine=$_SESSION['machine'];

                if($dat>$date){
		$sql = "INSERT INTO slot VALUES ('$s','".$_SESSION['email']."','$machine','$dat','$start_time')";
		if($conn->query($sql)) {
			echo "<br>".$sql."<br>";
		}
		else echo $conn->connect_error;

		$urn = 'bsbe_'.$machine."_".session_id();
		$_SESSION['urn'] = $urn;
		setRequiredAmount($_SESSION['email']);
		echo $urn."<br>".$amount;
		include 'mail.php';
	        }
		else
		{
                   echo "please enter some other date";
                }
	}
?>
<html>
	<head>
		<style>
			#loggedout {
				display: block;
				width: 70px;
				height: 30px;
				margin: 10px auto;
			}
		</style>
		<link href = "styles/header.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<header>
		<div class="wrapper">
			<div class="logo"><img src="styles/logo.png" alt="logo"></div> 
			</br></br></br>
			</br>  
			<div>
				<p align="right" class="style1"><font color="#FFFFFF" size="5px">Biosciences & Biomedical Engineering</font></p>    
			</div>
		</div>
	</header>
	<!--header finish (iiti logo)-->
		<form action = "urn.php" method = "post">
			<input type = "submit" value = "Logout" name = "complete" id = "loggedout">
		</form>
	</body>
</html>