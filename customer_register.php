<!DOCTYPE>
<?php

include("functions/functions.php");
include("includes/db.php");
?>

<html>
	<head>
		<title>My Online Shop</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--<link rel="stylesheet" href="styles/style.css" media="all" />-->
		<style>
			.w3-sidebar a {font-family: "Roboto", sans-serif}
			body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
		</style>
	</head>
	<body class="w3-content" style="max-width:1200px">

		<!-- Sidebar/menu -->
		<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
		  <div class="w3-container w3-display-container w3-padding-16">
		    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
			 <a href="index.php">
			 	<img id="logo" src="images/logo.jpg" width="240" height="120" />
			</a>
		  </div>
		  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
		    <a href="#" class="w3-bar-item w3-button">Best-Sellers</a>
		    <a href="#" class="w3-bar-item w3-button">Top-Rated</a>
		    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
		      Genres <i class="fa fa-caret-down"></i>
		    </a>
		    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
		      <a href="#" class="w3-bar-item w3-button">Sci-fi</a>
		      <a href="#" class="w3-bar-item w3-button">Fiction</a>
		      <a href="#" class="w3-bar-item w3-button">Genre 3</a>
		    </div>
		  </div>
		  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact Us</a>
		</nav>

	<div class="menubar">

		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php">All Products</a></li>
			<?php
			if (isset($_SESSION['customer_email'])){

				echo "<li><a href='customer/customer_account.php'>My Account</a></li>";

			} else {

				echo "<li><a href='customer_login.php'>Log In</a></li>";
				echo "<li><a href='customer_register.php'>Register</a></li>";
			}
			?>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="">Contact Us</a></li>
		</ul>

		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search for stuff" />
				<input type="submit" name="search" value="Search" />
			</form>
		</div>

	</div>

		<!--content_wrapper starts here-->
		<div class="content_wrapper">

			<div id="sidebar">sidebar</div>

			<div>

					<form action="customer_register.php" method="post" enctype="multipart/form-data">

						<table align="center" width="750">

							<tr align="center">
								<td colspan="6"><h2>Create an Acount</h2></td>
							</tr>
							<tr>
								<td align="right">First Name: </td>
								<td ><input type="text" name="c_name" /></td>
							</tr>
							<tr>
								<td align="right">Last Name: </td>
								<td ><input type="text" name="c_last" /></td>
							</tr>
							<tr>
								<td align="right">Customer Email: </td>
								<td><input type="text" name="c_email" /></td>
							</tr>
							<tr>
								<td align="right">Username: </td>
								<td ><input type="text" name="c_username" /></td>
							</tr>
							<tr>
								<td align="right">Password: </td>
								<td><input type="password" name="c_pass" /></td>
							</tr>
							<tr>
								<td align="right">Confirm Password: </td>
								<td><input type="password" name="c_cpass" /></td>
							</tr>
							<tr>
								<td align="right">Profile Image: </td>
								<td><input type="file" name="c_image" /></td>
							</tr>
							<tr align="center">
								<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
							</tr>

						</table>

					</form>
			</div>

		</div>
		<!--content_wrapper ends here-->

		<div id="footer">footer</div>

	<!--Main Container ends here-->

	</body>
</html>

<?php
	if (isset($_POST['register'])){

		$isEmail = (boolean) true;
		$isNewEmail = (boolean) true;
		$correctPass = (boolean) true;
		$isNewUsername = (boolean) true;
		$c_name = $_POST['c_name'];
		$c_last = $_POST['c_last'];
		$c_email = strtolower(trim($_POST['c_email']));
		$c_username = $_POST['c_username'];
		$c_pass = $_POST['c_pass'];
		$c_cpass = $_POST['c_cpass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];

		//Checks if the given email is a legitimate email
		if(!(filter_var($c_email, FILTER_VALIDATE_EMAIL))){
			echo "Please enter a valid email.<br>";
			$isEmail = false;
		}

		//Checks if the given email is the same to any other one already registered
		$emailQuery = sprintf("select * from accounts where lower(email)= '%s' ", $c_email);
		$result = mysqli_query($con, $emailQuery);
		$num_rows = mysqli_num_rows($result);

		//Tests if any matches were found when looking for already-registed emails
		if($num_rows > 0)
		{
			echo "That email is already being used.<br>";
			$isNewEmail = false;
		}

		//Checks if the given username is the same to any other one already registered
		$usernameQuery = sprintf("select * from accounts where lower(username)= '%s' ", $c_username);
		$result = mysqli_query($con, $usernameQuery);
		$num_rows = mysqli_num_rows($result);

		//Tests if any matches were found when looking for already-registed username
		if($num_rows > 0)
		{
			echo "That username is already being used.<br>";
			$isNewUsername = false;
		}

		//Checks if the two given passwords are the same
		if($c_pass != $c_cpass){
			echo "Passwords do not match.<br>";
			$correctPass = false;
		}

		//checks if the password is of the correct length
		if((strlen($c_pass) < 8) || (strlen($c_pass) > 16) ){
			echo "Password must be between 8 and 16 characters long.<br>";
			$correctPass = false;
		}

		//checks if the password is strong
		if((!preg_match("#[0-9]+#", $c_pass)) || (!preg_match("#[a-z]+#", $c_pass)) || (!preg_match("#[A-Z]+#", $c_pass))){
			echo "Password must have a combination of at least one number, and one capital and lower case letter.<br>";
			$correctPass = false;
		}

		//creates a unique ID number for the account
		$id = rand(1,999999);
		$idQuery = sprintf("select * from accounts where lower(id_number)= '%s' ", $id);
		$result = mysqli_query($con, $idQuery);
		$num_rows = mysqli_num_rows($result);

		while($num_rows > 0)
		{
			$id = rand(1,999999);
			$idQuery = sprintf("select * from accounts where lower(id_number)= '%s' ", $id);
			$result = mysqli_query($con, $idQuery);
			$num_rows = mysqli_num_rows($result);
		}

		//Creates an account if all validations go through
		if($isEmail && $isNewEmail && $correctPass && $isNewUsername) {

			move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

			echo $insert_c = "insert into accounts (email, id_number, first_name, last_name, password, user_image, username) values ('$c_email', '$id', '$c_name','$c_last','$c_pass','$c_image', '$c_username')";

			$run_c = mysqli_query($con, $insert_c);

			if($run_c) {
				echo "<script>alert('registration successful')</script>";
			}
		}
	}

 ?>
