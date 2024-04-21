<?php
//create connection
$conn=mysqli_connect('ccl-votingdb.c5cyke48s8i4.us-east-1.rds.amazonaws.com','admin','cclvoting95','voting');

//check connection
if(!$conn)
	echo "db not sucessfully connected";

?>
