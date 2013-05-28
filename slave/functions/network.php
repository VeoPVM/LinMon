<?php

function collect_networkUsage($debug, $log) {
    $usage = trim(exec('ifstat -S 0.1 1'));

    $usage = explode(" ", $usage);
	
	print_r($usage);

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Network Usage collected: IN: " . $usage[0] . " KBytes/s | OUT: " . $usage[6] . " KBytes/s\n", $log);
    }

    $return = $usage[0] . ',' . $usage[6];

    return $return;

}
?>