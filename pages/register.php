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
	  <li><a class="active" href="register.php">Register</a></li>
	  <li><a href="manage.php">Manage</a></li>
	</ul>

	<?php
        if (isset($_POST["submit"]))
        {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
           
          $sql = "INSERT INTO user (full_name, email, password) values('". $name ."', '".$email."', '". $password ."')";
          $result = mysqli_query($connection, $sql);

          if ($result) {
			header('location: ../index.php');
          }
        }
    ?>

	<div class="container">
		<h2>Register</h2>
		  <form action="register.php" method="post">
		  	<div class="row">
		      <div class="col-25">
		        <label for="name">Full Name</label>
		      </div>
		      <div class="col-75">
		        <input type="text" id="name" name="name" placeholder="Your full name..">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="email">Email</label>
		      </div>
		      <div class="col-75">
		        <input type="email" id="email" name="email" placeholder="Your email..">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="password">Password</label>
		      </div>
		      <div class="col-75">
		        <input type="password" id="password" name="password" placeholder="Your password..">
		      </div>
		    </div>
		    <br>
		    <div class="row">
		      <input type="submit" name="submit" value="Register">
		    </div>
		  </form>
		</div>
</body>
</html>