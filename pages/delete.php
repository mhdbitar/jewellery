<?php
	require('config.php');

	$sql = "DELETE FROM product WHERE id = " . $_GET['id'];
	$result = mysqli_query($connection, $sql);

	header('location: manage.php');
?>