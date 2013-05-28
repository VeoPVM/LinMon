<?php

function collect_cpuUsage($debug, $log) {
    $usage = explode(" ", exec('vmstat 2 2'));
	
	$cpu = array();
	
	foreach ($usage as $key => $value) {
		if ($value != "") {
			array_push($cpu, $value);
		}
	}
	
	print_r($cpu);
	
	// Get CPU usage
	/*$cpu = $usage[43];
	settype($cpu, "integer");
	$cpu = 100 - $cpu;
	
	// Get WA CPU usage
	$wa = $usage[44];*/

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] CPU Usage: ".$cpu."% WA CPU Usage: ".$wa."%\n", $log);
    }
	
	// reset usage variable
	$usage = null;
	
    $return = $cpu.",".$wa;

    return $return;

}
?>