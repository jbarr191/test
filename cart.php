<!DOCTYPE>
<?php

session_start();

include("functions/functions.php");

?>

<html>
	<head>
		<title>My Online  Shop</title>

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

						Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?>
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

					<form action="" method="post" enctype="multipart/form-data">
				
						<table align="center" width="700" bgcolor="skyblue">
						
							<tr align="center">
								<th>Remove</th>
								<th>Product(s)</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							
							<?php
							$total = 0;
	
							$ip = getIp();
	
							// query the db to retrieve all items that belong to an ip
							$sel_price = "select * from cart where ip_add='$ip'";
	
							// run the above query
							$run_price = mysqli_query($con, $sel_price);
	
							// while there's additional rows to fetch from the query results
							while($p_price=mysqli_fetch_array($run_price)){
		
								// get the product id from the cart
								$pro_id = $p_price['p_id'];
		
								// retrieve the product with the matching id from products table
								$pro_price = "select * from products where product_id = '$pro_id'";
		
								// run the above query
								$run_pro_price = mysqli_query($con, $pro_price);
		
								// while there's additional rows to fetch from the query results
								while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
									// store the details of each item
									$product_price = array($pp_price['product_price']);
									
									$product_title = $pp_price['product_title'];
									
									$product_image = $pp_price['product_image'];
									
									$single_price = $pp_price['product_price'];
									
									$values = array_sum($product_price);
									
									$total += $values;
							
							?>
							
							<tr align="center">
								<td><input = type="checkbox" name="remove[]"/></td>
								<td><?php echo $product_title; ?><br>
								<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
								</td>
								<td><input type="text" size="4" name="qty" /></td>
								<td><?php echo "$" . $single_price; ?></td>
							</tr>
										
						<?php      } 
							    }  // close brackets of above while loops 
						?>
						
							<tr align="right">
								<td colspan="4"><b>Sub Total:</b></td>
								<td><?php echo "$" . $total;?></td>
							</tr>
					
						</table>
				
					</form>

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
