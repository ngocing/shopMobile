<?php
	session_start();
	$conn = @mysqli_connect("localhost","root","","hahadatabase");
	mysqli_query($conn,'SET NAMES UTF8');
?>