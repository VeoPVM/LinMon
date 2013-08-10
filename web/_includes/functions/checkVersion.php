<?php

function checkVersion($version) {
	$latest = file_get_contents("https://raw.github.com/VeoPVM/LinMon/master/slave/version");
	$latest = version_compare($version, $latest);
	
	if ($latest == "-1") {
		return "<span style=\"text-decoration: underline;\"><strong>".$version."</strong></span>";
	} else {
		return $version;
	}
}

?>