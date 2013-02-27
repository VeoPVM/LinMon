<?php

function debug_collectionInfoStart($debug) {
    if ($debug == TRUE) {
        echo "[DEBUG] Collecting data\n";
    }
}

function debug_collectionInfoEnd($debug) {
    if ($debug == TRUE) {
        echo "[DEBUG] Finished collecting data\n";
    }
}

function debug_collectionInterval($debug, $interval) {
    if ($debug == TRUE) {
        echo "[DEBUG] Collecting data every ".$interval." seconds\n\n";
    }
}

?>