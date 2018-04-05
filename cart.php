<!DOCTYPE>
<?php

session_start();

include("functions/functions.php");

$con = mysqli_connect("localhost","root","","onlinebookstore");

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

	<!--Main Container starts here-->
	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:250px">

	  <!-- Push down content on small screens -->
	  <div class="w3-hide-large" style="margin-top:83px"></div>

	  <!-- Top header -->
	  <header class="w3-container w3-xlarge">
	    <p class="w3-left" style="padding:8px; font-size:20px"><a href="index.php">Home</a></p>
		 <p class="w3-left" style="padding:8px; font-size:20px">All Products</p>
		 <?php
		 if (isset($_SESSION['customer_email'])){

			 echo "<p class='w3-left' style='padding:8px; font-size:20px'><a href='customer/customer_account.php'>My Account</a></p>";

		 } else {

			 echo "<p class='w3-left' style='padding:8px; font-size:20px'><a href='customer_login.php'>Log In</a></p>";
			 echo "<p class='w3-left' style='padding:8px; font-size:20px'><a href='customer_register.php'>Register</a></p>";
		 }
		 ?>
		 <p class="w3-left" style="padding:8px; font-size:20px"><a href="cart.php">Shopping Cart</a></p>
	    <p class="w3-right">
			 <div id="form" style="line-height:20px; padding-top:24px; float:right">
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
	   
	  </div>

	  <!-- Product grid -->
	  <?php cart(); ?>

	  <div class="w3-row w3-grayscale">
	  
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
							
							global $con;
	
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
					<td><input = type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
					<td><?php echo $product_title; ?><br>
					<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
					</td>
					<td><input type="text" size="4" name="qty"/></td>
					<td><?php echo "$" . $single_price; ?></td>
				</tr>
										
						<?php      } 
							    }  // close brackets of above while loops 
						?>
						
				<tr>
					<td colspan="4" align="right"><b>Sub Total:</b></td>
					<td><?php echo "$" . $total;?></td>
				</tr>
							
				<tr align="center">
					<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
					<td><input type="submit" name="continue" value="Continue Shopping"/></td>
					<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
				</tr>
					
			</table>
				
		</form>	  
		
			<?php

						$ip = getIp();
						
						// if update cart button is clicked
						if(isset($_POST['update_cart'])){
							// delete relevant items from the cart database
							foreach($_POST['remove'] as $remove_id){
								
								$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
								
								$run_delete = mysqli_query($con, $delete_product);
								
								if($run_delete){
									
									echo "<script>window.open('cart.php','_self')</script>";
								}
							}					
						}
						// if continue shopping button is clicked, go to index.php
						if(isset($_POST['continue'])){
							
							echo "<script>window.open('index.php','_self')</script>";					
						}

			?>
					
	  </div>
<!--
	<div class="main_wrapper">

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


		<div class="w3-black w3-center w3-padding-24">&copy; 2018 by Software Engineering TEAM 1</div>
	</div>

	<!--Main Container ends here-->

	<script>
		// Accordion
		function myAccFunc() {
		    var x = document.getElementById("demoAcc");
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		    } else {
		        x.className = x.className.replace(" w3-show", "");
		    }
		}

		// Click on the "Jeans" link on page load to open the accordion for demo purposes
		document.getElementById("myBtn").click();

		// Script to open and close sidebar

		function w3_close() {
		    document.getElementById("mySidebar").style.display = "none";
		    document.getElementById("myOverlay").style.display = "none";
		}

		function w3_open() {
		    document.getElementById("mySidebar").style.display = "block";
		    document.getElementById("myOverlay").style.display = "block";
		}

	</script>

</body>
</html>
