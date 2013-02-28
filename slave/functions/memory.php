<?php

function collect_memory($debug) {
    $return = "";
    
    $memorystr = file_get_contents('/proc/meminfo');
    $memoryarr = explode("\n", $memorystr);
    
    
    foreach ($memoryarr as $key => $value) {
        // Remove spaces
    	$memory[$key] = trim($value);
        
        // Only get the value, not the label as well
        $memoryarray = explode(":", $memory[$key]);
        
        // Only get the raw value, without the kB suffix
        $memory[$key] = $memoryarray[0];
        
        // Return string contains the raw values separated by a comma
        $return = $return.",".$memory[$key];
    }
    
    if ($debug == TRUE) {
        echo "[DEBUG_COLLECT] Memory collected";
    }
    
    return $return;
}

?>