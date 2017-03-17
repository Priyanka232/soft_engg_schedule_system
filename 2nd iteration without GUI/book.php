<?php
        session_start();
        include 'sql.php';

        if(!isset($_SESSION['logged_in']))
        header('location: first.php');

	echo $_SESSION['email']."<br>";
	$y= $_SESSION['email'];


if (isset($_POST['FACS_btn']))     {
$_SESSION['machine'] = 1;
header("location: urn.php");        }

if (isset($_POST['Confocal_btn'])) {
$_SESSION['machine'] = 0;
header("location: urn.php");        }
	
	/*if( isset( $_SESSION['counter'] ) ) {
      $_SESSION['counter'] += 1;
   }else {
      $_SESSION['counter'] = 1;
   }
   echo "<br>";
	echo $_SESSION['counter']."<br>";
	echo date('d')."<br>";
	echo date('m')."<br>";
	echo date('Y')."<br>";
	echo date('d')."<br>";
	echo date('U')."<br>";
	//session_regenerate_id()
	//session_destroy();
	echo time();*/
?>
<html>
<body>

            <form method="post" action="book.php">
            <p>
               Click below to select FACS
            </p>
            <td><input type="submit" name="FACS_btn" value="FACS"></td>
            </form>

            <form method="post" action="book.php">
            <p>
               Click below to select Confocal
            </p>
            <td><input type="submit" name="Confocal_btn" value="Confocal"></td>
            </form>

</body>
</html>