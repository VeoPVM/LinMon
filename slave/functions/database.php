<?php
function db_connect($host, $user, $pass, $dbname) {
	$connect = new mysqli($host, $user, $pass, $dbname);

	if ($connect->connect_errno) {
		echo "MySQL Error!  Error number: " . $connect->connect_errno;
	}

	return $connect;
}

function db_insert($connect, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu, $version) {
	$time = time();

	if (!$stmt = $connect->prepare("UPDATE data SET time = ?, id = ?, loadavg = ?, memory = ?, kernel = ?, hostname = ?, uptime = ?, users = ?, network = ?, cpu = ?, version = ? WHERE id = " . $id)) {
		echo "MySQL Error!  Error description: Can't prepare!";
	} else {

		$stmt->bind_param('issssssssss', $time, $id, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu, $version);

		$stmt->execute();

	}

	if ($connect->error) {
		echo "[ERROR_DATABASE] " . $connect->error . "\n";
	}

	echo "[INFO_DATABASE] Data submitted to database\n";
}

function db_close($handle) {
	mysqli_close($handle);
}
?>