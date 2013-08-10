<?php

function checkVersion() {
    $current = file_get_contents("version");

    $latest = file_get_contents("https://raw.github.com/VeoPVM/LinMon/master/slave/version");
	
	$version = version_compare($current, $latest);

    if ($version == "-1") {
        return "A new version of the slave is available! \nYour version: " . $current . " \nLatest version: " . $latest . " \n\n";
    }
}
?>