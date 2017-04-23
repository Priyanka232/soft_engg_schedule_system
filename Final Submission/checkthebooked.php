<?php
include 'sql.php';

$db = mysqli_connect("localhost", "root", "", "project");

session_start();

$sql = "SELECT cust_email, cust_mobile, cust_name, slot_no, machine, start_time, date FROM slot LEFT JOIN customer ON customer.cust_email=slot.email";
$result = mysqli_query($db,$sql);

?>

<!Doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href = "styles/first_css.css" rel = "stylesheet" type = "text/css">
	<link href = "styles/header.css" rel = "stylesheet" type = "text/css">
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 8px;
}
tr:nth-child(odd){background-color: #f2f2f2}
th {
    background-color:#19384A;
    color: white;
}
header{
	background:url(../images/header.jpg) no-repeat;
	background-size:100%;
	overflow: hidden;
}
.clear { clear:both;}
img, a{ text-decoration:none; color:#888787;}
.wrapper{
	width:999px;
	margin:0 auto;
	margin-top: 0px;
	overflow: hidden;

}
.logo {
float: left;
max-width: 500px;
margin-top:0px;
padding: 0px 0px 0px;
}
.logo img {
width: 100%;
}
.outer{
	margin-top: 0px;
      width:1600px;
    margin:0;
    text-align:left;
	background-color:#19384A;
    min-height:25%;
}
.leader {
    position:relative;
    margin:0;
   margin-top: 0px;
    background:#19384A;
}
</style>
</head>

      <body>
	  
	  
	<header>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>header_BSBE</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>
	    <div class="outer">
        <div class="leader">
		<div class="wrapper">
			<h1 bgcolor="#19384A"><div class="logo"><img src="logo.png" alt="logo"></div>
            </h1><br>
			</br>  
			<div id=1 z-index: 500;>
				<p align="right" class="style1"><font color="#FFFFFF" size="5px">Biosciences & Biomedical Engineering</font></p>    
			</div>
		</div>
		</div>
		</div>
	</header>
	<!--header finish (iiti logo)-->
	
            <table width="1300" border="1" cellpadding="1" cellspacing="1">
            <tr>
            <th>S.no</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Name</th>
            <th>Machine</th>
            <th>Start time</th>
            <th>date</th>
            <tr>
            <?php
            while($b = mysqli_fetch_assoc($result)){
	    echo "<tr>";
               echo "<td>".$b['slot_no']."</td>";
               echo "<td>".$b['cust_email']."</td>";
               echo "<td>".$b['cust_mobile']."</td>";
               echo "<td>".$b['cust_name']."</td>";
               echo "<td>".$b['machine']."</td>";
               echo "<td>".$b['start_time']."</td>";
               echo "<td>".$b['date']."</td>";
            echo "</tr>";
            }
?>
      </body>
</html>