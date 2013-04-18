<?php

function collect_networkUsage($debug, $log) {
    $usage = exec('ifstat -S 0.1 1');

    $usage = explode(" ", $usage);

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Network Usage collected: IN:" . trim($usage[0]) . " | OUT: " . trim($usage[1]) . "\n", $log);
    }

    $return = trim($usage[0] . ',' . $usage[1]);

    return $return;

}
?>