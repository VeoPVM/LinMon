<?php

function collect_networkUsage($debug, $log) {
    $usage = trim(exec('ifstat -S 0.1 1'));

    $usage = explode(" ", $usage);
	
	$network = array();
	
	foreach ($usage as $key => $value) {
		if ($value != "") {
			array_push($network, $value);
		}
	}
	
	print_r($network);

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Network Usage collected: IN: " . $network[0] . " KBytes/s | OUT: " . $network[1] . " KBytes/s\n", $log);
    }

    $return = $network[0] . ',' . $network[1];

    return $return;

}
?>