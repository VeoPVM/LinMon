<?php

function collect_memory($debug, $log) {
    $return = "";

    $memorystr = file_get_contents('/proc/meminfo');
    $memoryarr = explode("\n", $memorystr);

    foreach ($memoryarr as $key => $value) {
        if ($value) {
            // Remove spaces
            $memory[$key] = trim($value);

            $memoryarray = explode(":", $memory[$key]);

            // Only get the raw value, without the kB suffix
            $memory[$key] = trim($memoryarray[1]);
            $memory[$key] = str_replace(" kB", "", $memory[$key]);

            // Return string contains the raw values separated by a comma
            if ($memory[$key] != "") {
                $return = $return . $memory[$key] . ",";
            }
        }
    }

    if ($debug == TRUE) {
        debugging::debug("[DEBUG_COLLECT] Memory collected\n", $log);
        debugging::debug("[DEBUG_COLLECT] Memory values: " . $return . "\n", $log);
    }

    return $return;
}
?>