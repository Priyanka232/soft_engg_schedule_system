<?php
	include 'sql.php';
	session_start();
?>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href = "first_css.css" rel = "stylesheet" type = "text/css">
</head>

<body>
	<header>
		<div class="wrapper">
			<div class="logo"><img src="logo.png" alt="logo"></div> 
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
	
	<h1 id = "show_status">
		<?php
			echo isset($_GET['status']) ? $_GET['status'] : '';		//shows status whether existing user is found or not
		?>
	</h1>

	<form id = "new_user_form" action="check.php" method="post">
		<input placeholder = "E-Mail" type="text" name="email" maxlength = "50" required><br>
		<input placeholder = "Name" type="text" name="name" maxlength = "30" required><br>
		<input placeholder = "Phone Number" type="text" name="phone" required><br>
		<input placeholder = "Address" type="text" name="address" maxlength = "100" required><br>
		<input type="submit">
	</form>

	<form id = "existing_user_form" action="check.php" method="post">
		<input placeholder = "E-Mail" type="text" name="email" maxlength = "50" required><br>
		<input type="submit">
	</form>


	<script src = "first_js.js"></script>
</body>
</html>