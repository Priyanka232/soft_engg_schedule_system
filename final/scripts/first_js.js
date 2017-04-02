var new_user_display = document.getElementById("new_user_display");
var existing_user_display = document.getElementById("existing_user_display");
var new_user_form = document.getElementById("new_user_form");
var existing_user_form = document.getElementById("existing_user_form");
var show_status = document.getElementById("show_status");
function display_new_user_form() {
	new_user_form.style.display = "block";
	existing_user_form.style.display = "none";
	show_status.style.display = "none";
}
function display_existing_user_form() {
	new_user_form.style.display = "none";
	existing_user_form.style.display = "block";
	show_status.style.display = "none";
}