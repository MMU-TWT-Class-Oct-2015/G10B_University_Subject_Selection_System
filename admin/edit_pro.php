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
	<link rel="stylesheet" href="include/style.css" type="text/css" />
</head>

<body>
	<div id="header">
		<div class="inHeader">
			<div class="mosAdmin">
				<?php $name = $_SESSION['aid']; ?>
				Hello, <?php echo $name; ?><br>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div id="wrapper">
		<div id="leftBar">
			<ul>
				<p>&nbsp;</p>
				<li><a href="index.php">Home</a></li>
				<li><a href="edit_pro.php">Edit Profile</a></li>
				<li><a href="add_sub.php">Add Subjects</a></li>
				<li><a href="view_sub.php">View Subjects</a></li>
				<li><a href="register.php"> Register Student</a></li>
				<li><a href="user.php">User</a></li>
				<li><a href="logout.php">Logout</a></li>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</ul>   
		</div>
		<div id="rightContent">
			<table width="100%" border="0" cellspacing="0" cellpadding="20">
				<tr>
					<td>
						<form name="editfrm" method="post" action="">
							<p align="center" class="Title">Edit Profile</p>
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
							<tr>
								<td class = "label">ID : </td>
								<td class="content"><?php echo $row["Admin_ID"];?></td>
							</tr>
							<tr>
								<td class = "label">Name : </td>
								<td class="content"><input type="text" name="aname" value=" <?php echo $row['Admin_Name'];?> "/></td>
							</tr>
							<tr>
								<td class = "label">Password : </td>
								<td class="content"><input type="password" name="apass" value="<?php echo $row['Admin_Password'];?>"/></td>
							</tr>
							<tr>
								<td><input type="submit" name="updatebtn" value="Update Now" /> <input name="button" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';"></td>
							</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<div class="clear"></div>
		<div id="footer">
			
		</div>
	</div>	

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
