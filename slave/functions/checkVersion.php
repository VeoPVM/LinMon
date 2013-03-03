<?php

function checkVersion() {
	$current = explode("-", file_get_contents("version"));
	$latest = explode("-", file_get_contents("https://raw.github.com/VeoPVM/LinMon/master/slave/version"));
	
	if ($current[0] < $latest[0]) {
		$current = trim($current[1]);
		$latest = trim($latest[1]);
		return "A new version of the slave is available! \nYour version: ".$current." \nLatest version: ".$latest." \n\n";
	}
}

?>