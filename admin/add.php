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





			<input type="submit" name="logoutbtn" value="Logout" onclick="window.location='logout.php';"/></p>


			<form name="addfrm" method="post" action="">
				<p>Subject Code : <input type="text" name="scode" size="80"/>
				<p>Subject Title: <input type="text" name="sname" size="80"/>
				<p>Subject Date: <input type="date" name="sdate" size="80"/>
				<p>Subject Time: <input type="time" name="stime" size="80"/>
				<p><input type="submit" name="addbtn" value="Add Now" /></p>
			</form>
</body>
</html>

<?php
	if(isset($_POST['addbtn']))
	{
		$code = $_POST["scode"];
		$title = $_POST['sname'];
		$date= $_POST['sdate'];
		$time= $_POST['stime'];
		mysql_query("insert into subject(Subject_Code,Subject_Title,Subject_Date,Subject_Time,Admin_ID)values
		('$code','$title','$date','$time',$sess_aid)");

?>

<?php
	header("location:view_sub.php");
}
?>
