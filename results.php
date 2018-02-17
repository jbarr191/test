<!DOCTYPE>
<?php

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

			<div id ="sidebar">
			
				<div id="sidebar_title">Genres</div>
				
				<ul id="gens">
				
					<?php getGens(); ?>	
					
				</ul>

			</div>	
		
			<div id="content_area">
			
				<div id="shopping_cart">
			
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
						Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: 
						<a href="cart.php" style="color:yellow">Go to Cart</a>
					
						</span>
				
				</div>
			
				<div id="products_box">
				
					<?php
					
					if(isset($_GET['search'])){
						
						$search_query = $_GET['user_query'];
						
						$get_pro = "select * from products where product_title like '%$search_query%'";
						
						$run_pro = mysqli_query($con, $get_pro);
						
						while($row_pro = mysqli_fetch_array($run_pro)){
							
							$pro_id = $row_pro['product_id'];
							$pro_title = $row_pro['product_title'];
							$pro_image = $row_pro['product_image'];
							$pro_author = $row_pro['product_author'];
							$pro_desc= $row_pro['product_desc'];
							$pro_price = $row_pro['product_price'];
							$pro_bio = $row_pro['product_bio'];
							$pro_gen = $row_pro['product_genre'];
							$pro_release = $row_pro['product_release'];
							
							echo "
							<div id='single_product'>
					
							<h3>$pro_title</h3>
					
							<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					
							<p><b> Price: $ $pro_price </b></p>
					
					
							<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
						</div>
		
		
						";
	
						}
					}
							
					?>
				
				</div>
			
			</div>

		</div>
		<!--content_wrapper ends here-->


		<div id="footer">
		
		<h2 style = "text-align:center; padding-top:30px;">&copy; 2018
		by software engineering TEAM 1</h2>
		
		</div>

	</div>
	<!--Main Container ends here-->

</body>
</html>
