<?php
	include("../dataconn.php");

	$sess_sid=$_SESSION["sid"];

	$result = mysql_query("SELECT * FROM subject,student where student.Student_Year=subject.Subject_Year and student.Stu_ID= $sess_sid");

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
	<div id="header1" style="margin-left:auto;margin-right:auto;width:1520px;">
				<a href="index.php"><img src="../picture/logo.png" width="205" height="73"></a>

		<nav>
		<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="view_sub.php">Add Subject</a></li>
						<li><a href="">About Us</a></li>
						<li><a href="">Contact Us</a></li>
		</ul>
		</nav>

		<span style="text-align:right;float:right;color:#FFFFFF;margin-top:-10px;font-size:25px;" >

				<p style="margin-right:20px;">
				<a href="#" onclick="window.location='logout.php'"  style="color:black; text-decoration:none;">Logout</a></p>
		</span>

		<p style="padding-top:100px;">
				<table border="1" width="500px">
				<tr>
					<th>Subject Code</th>
					<th>Subject Title</th>
					<th>Subject Date</th>
					<th>Subject Time</th>
				</tr>
			<?php
				while($row = mysql_fetch_assoc($result))
				{
				?>
				<tr>
					<td><?php echo $row["Subject_Code"];?></td>
					<td><?php echo $row["Subject_Title"];?></td>
					<td><?php echo $row["Subject_Date"];?></td>
					<td><?php echo $row["Subject_Time"];?></td>

				</tr>

			<?php
				}
			?>
			</table>
		</p>
	</div>




</body>
</html>
