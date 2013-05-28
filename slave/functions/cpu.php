<?php

function collect_cpuUsage($debug, $log) {
    $usage = explode(" ", exec('vmstat 1 2'));
	
	print_r($usage);

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] ", $log);
    }

    $return = "";

    return $return;

}
?>