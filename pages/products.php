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
		$sql = "SELECT * FROM category WHERE id = " . $_GET['cat_id'];
		$result = mysqli_query($connection, $sql);
		$name = "";
		$image = "";

		while ($row = mysqli_fetch_assoc($result)) { 
			$name = $row['category_name'];
			$image = $row['category_image'];
		}
	?>

	<div class="banner">
		<h1><?= $name ?></h1>
	</div>

	<div class="categories">
		<h2>Jewellery</h2>
		<?php
			$sql = "SELECT * FROM product WHERE cat_id = " . $_GET['cat_id'];
			$result = mysqli_query($connection, $sql);

			if ($result->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($result)) { ?>
					<div class="cat">
					  <a href="details.php?id=<?= $row['id'] ?>">
						  <img src="../img/<?= $row['image'] ?>" style="width:100%">
						  <div class="container">
						    <h3><b><?= $row['name'] ?></b></h3> 
						  </div>
					  </a>
					</div>
				<?php }
			}
		?>
	</div>
</body>
</html>