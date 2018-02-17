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
			
				<?php cart(); ?>
				
				<div id="shopping_cart">
			
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
						Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: 
						<a href="cart.php" style="color:yellow">Go to Cart</a>
					
						</span>
				
				</div>
			
				<?php
				
				if(isset($_GET['pro_id'])){
					$product_id = $_GET['pro_id'];
					
				
				$get_pro = "select * from comments where book_id = '$product_id'";
	
	
				$run_pro = mysqli_query($con, $get_pro);
	
				while($row_pro=mysqli_fetch_array($run_pro)){
		
					$pro_id = $row_pro['book_id'];
					$pro_user = $row_pro['user_email'];
					$pro_text = $row_pro['comment_text'];
					$pro_rating = $row_pro['rating'];
					
		
					echo "
					
				
					<h3>$pro_user</h3>
					
					<h4>$pro_text</h4>
					<h5>Rating: $pro_rating</h5>
								
		";	
	}
				}
?>
				
			
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
