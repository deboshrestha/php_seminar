<html>
	<head>
		<title>PHP Calender </title>
		<link rel="stylesheet" href="style1.css">
	</head>
	<body>
		<?php
			//this gets today's date
			$date = time();
			//this puts the day,month, and year in separate variables
			$day = date('d',$date);
			$month = date('m',$date);
			$year = date('Y',$date);
			//here we generate the first day of the month
			$first_day = mktime(0,0,0,$month,1,$year);	//mktime(hour,minute,second,month,date,year)
			
			//this gets us the month name
			$title = date('F' , $first_day);
			
			//here we find out what day of the week the first day of the month falls on
			$day_of_week = date('D', $first_day);
			
			//once we know what day of the week it falls on, we know how many blank days occurs before it. If the first day of the week is a Sunday then it would be zero and so on...
			
			switch($day_of_week)
			{
				case "Sun": $blank = 0; break;
				case "Mon": $blank = 1; break;
				case "Tue": $blank = 2; break;
				case "Wed": $blank = 3; break;
				case "Thu": $blank = 4; break;
				case "Fri": $blank = 5; break;
				case "Sat": $blank = 6; break;
			}
			
			//We then determine how many days are in the current month 
			$days_in_month = cal_days_in_month(0,$month,$year);
			
			//here we start building the table heads
			echo "<table id = \"calender\" border=1 width=294>";
			echo "<caption>This month's calender</caption>";
			echo "<tr><th colspan=7> $title $year </th></tr>";
			echo "<tr><td width=42>S</td><td width=42>M</td><td width=42>T</td><td width=42>W</td><td width=42>T</td><td width=42>F</td><td width=42>S</td></tr>";
			
			//this counts the days in the week, up to 7
			$day_count = 1;
			
			echo "<tr>";
			
			//first we take care of those blank days
			while( $blank > 0)
			{
				echo "<td></td>";
				$blank = $blank - 1;
				$day_count++;
			}
			
			//sets the first day of the month to 1
			$day_num = 1;
			
			//count up the days, until we've done all of them in the month
			while( $day_num <= $days_in_month)
			{
				echo "<td> $day_num </td>";
				$day_num++;
				$day_count++;
			
			
				//to Make sure we start a new row every week
				if($day_count > 7)
				{
					echo "</tr><tr>";
					$day_count = 1;
				}
			}
			//finally we finish out the table with some blank details if needed
			while( $day_count > 1 && $day_count <= 7)
			{
				echo "<td></td>";
				$day_count++;
			}
			echo "</tr></table>";
		?>
	</body>
</html>