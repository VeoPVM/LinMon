<?php

class debugging {

    public function collectionInfoStart() {
        if (DEBUG == TRUE) {
            $this->debug("[DEBUG] Collecting data\n", LOG);
        }
    }

    public function collectionInfoEnd() {
        if (DEBUG == TRUE) {
            $this->debug("[DEBUG] Finished collecting data\n\n", LOG);
        }
    }

    public function collectionInterval($interval) {
        if (DEBUG == TRUE) {
            $this->debug("[DEBUG] Collecting data every " . $interval . " seconds\n\n", LOG);
        }
    }

    public function debug($echo) {

        if ($echo != "" && $echo !== NULL) {
            echo $echo;
        }

        if (LOG == TRUE) {
            if (!file_exists("logs/debug.log")) {
                mkdir("logs");
                $this->dbglog = fopen("logs/debug.log", "w");
                fclose($this->$dbglog);
            }

            file_put_contents("logs/debug.log", date("r") . "  -  " . $echo, FILE_APPEND);
        }
    }

}
?>