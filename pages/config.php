<?php
	//Start session
	session_start();

	//Create connection
	$connection = mysqli_connect("localhost", "root", "", "jewellery");

	//Check connection
	if (!$connection) {
		die(mysqli_connect_error());
	}
?>
