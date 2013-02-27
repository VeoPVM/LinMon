<?php

function getVersion($mode) {
	$version = explode("-", file_get_contents("version"));
	
	if (!$version) {
		return "Error getting version \n";
	}
	
	if ($mode == "build") {
		$version = $version[0];
		return $version." \n";
	} elseif ($mode == "version") {
		$version = $version[1]
		return $version." \n";
	} else {
		return "Invalid version mode \n";
	}
}

?>