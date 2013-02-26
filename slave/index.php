<?php
set_time_limit(0);

include 'config/config.php';
include 'functions/getVersion.php';

echo "LinMon slave version ".getVersion("version")." started. \n";

while (true){
	echo "Starting data collection \n";
	sleep($config['updateinterval']);
}
?>