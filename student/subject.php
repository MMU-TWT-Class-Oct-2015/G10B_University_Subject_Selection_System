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
<?php
function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
?>
	<div id="about-bg">
		<div id="header">
			<div id="logo"><a href="index.php"><img src="https://cloud.githubusercontent.com/assets/16029083/13032953/e0e6f204-d340-11e5-86a8-6136ec5666ea.png" width="320" height="128"></a></div>
			<div id="button">
			
				<label class="button-style"><a href="index.php">Home</a></label>
				<label class="button-style"><a href="subject.php">Add Subject</a></label>
				<label class="button-style"><a href="view_sub.php">View Subject</a></label>
				<label class="button-style">Welcome, <?php echo $rows["Student_Name"]?> <a href="logout.php">Logout</a></label>
				<label>&nbsp;</label>
			</div>
		</div>
	</div>      	

		<p style="padding-top:300px;">
				<table border="1" width="500px">
					<tr>
						<th>Subject Code</th>
						<th>Subject Title</th>
						<th>Subject Date</th>
						<th>Subject Time</th>
						<th>Add</th>
					</tr>
				<?php
					$product_array = runQuery("SELECT * FROM subject,student where student.Student_Year=subject.Subject_Year and student.Stu_ID= $sess_sid");
					
					if (!empty($product_array)) {
					foreach($product_array as $key=>$value){
				?>
				<form name="category" action="cart.php?action=add&code=<?php echo $product_array[$key]["Subject_Code"]; ?>" method="post"/>
					<tr>
						<td><?php echo $product_array[$key]["Subject_Code"]; ?></td>
						<td><?php echo $product_array[$key]["Subject_Title"]; ?></td>
						<td><?php echo $product_array[$key]["Subject_Date"]; ?></td>
						<td><?php echo $product_array[$key]["Subject_Time"]; ?></td>
						<td><input type="hidden" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></td>
					</tr>
					<tr>

					</tr>

				</form>
				<?php
					}
					}	
				?>
		
</body>
</html>
