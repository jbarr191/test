<?php

$con = mysqli_connect("localhost", "root", "", "test");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_conect_error();
}

?>
