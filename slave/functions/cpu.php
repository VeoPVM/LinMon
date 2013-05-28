<?php

function collect_cpuUsage($debug, $log) {
    $usage = explode(" ", exec('vmstat 2 2'));
	
	// Get CPU usage
	$cpu = 100 - $usage[43];
	
	// Get WA CPU usage
	$wa = $usage[44];

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] CPU Usage: ".$cpu."% WA CPU Usage: ".$wa."%\n", $log);
    }
	
	// reset usage variable
	$usage = null;
	
    $return = $cpu.",".$wa;

    return $return;

}
?>