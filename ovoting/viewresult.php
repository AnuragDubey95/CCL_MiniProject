<?php
//connect database
include("dbconn.php");

//start session
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Voting</title>
		<meta name="description" content="This website is use for voting">
		<meta name="keyword" content="online,voting">
		<meta name="author" content="">
	</head>

	<body bgcolor="#b5e7a0">
	<h1 align ="center" ><font size="10" >ONLINE VOTING SYSTEM</font></h1>
	<nav>
		<a href="admin/alogin.php">ADMIN LOGIN</a> || <a href="index.php">HOME PAGE</a>
	</nav><hr>
  <br><br>

<table  bgcolor="#e3eaa7" align="center" border="1" cellpadding="5">
	
	<tr bgcolor="#86af49">
		<td colspan="7" align="center"><h3><b><font color="white" size="5">RESULTS LIST</font><b></h3></td>
	</tr>
	
	<tr bgcolor="#86af49">
		<th>Topic id</th>
		<th>Topic discription</th>
		<th>Option 1</th>
		<th>Option 2</th>
		<th>Option 3</th>
		<th>Option 4</th>
		<th>Winner (No of vote)</th>
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
	
	$j=0;
	if(mysqli_num_rows($run1)>0)
	{
		while($row1=mysqli_fetch_assoc($run1))
		{
			if($j==0){
				$j=1;
				continue;
			}
			$nop=max($row1['nop1'],$row1['nop2'],$row1['nop3'],$row1['nop4']);
			if($row1['nop1']==$nop)
				$x=$row1['op1']." (".$row1['nop1'].")";
			elseif($row1['nop2']==$nop)
				$x=$row1['op2']." (".$row1['nop2'].")";
			elseif($row1['nop3']==$nop)
				$x=$row1['op3']." (".$row1['nop3'].")";
			elseif($row1['nop4']==$nop)
				$x=$row1['op4']." (".$row1['nop4'].")";
			?>
			<tr align="center">
				<td><?php echo $row1['t_id'];?></td>
				<td><?php echo $row1['t_disc'];?></td>
				<td><?php echo $row1['op1']."(".$row1['nop1'].")";?></td>
				<td><?php echo $row1['op2']."(".$row1['nop2'].")";?></td>
				<td><?php echo $row1['op3']."(".$row1['nop3'].")";?></td>
				<td><?php echo $row1['op4']."(".$row1['nop4'].")";?></td>
				<td><font size='5'><b><?php echo $x;?></b></font></td>
			</tr>
	<?php }}?>

</table>

<br><br><br>

  </body>
</html>