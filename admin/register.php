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
	$userid="";
	$username="";
	$password="";
	$email="";
	$gender="";
	$errors="";
	$vmail="";
	$vname="";
	$vid="";
	if(isset($_POST['register']))
	{
	$userid = $_POST["userid"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$vid=mysql_query("select * from customer where Student_ID='$userid'");
	$vname=mysql_query("select * from customer where Student_Name='$username'");
	$vmail=mysql_query("select * from customer where Student_Email='$email'");
	if(empty($userid))
	{
		$errors .= "\n Please enter an ID ! ";
	}
	if(empty($password))
	{
		$errors .= "\n Please enter a password ! ";
	}
	if(mysql_num_rows($vid)>0)
	{
			$errors.="\n User ID already used";
	}
	if(mysql_num_rows($vname)>0)
	{
			$errors.="\n User Name already used";
	}
		if(mysql_num_rows($vmail)>0)
	{
			$errors.="\n Email already used";
	}
	if(empty($email))
	{
		$errors .= "\n Please enter an email ! ";
	}
	if(empty($gender))
	{
		$errors .= "\n Please enter a gender ! ";
	}
	if(!empty($password))
	{if(strlen($password)<6)
		{
			$errors .= "\n Password range must over 5 ! ";
		}
	}
	if(!empty($email)){
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["email"]))
		{
			$errors.="\nPlease enter correct email !";
		}
	}
	if(!empty($password))
	{
		if(!preg_match('@[A-Z]@', $password))
		{
			$errors.="\nPassword must has at least one Uppercase letter!";
		}
	}
	if(!empty($password))
	{
		if(!preg_match('@[a-z]@', $password))
		{
			$errors.="\nPassword must has at least one lowercase letter!";
		}
	}
	if(!empty($password))
	{
		if(!preg_match('@[0-9]@', $password))
		{
			$errors.="\nPassword must has at least one numbers!";
		}
	}
			}

	if(empty($errors))
	{
	$sql= "insert into student (Student_ID,Student_Name,Student_Password,email,gender) values ('$userid','$username','$password','$email','$gender')";

	$result = dbQuery($sql);
		$to = $email;
		$subject="WELCOME TO MMU";
		$from = "eill31777@gmail.com";


		$body = "A user  $userid submitted the register form:\n".
		"User ID : $userid\n".
		"User Name : $username\n".
		"Email : $email\n".

		"<a href=\"localhost/assignment/student/login.php\">Try to sign in now</a>".

		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $email \r\n";

		mail($to, $subject, $body,$headers);

	?>


<!DOCTYPE html>
<html>
		<head>
			<title>Admin index</title>
			<link rel="stylesheet" href="design.css" type="text/css" />
		</head>
	<body>
		<table>
			<tr>
				<td>User Id :</td>
				<td><input type="text" name="userid" size = "20" value = "User ID"></td>
			</tr>
			<tr>
				<td>User Name :</td>
				<td><input type="text" name="username" size = "20" value = "User Name"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="text" name="password" size = "20" value = "Password"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" name="email" size = "30" value = "Email"></td>
			</tr>
			<tr>
  			<td>Gender :</td>
				<td>
					<select name="gender">
        	<option value = "Male">Male</option>
        	<option value = "Female">Female</option>
        	</select>
				</td>
			</tr>
		</table>
		<table>
			<tr>
  			<td><input type="submit" name="register" value="Submit"></td>
  			<td><input type="reset" value="Clear"></td>
			</tr>
		</table>
	</body>
</html>
