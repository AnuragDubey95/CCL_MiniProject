<?php
//connect database
include("../dbconn.php");

//start session
session_start();

if(!isset($_SESSION['a_mob']))
{
	echo "<script>location.href='alogin.php'</script>";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Voting</title>
		<meta name="description" content="This website is use for voting">
		<meta name="keyword" content="online,voting">
		<meta name="author" content="">
	</head>
	
	<body bgcolor="#b7d7e8">
	
	<h1 align ="center" ><font size="10">ONLINE VOTING SYSTEM</font></h1>
		<h3 align ="center" >(Welcome to Admin dashboard)</h3>
		<nav>
			<a href="../logout.php" style="background-color: rgb(2,2,2); color: white; border-radius: 10px; padding: 15px 20px; text-decoration: none;"><b>LOGOUT</b></a>
		</nav>
		<hr><br><br><br>
	
	<table bgcolor="#daebe8" border="1" align="center" cellpadding="4" width="60%">
		<tr bgcolor="#667292" align="center">
			<td colspan ="2" align="center"><b><h3><font color="white" size="5">IMPORTANT LINKS</font></h3></b></td>
		</tr>
		
		<tr align="center">
			<td>Add new topic to voting:</td>
			<td><a href="addtopic.php">Click here</a></td>
		</tr>
		
		
		<tr align="center">
			<td>View result:</td>
			<td><a href="result.php">Click here</a></td>
		</tr>
	</table>
	
	
	</body>
</html>