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

		
			<div class = "comment_content">
			
				<?php cart(); ?>
				
				<div id="shopping_cart" style= "float:right";>
			
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
						Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: 
						<a href="cart.php" style="color:yellow">Go to Cart</a>
					
						</span>
				
				</div>
				
				<div id= "comment_insert">
			<?php
					
					if(isset($_GET['pro_id'])){
					$product_id = $_GET['pro_id'];
					echo "<form action= 'comments.php?pro_id=$product_id' method = 'post' enctype = 'multipart/form-data'>
					";
					}
			?>
					<table align ="right"  bgcolor="orange">
			<!-- insert into table  -->			
			<tr>
				<!-- column 1 -->
				<td align = "right"><b>INSERT COMMENT</b></td>
				<!-- column 2 -->
				<td><input type="text" name="comment_text" size="20"/></td>
			</tr>
		
		
			<tr>
				<td align = "right"><b>USER</b></td>
				<td>
					<select name = "customer_name">
						
						<option>Select</option>
					
						<option value='nickname'>Nickname</option>
						
						<option value = 'anonymous'>Anonymous</option>
												
				
					</select>
				
				
				</td>
			</tr>
				<tr>
				<td align = "right"><b>RATING</b></td>
				<td>
					<select name = "rating">
						
						<option>Select</option>
					
						<option value='1'>1</option>
						
						<option value = '2'>2</option>
						
						<option value = '3'>3</option>
						
						<option value = '4'>4</option>
						
						<option value = '5'>5</option>
												
				
					</select>
				
				
				</td>
			</tr>
		
			<!--insert button -->
			<tr align="right">
				<td colspan="7"><input type="submit" name="comment_post" value= "Insert Now"/></td>
			</tr>
			
			
		
			</div>
			
			
			<div id = "comment_text">	
				<ul id="comments">
				
				
				<?php
					
					if(isset($_GET['pro_id'])){
					$product_id = $_GET['pro_id'];
					getComments($product_id);
					}

					
					
		?>
				</ul>
			</div>
			</div>

		<!--content_wrapper ends here-->


	

	</div>
	<!--Main Container ends here-->

</body>
</html>

<?php
					
							//if something is submitted insert using post(), then execute
					
			
					if(isset($_POST['comment_post'])){
		//get text data from fields
					$rating= $_POST['rating'];
					$customer_name= $_POST['customer_name'];
					$comment_text= $_POST['comment_text'];

					if(isset($_GET['pro_id'])){
					$product_id = $_GET['pro_id'];
					}
					
				
					$insert_comments = "insert into comments(book_id, user_email, comment_text,rating) 
											values('$product_id','$customer_name','$comment_text','$rating')";
					$insert_com = mysqli_query($con, $insert_comments);
					if($insert_com)
					{
					echo "<script>alert('Comment has been inserted!')</script>";
					//refresh page to avoid duplicate data
					echo "<script>window.open('comments.php?pro_id=$product_id','_self')</script>";
					}
					}
					
?>