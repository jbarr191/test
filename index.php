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
		<div class = "content_wrapper">
		
			<div id ="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="cats">
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Laptops</a></li>
				<ul>
				<div id="sidebar_title">Brands</div>
				
				<ul id="cats">
					<li><a href="#">HP</a></li>
					<li><a href="#">Dell</a></li>
					<li><a href="#">Motorola</a></li>
					<li><a href="#">idk</a></li>
					<li><a href="#">idk</a></li>
					<li><a href="#">idk</a></li>
				<ul>
				
			</div>
			
			<div id="content_area">This is content area</div>
		</div>
		<!--content_wrapper ends here-->


		<div id="footer">footer</div>

	</div>
	<!--Main Container ends here-->

</body>
</html>