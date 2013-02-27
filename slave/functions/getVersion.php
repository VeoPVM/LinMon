<?php

function getVersion($mode) {
	$version = explode("-", file_get_contents("version"));
	
	if (!$version) {
		return "Error getting version \n";
	}
	
	if ($mode == "build") {
		$version = trim($version[0]);
		return $version;
	} elseif ($mode == "version") {
		$version = trim($version[1]);
		return $version;
	} else {
		return "Invalid version mode \n";
	}
}

?>