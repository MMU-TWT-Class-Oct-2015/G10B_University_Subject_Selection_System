<?php
	include("../dataconn.php");

	$sess_aid=$_SESSION["aid"];
	$sub_id=(int)$_GET['pid'];
	$result = mysql_query("select * from subject where Subject_ID = $sub_id");
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




			<input type="submit" name="logoutbtn" value="Logout" onclick="window.location='logout.php';"/></p>

			<form name="editfrm" method="post" action="">
				<p>Subject Code : <input type="text" name="scode" value=" <?php echo $row['Subject_Code'];?> "/>
				<p>Subject Title : <input type="text" name="stitle" value="<?php echo $row['Subject_Title'];?>"/>
				<p>Subject Date : <input type="date" name="sdate" value="<?php echo $row['Subject_Date'];?>"/>
				<p>Subject Time : <input type="time" name="stime" value="<?php echo $row['Subject_Time'];?>"/>
				<p><input type="submit" name="updatebtn" value="Update Now" /></p>
			</form>

</body>
</html>

<?php
	if(isset($_POST["updatebtn"]))
	{
		$code = $_POST["scode"];

		$title = $_POST["stitle"];

		$date = $_POST["sdate"];

		$time = $_POST["stime"];

		mysql_query("update subject set Subject_Code = '$code',Subject_Title = '$title',Subject_Date='$date', Subject_Time='$time' where Subject_ID=$sub_id");
	?>

	<?php
		header("location:index.php");
	}
?>
