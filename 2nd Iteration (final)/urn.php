<?php
	session_start();
	include 'sql.php';
	print_r($_SESSION);
	if(!isset($_SESSION['logged_in']))
		header('location: first.php');

	$sql = "select count(*) from slot";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	
	$position_of_t = strrpos($_POST['time'],'t');
	$t = substr($_POST['time'], 0, $position_of_t);
	$dat = explode('/', $_POST['date']);
	$d = $dat[2].'-'.$dat[0].'-'.$dat[1];
	//echo $d;
	$s=$row["count(*)"]+1;
	$e=$_SESSION['email'];
	$m=$_SESSION['machine'];
	
	$sql = "INSERT INTO slot ( s_no,email,machine,date,s_time ) VALUES ('$s','$e','$m','$d','$t')";
	$_SESSION['s_no']=$s;
	if($conn->query($sql) === TRUE){
	$p=$_SESSION['s_no'];
	$a=$_SESSION['amo'];
	
	$u=97531*3121+86420*$p*39;
	$sql1 = "INSERT INTO payment ( p_no,amount,u_code ) VALUES ('$p','$a','$u')";
	$_SESSION['u_code']=$u;
	if($conn->query($sql1) === TRUE)
		header('location: payment.php');

	$short = $_SESSION['machine']?'FACS slot booking page':'Confocal slot booking page';
	$urn = "BSBE ".$short;
	}
?>