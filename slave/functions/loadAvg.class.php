<?php

class loadAvg {

    public function collect_loadAvg($debug, $log) {
        $this->avg = sys_getloadavg();
        $this->avg = $this->avg[0] . ', ' . $this->avg[1] . ', ' . $this->avg[2];

        if ($debug == TRUE) {
            $this->avg = explode(",", $this->avg);
            $this->avg = $this->avg[0] . "," . $this->avg[1] . "," . $this->avg[2];
            debugging::debug("[DEBUG_COLLECT] Load Avg: " . $this->avg . "\n", $log);
        }

        return $this->avg;
    }

}
?>