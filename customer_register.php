<!DOCTYPE>
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
			<li><a href="">All Products</a></li>
			<li><a href="">My Account</a></li>
			<li><a href="customer_login.php">Log In</a></li>
			<li><a href="">Shopping Cart</a></li>
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
								<td ><input type="text" name="c_name" /></td>
							</tr>
							<tr>
								<td align="right">Customer Email: </td>
								<td><input type="text" name="c_email" /></td>
							</tr>
							<tr>
								<td align="right">Password: </td>
								<td><input type="password" name="c_pass" /></td>
							</tr>
							<tr>
								<td align="right">Confirm Password: </td>
								<td><input type="text" name="c_cpass" /></td>
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
