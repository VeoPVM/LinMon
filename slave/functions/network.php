<?php

function collect_networkUsage($debug, $log) {
    $usage = trim(exec('ifstat -S 0.1 1'));

    $usage = explode(" ", $usage);

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Network Usage collected: IN:" . $usage[0] . " | OUT: " . $usage[6] . "\n", $log);
    }

    $return = $usage[0] . ',' . $usage[6];

    return $return;

}
?>