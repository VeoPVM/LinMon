<?php

function debug_collectionInfoStart($debug) {
    if ($debug == TRUE) {
        echo "Collecting Data\n";
    }
}

function debug_collectionInterval($debug, $interval) {
    if ($debug == TRUE) {
        echo "Collecting data every ".$interval." seconds \n\n";
    }
}

?>