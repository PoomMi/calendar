<?php

	/* calendar month view table */	

	for($i=1; $i<=$firstday; $i++)
	{
		echo '<div class="date blankday"></div>';
	}


	for($i=1; $i<=$days; $i++)
	{
		echo '<div class="date inmonth';
		if ($today == $i && $todaymonth==$month && $todayyear == $year)
		{
			echo ' today ';
		}
		else{
			echo ' blank ';
		}

		if(isset($select_day)){
				if($select_day==$i && $select_month==$month && $select_year==$year){
					echo ' " style = " background: #6DFDE7;"';
				}
		}
		
		echo '" title = "Click to see appointment &#xA;DoubleClick to go to day view">' . $i;

		include 'check_assigned.php';

		echo '</div>';
	}
		

	$daysleft = 7-(($days + $firstday)%7);
	if($daysleft<7)
	{
		for($i=1; $i<=$daysleft; $i++)
    	{
			echo '<div class="date blankday"></div>';
		}
	}
?>