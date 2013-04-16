<?php

function profile_Start() {
    $start = microtime(true);
    
    return $start;
}

function profile_End($start) {
    $end = microtime(true);
    $end = $end - $start;
    
    echo "[INFO_PROFILE] Profile time: '.round($end, 2).' seconds\n";
}

?>