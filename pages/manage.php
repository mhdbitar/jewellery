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
	  <li><a class="active" href="manage.php">Manage</a></li>
	</ul>

	<a href="addProduct.php">Add Products</a>
	<a href="addCategory.php">Add Categories</a>
	<hr>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Brand</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT * FROM product";
			$result = mysqli_query($connection, $sql);
			
			while ($row = mysqli_fetch_assoc($result)) { ?> 
				<tr>
					<td><?= $row['id'] ?></td>
					<td><?= $row['name'] ?></td>
					<td><img src="../img/<?= $row['image'] ?>" width="100"></td>
					<td><?= $row['brand'] ?></td>
					<td><?= $row['description'] ?></td>
					<td>
						<a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
						<a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
					</td>
				</tr>
			<?php }
		?>

		</tbody>
	</table>
</body>
</html>