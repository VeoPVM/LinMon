<?php

class database {

    public function db_connect($host, $user, $pass, $dbname) {
        $this->connect = new mysqli($host, $user, $pass, $dbname);

        if ($this->connect->connect_errno) {
            echo "MySQL Error!  Error number: " . $this->connect->connect_errno;
        }

    }

    public function db_insert($id, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu, $version) {
        $this->time = time();

        if (!$this->stmt = $this->connect->prepare("INSERT INTO data (time, id, loadavg, memory, kernel, hostname, uptime, users, network, cpu, version) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            echo "MySQL Error!  Error description: Can't prepare!";
        } else {

            $this->stmt->bind_param('issssssssss', $time, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu, $version);

            $this->stmt->execute();

        }

        if ($this->connect->error) {
            echo "[ERROR_DATABASE] " . $this->connect->error . "\n";
        }

        echo "[INFO_DATABASE] Data submitted to database\n";
    }

    public function db_close() {
        $this->connect->mysqli_close();
    }

}
?>