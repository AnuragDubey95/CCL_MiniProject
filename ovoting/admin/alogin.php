<?php 
//include database
include("../dbconn.php");

//start session
session_start();

if(isset($_POST['a_mob']))
{
//store in distinct variable
$a_mob=$_POST['a_mob'];
$a_pass=$_POST['a_pass'];


//check admin is exist or not (query part)
$sql="SELECT a_mob , a_pass FROM admin WHERE a_mob='$a_mob' AND a_pass='$a_pass'";
$run=mysqli_query($conn,$sql);

//if we get any row then we become loggin 
if(mysqli_num_rows($run)>0)
	{
	 $_SESSION['a_mob']=$_POST['a_mob'];
	 $_SESSION['a_pass']=$_POST['a_pass'];
	 echo "<script> location.href='admin.php' </script>";
	}
else{
	echo "<script type='text/javascript'> alert('Login id $a_mob or password $a_pass does not exist')</script>";
	}
}
else if(isset($_SESSION['a_mob']))
	echo "<script> location.href='admin.php' </script>";


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online service managment system</title>
		<meta name="description" content="This website is use for giving service">
		<meta name="keyword" content="online,service,managment,system">
		<meta name="author" content="">
	</head>

	<body bgcolor="#b7d7e8">
		<h1 align ="center" ><font size="10">ONLINE VOTING SYSTEM</font></h1>
		<h3 align ="center" >(Welcome to admin login pannel)</h3>
		<nav>
			<a href="../index.php"><b>BACK</b></a>
		</nav>
		<hr><br><br><br><br><br>
	
	<form action="" method="POST">
	<table bgcolor="#daebe8" align="center" border="1" CELLPADDING="5">
	
		<tr bgcolor="#667292">
			<td colspan="2" align="center" align="center"><h3 ><b><font color="white">ADMIN LOGIN PANNEL</font><b></h3></td>
		</tr>
	
		<tr>
			<td><b>Login id:</b></td>
			<td><input type="text" name="a_mob" size="50" placeholder="Enter your login id" required></td>
		<tr>
		
		<tr>
			<td><b>Password</b></td>
			<td><input type="password" name="a_pass" size="50" placeholder="Enter your password" required></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center" ><input type="submit" value="LOGIN" name="submit" alt="Login"><br><br></td>
		</tr>
		
	</table>
	</form>
	
	
		
	
</body>
</html>