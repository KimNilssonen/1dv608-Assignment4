<?php

class DateTimeView {


	public function show() {


		date_default_timezone_set("Europe/Stockholm");
		$serverTime = getdate();

		// Had it like this before. Discussed a better solution that just includes one 'date()', which is now the $timeString variable.
		//$timeString = date("l") . ', the ' . date("j") . ' of ' . date("F") . ', The time is ' . date("H:i:s");
		
		$timeString = date('l\, \t\h\e jS \o\f F Y, \T\h\e \t\i\m\e \i\s H:i:s');

		return '<p>' . $timeString . '</p>';
	}
}