<?php
//connect database
include("../dbconn.php");

//start session
session_start();

if(!isset($_SESSION['a_mob']))
{
	echo "<script>location.href='alogin.php'</script>";
}
if(isset($_POST['t_disc']))
{
$t_disc=$_POST['t_disc'];
$op1=$_POST['op1'];
$op2=$_POST['op2'];
$op3=$_POST['op3'];
$op4=$_POST['op4'];


//qry for insert data
	$qry1="INSERT INTO topic(t_disc,op1,op2,op3,op4) 
			VALUES ('$t_disc','$op1','$op2','$op3','$op4')";
	if(mysqli_query($conn,$qry1))
	{
		echo "<script type='text/javascript'> alert('your data has been successfully submited.')</script>";
		echo "<script> location.href='admin.php' </script>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('error occur please reload page')</script>";
	}
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
			<a href="../logout.php"><b>LOGOUT</b></a> | <a href="admin.php"><b>BACK</b></a>
		</nav>
		<hr><br><br><br>

	<form action="" method="POST">
	<table bgcolor="#daebe8" align="center" border="1" CELLPADDING="5">
	
		<tr bgcolor="#667292">
			<td colspan="2" align="center" align="center"><b><font color="white">PLEASE FILL THIS FORM TO ADD TOPIC</font></b></td>
		</tr>
	
		<tr>
			<td><b>Enter topic discription:</b></td>
			<td><input type="text" name="t_disc" size="50" placeholder="Enter topic discription" required></td>
		<tr>
		
		<tr>
			<td><b>Enter first option:</b></td>
			<td><input type="text" name="op1" maxlength="50" size="50" placeholder="Enter your first option" required></td>
		</tr>
		<tr>
			<td><b>Enter second option:</b></td>
			<td><input type="text" name="op2" maxlength="50" size="50" placeholder="Enter your second option" required></td>
		</tr>
		<tr>
			<td><b>Enter third option:</b></td>
			<td><input type="text" name="op3" maxlength="50" size="50" placeholder="Enter your third option" required></td>
		</tr>		
		<tr>
			<td><b>Enter fourth option:</b></td>
			<td><input type="text" name="op4" maxlength="50" size="50" placeholder="Enter your four option" required></td>
		</tr>		
		<tr>
			<td colspan="2" align="center"><input type="submit" value="SUBMIT" name="submit"><br><br></td>
		</tr>
		
	</table>
	</form>
		
	</body>
</html>