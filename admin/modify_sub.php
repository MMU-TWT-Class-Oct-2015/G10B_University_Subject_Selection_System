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
						<form name="editfrm" method="post" action="">
							<p align="center" class="Title">Modify Subject</p>
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
								<tr>
									<td class="label">Subject Code : </td>
									<td class="content"><input type="text" name="scode" value=" <?php echo $row['Subject_Code'];?> "/></td>
								</tr>
								<tr>
									<td class="label">Subject Title : </td>
									<td class="content"><input type="text" name="stitle" value="<?php echo $row['Subject_Title'];?>"/></td>
								</tr>
								<tr>
									<td class="label">Subject Date : </td>
									<td class="content"><input type="date" name="sdate" value="<?php echo $row['Subject_Date'];?>"/></td>
								</tr>
								<tr>
									<td class="label">Subject Time : </td>
									<td class="content"><input type="time" name="stime" value="<?php echo $row['Subject_Time'];?>"/></td>
								</tr>
								<tr>
									<td><input type="submit" name="updatebtn" value="Update Now" /></td>
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
