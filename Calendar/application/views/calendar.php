<!DOCTYPE html>
<html>
	<head>
		<title>Calendar</title>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url('css/calendar.css')?>>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src=<?php echo base_url('js/calendar.js') ?>></script>
	</head>
	<body>
		<div id="calendar">
			<?php echo $calendar; ?>
		</div>
	</body>
</html>