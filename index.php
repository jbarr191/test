<!DOCTYPE>
<?php

session_start();

include("functions/functions.php");

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
	      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
	      <a href="#" class="w3-bar-item w3-button">Sci-fi</a>
	      <a href="#" class="w3-bar-item w3-button">Fiction</a>
	      <a href="#" class="w3-bar-item w3-button">Genre 3</a>
	    </div>
	  </div>
	  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact Us</a>
	</nav>

	<!--Main Container starts here-->
	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:250px">

	  <!-- Push down content on small screens -->
	  <div class="w3-hide-large" style="margin-top:83px"></div>

	  <!-- Top header -->
	  <header class="w3-container w3-xlarge">
	    <p class="w3-left" style="padding:8px"><a href="index.php">Home</a></p>
		 <p class="w3-left" style="padding:8px">All Products</p>
		 <?php
		 if (isset($_SESSION['customer_email'])){

			 echo "<p class='w3-left' style='padding:8px'><a href='customer/customer_account.php'>My Account</a></p>";

		 } else {

			 echo "<p class='w3-left' style='padding:8px'><a href='customer_login.php'>Log In</a></p>";
			 echo "<p class='w3-left' style='padding:8px'><a href='customer_register.php'>Register</a></p>";
		 }
		 ?>
		 <p class="w3-left" style="padding:8px"><a href="cart.php">Shopping Cart</a></p>
	    <p class="w3-right">
			 <div id="form" style="line-height: 20px">
	 			<form method="get" action="results.php" enctype="multipart/form-data">
	 				<input type="text" name="user_query" placeholder="Search for stuff" style="width:200" />
	 				<input type="submit" name="search" value="Search" />
	 			</form>
	 		</div>
	      <!--<i class="fa fa-search"></i>-->
	    </p>
	  </header>

	  <!-- Image header -->
	  <div class="w3-display-container w3-container">
	    <img src="/w3images/jeans.jpg" alt="Jeans" style="width:100%">
	    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
	      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
	      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
	      <h1 class="w3-hide-small">COLLECTION 2016</h1>
	      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
	    </div>
	  </div>

	  <div class="w3-container w3-text-grey" id="jeans">
	    <p>8 items</p>
	  </div>

	  <!-- Product grid -->
	  <div class="w3-row w3-grayscale">
	    <div class="w3-col l3 s6">
	      <div class="w3-container">
	        <img src="/w3images/jeans1.jpg" style="width:100%">
	        <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
	      </div>
	      <div class="w3-container">
	        <img src="/w3images/jeans2.jpg" style="width:100%">
	        <p>Mega Ripped Jeans<br><b>$19.99</b></p>
	      </div>
	    </div>

	    <div class="w3-col l3 s6">
	      <div class="w3-container">
	        <div class="w3-display-container">
	          <img src="/w3images/jeans2.jpg" style="width:100%">
	          <span class="w3-tag w3-display-topleft">New</span>
	          <div class="w3-display-middle w3-display-hover">
	            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
	          </div>
	        </div>
	        <p>Mega Ripped Jeans<br><b>$19.99</b></p>
	      </div>
	      <div class="w3-container">
	        <img src="/w3images/jeans3.jpg" style="width:100%">
	        <p>Washed Skinny Jeans<br><b>$20.50</b></p>
	      </div>
	    </div>

	    <div class="w3-col l3 s6">
	      <div class="w3-container">
	        <img src="/w3images/jeans3.jpg" style="width:100%">
	        <p>Washed Skinny Jeans<br><b>$20.50</b></p>
	      </div>
	      <div class="w3-container">
	        <div class="w3-display-container">
	          <img src="/w3images/jeans4.jpg" style="width:100%">
	          <span class="w3-tag w3-display-topleft">Sale</span>
	          <div class="w3-display-middle w3-display-hover">
	            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
	          </div>
	        </div>
	        <p>Vintage Skinny Jeans<br><b class="w3-text-red">$14.99</b></p>
	      </div>
	    </div>

	    <div class="w3-col l3 s6">
	      <div class="w3-container">
	        <img src="/w3images/jeans4.jpg" style="width:100%">
	        <p>Vintage Skinny Jeans<br><b>$14.99</b></p>
	      </div>
	      <div class="w3-container">
	        <img src="/w3images/jeans1.jpg" style="width:100%">
	        <p>Ripped Skinny Jeans<br><b>$24.99</b></p>
	      </div>
	    </div>
	  </div>
<!--
	<div class="main_wrapper">

	<div class="menubar">


		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search for stuff" />
				<input type="submit" name="search" value="Search" />
			</form>
		</div>

	</div>
-->
		<!--content_wrapper starts here-->
<!--
		<div class="content_wrapper">

			<div id ="sidebar">

				<div id="sidebar_title">Genres</div>

				<ul id="gens">

					<?php getGens(); ?>

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
					Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>

					<?php
					if (!isset($_SESSION['customer_email'])){

						echo "<a href='customer_login.php' style='color:orange'>Login</a>";

					} else {

						echo "<a href='customer_logout.php' style='color:orange'>Logout</a>";
					}

					?>
					</span>

				</div>

				<div id="products_box">

					<?php getPro(); ?>

				</div>

			</div>

		</div>
-->
		<!--content_wrapper ends here-->


		<footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">

			  <div class="w3-black w3-center w3-padding-24">&copy; 2018 by Software Engineering TEAM 1</div>
		</footer>
	</div>

	<!--Main Container ends here-->

</body>
</html>
