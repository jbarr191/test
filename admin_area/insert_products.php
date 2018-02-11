<!DOCTYPE>	
<?php

include("includes/db.php");

?>
<html>
	<head>
		<title> Inserting Product</title>
	</head>
	
<body bgcolor="skyblue">
	<!-- start of insert form -->
	<form action= "insert_product.php" method = "post" enctype = "multipart/form-data">
		<!-- start table  -->
		<table align ="center" width = "750" border="2" bgcolor="orange">
			<!-- insert into table  -->
			<tr align = "center">
				<td colspan="7"><h2>Insert New Post Here </td>
				
			</tr>
			
			<tr>
				<!-- column 1 -->
				<td align = "right"><b>Book Title:</b></td>
				<!-- column 2 -->
				<td><input type="text" name="Book_title" /></td>
			</tr>
			<tr>
				<td align = "right"><b>Book Author:</b></td>
				<td><input type="text" name="product_title" /></td>
			</tr>
			<tr>
				<td align = "right"><b>Book Description:</b></td>
				<td><input type="text" name="product_title" /></td>
			</tr>
			<tr>
				<td align = "right"><b>Author Biography:</b></td>
				<td><input type="text" name="product_title" /></td>
			</tr>
			<tr>
				<td align = "right"><b>Book Genre:</b></td>
				<td>
					<select name = "book_genre">
						
						<option>Select a Genre</option>
						<!--query to get genres from database -->
						<?php
							//query copied from getGen() in functions.php 
							$get_gens = "select * from genres";
							
							
							$run_gens = mysqli_query($con, $get_gens);
							
						
							while ($row_gens = mysqli_fetch_array($run_gens))
							{
								$gen_id = $row_gens['gen_id'];
								$gen_type = $row_gens['gen_type'];
							
							echo "<option value='$gen_id'>$gen_type</option>";
							}
												
						?>
					</select>
				
				
				</td>
			</tr>
			<tr>
				<td align = "right"><b>Book Publisher:</b></td>
				<td><input type="text" name="product_title" /></td>
			</tr>
			<tr>
				<td align = "right"><b>Book Release Date:</b></td>
				<td><input type="text" name="product_title" /></td>
			</tr>
			<tr>
				<td align = "right"><b>Book Cover:</b></td>
				<td><input type="text" name="product_title" /></td>
			</tr>
			<!--insert button -->
			<tr align="right">
				<td colspan="7"><input type="submit" name="insert_post" value= "Insert Now"/></td>
			</tr>
			
			
			
		
		</table>
	
	</form>









</body>

</html>