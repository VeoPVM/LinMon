<?php

function collect_loadAvg($debug, $log) {
    $avg = sys_getloadavg();
    $avg = $avg[0] . ',' . $avg[1] . ',' . $avg[2];

    if ($debug == TRUE) {
        $avg = explode(",", $avg);
        $avg = $avg[0] . "," . $avg[1] . "," . $avg[2];
        debug("[DEBUG_COLLECT] Load Avg: " . $avg . "\n", $log);
    }

    return $avg;
}
?>