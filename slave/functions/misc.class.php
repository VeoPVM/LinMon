<?php

class misc {

    public function collect_kernel($debug, $log) {
        $this->kernel = exec('uname -r') . " " . exec('uname -v');

        if ($debug == TRUE) {
            debugging::debug("[DEBUG_COLLECT] Kernel: " . $this->kernel . "\n", $log);
        }

        return $this->kernel;
    }

    public function collect_hostname($debug, $log) {
        $this->hostname = exec('uname -n');

        if ($debug == TRUE) {
            debugging::debug("[DEBUG_COLLECT] Hostname: " . $this->hostname . "\n", $log);
        }

        return $this->hostname;
    }

    public function collect_uptime($debug, $log) {
        $this->uptime = shell_exec('uptime');

        // Check if up more than 24 hours
        if (strpos($this->uptime, 'day') !== FALSE) {
            $this->uptime = explode(' up ', $this->uptime);
            $this->uptime = explode(',', $this->uptime[1]);
            $this->uptimehourmin = explode(":", $this->uptime[1]);
            $this->uptime = str_replace("days", "", $this->uptime[0]);
            $this->uptime = $this->uptime . ',' . $this->uptimehourmin[0] . ',' . $this->uptimehourmin[1];
            $this->uptimearr = explode(",", $this->uptime);

            if ($this->uptime == "1") {
                $this->day = "day";
            } else {
                $this->day = "days";
            }

            if ($debug == TRUE) {
                debugging::debug("[DEBUG_COLLECT] Uptime: " . $this->uptimearr[0] . " " . $this->day . " " . $this->uptimearr[1] . " hours " . $this->uptimearr[2] . " minutes\n", $log);
            }
        } else {
            $this->uptime = explode(' up ', $this->uptime);
            $this->uptime = explode(',', $this->uptime[1]);
            $this->uptime = explode(':', $this->uptime[0]);

            if ($this->uptime[0] < 2) {
                $this->hourperiod = 'hour';
            } else {
                $this->hourperiod = 'hours';
            }

            if ($this->uptime[1] == 1) {
                $this->minperiod = 'minute';
            } else {
                $this->minperiod = 'minutes';
            }

            $this->hours = $this->uptime[0];
            $this->mins = $this->uptime[1];

            $this->uptime = $this->uptime[0] . "," . $this->uptime[1];

            if ($debug == TRUE) {
                debugging::debug("[DEBUG_COLLECT] Uptime: " . $this->hours . " " . $this->hourperiod . " " . $this->mins . " " . $this->minperiod . "\n", $log);
            }

        }

        return $this->uptime;
    }

    public function collect_users($debug, $log) {
        exec('who', $this->who);

        foreach ($this->who as $key => $value) {
            $this->user = explode(" ", $value);
            $this->users[$key] = $this->user[0];
        }

        foreach ($this->users as $key => $value) {
            $this->returnusers = $this->users[$key] . ",";
        }

        if ($this->returnusers == "" || $this->returnusers == NULL) {
            $this->returnusers = "Nobody is logged in";
        }

        if ($debug == TRUE) {
            debugging::debug("[DEBUG_COLLECT] Users: " . str_replace(",", ", ", $this->returnusers) . "\n", $log);
        }

        return $this->returnusers;

    }

}
?>