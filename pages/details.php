<!DOCTYPE html>
<html>
<head>
	<title>Jewellery Store</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php require('config.php'); ?>

	<ul>
	  <li><a href="../index.php">Home</a></li>
	  <li><a href="register.php">Register</a></li>
	  <li><a href="manage.php">Manage</a></li>
	</ul>

	<?php
		$sql = "SELECT * FROM product WHERE id = " . $_GET['id'];
		$result = mysqli_query($connection, $sql);
		$name = "";
		$description = "";
		$brand = "";
		$image = "";

		while ($row = mysqli_fetch_assoc($result)) { 
			$name = $row['name'];
			$description = $row['description'];
			$brand = $row['brand'];
			$image = $row['image'];
		}
	?>

	<div class="product-details">
		<img src="../img/<?= $image ?>">
		<h1><?= $name ?></h1>
		<h3><?= $brand ?></h3>
		<p><?= $description ?></p>
		<a href="order.php?id=<?= $row['id'] ?>">Order</a>
	</div>
</body>
</html>