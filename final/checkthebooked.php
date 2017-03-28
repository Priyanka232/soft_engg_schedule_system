<?php
include 'sql.php';

$db = mysqli_connect("localhost", "root", "", "bsbe_db");

session_start();

$sql = "SELECT cust_email, cust_mobile, cust_name, s_no, machine, s_time, date, status FROM (SELECT cust_email, cust_mobile, cust_name, s_no, machine, s_time, date FROM slot LEFT JOIN customer ON customer.cust_email=slot.email) AS x LEFT JOIN payment ON x.s_no=payment.p_no";
$result = mysqli_query($db,$sql);

?>

<html>
      <body>
            <table width="1300" border="1" cellpadding="1" cellspacing="1">
            <tr>
            <th>S.no</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Name</th>
            <th>Machine</th>
            <th>Start time</th>
            <th>date</th>
            <th>status</th>
            <tr>
            <?php
            while($b = mysqli_fetch_assoc($result)){
	    echo "<tr>";
               echo "<td>".$b['s_no']."</td>";
               echo "<td>".$b['cust_email']."</td>";
               echo "<td>".$b['cust_mobile']."</td>";
               echo "<td>".$b['cust_name']."</td>";
               echo "<td>".$b['machine']."</td>";
               echo "<td>".$b['s_time']."</td>";
               echo "<td>".$b['date']."</td>";
               echo "<td>".$b['status']."</td>";
            echo "</tr>";
            }
?>
      </body>
</html>