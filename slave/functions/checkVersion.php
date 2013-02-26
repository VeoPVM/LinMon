<?php

function checkVersion() {
	$current = explode("-", file_get_contents("version"));
	$latest = explode("-", file_get_contents("https://raw.github.com/VeoPVM/LinMon/master/version"));
	
	if ($current[0] != $latest[0]) {
		echo "A new version of the slave is available! \n 
		Your version: ".$current[0]." \n 
		Latest version: ".$latest[0];
	}
}

?>