<?php

//connect to sql
$con = mysqli_connect("localhost","root","","test");

//getting the categories/genres 
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
//get author
function getAuthors()
{
	global $con;
	
	$get_authors = "select * from authors";
	
	//run sql query
	$run_authors = mysqli_query($con, $get_authors);
	
	//fetch query and save to row_cats variable 
	while ($row_authors = mysqli_fetch_array($run_authors))
	{
		//row_gen gets the data from table and stores it in variable
		$author_id = $row_authors['author_id'];
		$author_firstName = $row_authors['author_firstName'];
		$author_lastName = $row_authors['author_lastName']
	// dynamic link
	echo "<li><a href='#'>$author_lastName</a></li>";
	}
}
?>