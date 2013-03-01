<?php

function collect_kernel($debug) {
    $kernel = exec('uname -r') . " " . exec('uname -v');

    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Kernel: " . $kernel . "\n";
    }

    return $kernel;
}

function collect_hostname($debug) {
    $hostname = exec('uname -n');

    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Hostname: " . $hostname . "\n";
    }

    return $hostname;
}

function collect_uptime($debug) {
    $uptime = shell_exec('uptime');
    $uptime = explode(' up ', $uptime);
    $uptime = explode(',', $uptime[1]);
    $uptimehourmin = explode(":", $uptime[1]);
    $uptime = str_replace("days", "", $uptime[0]);
    $uptime = $uptime[0].','.$uptimehourmin[0].','.$uptimehourmin[1];
    $uptimearr = explode(",", $uptime);

    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Uptime: " . $uptimearr[0] . " days " . $uptimearr[1] . " hours ".$uptimearr[2]." minutes\n";
    }

    return $uptime;
}
?>