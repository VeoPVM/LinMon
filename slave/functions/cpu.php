<?php

function collect_cpuUsage($debug, $log) {
    $usage = explode(" ", exec('vmstat 2 2'));
	
	$cpuusage = array();
	
	foreach ($usage as $key => $value) {
		if ($value != "") {
			array_push($cpuusage, $value);
		}
	}
	
	// Get CPU usage
	$cpu = $cpuusage[14];
	settype($cpu, "integer");
	$cpu = 100 - $cpu;
	
	// Get WA CPU usage
	$wa = $cpuusage[15];

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] CPU Usage: ".$cpu."% WA CPU Usage: ".$wa."%\n", $log);
    }
	
    $return = $cpu.",".$wa;

    return $return;

}
?>