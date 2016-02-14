<?php
	include("../dataconn.php");
	$sess_sid=$_SESSION["sid"];
	$sql = mysql_query("select * from student where Stu_ID = $sess_sid");
	$rows = mysql_fetch_assoc($sql);
   if (!$sess_sid) {
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

<body>
	<div id="about-bg">
		<div id="header">
			<div id="logo"><a href="index.php"><img src="https://cloud.githubusercontent.com/assets/16029045/13034158/dc19b4fa-d368-11e5-9d1d-b04c54eb47ed.png" width="320" height="128"></a></div>
			<div id="button">
			
				<label class="button-style"><a href="index.php">Home</a></label>
				<label class="button-style"><a href="cart.php">Add Subject</a></label>
				<label class="button-style"><a href="view_sub.php">View Subject</a></label>
				<label class="button-style">Welcome, <?php echo $rows["Student_Name"]?> <a href="logout.php">Logout</a></label>
				<label>&nbsp;</label>
			</div>
		</div>
		<br clear="both">
		<div id="container-about">
		<div id="slogan">View Subject</div>
		</div>
		<br><br>
		<div id="contact-content2">
			<div class="contact-box2" style="border-radius:10px;padding:10px">
			<table border="1" width="100%" >
				<tr>
					<th>Subject Code</th>
					<th>Subject Title</th>
					<th>Subject Date</th>
					<th>Subject Time</th>
				</tr>
			<?php
				$result = mysql_query("SELECT * FROM subject,student where student.Student_Year=subject.Subject_Year and student.Stu_ID= $sess_sid");
				while($row = mysql_fetch_assoc($result))
				{
				?>
				<tr>
					<td align="center"><?php echo $row["Subject_Code"];?></td>
					<td align="center"><?php echo $row["Subject_Title"];?></td>
					<td align="center"><?php echo $row["Subject_Date"];?></td>
					<td align="center"><?php echo $row["Subject_Time"];?></td>

				</tr>

			<?php
				}
			?>
			</table>
				
			</div>
		</div>
		<br clear="all"><br clear="all"><br clear="all"><br clear="all">
	</div>


</body>
</html>
