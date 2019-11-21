<html>
	<style type="text/css">
		.app{
			position: relative;
			text-align: center;
			background-color: yellow;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
    		0 6px 20px 0 rgba(0, 0, 0, 0.19);
			float: left;
			margin-left: 20px; 
			cursor: pointer;
			overflow: hidden;
		}
	</style>
</html>

<?php

	/* select appointment */
	$mysqli = new mysqli("localhost", "root", "", "calendar");
	$sql = "SELECT * FROM appointment WHERE date = '$date_day' AND user_id = '$user' ";
	$result = $mysqli->query($sql);
	$count = 0;

	while($row = $result->fetch_assoc()){
		$count++;
	}
	$result->close();

	$sql = "SELECT * FROM appointment WHERE date = '$date_day' AND user_id = '$user' ";
	$result = $mysqli->query($sql);

	while($row = $result->fetch_assoc()){
		$h1_h = date('H', strtotime($row['start_time'])); //hour at start
		$h2_h = date('H', strtotime($row['end_time'])); //hour at end
		$h1_m = date('i', strtotime($row['start_time'])); //minute at start
		$h2_m = date('i', strtotime($row['end_time'])); //minute at end
		
		$h1 = $h1_h+(($h1_m*5/3)/100);
		$h2 = $h2_h+(($h2_m*5/3)/100);
		$h = $h2-$h1; //height

		if($h == 0 ){
			$h = 24;
		}

		$w = strlen( $row['title']); //width
		$max_w = 130; //max width
		if($count>1){
			$max_w = 120/$count;
		}

		$t; //top
		if($h1 == 0){
			$t = 13;
		}else{
			$t =  13+($h1*44);
		}
		
		echo '<div class = "app" style = "margin-top: '.$t.'px; width: '.($w*22.5).'px; height: '.($h*43.475).'px;
				max-width: '.$max_w.'" title = "Click to see detail">';
		echo $row['title']." ";
		echo '<div class = "hide_time">'.date('H:i', strtotime($row['start_time'])).'-';
		echo date('H:i', strtotime($row['end_time']))." ".$row['date'].'</div>';
		echo '</div>';

	}
	
	$result->close();
	$mysqli->close();

?>	