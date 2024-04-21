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
	<nav>
			<a href="../logout.php"><b>LOGOUT</b></a> | <a href="admin.php"><b>BACK</b></a>
	</nav><hr><br><br><br><br><br><br>
		
		
		<table bgcolor="#daebe8" align="center" border="1" cellpadding="5">
	
			<tr bgcolor="#667292">
				<td colspan="10" align="center"><h3><b><font color="white" size="5">RESULTS LIST</font><b></h3></td>
			</tr>
			
			<tr bgcolor="#667292">
				<th>Topic id</th>
				<th>Topic discription</th>
				<th>option 1</th>
				<th>Total vote of op 1</th>
				<th>option 2</th>
				<th>Total vote of op 2</th>
				<th>option 3</th>
				<th>Total vote of op 3</th>
				<th>option 4</th>
				<th>Total vote of op 4</th>
			</tr>
		
			<?php

			//query for fetch topic information
			$qry1="SELECT * FROM topic ORDER BY t_id DESC ";
			$run1=mysqli_query($conn,$qry1);
			if(!$run1)
			{
				echo "<script type='text/javascript'> alert('Error occur in fetch topic information ')</script>";
				echo "<script> location.href='result.php' </script>";
			}
									
			if(mysqli_num_rows($run1)>0)
			{ 
				while($row1=mysqli_fetch_assoc($run1))
				{?>
				<tr align="center">
					<td><?php echo $row1['t_id'];?></td>
					<td><?php echo $row1['t_disc'];?></td>
					<td><?php echo $row1['op1'];?></td>
					<td><b><?php echo $row1['nop1'];?></b></td>
					<td><?php echo $row1['op2'];?></td>
					<td><b><?php echo $row1['nop2'];?></b></td>
					<td><?php echo $row1['op3'];?></td>
					<td><b><?php echo $row1['nop3'];?></b></td>
					<td><?php echo $row1['op4'];?></td>
					<td><b><?php echo $row1['nop4'];?></b></td>
				</tr>
			<?php }}?>
		
	 </table>
	 
	
	<br><br><br>
		
		

	</body>
</html>	