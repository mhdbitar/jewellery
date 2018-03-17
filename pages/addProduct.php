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
          $category = $_POST['cat_id'];
           
          $path = "../img/" . basename($_FILES["image"]['name']);
          move_uploaded_file($_FILES['image']["tmp_name"], $path);

          $sql = "INSERT INTO product (cat_id, name, description, brand, image) values('". $category ."', '".$name."', '". $description ."', '". $brand ."', '".$_FILES["image"]['name']."')";
          $result = mysqli_query($connection, $sql);

          if ($result) {
			header('location: manage.php');
          }
        }
    ?>

	<div class="container">
		<h2>Add Product</h2>
		  <form action="addProduct.php" method="post" enctype="multipart/form-data">
		  	<div class="row">
		      <div class="col-25">
		        <label for="name">Product Name</label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="name" name="name" placeholder="Your product name..">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="brand">Product Brand</label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="brand" name="brand" placeholder="Your product brand..">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="category">Product Category</label>
		      </div>
		      <div class="col-75">
		        <select id="category" name="cat_id">
		        	<option value="0">Please Select</option>
					<?php
						$sql = "SELECT * FROM category";
						$result = mysqli_query($connection, $sql);

						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) { ?>
								<option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
							<?php }
						}
					?>
				</select>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="description">Product Description</label>
		      </div>
		      <div class="col-75">
		        <textarea id="description" name="description" placeholder="Enter product description.." style="height:200px"></textarea>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="image">Product Image</label>
		      </div>
		      <div class="col-75">
		        <input type="file" id="image" name="image" placeholder="Your product image..">
		      </div>
		    </div>
		    <br>
		    <div class="row">
		      <input type="submit" name="submit" value="Add">
		    </div>
		  </form>
		</div>
</body>
</html>