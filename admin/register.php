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
		$password =$_POST["std_pass"];
		$password=md5($password);
		$gender=$_POST["std_gender"];
		$date=$_POST["std_date"];
		$year=$_POST["std_year"];


			mysql_query("insert into student(Student_ID,Student_Name,Student_Password,Student_Gender,Student_Date,Student_Year)values
			('$id','$name','$password','$gender','$date','$year')");

?>

<?php
	header("location:index.php");
}
?>


<!DOCTYPE html>
<html>
	<head>
	<title>Admin index</title>
	<link rel="stylesheet" href="include/style.css" type="text/css" />
	<script>
	function validation()
	{
		var id = document.forms["registration_page"]["std_id"].value;
		var name = document.forms["registration_page"]["std_name"].value;
		var pass = document.forms["registration_page"]["std_pass"].value;
		var date = document.forms["registration_page"]["std_date"].value;
		var year1 = document.forms["registration_page"]["std_year"].value;


		if(name == "" || !isNaN(name))
		{
			alert("Please enter the correct name");
			return false;
		}

		
		if(date == "" || !isNaN(date))
		{
			alert("Please enter the correct date");
			return false;
		}

	}
	</script>
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
						<form action="register.php" method="post" name="registration_page" onsubmit="return validation()">
							<p align="center" class="Title">Register Student</p>
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
								<tr>
									<td class="label">Student Id :</td>
									<td><input type="text" name="std_id" size = "20" ></td>
								</tr>
								<tr>
									<td class="label">Student Name :</td>
									<td><input type="text" name="std_name" size = "20" ></td>
								</tr>
								<tr>
									<td class="label">Password :</td>
									<td><input type="password" name="std_pass" size = "20" ></td>
								</tr>
								<tr>
								<td class="label">Gender :</td>
									<td>
										<select name="std_gender">
											<option value = "Male">Male</option>
											<option value = "Female">Female</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="label">Date :</td>
									<td><input type="date" name="std_date" size = "20" ></td>
								</tr>
								<tr>
									<td class="label">Year :</td>
									<td><input type="year" name="std_year" size = "20" ></td>
								</tr>
								<tr>
									<td><input type="submit" name="btnregister" value="Submit"> <input type="reset" value="Clear"></td>
								</tr>
							</table>
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
