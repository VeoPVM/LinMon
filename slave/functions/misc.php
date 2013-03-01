<?php

function collect_kernel($debug) {
    $kernel = exec('uname -r').exec('uname -v');
    
    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Kernel: ".$kernel."\n";
    }
    
    return $kernel;
}

function collect_hostname($debug) {
    $hostname = exec('uname -n');
    
    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Hostname: ".$hostname."\n";
    }
    
    return $hostname;
}

?>