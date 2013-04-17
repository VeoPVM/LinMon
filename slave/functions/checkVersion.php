<?php

function checkVersion() {
    $current = file_get_contents("version");
    $current = str_replace(".", "", $current);
    // Add 1 to the string so update checking definitely works on versions before 0.1
    $current = "1" . $current;

    $latest = file_get_contents("https://raw.github.com/VeoPVM/LinMon/master/slave/version");
    $latest = str_replace(".", "", $latest);
    // Add 1 to the string so update checking definitely works on versions before 0.1
    $latest = "1" . $latest;

    if ($current < $latest) {
        return "A new version of the slave is available! \nYour version: " . $current . " \nLatest version: " . $latest . " \n\n";
    }
}
?>