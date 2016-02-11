<?php
	include("../dataconn.php");
	$sess_aid=$_SESSION["aid"];
	$sql = mysql_query("select * from admin where Admin_ID = $sess_aid");
	$rows = mysql_fetch_assoc($sql);
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

<body >
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
						<p align="center" class="Title">View Subjects</p>
						<form name="addfrm" method="post" action="">
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
								<tr>
									<th>Subject Code</th>
									<th>Subject Title</th>
									<th>Subject Date</th>
									<th>Subject Time</th>
									<th>Modify</th>
									<th>Delete</th>
								</tr>
								<?php
									$result = mysql_query("select * from subject");
									while($row = mysql_fetch_assoc($result))
									{
								?>
								<tr>
									<td><?php echo $row["Subject_Code"];?></td>
									<td><?php echo $row["Subject_Title"];?></td>
									<td><?php echo $row["Subject_Date"];?></td>
									<td><?php echo $row["Subject_Time"];?></td>
									<td><a href="modify_sub.php?pid=<?php echo $row['Subject_ID'];?>">Modify</a></td>
									<td><a href="del_sub.php?pid=<?php echo $row['Subject_ID'];?>"
							onclick="return confirm('Do you want to delete this subject?')">Delete</a></td>
								</tr>

								<?php
									}
								?>
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
