<?php
	include("dataconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>

<body>
	<form name="loginfrm" action="" method="post">
		<p>User ID: 
			<input type="text" name="uid" size = "20" />
		</p>
	
		<p>Password : 
			<input type="password" name="upass" size = "20" />
		</p>
	
		<p>
			<input type="submit" name="loginbtn" value="Login" />
		</p>
	</form>

</body>
</html>

<?php
	if(isset($_POST['loginbtn']))
	{
	$userid = $_POST["uid"];
	$userpass = $_POST["upass"];
	
	$result = mysql_query("select * from admin where Admin_ID = '$userid' and Admin_Password = '$userpass'");
	if(mysql_num_rows($result)!=0)
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["aid"] = $row["Admin_ID"];
		
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
