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
			
			body {
				font-family: Arial;
				font-size: 17px;
				padding: 8px;
			}

			* {
				box-sizing: border-box;
			}

			.row {
				display: -ms-flexbox; /* IE10 */
				display: flex;
				-ms-flex-wrap: wrap; /* IE10 */
				flex-wrap: wrap;
				margin: 0 -16px;
			}

			.col-25 {
			-ms-flex: 25%; /* IE10 */
			flex: 25%;
			}

			.col-50 {
			-ms-flex: 50%; /* IE10 */
			flex: 50%;
			}

			.col-75 {
			-ms-flex: 75%; /* IE10 */
			flex: 75%;
			}

			.col-25,
			.col-50,
			.col-75 {
				padding: 0 16px;
			}

			.container {
				background-color: #f2f2f2;
				padding: 5px 20px 15px 20px;
				border: 1px solid lightgrey;
				border-radius: 3px;
			}

			#fname, #email, #adr, #city, #state, #zip, #cname, #ccnum, #expmonth, #expyear, #cvv {
				width: 100%;
				margin-bottom: 20px;
				padding: 4px;
				border: 1px solid #ccc;
				border-radius: 3px;
			}

			label {
				margin-bottom: 10px;
				display: block;
			}

			.icon-container {
				margin-bottom: 20px;
				padding: 7px 0;
				font-size: 24px;
			}

			.btn {
				background-color: #4CAF50;
				color: white;
				padding: 12px;
				margin: 10px 0;
				border: none;
				width: 100%;
				border-radius: 3px;
				cursor: pointer;
				font-size: 17px;
			}

			.btn:hover {
				background-color: #45a049;
			}		

			.blue {
				color: #2196F3;
			}

			hr {
				border: 1px solid lightgrey;
			}

			span.price {
				float: right;
				color: grey;
			}

			/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
			@media (max-width: 800px) {
				.row {
					flex-direction: column-reverse;
				}
				.col-25 {
					margin-bottom: 20px;
				}
			}
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
		 <p class="w3-left" style="padding:8px; font-size:20px"><a href="cart.php">Shopping Cart </a><span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php total_items(); ?></b></span></p>
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

	  <div class="w3-row w3-grayscale">
	  
	  <div class="col-25">
	  
		<div class="container">
			<h4>Cart Summary <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php total_items(); ?></b></span></h4>
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
								
								
								// get the quantity from the cart
								$pro_qty = $p_price['qty'];
		
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
									<p><a href="#" class="blue"><?php echo $product_title; ?></a> <span class="price"><?php echo "$" . $single_price; ?></span></p>
						<?php   } 
							}  // close brackets of above while loops 
						?>  
			<hr>
			<p>Total <span class="price" style="color:black"><b><?php echo "$" . $total;?></b></span></p>
		</div>	
	  </div>
	  
	  
	  <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Place Order" class="btn">
      </form>

	  </div>
	  
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
