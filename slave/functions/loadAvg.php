<?php

function collect_loadAvg($debug) {
	$avg = sys_getloadavg();
	$avg = $avg[0].','.$avg[1].','.$avg[2];
	
	if ($debug == TRUE) {
		$avg = explode(",", $avg);
		echo "[DEBUG_COLLECT] Load Avg: ".$avg."\n";
	}
	
	return $avg;
}

?>