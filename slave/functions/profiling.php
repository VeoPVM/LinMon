<?php

function profile_Start() {
    $start = microtime(true);

    return $start;
}

function profile_End($start, $log) {
    $end = microtime(true);
    $end = $end - $start;

    debug("[INFO_PROFILE] Profile time: ".round($end, 2)." seconds\n", $log);
}
?>