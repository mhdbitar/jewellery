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
          $number = $_POST['number'];
          $message = $_POST['message'];

          $txt = "Customer name : " . $name . "/n Product : " . $_GET['id'] ."/nQuanitity" . $number . "/nMessage: " . $message;
		  file_put_contents("../files/".$name.".txt", $txt);

          header('location: ../index.php');
        }
    ?>

	<div class="container">
		<h2>Order Product</h2>
		  <form action="order.php?id=<?= $_GET['id'] ?>" method="post">
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
		        <label for="number">Quantity</label>
		      </div>
		      <div class="col-75">
		        <input type="number" id="number" name="number" placeholder="Your quantity..">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25">
		        <label for="message">Message</label>
		      </div>
		      <div class="col-75">
		        <textarea id="message" name="message" placeholder="Enter message.." style="height:200px"></textarea>
		      </div>
		    </div>
		    <br>
		    <div class="row">
		      <input type="submit" name="submit" value="Send Order">
		    </div>
		  </form>
		</div>
</body>
</html>