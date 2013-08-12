<?php

class cpu {

    function collect_cpuUsage($debug, $log) {
        $this->usage = explode(" ", exec('vmstat 2 2'));

        $this->cpuusage = array();

        foreach ($this->usage as $key => $value) {
            if ($value != "") {
                array_push($this->cpuusage, $value);
            }
        }

        // Get CPU usage
        $this->cpu = $this->cpuusage[14];
        settype($this->cpu, "integer");
        $this->cpu = 100 - $this->cpu;

        // Get WA CPU usage
        $this->wa = $this->cpuusage[15];

        if ($debug == TRUE) {
            debugging::debug("[DEBUG_COLLECT] CPU Usage: " . $this->cpu . "% WA CPU Usage: " . $this->wa . "%\n", $log);
        }

        $this->return = $this->cpu . "," . $this->wa;

        return $this->return;

    }

}
?>