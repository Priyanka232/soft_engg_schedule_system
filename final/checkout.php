<?php
        session_start();
        session_unset();
	echo 'done';
	session_destroy();
	//header("location: first.php");
?>