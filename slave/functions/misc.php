<?php

function collect_kernel($debug) {
    $kernel = exec('uname -a');
    
    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Kernel: ".$kernel."\n";
    }
    
    return $kernel;
}

?>