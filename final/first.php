<?php
    session_start();
	if(isset($_SESSION['urn'])) {
			print_r($_SESSION);
		header('location: urn.php');
	}
	else {
		session_regenerate_id(true);
		$_SESSION = array();
		print_r($_SESSION);
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href = "styles/first_css.css" rel = "stylesheet" type = "text/css">
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
	
	<div id = "buttons">
		<button id = "button1" onclick = "display_new_user_form()" type = "button" id = "new_user_display">New User</button>
		<button id = "button2" onclick = "display_existing_user_form()" type = "button" id = "existing_user_display">Existing User</button>
		<a href = "checkthebooked.php"><p align = "center">Previous Bookings</p></a>
	</div>
	
	<p id = "show_status" align = "center">
		<?php
			echo isset($_GET['status']) ? $_GET['status'] : '';		//shows status whether existing user is found or not
		?>
	</p>

	<form id = "new_user_form" action="check.php" method="post">
		<input placeholder = "E-Mail" type="text" name="email" maxlength = "50" required><br>
		<input placeholder = "Name" type="text" name="name" maxlength = "30" required><br>
		<input placeholder = "Mobile Number" type="text" name="mobile" required><br>
		<input placeholder = "Address" type="text" name="address" maxlength = "100" required><br>
		<input type="submit">
	</form>

	<form id = "existing_user_form" action="check.php" method="post">
		<input placeholder = "E-Mail" type="text" name="email" maxlength = "50" required><br>
		<input type="submit">
	</form>


	<script src = "scripts/first_js.js"></script>
</body>
</html>