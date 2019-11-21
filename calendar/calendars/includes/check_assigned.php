<?php

		$mysqli = new mysqli("localhost", "root", "", "calendar");

		if(isset($_POST['set_date'])){
			include '../../login/includes/db_connect.php'; 
	include '../../login/includes/functions.php';
	sec_session_start();
	$user = $_SESSION['user_id']; //select username
			$app_date = $_POST['set_date'];
		}
		else{
			$app_date = date($year."-".$month."-".$i);
		}

		$sql = "SELECT * FROM appointment WHERE date = '$app_date' AND user_id = '$user' ";
		$result = $mysqli->query($sql);
		if(!isset($_POST['set_date']))
		$row = $result->fetch_assoc();
		
		if(isset($row['title'])){
			echo '<div class = "assigned" title = "Click to see appointment"> ';
			echo 'Assigned';
			echo '</div>';
		}
		
		$mysqli->close();
		$result->close();

?>	