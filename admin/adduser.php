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
				<li> <a href="index.php">Home</a></li>
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
						<form name="adduser" method="post" action="" enctype="multipart/form-data">
						<p align="center" class="Title">Add Admin</p>
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
								<tr>
									<td width="150" class="label">Admin ID</td>
									<td class="content"> <input name="txtUserID" type="text" class="box" id="txtUserID" size="20" maxlength="20"></td>
								</tr>
								<tr>
									<td width="150" class="label">Admin Name</td>
									<td class="content"> <input name="txtUserName" type="text" class="box" id="txtUserName" size="20" maxlength="20"></td>
								</tr>
								<tr>
									<td width="150" class="label">Password</td>
									<td class="content"> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>
								</tr>
							</table>
							<p align="center">
								<input name="btnAddUser" type="submit" id="btnAddUser" value="Add User"> <input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='user.php';" class="box">
							</p>
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
	$errors="";
	if(isset($_POST['btnAddUser']))
	{
		$admin_id = $_POST["txtUserID"];
		$admin_name = $_POST['txtUserName'];
		$admin_password=md5($_POST['txtPassword']);
		mysql_query("insert into admin(Admin_ID,Admin_Name,Admin_Password)values
		('$admin_id','$admin_name','$admin_password')");
?>

<?php
	header("location:user.php");
}
?>
