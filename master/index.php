<?php
set_time_limit(0);

include 'config/config.php';

// Create socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Bind to socket
socket_bind($socket, config['socket']['address'], $config['socket']['port']) or die('Could not bind to address');

// Listen to socket
socket_listen($socket);

while (true){
$client = socket_accept($socket);


// Read client input
//$input = socket_read($client, 2048);

$output = '
Connected to LinMon!
';

// Send output to client
socket_write($client, $output);

socket_close($client);
usleep(10000);
}
socket_close($socket);
?>