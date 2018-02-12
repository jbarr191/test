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
