<?php
        session_start();
	include 'sql.php';
	$db = mysqli_connect("localhost", "root", "", "bsbe_db");

	function goback($status) {
		header('Location: first.php?status="'.$status.'"');
	}

	if(count($_POST) === 1) {	//if existing user
	        $email = str_replace(' ','',$_POST['email']);
		$sql = "select count(*) from customer where cust_email = '" . $email . "';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result); 
		//proceed or go back
		if ($row["count(*)"] == 0)
			goback("Not Found");
		else{
		        $_SESSION['logged_in'] = 1;
		        $_SESSION['email']=$email;
		        $m=$_SESSION['email'];
		        $e='@iiti.ac.in';
		        $l=strlen($e);
		        if((substr($m, -$l) === $e))
	                {
                             $_SESSION['amo']='500';
                        }
                        else
                        $_SESSION['amo']='1000';
			header('Location: book.php?email='.$_SESSION['email']);
                     }
        }
	else {	//if new user
                $m=str_replace(' ','',$_POST['email']);
                $n=str_replace(' ','',$_POST['name']);
                $p=str_replace(' ','',$_POST['phone']);
                $a=str_replace(' ','',$_POST['address']);
                $e1='@iiti.ac.in';
                $e2='@gmail.com';
                $e3='@yahoo.com';
                $l1=strlen($e1);
                $l2=strlen($e2);
                $l3=strlen($e3);
	        if($p<10000000000 && $p>999999999 && (((substr($m, -$l1) === $e1) !== false) || ((substr($m, -$l2) === $e2) !== false) || ((substr($m, -$l3) === $e3) !== false)) ){
		$sql = "INSERT INTO customer (cust_email,cust_name,cust_mobile,cust_address) VALUES ( '$m', '$n', '$p', '$a' )";
		//proceed or go back
		if ($conn->query($sql) === TRUE){
                        $_SESSION['email']=$m;
			header('Location: first.php');
		}
                else
			goback("Already Exists"); }
		else
                        goback("Not valid");
	}
?>