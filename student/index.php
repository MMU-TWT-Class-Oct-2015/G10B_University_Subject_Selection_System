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
	<div id="header">
		<div id="logo"><a href="index.php"><img src="../picture/logo.png"></a></div>
		<div id="button">
		
			<label class="button-style"><a href="index.php">Home</a></label>
			<label class="button-style"><a href="add_sub.php">Add Subject</a></label>
			<label class="button-style"><a href="view_sub.php">View Subject</a></label>
			<label class="button-style">Welcome, <?php echo $row["Student_Name"]?> <a href="logout.php">Logout</a></label>
			<label>&nbsp;</label>
	
</body>
</html>
