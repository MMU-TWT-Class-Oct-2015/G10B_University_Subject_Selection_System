<?php
	include("../dataconn.php");
	$sess_aid=$_SESSION["sid"];
	$result = mysql_query("select * from student where Stu_ID = $sess_aid");
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
	<div id="about-bg">
		<div id="header">
			<div id="logo"><a href="index.php"><img src="https://cloud.githubusercontent.com/assets/16029045/13034158/dc19b4fa-d368-11e5-9d1d-b04c54eb47ed.png" width="320" height="128"></a></div>
			<div id="button">
			
				<label class="button-style"><a href="index.php">Home</a></label>
				<label class="button-style"><a href="cart.php">Add Subject</a></label>
				<label class="button-style"><a href="view_sub.php">View Subject</a></label>
				<label class="button-style">Welcome, <?php echo $row["Student_Name"]?> <a href="logout.php">Logout</a></label>
				<label>&nbsp;</label>
			</div>
		</div>
	</div>
</body>
</html>
