<?php
set_time_limit(0);

include 'config/config.php';

while (true){
echo "hi!";
sleep($config['updateinterval']);
}
?>