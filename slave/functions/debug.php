<?php

function debug_collectionInfoStart($debug, $log) {
    if ($debug == TRUE) {
        debug("[DEBUG] Collecting data\n", $log);
    }
}

function debug_collectionInfoEnd($debug, $log) {
    if ($debug == TRUE) {
        debug("[DEBUG] Finished collecting data\n\n", $log);
    }
}

function debug_collectionInterval($debug, $interval, $log) {
    if ($debug == TRUE) {
        debug("[DEBUG] Collecting data every " . $interval . " seconds\n\n", $log);
    }
}

function debug($echo, $log) {

    if ($echo != "" && $echo !== NULL) {
        echo $echo;
    }

    if ($log == TRUE) {
        file_put_contents("logs/debug.log", date("r") . "  -  " . $echo, FILE_APPEND);
    }
}
?>