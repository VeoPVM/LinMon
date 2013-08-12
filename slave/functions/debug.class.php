<?php

class debugging {

    public function collectionInfoStart($debug, $log) {
        if ($debug == TRUE) {
            $this->debug("[DEBUG] Collecting data\n", $log);
        }
    }

    public function collectionInfoEnd($debug, $log) {
        if ($debug == TRUE) {
            $this->debug("[DEBUG] Finished collecting data\n\n", $log);
        }
    }

    public function collectionInterval($debug, $interval, $log) {
        if ($debug == TRUE) {
            $this->debug("[DEBUG] Collecting data every " . $interval . " seconds\n\n", $log);
        }
    }

    public function debug($echo, $log) {

        if ($echo != "" && $echo !== NULL) {
            echo $echo;
        }

        if ($log == TRUE) {
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