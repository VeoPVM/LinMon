<?php

function collect_kernel($debug, $log) {
    $kernel = exec('uname -r') . " " . exec('uname -v');

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Kernel: " . $kernel . "\n", $log);
    }

    return $kernel;
}

function collect_hostname($debug, $log) {
    $hostname = exec('uname -n');

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Hostname: " . $hostname . "\n", $log);
    }

    return $hostname;
}

function collect_uptime($debug, $log) {
    $uptime = shell_exec('uptime');

    // Check if up more than 24 hours
    if (strpos($uptime, 'day') !== FALSE) {
        $uptime = explode(' up ', $uptime);
        $uptime = explode(',', $uptime[1]);
        $uptimehourmin = explode(":", $uptime[1]);
        $uptime = str_replace("days", "", $uptime[0]);
        $uptime = $uptime . ',' . $uptimehourmin[0] . ',' . $uptimehourmin[1];
        $uptimearr = explode(",", $uptime);

        if ($uptime == "1") {
            $day = "day";
        } else {
            $day = "days";
        }

        if ($debug == TRUE) {
            debug("[DEBUG_COLLECT] Uptime: " . $uptimearr[0] . " " . $day . " " . $uptimearr[1] . " hours " . $uptimearr[2] . " minutes\n", $log);
        }
    } else {
        $uptime = explode(' up ', $uptime);
        $uptime = explode(',', $uptime[1]);
        $uptime = explode(':', $uptime[0]);

        if ($uptime[0] < 2) {
            $hourperiod = 'hour';
        } else {
            $hourperiod = 'hours';
        }

        if ($uptime[1] == 1) {
            $minperiod = 'minute';
        } else {
            $minperiod = 'minutes';
        }

        $hours = $uptime[0];
        $mins = $uptime[1];

        $uptime = $uptime[0] . "," . $uptime[1];

        if ($debug == TRUE) {
            debug("[DEBUG_COLLECT] Uptime: " . $hours . " " . $hourperiod . " " . $mins . " " . $minperiod . "\n", $log);
        }

    }

    return $uptime;
}

function collect_users($debug, $log) {
    exec('who', $who);

    foreach ($who as $key => $value) {
        $user = explode(" ", $value);
        $users[$key] = $user[0];
    }

    foreach ($users as $key => $value) {
        $returnusers = $users[$key] . ",";
    }
	
	if ($returnusers == "" || $returnusers == NULL) {
		$returnusers = "Nobody is logged in";
	}

    if ($debug == TRUE) {
        debug("[DEBUG_COLLECT] Users: " . str_replace(",", ", ", $returnusers) . "\n", $log);
    }

    return $returnusers;

}
?>