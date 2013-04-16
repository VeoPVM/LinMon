<?php
    function db_connect($host, $user, $pass, $dbname) {
        $connect = new mysqli($host, $user, $pass, $dbname);
        
        if ($connect->connect_errno) {
            die("MySQL Error!  Error number: ".$connect->connect_errno);
        }
        
        return $connect;
    }
    
    function db_insert($connect, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users) {
        $time = time();
        
        
        if (!$stmt = $connect->prepare("INSERT INTO data (time, id, loadavg, memory, kernel, hostname, uptime, users) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
            die("Can't prepare!");
        }
        
        $stmt->bind_param('isssssss', $time, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users);
        
        $stmt->execute();
        
        if ($connect->error) {
            echo "[ERROR_DATABASE] ".$connect->error."\n";
        }
        
        echo "[INFO_DATABASE] Data submitted to database\n";
    }
?>