<html>
<head>
	<title>My Calendar</title>
	<link rel="shortcut icon" href="../icon.png" type="image/png">
	<link href="style/month_style.css" rel="stylesheet" type="text/css" media="all">
	<link href="style/detail_style.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/jqury 3.3.1.js"></script>
	<script src="js/month_view script.js"></script>
	<script src="js/add appointment.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		include_once '../login/includes/db_connect.php';
		include_once '../login/includes/functions.php';
		sec_session_start();

		$view = "month";
	?>
</head>

<body class="bg">
	<?php if (login_check($mysqli) == true) : ob_start(); ?>

	<!-- when login_check is true -->	
   	<?php include 'includes/set var_month.php'; ?>
   	<?php include 'includes/add_appointment.php'; ?>
   	
   	<!-- Title Bar -->
	<div class = "titleBar">
		<a href = "day_view.php"><button class = "btnDay">Day View</button></a>
		<a href = "week_view.php?date=<?php echo $date;?>"><button class = "btnWeek">Week View</button></a>
		<button class = "btnGoto" onclick = "GotoForm()">Go To</button>
		<a href = "month_view.php"><button class = "btnToday">Today</button></a>
		<a href = "../login/includes/logout.php" class = "link" id = "logOut">Log out</a>
		<span id = "user" style = "position: absolute; left: 1.5%; margin-top: 0.15%; font-size: 1.2vw;">
			<?php include 'includes/username.php' ?>
		</span>
	</div>

	<!-- Go to Form -->
	<form id = "gotoForm" style = "display: none;" method="post" action="month_view.php">
		Date : <input type="date" name="dateGo">
		<input type="submit" value="Go" id = "btnGo">
	</form>

	<!-- Add Appointment Box -->
	<div class="btnAddApp" title = "Click to add appointment">+</div>

	<div class  = "addAppointment">
		<span id = "addApp">Add Appointment</span>
		<form action="month_view.php" method="post" class  = "addApp-content" id = "addForm">
			Date <?php for($i=0;$i<1;$i++) echo '&nbsp'; ?> : <input type="date" name="date" /><br />
			Title <?php for($i=0;$i<2;$i++) echo '&nbsp'; ?> : <input type="text" name="title" /><br />
			Detail <?php echo '&nbsp'; ?>: <input type="text" name="details" /><br />
			Start <?php for($i=0;$i<2;$i++) echo '&nbsp'; ?> : <input type="time" name="start" /><br />
			End <?php for($i=0;$i<3;$i++) echo '&nbsp'; ?> : <input type="time" name="end" /><br />
			<input type="submit" value="Add" class = "btnAdd"
			onclick="return add_appointment(this.form,this.form.date,this.form.title);">
		</form>
	</div>

	<!-- Appointment Box -->
	<div class  = "appointment">	
		<span id = "app">Appointment</span>
		<div class = "app-content"></div>
	</div>


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

	<!-- MSG Box Popup -->
	<div class = "msg" id = "msg-wrapper">
		<div class = "msg-content msg-animate">
			<div class = "msg-data">
				To : <input type="text" id="target" style="width: 50%" placeholder="Type username of revceiver.."><br/>
				Topic : <input type="text" id = "topic" style="width: 50%" placeholder="Type topic.."><br/>
				<hr style="background: rgba(0,0,0,0.4); width: 100%">
				<center style = "font-weight: bold; font-size: 1.8vw; color: rgba(0,0,0,0.6);">Message</center><br>
				Title: <span class = "msg_title"></span><br>
				Date: <span class = "msg_date"></span><br>
				<span class = "msg_time"></span><br>
				Detail: <span class = "msg_detail_"></span>
				
			</div>
			

			<div id = "btnSend">Send</div>
		</div>
	</div>


	<!-- Calendar Content -->
	<?php 
		if($starter == 1) { 
			echo '<div class="calendar animate_calendar">';
		}
		else{
			echo '<div class="calendar">';
		}
	?>

	<div class = "month">
		<span class = "prevMonth">
			<button style = "background-color: rgba(255,255,255,0.8); 
			height: 31px; border-radius: 10px 0 0 10px; border: none;">
				<a href="?date=<?php echo $prevM; ?>" class="link" id = "prev"><&nbspprev&nbspmonth</a>
			</button>
		</span>	
		<center>	
			<span class = "nameMonth"> <?php echo $monthName."  ".$year; ?> </span>
		</center>
		<span class = "nextMonth">
			<button style = "background-color: rgba(255,255,255,0.8); 
			height: 31px; border-radius: 0 10px 10px 0; border: none;">
				<a href="?date=<?php echo $nextM; ?>" class="link" id = "next">next&nbspmonth&nbsp></a>
			</button>
		</span>
	</div>

	<div class="box">
	<div class="days" style="background-color: #ff3333; color: white;"><center>Sunday</center></div>
	<div class="days" style="background-color: #ffff00;"><center>Monday</center></div>
	<div class="days" style="background-color: #ff33bb; color: white;"><center>Tuesday</center></div>
	<div class="days" style="background-color: #33ff33;"><center>Wednesday</center></div>
	<div class="days" style="background-color: #ff4500; color: white;"><center>Thursday</center></div>
	<div class="days" style="background-color: #1a75ff;"><center>Friday</center></div>
	<div class="days" style="background-color: #9933ff; color: white;"><center>Saturday</center></div>

	<?php
		include 'includes/month_view table.php'; 
	?>

	</div>   

	<?php else : ?>
		<!-- when login_check is false -->	
    	<meta http-equiv = "refresh" content = "0;URL=../index.php?!login">
	<?php endif; ?>
</body>

<script>
	$(document).ready(function(){
	  $(".inmonth").click(function(){
	  	var d = $(this).text()[0]+$(this).text()[1];
	  	var m = '<?php echo $month; ?>';
	  	var y = '<?php echo $year; ?>';

	  	$('.app-content').load('includes/appointment.php', {setday: d, setmonth: m, setyear: y});
	  });

	  $(".inmonth").dblclick(function () {
			var date = '<?php echo $year;?>'+"-"+'<?php echo $month; ?>'+"-"+$(this).text()[0]+$(this).text()[1];
			$(location).attr('href' , 'day_view.php?date_day='+date);
		});

		$('#btnSend').click(function(){
			var user = $('#user').text();
			var target = $('#target').val();
			var topic = $('#topic').val();
			var title = $('.msg_title').text();
			var date = $('.msg_date').text();
			var time = $('.msg_time').text();
			var detail = $('.msg_detail_').text();

			$.post( "includes/msg.php", {user: user, target: target, topic: topic,
				title: title, date: date, time: time, detail: detail} ,
				function(data){alert(data);});
		});			
	});
</script>

</html>