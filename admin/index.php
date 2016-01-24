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
	<link rel="stylesheet" href="design.css" type="text/css" />
</head>

<body>
	<table border="1">
		<tr>
			<td><a href="index.php">Admin Index</a></td>
			<td><a href="edit_pro.php">Edit Profile</a></td>
			<td><a href="add_sub.php">Add Subjects</a></td>
			<td><a href="view_sub.php">View Subjects</a></td>
		</tr>
	</table>

			<p>Welcome, <?php echo $row["Admin_Name"]?>



			<input type="submit" name="logoutbtn" value="Logout" onclick="window.location='logout.php';"/></p>

</body>
</html>
