<?php

function collect_loadAvg() {
	$avg = sys_getloadavg();
	$avg = $avg[0].','.$avg[1].','.$avg[2];
	return $avg;
}

?>