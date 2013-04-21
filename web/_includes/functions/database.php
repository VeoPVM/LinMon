<?php

function db_connect($host, $user, $pass, $dbname) {
    $connect = new mysqli($host, $user, $pass, $dbname);

    if ($connect -> connect_errno) {
        die("MySQL Error!  Error number: " . $connect -> connect_errno);
    }

    return $connect;
	
}

?>