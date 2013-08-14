<?php

include 'custom_mysqli.class.php';

function db_connect($host, $user, $pass, $dbname, $compress) {
    $connect = new custom_mysqli($host, $user, $pass, $dbname, $compress);

    if ($connect -> connect_errno) {
        die("MySQL Error!  Error number: " . $connect -> connect_errno);
    }

    return $connect;
	
}

?>