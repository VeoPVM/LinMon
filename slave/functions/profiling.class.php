<?php

class profile {

    public function startProfile() {
        $this->start = microtime(true);

        return $this->start;
    }

    public function endProfile($start, $log) {
        $this->end = microtime(true);
        $this->end = $this->end - $this->start;

        debugging::debug("[INFO_PROFILE] Profile time: " . round($this->end, 2) . " seconds\n", $log);
    }

}
?>