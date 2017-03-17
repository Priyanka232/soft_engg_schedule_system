<?php
include 'sql.php';

session_start();

if (isset($_POST['submit_btn']))
header("location: checkout.php");

if(($_SESSION['amo'])==='500' || ($_SESSION['amo'])==='1000'){
if(($_SESSION['u_code'])!== '0'){
$s=1;
$pno = $_SESSION['s_no'];
echo "$s "." $pno";
$sql = "UPDATE payment SET status='$s' WHERE p_no='$pno'";
if($conn->query($sql) === TRUE)header("location: checkout.php");
}
}

?>

<html>
      <body>
            <form method="post" action="transaction.php">

                   <tr>
			<td>Unique code:</td>
			<td><input type="int" name="u_code"></td>
		   </tr>
   		
                   <tr>
		        <td>Amount:</td>
		        <td><input type="int" name ="amount"></td>
                   </tr>

		   <td><input type="submit" name="submit_btn" value="submit"></td>
            </form>
      </body>
</html>