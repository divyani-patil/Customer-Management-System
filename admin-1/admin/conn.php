<?php

$conn =mysqli_connect("localhost","root","","cms");
	if($conn!=true)
	{
		echo "Connection failed.".mysqli_error($conn);
		exit();
	}

?>
