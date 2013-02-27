<?php
set_time_limit(0);

// Configuration
include 'config/config.php';

// Version
include 'functions/getVersion.php';
include 'functions/checkVersion.php';

echo "LinMon slave version ".getVersion("version")." started. \n";
echo checkVersion();

while (true){
	echo "Starting data collection \n";
	sleep($config['updateinterval']);
}
?>