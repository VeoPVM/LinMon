<?php

class memory {

    public function collect_memory($debug, $log) {
        $this->return = "";

        $this->memorystr = file_get_contents('/proc/meminfo');
        $this->memoryarr = explode("\n", $this->memorystr);

        foreach ($this->memoryarr as $key => $value) {
            if ($value) {
                // Remove spaces
                $this->memory[$key] = trim($value);

                $this->memoryarray = explode(":", $this->memory[$key]);

                // Only get the raw value, without the kB suffix
                $this->memory[$key] = trim($this->memoryarray[1]);
                $this->memory[$key] = str_replace(" kB", "", $this->memory[$key]);

                // Return string contains the raw values separated by a comma
                if ($this->memory[$key] != "") {
                    $this->return = $this->return . $this->memory[$key] . ",";
                }
            }
        }

        if ($debug == TRUE) {
            debugging::debug("[DEBUG_COLLECT] Memory collected\n", $log);
            debugging::debug("[DEBUG_COLLECT] Memory values: " . $this->return . "\n", $log);
        }

        return $this->return;
    }

}
?>