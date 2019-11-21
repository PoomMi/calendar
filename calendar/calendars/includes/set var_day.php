<?php
 /* Set variable to set up calendar page */

	$today = date('d'); //Gets today’s date
	$todaymonth = date('m'); //Gets today’s month
	$todayyear = date('Y'); //Gets today’s year

	if(isset($_REQUEST['date'])){
		$day = date('d', strtotime($_REQUEST['date'])); //Gets day of appointment (1‐31)
		$month = date('m', strtotime($_REQUEST['date'])); //Gets month of appointment (1‐12)
		$year = date('Y', strtotime($_REQUEST['date'])); //Gets year of appointment (e.g. 2016)
		$days = date('t', strtotime($_REQUEST['date'])); //Gets number of days in month
		$nday = strtotime($_REQUEST['date']);
		$date = date('Y-m-d', strtotime($_REQUEST['date']));
		
		$starter = 0;
	}
	else{	
		$date = date('Y-m-d');
		$day = $today;
		$month = $todaymonth;
		$year = $todayyear;
		$nday = strtotime($date);

		$starter = 1;
	}

	if(isset($_REQUEST['date_day'])){
		$day = date('d', strtotime($_REQUEST['date_day'])); //Gets day of appointment (1‐31)
		$month = date('m', strtotime($_REQUEST['date_day'])); //Gets month of appointment (1‐12)
		$year = date('Y', strtotime($_REQUEST['date_day'])); //Gets year of appointment (e.g. 2016)
		$date = $_REQUEST['date_day'];
	}

	if(isset($_REQUEST['dateGo'])){
		$day = date('d', strtotime($_REQUEST['dateGo'])); 
		$month = date('m', strtotime($_REQUEST['dateGo'])); 
		$year = date('Y', strtotime($_REQUEST['dateGo'])); 
		$nmonth = strtotime($_REQUEST['dateGo']);
		$date = date('Y-m-d', strtotime($_REQUEST['dateGo']));	
	}

	if(isset($_REQUEST['title'])){
		$title = $_REQUEST['title']; //get appointment title
	}

	if(isset($_REQUEST['details'])){
		$details = $_REQUEST['details'];
	}
	else{
		$details = NULL;
	}

	if(isset($_REQUEST['start'])){
		$start = $_REQUEST['start'];
		$end = $_REQUEST['end'];		
	}
	
	$monthName = date("F", strtotime($date)); //change number to name month		
	$dayName = date('D', strtotime($date)); //change number to name of day
	$nextD = date('Y-m-d',strtotime('+1 day', $nday));
	$prevD = date('Y-m-d',strtotime('-1 day', $nday));
	$full_date = $monthName." ".$day." ,".$year;
?>