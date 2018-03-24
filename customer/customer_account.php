<!DOCTYPE>
<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

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
				<li><a href="../index.php">Home</a></li>
				<li><a href="">All Products</a></li>
				<?php
				if (isset($_SESSION['customer_email'])){

					echo "<li><a href='customer_account.php'>My Account</a></li>";

				} else {

					echo "<li><a href='customer_login.php'>Log In</a></li>";
					echo "<li><a href='customer_register.php'>Register</a></li>";
				}
				?>
				<li><a href="">Shopping Cart</a></li>
				<li><a href="">Contact Us</a></li>
			</ul>

			<div id="form">
				<form method="get" action="../results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search for stuff" />
					<input type="submit" name="search" value="Search" />
				</form>
			</div>

		</div>

		<!--content_wrapper starts here-->
		<div class="content_wrapper">

			<div id="sidebar">

				<div id="sidebar_title"> My Account: </div>

					<ul id="gens">

						<?php
						$user = $_SESSION['customer_email'];
						$get_img = "select * from accounts where email = '$user'";
						$run_img = mysqli_query($con, $get_img);
						$row_img = mysqli_fetch_array($run_img);

						$c_image = $row_img['user_image'];
						$c_name = $row_img['first_name'];

						echo "<p style='text-align:center'><img src='customer_images/$c_image'
						width='150' height='150'/></p>";

						?>

					</ul>

				</div>

				<div id="content_area">

					<?php cart(); ?>

					<div id="shopping_cart">

						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

							<?php
							if (isset($_SESSION['customer_email'])){

								$user = $_SESSION['customer_email'];

								$result = mysqli_query($con,"select first_name from accounts where email = '$user'");
								$row_img = mysqli_fetch_array($result);
								$name = $row_img['first_name'];
								echo "Welcome $name!";

							} else {

								echo "Welcome Guest!";
							}
							?>
							<b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?>
							Total Price: <?php total_price(); ?> <a href="../cart.php" style="color:yellow">Go to Cart</a>

							<?php
							if (!isset($_SESSION['customer_email'])){

								echo "<a href='customer_login.php' style='color:orange'>Login</a>";

							} else {

								echo "<a href='../customer_logout.php' style='color:orange'>Logout</a>";
							}

							?>
						</span>
					</div>

					<div id="products_box">

						<!--Collapsible section of html for changing account details-->
						<button class="collapsible">Change my username</button>
						<div class="collapseContent">
							<br>
							<form action="customer_account.php" method="post" enctype="multipart/form-data">

								<table align="center" width="600">
									<tr>
										<td align="right">New username: </td>
										<td><input type="password" name="c_username" /></td>
									</tr>
									<tr>
										<td align="right">Password: </td>
										<td><input type="password" name="c_upass" /></td>
									</tr>
								</table>

								<input type="submit" name="change_username" value="Submit"/>
								<?php

								if (isset($_POST['change_username'])){

									$user = $_SESSION['customer_email'];
									$c_username = $_POST['c_username'];
									$c_password = $_POST['c_upass'];

									//Checks if the given username is the same to any other one already registered
									$usernameQuery = sprintf("select * from accounts where lower(username)= '%s' ", $c_username);
									$result = mysqli_query($con, $usernameQuery);
									$num_rows = mysqli_num_rows($result);

									//Tests if any matches were found when looking for already-registed username
									if($num_rows > 0)
									{
										echo "<script>alert('That username is already being used')</script>";

									} else {

										//Checks if the given password is correct
										$sel_customer = "select * from accounts where password = '$c_password' AND email = '$user'";
										$run = mysqli_query($con, $sel_customer);
										$check_customer = mysqli_num_rows($run);

										if($check_customer == 0) {

											echo "<script>alert('Password is incorrect; cannot change username')</script>";

										} else {
											//If the username is available and the password is correct, the username change goes through
											$update_c = "update accounts set username='$c_username' where email='$user'";
											$run_c = mysqli_query($con, $update_c);

											if($run_c) {
												echo "<script>alert('Username changed succesfully')</script>";
												echo "<script>window.open('customer_account.php','_self')</script>";
											} else {
												echo "<script>alert('Change was not succesful. Likely to character size')</script>";
											}
										}
									}

								}
								?>

							</form>
							<br>
						</div>

						<button class="collapsible">Change my email</button>
						<div class="collapseContent">
							<br>
							<form action="customer_account.php" method="post" enctype="multipart/form-data">

								<table align="center" width="600">
									<tr>
										<td align="right">New email: </td>
										<td><input type="password" name="c_email" /></td>
									</tr>
									<tr>
										<td align="right">Password: </td>
										<td><input type="password" name="c_epass" /></td>
									</tr>
								</table>

								<input type="submit" name="change_email" value="Submit"/>
								<?php

								if(!(filter_var($c_email, FILTER_VALIDATE_EMAIL))){
									echo "Please enter a valid email.<br>";
									$isEmail = false;
								}

							 	?>


							</form>
							<br>
						</div>

						<button class="collapsible">Change my password</button>
						<div class="collapseContent">
							<br>
							<form action="customer_account.php" method="post" enctype="multipart/form-data">

								<table align="center" width="600">
									<tr>
										<td align="right">Current password: </td>
										<td><input type="password" name="c_pass" /></td>
									</tr>
									<tr>
										<td align="right">New password: </td>
										<td><input type="password" name="c_npass" /></td>
									</tr>
									<tr>
										<td align="right">Confirm new password: </td>
										<td><input type="password" name="c_cnpass" /></td>
									</tr>
								</table>

								<input type="submit" name="change_pass" value="Submit"/>
								<?php

								 ?>

							</form>
							<br>
						</div>

						<button class="collapsible">Change my picture</button>
						<div class="collapseContent">
							<br>
							<form action="customer_account.php" method="post" enctype="multipart/form-data">
								<td align="right">Profile Image: </td>
								<td><input type="file" name="c_image" /></td>
								<input type="submit" name="change_pic" value="Change picture"/>

								<?php
								if (isset($_POST['change_pic'])){

									$user = $_SESSION['customer_email'];
									$c_image = $_FILES['c_image']['name'];
									$c_image_tmp = $_FILES['c_image']['tmp_name'];

									move_uploaded_file($c_image_tmp,"customer_images/$c_image");

									$update_c = "update accounts set user_image='$c_image' where email='$user'";

									$run_c = mysqli_query($con, $update_c);

									if($run_c) {
										echo "<script>alert('Changes done succesfully')</script>";
										echo "<script>window.open('customer_account.php','_self')</script>";
									} else {
										echo "<script>alert('Change was not succesful. Likely to character size')</script>";
									}
								}
								?>
							</form>
							<br>
						</div>
						<!--Collapsible section of html for changing account details ends here-->

						<!--script for collapsible sections of html-->
						<script>
							var coll = document.getElementsByClassName("collapsible");
							var i;

							for (i = 0; i < coll.length; i++) {
								 coll[i].addEventListener("click", function() {
									  this.classList.toggle("active");
									  var collapseContent = this.nextElementSibling;
									  if (collapseContent.style.display === "block") {
											collapseContent.style.display = "none";
									  } else {
											collapseContent.style.display = "block";
									  }
								 });
							}
						</script>
						<!--script ends here-->

					</div>

				</div>
		</div>
		<!--content_wrapper ends here-->

		<div id="footer">footer</div>

	</div>
	<!--Main Container ends here-->

</body>
</html>
