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

<div id="header1" style="margin-left:auto;margin-right:auto;width:1333px;">
	<nav>
	<ul>
			<li><a href="index.php">Admin Index</a></li>
			<li><a href="edit_pro.php">Edit Profile</a></li>
			<li><a href="add_sub.php">Add Subjects</a></li>
			<li><a href="view_sub.php">View Subjects</a></li>
	</ul>
	</nav>

	<span style="text-align:right;float:right;color:#FFFFFF;margin-top:-10px;font-size:25px;" >
	
			<p >Welcome, <?php echo $row["Student_Name"]?>
			<input type="submit" name="logoutbtn" value="Logout" onclick="window.location='logout.php';"/></p>
	</span>
</div>	

			

			</body>
</html>
