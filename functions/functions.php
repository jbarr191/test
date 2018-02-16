<?php

//fill the third parameter with whatever database server you're working on,
//or leave it blank if working on localhost
$con = mysqli_connect("localhost","root","","onlinebookstore");

//function getAccount($email, $password){

	//global $con;

	//$get_acc() = "select * from account";

	//$run_acc() = mysqli_query($con, $get_acc);
//}
function getGens()
{
	global $con;

	$get_gens = "select * from genres";

	//run sql query
	$run_gens = mysqli_query($con, $get_gens);

	//fetch query and save to row_cats variable
	while ($row_gens = mysqli_fetch_array($run_gens))
	{
		//row_gen gets the data from table and stores it in variable
		$gen_id = $row_gens['gen_id'];
		$gen_type = $row_gens['gen_type'];
	// dynamic link
	echo "<li><a href='#'>$gen_type</a></li>";
	}
}

function getPro(){
	
	global $con;
	
	// query
	$get_pro = "select * from products order by RAND() LIMIT 0,6";
	
	// run query on the connection
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
		
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
					
					<img src='admin_area/product_images/$pro_image' width='180' height='277' />
					
					<p><b> Price: $ $pro_price  </b></p>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
					
								
				</div>			
		";	
	}
}

?>