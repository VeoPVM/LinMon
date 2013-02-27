<?php

function getVersion($mode) {
	$version = explode("-", file_get_contents("version"));
	
	if (!$version) {
		echo "Error getting version \n";
	}
	
	if ($mode == "build") {
		echo $version[0]." \n";
	} elseif ($mode == "version") {
		echo $version[1]." \n";
	} else {
		echo "Invalid version mode \n";
	}
}

?>