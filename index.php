<!DOCTYPE html>
<html>
<head>
	<title>Jewellery Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require('pages/config.php'); ?>

	<ul>
	  <li><a class="active" href="index.php">Home</a></li>
	  <li><a href="pages/register.php">Register</a></li>
	  <li><a href="pages/manage.php">Manage</a></li>
	  <li><a href="pages/order.php">Order</a></li>
	</ul>

	<div class="banner">
		<img src="img/main.jpg">
	</div>

	<div class="categories">
		<h2>Categories</h2>
		<?php
			$sql = "SELECT * FROM category";
			$result = mysqli_query($connection, $sql);

			if ($result->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($result)) { ?>
					<div class="cat">
					  <a href="pages/products.php?cat_id=<?= $row['id'] ?>">
						  <img src="img/<?= $row['category_image'] ?>" style="width:100%">
						  <div class="container">
						    <h4><b><?= $row['category_name'] ?></b></h4> 
						  </div>
					  </a>
					</div>
				<?php }
			}
		?>
	</div>
</body>
</html>