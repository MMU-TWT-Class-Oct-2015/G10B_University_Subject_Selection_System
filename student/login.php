<?php
	include("../dataconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="../design.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="about-bg">
		<div id="header">
			<div id="logo"><a href="main.php"><img src="https://cloud.githubusercontent.com/assets/16029045/13034158/dc19b4fa-d368-11e5-9d1d-b04c54eb47ed.png"></a></div>
			
			
		</div>
		<br clear="both">
		<div id="container-about">
			<div id="slogan">STUDENT LOGIN</div>
			<br clear="both">
			<div id="member-content">
				<div class="member-form" style="text-align:center">
					<form name="loginfrm" action="" method="post">
						<table align = "center">
							<div style="font-size:30px;border-bottom:1px solid #cccccc;font-family:Andalus;text-align:center">Sign In</div>
							<br/>
							<tr>
								<td class="enquiry-info">User ID: </td>
								<td><input type="text" name="uid" size = "20" style="border-radius:5px;font-size:18px;color: #933;text-align: left;background-color: #FFC;font-family: Georgia, Times New Roman, Times, serif;text-align:center"></td>
							</tr>
							<tr>
								<td class="enquiry-info">Password : </td>
								<td><input type="password" name="upass" size = "20" style="border-radius:5px;font-size:18px;color: #933;text-align: left;background-color: #FFC;font-family: Georgia, Times New Roman, Times, serif;text-align:center"/></td>
							</tr>
							<tr>
								<td></td>
								<td class="enquiry-box"><input type="submit" name="loginbtn" value="Login" /></td>
							</tr>
						</table>
					</form>
					
				</div>
			</div>
		</div> 
		<br clear="both"><br clear="both"><br clear="both">
	
	</div>
	

</body>
</html>

<?php
	if(isset($_POST['loginbtn']))
	{
	$userid = $_POST["uid"];

	$password =md5($_POST["upass"]	);
	$result = mysql_query("select * from student where Student_ID = '$userid' and Student_Password = '$password'");
	if(mysql_num_rows($result)!=0)
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["sid"] = $row["Stu_ID"];

		header("Location: index.php");
	}
	else
	{
		?>
		<script>
			alert("Invalid Username or Password");
		</script>
		<?php
	}

	mysql_close();
	}
?>
