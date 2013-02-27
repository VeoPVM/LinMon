<?php

include '../config/config.php';

function collectionInfoStart() {
    if ($config['debug'] == TRUE) {
        echo "Collecting Data\n";
    }
}

function collectionInterval() {
    if ($config['debug'] == TRUE) {
        echo "Collecting data every ".$config['updateinterval']." seconds \n\n";
    }
}

?>