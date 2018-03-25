<!DOCTYPE>
<?php

include("functions/functions.php");
include("includes/db.php");
?>

<html>
	<head>
		<title>My Online Shop</title>

		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">

		<div class="header_wrapper">

			<img id="logo" src="images/logo.jpg" width="375" height="175" />
			<img id="banner" src="images/banner.jpg" width"800" height="175" />


		</div>

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

	</div>
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
