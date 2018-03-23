<!DOCTYPE>
<?php

session_start();

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

				<form action="customer_login.php" method="post" enctype="multipart/form-data">

					<table align="center" width="450">

						<tr align="center">
							<td colspan="6"><h2>Log In</h2></td>
						</tr>
						<tr>
							<td align="right"><b>Customer Email: </b></td>
							<td><input type="text" name="c_email" /></td>
						</tr>
						<tr>
							<td align="right"><b>Password: </b></td>
							<td><input type="password" name="c_pass" /></td>
						</tr>
						<tr align="center">
							<td colspan="6"><input type="submit" name="login" value="Sign In" /></td>
						</tr>



					</table>

					<div style="float:left">
						Forgot your password? <a href="customer_login?forgot_pass">Click Here</a>
					</div><br>
					<div style="float:left">
						Don't have an account? <a href="customer_register.php">Join us </a>
					</div>

				</form>

				<?php

				if (isset($_POST['login'])){

					$email = $_POST['c_email'];
					$pass = $_POST['c_pass'];
					$sel_customer = "select * from accounts where password = '$pass' AND email = '$email'";

					$run = mysqli_query($con, $sel_customer);

					$check_customer = mysqli_num_rows($run);

					if($check_customer == 0) {

						echo "<script>alert('Password or email is incorrect')</script>";
					} else {

						$_SESSION['customer_email']=$email;
						echo "<script>window.open('index.php','_self')</script>";
					}
				}

				?>

			</div>

		</div>
		<!--content_wrapper ends here-->

		<div id="footer">footer</div>

	</div>
	<!--Main Container ends here-->

</body>
</html>
