<?php

	/* select appointment */
	?>
		<html>
			<link href="style/month_style.css" rel="stylesheet" type="text/css" media="all">
			<script src="js/jqury 3.3.1.js"></script>
			<script src="js/month_view script.js"></script>
		</html>
	<?php
	include '../../login/includes/db_connect.php'; 
	include '../../login/includes/functions.php';
	sec_session_start();
	$user = $_SESSION['user_id']; //select username

	if(isset($_POST['setday'])){
		$thisday = $_POST['setday'];
		$thismonth = $_POST['setmonth'];
		$thisyear = $_POST['setyear'];

		$mysqli = new mysqli("localhost", "root", "", "calendar");
		$app_date = date($thisyear."-".$thismonth."-".$thisday);
		echo $app_date."<br/><br/>";
		$sql = "SELECT * FROM appointment WHERE date = '$app_date' AND user_id = '$user' ";
		$result = $mysqli->query($sql);

		echo '<div style = "text-align: left; margin-left: 5%;"> ';
		while($row = $result->fetch_assoc()){
			$start = date('H:i', strtotime($row['start_time']));
			$end = date('H:i', strtotime($row['end_time']));

			echo '<div class = "app-detail" title = "Click to see detail">';
			print_r($row['title']);	
			echo "  | Time: ".$start." - ".$end.".";	
			echo '</div>';
		}
		echo '</div>';

		$mysqli->close();
		$result->close();
	}

	/*else if(isset($_POST['set_date'])){
		$mysqli = new mysqli("localhost", "root", "", "calendar");
		$app_date = $_POST['set_date'];
		echo $app_date."<br/><br/>";
		$sql = "SELECT * FROM appointment WHERE date = '$app_date' AND user_id = '$user' ";
		$result = $mysqli->query($sql);

		echo '<div style = "text-align: left; margin-left: 5%;"> ';
		while($row = $result->fetch_assoc()){
			$start = date('H:i', strtotime($row['start_time']));
			$end = date('H:i', strtotime($row['end_time']));

			echo '<div class = "app-detail" title = "Click to see detail">';
			print_r($row['title']);	
			echo "  | Time: ".$start." - ".$end." ";	
			echo '</div>';
		}
		echo '</div>';

		$mysqli->close();
		$result->close();
	}*/
?>	

