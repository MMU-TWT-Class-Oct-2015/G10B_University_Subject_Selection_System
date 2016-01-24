<?php
	include('../dataconn.php');
	if(isset($_REQUEST['pid']))
	{
		$sub_id = $_REQUEST['pid'];
		$result = mysql_query("delete FROM subject WHERE Subject_ID=$sub_id");
		if($result)
		{
			header("Location: view_sub.php");
		}
	}

?>
