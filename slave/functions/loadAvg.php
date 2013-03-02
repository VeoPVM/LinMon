<?php

function collect_loadAvg($debug, $log) {
	$avg = sys_getloadavg();
	$avg = $avg[0].','.$avg[1].','.$avg[2];
	
	if ($debug == TRUE) {
		$avg = explode(",", $avg);
		debug("[DEBUG_COLLECT] Load Avg: ".$avg[0]."\n", $log);
	}
	
	return $avg;
}

?>