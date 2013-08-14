<?php

class profile {

    public function startProfile() {
        $this->start = microtime(true);

        return $this->start;
    }

    public function endProfile($start) {
        $this->end = microtime(true);
        $this->end = $this->end - $this->start;
        $this->end = round($this->end);
        
        return $this->end;
    }

}
?>