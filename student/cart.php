<?php
	include("../dataconn.php");

	$sess_sid=$_SESSION["sid"];
	$sql = mysql_query("select * from student where Stu_ID = $sess_sid");
	$rows = mysql_fetch_assoc($sql);
	if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
				$productByCode = runQuery("SELECT * FROM subject WHERE Subject_Code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["Subject_Code"]=>array('title'=>$productByCode[0]["Subject_Title"],'code'=>$productByCode[0]["Subject_Code"],'date'=>$productByCode[0]["Subject_Date"],'time'=>$productByCode[0]["Subject_Time"], 'quantity'=>$_POST["quantity"]));

				if(!empty($_SESSION["cart_item"])) {
					if(in_array($productByCode[0]["Subject_Code"],$_SESSION["cart_item"])) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($productByCode[0]["Subject_Code"] == $k)
									$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
		break;
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["id"] == $k)
							unset($_SESSION["cart_item"][$k]);
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;
	}
	}

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
				<label class="button-style"><a href="cart.php">Add Subject</a></label>
				<label class="button-style"><a href="view_sub.php">View Subject</a></label>
				<label class="button-style">Welcome, <?php echo $rows["Student_Name"]?> <a href="logout.php">Logout</a></label>
				<label>&nbsp;</label>
			</div>
		</div>
		<br clear="both">
		<div id="container-about">
			<div id="slogan">ADD SUBJECT</div>
			<br clear="both">
			<p align="center">
				<a href="subject.php"><input type="button" value="Continue Add Subject"></a> <a id="btnEmpty" href="cart.php?action=empty"><input type="button" value="Empty cart"></a>
			</p>
		</div>
		<div id="contact-content2">
			<br clear="both">
			<div class="contact-box2" style="border-radius:10px;padding:10px">
				<?php
			if(isset($_SESSION["cart_item"])){
				$item_total = 0;
			?>
			<table border="1" width="100%" >
			<tbody>
			<tr>
			<th><strong>Subject Code</strong></th>
			<th><strong>Subject Title</strong></th>
			<th><strong>Subject Date</strong></th>
			<th><strong>Subject Time</strong></th>
			<th><strong>Drop</strong></th>
			</tr>
			<?php
				foreach ($_SESSION["cart_item"] as $item){
					?>
							<tr>
							<td align="center"><?php echo $item["code"]; ?></td>
							<td align="center"><?php echo $item["title"]; ?></td>
							<td align="center"><?php echo $item["date"]; ?></td>
							<td align="center"><?php echo $item["time"]; ?></td>
							<td align="center"><a href="cart.php?action=remove&id=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
							</tr>
							<?php
					}
					?>
			</tbody>
			</table>
			  <?php
			}
		?>
				
			</div>
		</div>
	</div>      	

		

		
		
</body>
</html>
