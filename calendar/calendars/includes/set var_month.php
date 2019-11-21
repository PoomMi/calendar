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
		$nmonth = strtotime($_REQUEST['date']);
		$date = date('Y-m-d', strtotime($_REQUEST['date']));
		
		$starter = 0;
	}
	else{
		
		$date = date('Y-m-d');
		$day = $today;
		$month = $todaymonth;
		$year = $todayyear;
		$days = date('t', strtotime($date)); //Gets number of days in month
		$nmonth = strtotime($date);

		$starter = 1;
	}

	if(isset($_REQUEST['dateGo'])){
		$select_day = date('d', strtotime($_REQUEST['dateGo'])); 
		$select_month = date('m', strtotime($_REQUEST['dateGo'])); 
		$select_year = date('Y', strtotime($_REQUEST['dateGo'])); 

		$day = date('d', strtotime($_REQUEST['dateGo'])); 
		$month = date('m', strtotime($_REQUEST['dateGo'])); 
		$year = date('Y', strtotime($_REQUEST['dateGo'])); 
		$days = date('t', strtotime($_REQUEST['dateGo'])); 
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
		$details = '';
	}

	if(isset($_REQUEST['start'])){
		$start = $_REQUEST['start'];
		$end = $_REQUEST['end'];		
	}

	$firstday = date('w', strtotime('01-' . $month . '-' . $year)); //Gets the day of the week for the 1st of
	//the month. (e.g. 0 for Sun, 1 for Mon)
				
	$monthName = date("F", mktime(null, null, null, $month)); //change number to name month
	$nextM = date('Y-m-d',strtotime('+1 month', $nmonth));
	$prevM = date('Y-m-d',strtotime('-1 month', $nmonth));
?>