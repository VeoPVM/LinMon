<?php

class network {

    public function collect_networkUsage($debug, $log) {
        $this->usage = trim(exec('ifstat -S 0.1 1'));

        $this->usage = explode(" ", $this->usage);

        $this->network = array();

        foreach ($this->usage as $this->key => $this->value) {
            if ($this->value != "") {
                array_push($this->network, $this->value);
            }
        }

        if ($debug == TRUE) {
            debugging::debug("[DEBUG_COLLECT] Network Usage collected: IN: " . $this->network[0] . " KBytes/s | OUT: " . $this->network[1] . " KBytes/s\n", $log);
        }

        $this->return = $this->network[0] . ',' . $this->network[1];

        return $this->return;

    }

}
?>