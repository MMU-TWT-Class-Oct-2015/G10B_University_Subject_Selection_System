<?php
	include("../dataconn.php");
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<link rel="stylesheet" type="text/css" href="include/style.css">
	<title>Login Page</title>
</head>

<body>
<div id="header">
	<div class="inHeaderLogin"></div>
</div>

<div id="loginForm">
	<div class="headLoginForm">
		Login Administrator
	</div>
	<div class="fieldLogin">
	<form name="loginfrm" action="" method="post">
		<label>User ID: </label><br>
			<input name="uid" type="text" class="login" value="admin" size = "20"> <br>
		<label>Password : </label><br>
			<input name="upass" type="password" class="login" value="admin" size = "20"  > <br>
			<input name="loginbtn" type="submit" class="button" value="Login"><br>
	</form>
	</div>
</div>


</body>
</html>

<?php
	if(isset($_POST['loginbtn']))
	{
	$userid = $_POST["uid"];

	$pass =md5($_POST["upass"]);

	$result = mysql_query("select * from admin where Admin_ID = '$userid' and Admin_Password = '$pass'");
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
