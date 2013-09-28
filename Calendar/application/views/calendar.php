<!DOCTYPE html>
<html>
	<head>
		<title>Calendar</title>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url('css/calendar.css')?>>
		<script type="text/javascript" src=<?php echo base_url('js/calendar.js') ?>></script>
	</head>
	<body>
		<div id="calendar">
			<?php
				$date_array = explode('-', date('Y-m-d'));
				$year = $date_array[0];
				$month = $date_array[1];
				$day = $date_array[2];
				$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

				echo '<h1>' . date('F') . ' ' . date('Y') . '</h1>';

				for($i = 1; $i <= $days_in_month; $i++){
					$date = $year . '-' . $month . '-' . $i;
					if(array_key_exists($date, $array)){//Get the date of the appointment that was taken from the DB
						echo '<div class="cal_day"><span class="day_num">' . $i . '</span>'; 
						foreach(explode('->->', $array[$date]) as $memo){	
							echo '<div class="memo">' . $memo . '</div>';
						}
						echo '</div>';
					}else{
							echo '<div class="cal_day"><span class="day_num">' . $i . '</span></div>';
					}
				}
			?>
		</div>
	</body>
</html>