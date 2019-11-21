<html>
<head>
	<title>My Calendar</title>
	<link rel="shortcut icon" href="../icon.png" type="image/png">
	<link href="style/day_style.css" rel="stylesheet" type="text/css" media="all">
	<link href="style/detail_style.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/jqury 3.3.1.js"></script>
	<script src="js/day_view script.js"></script>
	<script src="js/add appointment.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		include_once '../login/includes/db_connect.php';
		include_once '../login/includes/functions.php';
		sec_session_start();

		$view = "day";
	?>
</head>

<body class="bg">
	<?php if (login_check($mysqli) == true) : ?>

	<?php include 'includes/set var_day.php'; ?>
	<?php include 'includes/add_appointment.php'; ?>

	<div class = "titleBar">
		<span style = "position: absolute; left: 1.5%; margin-top: 0.15%; font-size: 1.2vw;">
			<?php include 'includes/username.php' ?>
		</span>
		<a href = "week_view.php?date=<?php echo $date;?>"><button class = "btnWeek" style = "width: 8%; left: 5.5%;" >Week View</button></a>
		<a href = "month_view.php"><button class = "btnMonth">Month View</button></a>
		<button class = "btnGoto" onclick = "GotoForm()">Go To</button>
		<a href = "day_view.php"><button class = "btnToday">Today</button></a>
		<a href = "../login/includes/logout.php" class = "link" id = "logOut">Log out</a>		
		<span class = "view">Day View</span>
	</div>

	<!-- Goto Form -->
	<form id = "gotoForm" style = "display: none;" method="post" action="day_view.php">
		Date : <input type="date" name="dateGo">
		<input type="submit" value="Go" id = "btnGo">
	</form>
	
	<button class = "prevDay">
		<a href="?date=<?php echo $prevD; ?>" class="link"><div id = "up">^</div></a>
	</button>

	<div class = "date">
		<?php echo $date; ?>
	</div>
	<div class = "show_date">
		<?php echo $full_date; ?>
	</div>

	<button class = "nextDay">
		<a href="?date=<?php echo $nextD; ?>" class="link"><div id = "upsideDown">^</div></a>
	</button>

	<div class="btnAddApp" title = "Click to add appointment">+</div>

	<!-- Add Appointment form -->
	<div class  = "addAppointment">
		<span id = "addApp">Add Appointment</span>
		<form action="day_view.php" method="post" class  = "addApp-content" id = "addForm">
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

		include 'includes/appointment_day.php';

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