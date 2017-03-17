<?php
	session_start();
	include 'sql.php';
	$db = mysqli_connect("localhost", "root", "", "bsbe_db");
	if(!isset($_SESSION['logged_in']))
        header('location: first.php');

        if (isset($_POST['submit_btn']))
        {
          $sql = "select count(*) from slot";
          $result = $conn->query($sql);
       	  $row = mysqli_fetch_assoc($result);
       	  $s=$row["count(*)"]+1;
          $e=$_SESSION['email'];
          $m=$_SESSION['machine'];
          $d=str_replace(' ','',$_POST['date']);
          $t=str_replace(' ','',$_POST['time']);
          date_default_timezone_set("asia/kolkata");
          $date=date("Y-m-d");
          $time=date("h:i:sa");
          $ma=$_SESSION['machine'];
          $sql0="SELECT s_time FROM (SELECT date, machine, s_time FROM slot WHERE slot.date='$d' HAVING slot.machine='$ma') AS x WHERE x.s_time='$t'";
          $result0 = mysqli_query($db,$sql0);
          $row = mysqli_fetch_assoc($result0);
          if (mysqli_num_rows($result0) == 0){
          if($date<$d || ($time<$t && $date=$d)){
          if($time<$t && $date=$d){
          $sql = "INSERT INTO slot ( s_no,email,machine,date,s_time ) VALUES ('$s','$e','$m','$d','$t')";
          $_SESSION['s_no']=$s;
          if($conn->query($sql) === TRUE){
          $p=$_SESSION['s_no'];
          $a=$_SESSION['amo'];
          $u=97531*3121+86420*$p*39;
          $sql1 = "INSERT INTO payment ( p_no,amount,u_code ) VALUES ('$p','$a','$u')";
          $_SESSION['u_code']=$u;
          if($conn->query($sql1) === TRUE)header('location: payment.php');
          }
          }                                                      
          else
          {
            echo "Choose some other time";
          }
          }
          else
          {
            echo "Choose some other date";
          }
          }
          else{
            echo "Choose some other time or date or both";
          }
          }

	$short = $_SESSION['machine']?'FACS slot booking page':'Confocal slot booking page';
	$urn = "BSBE ".$short;
	echo $urn;
	/*$to      = 'nobody@example.com';
	$subject = 'the subject';
	$message = $urn;
	$headers = 'From: webmaster@example.com' . "\r\n" .
	'Reply-To: dhruvchadha1997@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$ml = mail($to, $subject, $message, $headers);
	if($ml == 1) echo "mail sent";*/
?>
<html>
	<body>

		<form method="post" action="urn.php">

                   <tr>
			<td>Date:</td>
			<td><input type="date" name="date"></td>
		   </tr>
   		
                   <tr>
		        <td>Start time:</td>
		        <td><input type="time" name ="time"></td>
                   </tr>

		   <td><input type="submit" name="submit_btn" value="submit"></td>
		</form>

	</body>
</html>