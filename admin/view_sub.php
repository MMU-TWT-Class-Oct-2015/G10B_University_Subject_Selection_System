<?php
	include("../dataconn.php");

	$sess_aid=$_SESSION["aid"];

	$result = mysql_query("select * from subject");

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


			<table border="1" width="500px">
				<tr>
					<th>Subject Code</th>
					<th>Subject Title</th>
					<th>Subject Date</th>
					<th>Subject Time</th>
					<th>Modify</th>
					<th>Delete</th>
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
					<td><a href="modify_sub.php?pid=<?php echo $row['Subject_ID'];?>">Modify</a></td>
					<td><a href="del_sub.php?pid=<?php echo $row['Subject_ID'];?>"
			onclick="return confirm('Do you want to delete this subject?')">Delete</a></td>
				</tr>

			<?php
				}
			?>
			</table>
</body>
</html>
