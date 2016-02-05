<?php
	include("../dataconn.php");

	$sess_aid=$_SESSION["aid"];

	$result = mysql_query("select * from admin where Admin_ID = $sess_aid");
	$row = mysql_fetch_assoc($result);

   if (!$sess_aid) {
		header('Location: login.php');
		exit();
	}
	function dbQuery($sql)
{
	$result = mysql_query($sql) or die(mysql_error());
	
	return $result;
}
function dbFetchAssoc($result)
{
	return mysql_fetch_assoc($result);
}
	$sql = "SELECT Admin_ID, Admin_Name FROM admin
		ORDER BY Admin_ID";
$result = dbQuery($sql);
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
						<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
							<p align="center" class="Title">Admin List</p>
								<tr align = "center" id="listTableHeader">
									<td>Admin ID</td>
									<td width="120">Admin Name</td>
								</tr>
									<?php
									$i = 0;
									while($row = dbFetchAssoc($result)) {
										extract($row);
										
										if ($i%2) {
											$class = 'row1';
										} else {
											$class = 'row2';
										}
										
										$i += 1;
								?>
								<tr class="<?php echo $class; ?>"> 
									<td><?php echo $Admin_ID; ?></td>
									<td width="120" align="center"><?php echo $Admin_Name; ?></td>
								</tr>
								<?php
									} // end while

								?>
								<tr> 
									<td colspan="5">&nbsp;</td>
								</tr>
								<tr> 
									<td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add User" class="box" onClick="window.location.href='adduser.php';"></td>
								</tr>
							</table>
						 <p>&nbsp;</p>
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
