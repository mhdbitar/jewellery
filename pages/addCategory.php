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
           
          $path = "../img/" . basename($_FILES["image"]['name']);
          move_uploaded_file($_FILES['image']["tmp_name"], $path);

          $sql = "INSERT INTO category (category_name, category_image) values('".$name."', '".$_FILES["image"]['name']."')";
          $result = mysqli_query($connection, $sql);

          if ($result) {
			header('location: manage.php');
          }
        }
    ?>

	<div class="container">
		<h2>Add Category</h2>
		  <form action="addCategory.php" method="post" enctype="multipart/form-data">
		  	<div class="row">
		      <div class="col-25">
		        <label for="name">Category Name</label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="name" name="name" placeholder="Your category name..">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="image">Category Image</label>
		      </div>
		      <div class="col-75">
		        <input type="file" id="image" name="image" placeholder="Your category image..">
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