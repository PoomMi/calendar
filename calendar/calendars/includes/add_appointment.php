<?php
	
	/* insert appointment */
	$user = $_SESSION['user_id']; //select username
	$mysqli = new mysqli("localhost", "root", "", "calendar");
	if(isset($title)){
		$sql = "INSERT INTO appointment (date, title, details, user_id,start_time,end_time) 
					VALUES ('$date', '$title', '$details','$user','$start','$end')";
		$mysqli->query($sql);
		$mysqli->close();

		if($view == "month"){
			header('Location: month_view.php?date='.$date);
		}
		else if($view == "day"){
			header('Location: day_view.php?date='.$date);
		}
		else if($view == "week"){
			$today = date('d'); //Gets today’s date
			$todaymonth = date('m'); //Gets today’s month
			$todayyear = date('Y'); //Gets today’s year
			$date = $todayyear."-".$todaymonth."-".$today;
			$tmp_date = $today."/".$todaymonth."/".$todayyear;
			?> <script type="text/javascript"> alert('a'); </script>> <?php
			header('Location: week_view.php?add=app&date='.$date);
		}
	}
?>