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
						<p align="center" class="Title">Add Subjects</p>
						<form name="addfrm" method="post" action="">
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
								<tr>
									<td class="label">Subject Code : </td>
									<td class="content"><input type="text" name="scode" size="20"/></td>
								</tr>
								<tr>
									<td class="label">Subject Title: </td>
									<td class="content"><input type="text" name="sname" size="50"/></td>
								</tr>
								<tr>
									<td class="label">Subject Date: </td>
									<td class="content"><input type="date" name="sdate" size="20"/></td>
								</tr>
								<tr>
									<td class="label">Subject Time: </td>
									<td class="content"><input type="time" name="stime" size="20"/></td>
								</tr>
								<tr>
									<td class="label">Subject Year: </td>
									<td class="content"><input type="year" name="syear" size="20"/></td>
								</tr>
								<tr>
									<td><input type="submit" name="addbtn" value="Add Now" /> <input name="button" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';"></td>
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
	if(isset($_POST['addbtn']))
	{
		$code = $_POST["scode"];
		$title = $_POST['sname'];
		$date= $_POST['sdate'];
		$time= $_POST['stime'];
		$year= $_POST['syear'];
		mysql_query("insert into subject(Subject_Code,Subject_Title,Subject_Date,Subject_Time,Subject_Year,Adm_ID)values
		('$code','$title','$date','$time','$year',$sess_aid)");

?>

<?php
	header("location:view_sub.php");
}
?>
