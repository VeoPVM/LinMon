<?php

function getVersion($mode) {
	$version = explode("-", file_get_contents("version"));
	
	if (!$version) {
		echo "Error getting version";
	}
	
	if ($mode == "build") {
		echo $version[0];
	} elseif ($mode == "version") {
		echo $version[1];
	} else {
		echo "Invalid version mode";
	}
}

?>