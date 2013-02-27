<?php
set_time_limit(0);

// Configuration
include 'config/config.php';

// Version Functions
include 'functions/getVersion.php';
include 'functions/checkVersion.php';

// Debugging Functions
include 'functions/debug.php';

echo "LinMon slave version ".getVersion("version")." started. \n\n";
echo checkVersion();
echo "Collecting data every ".$config['updateinterval']." seconds \n\n";

while (true){
	collectionInfoStart();
	sleep($config['updateinterval']);
}
?>