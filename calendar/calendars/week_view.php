<html>
<head>
	<title>My Calendar</title>
	<link rel="shortcut icon" href="../icon.png" type="image/png">
	<link href="style/week_style.css" rel="stylesheet" type="text/css" media="all">
	<link href="style/detail_style.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/jqury 3.3.1.js"></script>
	<script src="js/week_view script.js"></script>
	<script src="js/add appointment.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		include_once '../login/includes/db_connect.php';
		include_once '../login/includes/functions.php';
		sec_session_start();

		$view = "week";
	?>
</head>

<body class="bg">
	<?php if (login_check($mysqli) == true) : ?>

	<?php include 'includes/set var_week.php'; ?>
	<?php include 'includes/add_appointment.php'; ?>

	<div class = "titleBar">
		<span style = "position: absolute; left: 1.5%; margin-top: 0.15%; font-size: 1.2vw;">
			<?php include 'includes/username.php' ?>
		</span>
		<a href = "Day_view.php"><button class = "btnWeek" style = "width: 8%; left: 5.5%;" >Day View</button></a>
		<a href = "month_view.php"><button class = "btnMonth">Month View</button></a>
		<a href = "../login/includes/logout.php" class = "link" id = "logOut">Log out</a>		
		<span class = "view">Week View</span>
	</div>

	<!-- Goto Form -->
	<form id = "gotoForm" style = "display: none;" method="post" action="day_view.php">
		Date : <input type="date" name="dateGo">
		<input type="submit" value="Go" id = "btnGo">
	</form>

	<div class="btnAddApp" title = "Click to add appointment">+</div>



	<!-- Add Appointment form -->
	<div class  = "addAppointment">
		<span id = "addApp">Add Appointment</span>
		<form action="week_view.php" method="post" class  = "addApp-content" id = "addForm">
			Date <?php for($i=0;$i<1;$i++) echo '&nbsp'; ?> : <input type="date" name="date" /><br />
			Title <?php for($i=0;$i<2;$i++) echo '&nbsp'; ?> : <input type="text" name="title" /><br />
			Detail <?php echo '&nbsp'; ?>: <input type="text" name="details" /><br />
			Start <?php for($i=0;$i<2;$i++) echo '&nbsp'; ?> : <input type="time" name="start" /><br />
			End <?php for($i=0;$i<3;$i++) echo '&nbsp'; ?> : <input type="time" name="end" /><br />
			<input type="submit" value="Add" class = "btnAdd"
			onclick="return add_appointment(this.form,this.form.date,this.form.title);">
		</form>
	</div>

	<!-- time table -->
	<?php
		echo '<div class =  "time">';
		for($time=0;$time<24;$time++){
			echo '<div class = "line" style="top: '.(($time*44)+181).'px;" title="time: '.$time.':00"></div>';
			echo '<div class = "hour">';
			if($time<10){
				echo "0".$time.":00";
			}else{
				echo $time.":00";
			}			
			echo '</div>';
		}

		
		echo "<br></div>";

	?>

	<!-- days in week -->
	<?php
		echo '<span id = "year">'.$year.'</span>';
		$tmp = 0;
		for($i=0;$i<7;$i++){

			if($count_week==1){
				echo '<div class = "days">';
				echo '<div class = "show-day" style = "background-color: '.$color_day[$i].';">';
				echo $day_in_week[$i]." ";
				if($firstday<=$i){
					$count_day++;
					echo ",".$shot_month." ".$count_day;					
				}
				echo '</div>';
				if($i==6){
					echo '<div id = "last-day" style = "position: absolute; font-size: 0vw;">'.$count_day.'</div>';
				}
				if($firstday<=$i){
					$date_day = $year."-".$month."-".$count_day;
					include 'includes/appointment_week.php';				
				}
				echo '</div>';
			}
			else if($count_day<$days){
				echo '<div class = "days">';
				echo '<div class = "show-day" style = "background-color: '.$color_day[$i].';">';
				echo $day_in_week[$i]." ";
				$count_day++;
				echo ",".$shot_month." ".$count_day;
				echo '</div>';
				if($i==6){
					echo '<div id = "last-day" style = "position: absolute; font-size: 0vw;">';
					echo $count_day;
					echo '</div>';
				}
				$date_day = $year."-".$month."-".$count_day;
				include 'includes/appointment_week.php';
				echo '</div>';

				if($count_day==$days){
					$tmp = $i+1;
				}
			}
			else{
				echo '<div class = "days">';
				echo '<div class = "show-day" style = "background-color: '.$color_day[$i].';">';
				echo $day_in_week[$i];
				echo '</div>';
				echo '</div>';
			}							
		}

		if($count_week==1){
			?>

			<div class = "show-week">
			<button id = "prev" title = "Go to previous week"> < </button>
			<div class = "week">
			<?php echo '<span style="position: relative; top: -3px;">'."week"." ".$count_week.'</span>'; ?>
			</div>
			<a href="?count_week=<?php echo $count_week+1; ?>
			&count_day=<?php echo $count_day; ?>&date=<?php echo $date?>" class="link">
				<button id = "next" title = "Go to next week"> > </button>
			</a>
			</div>

		<?php
		}
		else if($count_week==2){
		?>

			<div class = "show-week">
			<a href="?count_week=<?php echo $count_week-1; ?>
			&count_day=0&date=<?php echo $date?>" class="link">
				<button id = "prev" title = "Go to previous week"> < </button>
			</a>
			<div class = "week">
			<?php echo '<span style="position: relative; top: -3px;">'."week"." ".$count_week.'</span>'; ?>
			</div>
			<a href="?count_week=<?php echo $count_week+1; ?>
			&count_day=<?php echo $count_day; ?>&date=<?php echo $date?>" class="link">
				<button id = "next" title = "Go to next week"> > </button>
			</a>
			</div>

		<?php
		}
		else if($count_day<$days){
		?>

			<div class = "show-week">
			<a href="?count_week=<?php echo $count_week-1; ?>
			&count_day=<?php echo $count_day-14; ?>&date=<?php echo $date?>" class="link">
				<button id = "prev" title = "Go to previous week"> < </button>
			</a>
			<div class = "week">
			<?php echo '<span style="position: relative; top: -3px;">'."week"." ".$count_week.'</span>'; ?>
			</div>
			<a href="?count_week=<?php echo $count_week+1; ?>
			&count_day=<?php echo $count_day; ?>&date=<?php echo $date?>" class="link">
				<button id = "next" title = "Go to next week"> > </button>
			</a>
			</div>

		<?php
		}
		else if($count_day==$days){
		?>

			<div class = "show-week">
			<a href="?count_week=<?php echo $count_week-1; ?>
			&count_day=<?php echo $count_day-$tmp-7 ?>&date=<?php echo $date?>" class="link">
				<button id = "prev" title = "Go to previous week"> < </button>
			</a>
			<div class = "week">
				<?php echo '<span style="position: relative; top: -3px;">'."week"." ".$count_week.'</span>'; ?>
			</div>
			<button id = "next" title = "Go to next week"> > </button>
			</div>

		<?php
		}

	?>

	<!-- Detail Box Popup -->
	<div class = "detail" id = "detail-wrapper">
		<div class = "detail-content detail-animate">
			<div class = "title"></div>
			<hr style="width: 80%;">
			<div class = "date_time"></div>
			<hr style="width: 50%;">
			<div class = "detail_"></div>
			<div id = "btnDel">Delete</div>
		</div>
	</div>

	<!-- show week -->
	

	<?php else : ?>
		<!-- when login_check is false -->	
    	<meta http-equiv = "refresh" content = "0;URL=../index.php?!login"> 
	<?php endif; ?>
</body>

<script>
	var model = document.getElementById('detail-wrapper');
	window.onclick = function(event) {
    	if (event.target == model) {
        	model.style.display = "none";
    	}
	}
</script>

</html>