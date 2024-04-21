<?php 
//include database
include("dbconn.php");

//start session
session_start();

//query for fetch topic information
$qry1="SELECT * FROM topic ORDER BY t_id DESC LIMIT 1";
$run1=mysqli_query($conn,$qry1);
if($run1)
{	
	$row1=mysqli_fetch_assoc($run1);
}
else
{
	echo "<script type='text/javascript'> alert('Error occur in fetch topic information')</script>";
	echo "<script> location.href='index.php' </script>";
}



//insert data into visitor table
if(isset($_POST['v_mob']))
{
//store in distinct variable
$v_mob=$_POST['v_mob'];
$t_id=$row1['t_id'];
$vf_name=$_POST['vf_name'];
$vl_name=$_POST['vl_name'];
$op=$_POST['op'];

//check visitor mob no is exist or not in our database 
$qry4="SELECT v_mob,t_id FROM visitor WHERE v_mob='$_POST[v_mob]' AND t_id='$t_id'";
$run4=mysqli_query($conn,$qry4);
if(!$run4)
{
		echo "<script type='text/javascript'> alert('Error occur in check existed mobile number')</script>";
		echo "<script> location.href='index.php' </script>";
}
$row4=mysqli_fetch_assoc($run4);
if($row4>0)
{
	echo "<script type='text/javascript'>alert('You have already voted')</script>";
	echo "<script> location.href='index.php' </script>";
}
else
{

//query for insert information of visitor 
$qry2="INSERT INTO visitor(v_mob,t_id,vf_name,vl_name,op) VALUES('$v_mob','$t_id','$vf_name','$vl_name','$op')";
$run2=mysqli_query($conn,$qry2);
if(!$run2)
	{	
		echo "<script type='text/javascript'> alert('Error occur in insert visitor information')</script>";
		echo "<script> location.href='index.php' </script>";
	}
else 
	{	switch($op)
		{
			case $row1['op1'] : $nop1= $row1['nop1']+1;
								$qry3="UPDATE topic SET nop1='$nop1' WHERE t_id='$t_id'";
								$run3=mysqli_query($conn,$qry3);
								//1981516
								if(!$run3)
								{	
									echo "<script type='text/javascript'> alert('Error occur in updating top1 value')</script>";
									echo "<script> location.href='index.php' </script>";
								}	
								break;
			case $row1['op2'] : $nop2= $row1['nop2']+1;
								$qry3="UPDATE topic SET nop2='$nop2' WHERE t_id='$t_id'";
								$run3=mysqli_query($conn,$qry3);
								if(!$run3)
								{	
									echo "<script type='text/javascript'> alert('Error occur in updating top2 value')</script>";
									echo "<script> location.href='index.php' </script>";
								}	
								break;
			case $row1['op3'] : $nop3= $row1['nop3']+1;
								$qry3="UPDATE topic SET nop3='$nop3' WHERE t_id='$t_id'";
								$run3=mysqli_query($conn,$qry3);
								if(!$run3)
								{	
									echo "<script type='text/javascript'> alert('Error occur in updating top3 value')</script>";//161815105320
									echo "<script> location.href='index.php' </script>";
								}	
								break;
			case $row1['op4'] : $nop4= $row1['nop4']+1;
								$qry3="UPDATE topic SET nop4='$nop4' WHERE t_id='$t_id'";
								$run3=mysqli_query($conn,$qry3);
								if(!$run3)
								{	
									echo "<script type='text/javascript'> alert('Error occur in updating top4 value')</script>";
									echo "<script> location.href='index.php' </script>";
								}	
								break;
		}
		echo "<script type='text/javascript'> alert('You has been sucessfully voted.')</script>";
								
	}
}	
}
else 	
	{ 
		if(isset($_SESSION['a_mob']))
		
	echo "<script> location.href='admin/admin.php' </script>";
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

	<body bgcolor="#b5e7a0">
	<h1 align ="center" ><font size="10" >ONLINE VOTING SYSTEM</font></h1>
		
	<form action="" method="POST">
	<table bgcolor="#e3eaa7" align="center" border="1" cellpadding="5">
	
		<tr bgcolor="#86af49">
		<td colspan="4" align="center"><h4><b><font size="5" color="white"><?php echo $row1['t_disc'];?></font><b></h4></td>
		</tr>
	
		<tr bgcolor="#86af49">
		<td><b>(a). <?php echo $row1['op1'];?></b></td>
		<td><b>(b). <?php echo $row1['op2'];?></b></td>
		<td><b>(c). <?php echo $row1['op3'];?></b></td>
		<td><b>(d). <?php echo $row1['op4'];?></b></td>
		<tr>
		
		<tr>
		<td><b>First Name:</b></td>
		<td colspan="3"><input type="text" name="vf_name" maxlength="50" size="50" placeholder="Enter your first name" pattern="[A-Za-z]+" required></td>
		</tr>
		
		<tr>
		<td><b>Last Name:</b></td>
		<td colspan="3"><input type="text" name="vl_name" maxlength="50" size="50" placeholder="Enter your last name" pattern="[A-Za-z]+"required></td>
		</tr>
		
		<tr>
		<td><b>Mobile number:</b></td>
		<td colspan="3"><input type="mobile" name="v_mob" size="50" placeholder="Enter your mobile number" pattern="[0-9 +]{9,12}" required></td>
		</tr>
		
		<tr>
				<td><b>Choose Option</b></td>
				<td colspan="3">
					<select name="op" id="op" required>
						<option value="">None</option>
						<option value="<?php echo $row1['op1'];?>"><?php echo $row1['op1'];?></option>
						<option value="<?php echo $row1['op2'];?>"><?php echo $row1['op2'];?></option>
						<option value="<?php echo $row1['op3'];?>"><?php echo $row1['op3'];?></option>
						<option value="<?php echo $row1['op4'];?>"><?php echo $row1['op4'];?></option>
					</select>
				</td>
		</tr>
		
		<tr>
		<td colspan="4" align="center"><input type="submit" style="background-color: rgb(134,175,73); color: white; border-radius: 10px; padding: 10px 20px; text-decoration: none;" name="submit" value="SUBMIT"></td>
		</tr>
		
	</table>
	</form>	
	<br>
	<br>

	<nav style="display: flex; justify-content:center; gap:20px;">
		<a href="admin/alogin.php" style="background-color: rgb(2,2,2); color: white; border-radius: 10px; padding: 15px 20px; text-decoration: none;">ADMIN LOGIN</a>     <a href="viewresult.php" style="background-color: rgb(2,2,2); color: white; border-radius: 10px; padding:15px 20px; text-decoration: none;">VIEW RESULTS</a>
	</nav>
	

<br>


</body>
</html>