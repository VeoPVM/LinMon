<?php
function db_connect($host, $user, $pass, $dbname) {
    $connect = new mysqli($host, $user, $pass, $dbname);

    if ($connect -> connect_errno) {
        echo "MySQL Error!  Error number: " . $connect -> connect_errno;
    }

    return $connect;
}

function db_insert($connect, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu) {
    $time = time();

    if (!$stmt = $connect -> prepare("INSERT INTO data (time, id, loadavg, memory, kernel, hostname, uptime, users, network, cpu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
        echo "MySQL Error!  Error description: Can't prepare!";
    }

    $stmt -> bind_param('isssssssss', $time, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu);

    $stmt -> execute();

    if ($connect -> error) {
        echo "[ERROR_DATABASE] " . $connect -> error . "\n";
    }

    echo "[INFO_DATABASE] Data submitted to database\n";
}

function db_close($handle) {
	mysqli_close($handle);
}
?>