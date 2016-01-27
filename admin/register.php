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

<?php
	$errors="";
	if(isset($_POST['btnregister']))
	{
		$id=$_POST["std_id"];
		$name=$_POST["std_name"];
		$password=$_POST["std_pass"];
		$gender=$_POST["std_gender"];
		$date=$_POST["std_date"];
		$year=$_POST["std_year"];

		if(empty($name))
		{
			$errors .= "\n Please enter an ID ! ";
		}
		else{
			mysql_query("insert into student(Student_ID,Student_Name,Student_Password,Student_Gender,Student_Date,Student_Year)values
			('$id','$name','$password','$gender','$date','$year')");
		}

?>

<?php
	header("location:view_sub.php");
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


			<form name="addfrm" method="post" action="">
				<table>
					<tr>
						<td>Student Id :</td>
						<td><input type="text" name="std_id" size = "20" ></td>
					</tr>
					<tr>
						<td>Student Name :</td>
						<td><input type="text" name="std_name" size = "20" ></td>
					</tr>
					<tr>
						<td>Password :</td>
						<td><input type="password" name="std_pass" size = "20" ></td>
					</tr>
					<tr>
		  			<td>Gender :</td>
						<td>
							<select name="std_gender">
		        	<option value = "Male">Male</option>
		        	<option value = "Female">Female</option>
		        	</select>
						</td>
					</tr>
					<tr>
						<td>Date :</td>
						<td><input type="date" name="std_date" size = "20" ></td>
					</tr>
					<tr>
						<td>Year :</td>
						<td><input type="year" name="std_year" size = "20" ></td>
					</tr>
				</table>
				<p>
				<table>
					<tr>
		  			<td><input type="submit" name="btnregister" value="Submit"></td>
		  			<td><input type="reset" value="Clear"></td>
					</tr>
				</table>
			</p>
			<?php 	if(!empty($errors)){
				echo "<p class='err'>".nl2br($errors)."</p>";
				} ?>
			</form>
</body>
</html>
