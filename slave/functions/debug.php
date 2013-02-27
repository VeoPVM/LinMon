<?php

function debug_collectionInfoStart($debug) {
    if ($config == TRUE) {
        echo "Collecting Data\n";
    }
}

function debug_collectionInterval($debug, $interval) {
    if ($config == TRUE) {
        echo "Collecting data every ".$interval." seconds \n\n";
    }
}

?>