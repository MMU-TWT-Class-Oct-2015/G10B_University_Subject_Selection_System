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
			<form name="editfrm" method="post" action="">
				<p>ID : <?php echo $row["Admin_ID"];?>
				<p>Name : <input type="text" name="aname" value=" <?php echo $row['Admin_Name'];?> "/>
				<p>Password : <input type="password" name="apass" value="<?php echo $row['Admin_Password'];?>"/>
				<p><input type="submit" name="updatebtn" value="Update Now" /></p>
			</form>

</body>
</html>

<?php
	if(isset($_POST["updatebtn"]))
	{
		$adname = $_POST["aname"];

		$adpass = $_POST["apass"];

		mysql_query("update admin set Admin_Name = '$adname', Admin_Password = '$adpass' where Admin_ID = $sess_aid ");
	?>

	<?php
		header("location:index.php");
	}
?>
