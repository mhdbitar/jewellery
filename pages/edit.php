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

	<?php
        if (isset($_POST["submit"]))
        {
          $name = $_POST['name'];
          $description = $_POST['description'];
          $brand = $_POST['brand'];
           
          $sql = "UPDATE product SET name = '".$name."', description = '".$description."' , brand = '".$brand."' WHERE id = " . $_GET['id'];
          mysqli_query($connection, $sql);

          header('location: manage.php');
        }
    ?>

	<div class="container">
		<h2>Edit Product</h2>
		  <form action="edit.php?id=<?= $_GET['id'] ?>" method="post">
		  	<?php
				$sql = "SELECT * FROM product WHERE id = " . $_GET['id'];
				$result = mysqli_query($connection, $sql);
				$name = "";
				$description = "";
				$brand = "";

				while ($row = mysqli_fetch_assoc($result)) { 
					$name = $row['name'];
					$brand = $row['brand'];
					$description = $row['description'];
				}
			?>
		    <div class="row">
		      <div class="col-25">
		        <label for="name">Product Name</label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="name" name="name" placeholder="Your product name.." value="<?= $name ?>">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="brand">Product Brand</label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="brand" name="brand" placeholder="Your product brand.." value="<?= $brand ?>">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="description">Product Description</label>
		      </div>
		      <div class="col-75">
		        <textarea id="description" name="description" placeholder="Enter product description.." value="<?= $description ?>" style="height:200px"><?= $description ?></textarea>
		      </div>
		    </div>
		    <br>
		    <div class="row">
		      <input type="submit" name="submit" value="Edit">
		    </div>
		  </form>
		</div>
</body>
</html>