<?php
	session_start();
	include 'sql.php';
	
	if($_SESSION['logged_in'] == false)
		header('location: first.php');

	if (isset($_POST['FACS_btn'])) {
		$_SESSION['machine'] = 1;
		header("location: index.php");
	}

	if (isset($_POST['Confocal_btn'])) {
		$_SESSION['machine'] = 0;
		header("location: index.php");        
	}
?>
<html>
<head>
	<link href = "styles/book_css.css" rel = "stylesheet" type = "text/css">
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

	<form id = "facs_form" method="post" action="book.php">
		<input type="submit" name="FACS_btn" value="Book FACS Machine">
	</form>

	<form id = "confocal_form" method="post" action="book.php">
		<input type="submit" name="Confocal_btn" value="Book Confocal Machine">
	</form>

</body>
</html>