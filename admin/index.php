<?php
	include("../dataconn.php");

	$sess_aid=$_SESSION["aid"];

	$result = mysql_query("select * from admin where Admin_ID = $sess_aid");
	$row = mysql_fetch_assoc($result);

   if (!$sess_aid) {
		header('Location: login.php');
		exit();
	}

?>

<!DOCTYPE html>
<html>
	<head>
	<title>Admin index</title>
	<link rel="stylesheet" href="../design.css" type="text/css" />
</head>

<body id="backcolor">
<div id="header2" style="margin-left:auto;margin-right:auto;width:1520px;">
			<a href="index.php"><img src="../picture/logo.png" width="205" height="73"></a>

	<nav>
	<ul>
			<li><a href="index.php">Admin Index</a></li>
			<li><a href="edit_pro.php">Edit Profile</a></li>
			<li><a href="add_sub.php">Add Subjects</a></li>
			<li><a href="view_sub.php">View Subjects</a></li>
	</ul>
	</nav>
	<span style="text-align:right;float:right;color:#FFFFFF;margin-top:-10px;font-size:25px;" >
			<p style="margin-right:20px;">Welcome, <?php echo $row["Admin_Name"]?>
			||<a href="register.php"> Register</a> 
			<input type="submit" name="logoutbtn" value="Logout" onclick="window.location='logout.php';"/></p>
</div>

</body>
</html>
