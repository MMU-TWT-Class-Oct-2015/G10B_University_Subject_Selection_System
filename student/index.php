<?php
	include("../dataconn.php");
	$sess_aid=$_SESSION["sid"];
	$result = mysql_query("select * from student where Student_ID = $sess_aid");
	$row = mysql_fetch_assoc($result);
	if (!$sess_aid) {
	 header('Location: login.php');
	 exit();
 }
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="../design.css" type="text/css" />
</head>

<body>

<div id="header1" style="margin-left:auto;margin-right:auto;width:1600px;">
			<a href="index.php"><img src="../picture/logo.png" width="205" height="73"></a>
			
	<nav>
	<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="edit_pro.php">Add Subject</a></li>
					<li><a href="add_sub.php">About Us</a></li>
					<li><a href="view_sub.php">Contact Us</a></li>
	</ul>
	</nav>

	<span style="text-align:right;float:right;color:#FFFFFF;margin-top:-10px;font-size:25px;" >
	
			<p >Welcome, <?php echo $row["Student_Name"]?> ||
			<a href="#" onclick="window.location='logout.php'"  style="color:black; text-decoration:none;">Logout</a></p>
	</span>
</div>	


			</body>
</html>
