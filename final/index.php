<?php
	session_start();
	print_r($_SESSION);
	if(!isset($_SESSION['logged_in']))
		header('location: first.php');
	if(isset($_SESSION['urn'])) {
		header('location: urn.php');
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="dcalendar.picker.css" rel="stylesheet" type="text/css">
	<link href = "styles/header.css" rel = "stylesheet" type = "text/css">
	<style>
		.container { margin:10px auto 30px auto; max-width:300px;}
		#selectTime {
			margin: 40px auto;
			display: none;
		}
		.slot {
			margin : 1px auto;
			width: 500px;
			height: 50px;
			border: 1px solid black;
			background-color: rgb(125, 255, 79);
			border-radius : 4px;
		}
		.slot:hover p {
			transform: scale(1.2, 1.2);
		}
		.slot p {
			transition: all 0.2s;
			padding: 15px;
			text-align: center;
			font-weight: bold;
			color: black;
			width: 100%;
			height: 100%;
		}
		#slot2hrs {
			margin-top: 5px;
			display: block;
			width: 196px;
			height: 34px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			border: 1px solid #ccc;
			border-radius: 4px;
		}
		#submitToUrn {
			display: block;
			float: right;
			position: relative;
			bottom: 55px;
			padding: 5px;
			width: 60px;
		}
	</style>
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
	<div class="container">
		<form id = "date_time_form" method = "post" action = "urn.php">
			<input class="form-control" name = "date" id = "demo" type="text" onchange = "showTimetable(this.value)" placeholder = "Select date">
			<input id = "slot2hrs" type = "text" name = "time" readonly>
			<input id = "submitToUrn" type = "submit" value = "Book">
		</form>
	</div>
	<h1 id = "ah1"></h1>
	<div id = "selectTime">
		<div class = "slot" id = "9:00 A.M."><p>9:00 A.M. to 11:00 A.M.</p></div>
		<div class = "slot" id = "11:00 A.M."><p>11:00 A.M. to 1:00 P.M.</p></div>
		<div class = "slot" id = "1:00 P.M."><p>1:00 P.M. to 3:00 P.M.</p></div>
		<div class = "slot" id = "3:00 P.M."><p>3:00 P.M. to 5:00 P.M.</p></div>
		<div class = "slot" id = "5:00 P.M."><p>5:00 P.M. to 7:00 P.M.</p></div>
	</div>
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="dcalendar.picker.js"></script>
	<script>
		var timeslots = document.getElementById("selectTime");
		var slot = timeslots.children;
		for(var i = 0; i < slot.length; i++) {
			slot[i].addEventListener("click", function(e) {
				var x = window.getComputedStyle(e.target.parentElement, null).getPropertyValue('background-color');  
				if(x == "rgb(125, 255, 79)") {
					document.getElementById("slot2hrs").value = e.target.innerText;
				}
				else alert("Please choose an available time slot")
			});
		}
		var dateselect = document.getElementById("demo");
		dateselect.onfocus = function() {timeslots.style.display = "none"};
		dateselect.onblur = function() {timeslots.style.display = "initial"};
		$('#demo').dcalendarpicker();
		
		function showTimetable(str) {	
		var month_date_year = str.split('/');
		var correctDate = month_date_year[1] + "/" + month_date_year[0] + "/" + month_date_year[2];
		document.getElementById("demo").value = correctDate;
		document.getElementById("slot2hrs").value = "";
		document.getElementById("slot2hrs").placeholder = "Select time slot from below";
		if (str == "") {
			document.getElementById("ah1").innerHTML = "";
			return;
		} else { 
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var dates = JSON.parse(this.responseText);
						timeslots.style.display = "initial";
						for(var i = 0; i < slot.length; i++) {
							if(dates && slot[i].id == dates['start_time']) {
								slot[i].style.backgroundColor = "red";
								slot[i].style.cursor = "initial";
							}
							else {
								slot[i].style.backgroundColor = "rgb(125, 255, 79)";
								slot[i].style.cursor = "pointer";
							}
						}
					}
				};
				xmlhttp.open("GET","find.php?q=" + correctDate,true);
				xmlhttp.send();
			}
		}
		var form = document.getElementById("date_time_form");
		form.onsubmit = function(e) {
			e.preventDefault();
			if(document.getElementById("demo").value == "") {
				alert("Please select date first");
			} 
			else if(document.getElementById("slot2hrs").value == "") {
				alert("Please select time first");
			}
			else form.submit();
		}
	</script>
</body>
</html>
