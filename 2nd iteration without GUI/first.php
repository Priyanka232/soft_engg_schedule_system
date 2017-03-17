<?php
include 'sql.php';

session_start();

?>

<html>
<body>
<br>
<button onclick = "display_new_user_form()" type = "button" id = "new_user_display">New User</button>
<button onclick = "display_existing_user_form()" type = "button" id = "existing_user_display">Existing User</button>
<br>

<h1 id = "show_status"><?php
	echo isset($_GET['status']) ? $_GET['status'] : '';
?></h1>

<form style = "display: none;" id = "new_user_form" action="check.php" method="post">
E-mail: <input type="text" name="email" maxlength = "50" required><br>
Name: <input type="text" name="name" maxlength = "30" required><br>
Phone Number: <input type="text" name="phone" required><br>
Address: <input type="text" name="address" maxlength = "100" required><br>
<input type="submit">
</form>

<form style = "display: none;" id = "existing_user_form" action="check.php" method="post">
E-mail: <input type="text" name="email" maxlength = "50" required><br>
<input type="submit">
</form>

<p>Check the booking status :<a href = "checkthebooked.php">click here</a></p>

<script>
	var new_user_display = document.getElementById("new_user_display");
	var existing_user_display = document.getElementById("existing_user_display");
	var new_user_form = document.getElementById("new_user_form");
	var existing_user_form = document.getElementById("existing_user_form");
	var show_status = document.getElementById("show_status");
	function display_new_user_form() {
		new_user_form.style.display = "initial";
		existing_user_form.style.display = "none";
		show_status.style.display = "none";
	}
	function display_existing_user_form() {
		new_user_form.style.display = "none";
		existing_user_form.style.display = "initial";
		show_status.style.display = "none";
	}
</script>
</body>
</html>